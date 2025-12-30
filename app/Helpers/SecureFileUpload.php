<?php

namespace App\Helpers;

/**
 * Secure File Upload Helper
 * 
 * Provides secure file upload functionality with:
 * - MIME type validation
 * - File size validation
 * - Secure file naming
 * - Storage outside webroot or with .htaccess protection
 */
class SecureFileUpload
{
    /**
     * Allowed MIME types for different file categories
     */
    private const ALLOWED_MIME_TYPES = [
        'image' => [
            'image/jpeg',
            'image/jpg',
            'image/png',
            'image/gif',
            'image/webp',
        ],
        'document' => [
            'application/pdf',
            'application/msword',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'application/vnd.ms-excel',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        ],
        'archive' => [
            'application/zip',
            'application/x-zip-compressed',
            'application/x-rar-compressed',
        ],
    ];

    /**
     * Maximum file sizes in bytes
     */
    private const MAX_FILE_SIZES = [
        'image' => 5242880,    // 5MB
        'document' => 10485760, // 10MB
        'archive' => 52428800,  // 50MB
    ];

    /**
     * Validate and upload a file securely
     * 
     * @param array $file The uploaded file from $_FILES
     * @param string $category File category (image, document, archive)
     * @param string $uploadPath Upload directory path (relative to WRITEPATH)
     * @return array Response with success status, message, and file path
     */
    public static function upload($file, string $category = 'image', string $uploadPath = 'uploads'): array
    {
        // Check if file was uploaded
        if (!isset($file) || $file['error'] === UPLOAD_ERR_NO_FILE) {
            return [
                'success' => false,
                'message' => 'No file was uploaded.',
                'file_path' => null,
            ];
        }

        // Check for upload errors
        if ($file['error'] !== UPLOAD_ERR_OK) {
            return [
                'success' => false,
                'message' => self::getUploadErrorMessage($file['error']),
                'file_path' => null,
            ];
        }

        // Validate file size
        $maxSize = self::MAX_FILE_SIZES[$category] ?? self::MAX_FILE_SIZES['image'];
        if ($file['size'] > $maxSize) {
            $maxSizeMB = $maxSize / 1024 / 1024;
            return [
                'success' => false,
                'message' => "File size exceeds maximum allowed size of {$maxSizeMB}MB.",
                'file_path' => null,
            ];
        }

        // Validate MIME type
        $allowedMimes = self::ALLOWED_MIME_TYPES[$category] ?? self::ALLOWED_MIME_TYPES['image'];
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimeType = finfo_file($finfo, $file['tmp_name']);
        finfo_close($finfo);

        if (!in_array($mimeType, $allowedMimes)) {
            return [
                'success' => false,
                'message' => 'Invalid file type. Please upload a valid file.',
                'file_path' => null,
            ];
        }

        // Generate secure filename
        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $filename = self::generateSecureFilename($extension);

        // Create upload directory if it doesn't exist
        $fullUploadPath = WRITEPATH . $uploadPath;
        if (!is_dir($fullUploadPath)) {
            mkdir($fullUploadPath, 0755, true);

            // Create .htaccess to prevent PHP execution in uploads directory
            self::createProtectionHtaccess($fullUploadPath);
        }

        // Move uploaded file
        $destination = $fullUploadPath . '/' . $filename;
        if (move_uploaded_file($file['tmp_name'], $destination)) {
            // Set file permissions
            chmod($destination, 0644);

            return [
                'success' => true,
                'message' => 'File uploaded successfully.',
                'file_path' => $uploadPath . '/' . $filename,
            ];
        }

        return [
            'success' => false,
            'message' => 'Failed to move uploaded file.',
            'file_path' => null,
        ];
    }

    /**
     * Generate a secure random filename
     * 
     * @param string $extension File extension
     * @return string Secure filename
     */
    private static function generateSecureFilename(string $extension): string
    {
        // Generate random filename with timestamp
        $timestamp = time();
        $randomString = bin2hex(random_bytes(16));
        return "{$timestamp}_{$randomString}.{$extension}";
    }

    /**
     * Create .htaccess file to prevent PHP execution
     * 
     * @param string $directory Directory path
     */
    private static function createProtectionHtaccess(string $directory): void
    {
        $htaccessContent = <<<EOT
# Disable PHP execution in upload directory
<FilesMatch "\\.(?i:php|php3|php4|php5|phtml|pl|py|jsp|asp|sh|cgi)$">
    Order Allow,Deny
    Deny from all
</FilesMatch>

# Disable directory browsing
Options -Indexes

# Disable script execution
AddHandler cgi-script .php .php3 .php4 .php5 .phtml .pl .py .jsp .asp .htm .shtml .sh .cgi
Options -ExecCGI

# Protect .htaccess itself
<Files .htaccess>
    Order Allow,Deny
    Deny from all
</Files>
EOT;

        file_put_contents($directory . '/.htaccess', $htaccessContent);
    }

    /**
     * Get human-readable upload error message
     * 
     * @param int $error PHP upload error code
     * @return string Error message
     */
    private static function getUploadErrorMessage(int $error): string
    {
        switch ($error) {
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                return 'The uploaded file exceeds the maximum file size.';
            case UPLOAD_ERR_PARTIAL:
                return 'The uploaded file was only partially uploaded.';
            case UPLOAD_ERR_NO_FILE:
                return 'No file was uploaded.';
            case UPLOAD_ERR_NO_TMP_DIR:
                return 'Missing temporary folder.';
            case UPLOAD_ERR_CANT_WRITE:
                return 'Failed to write file to disk.';
            case UPLOAD_ERR_EXTENSION:
                return 'A PHP extension stopped the file upload.';
            default:
                return 'Unknown upload error.';
        }
    }

    /**
     * Delete a file
     * 
     * @param string $filePath File path relative to WRITEPATH
     * @return bool Success status
     */
    public static function deleteFile(string $filePath): bool
    {
        $fullPath = WRITEPATH . $filePath;

        if (file_exists($fullPath)) {
            return unlink($fullPath);
        }

        return false;
    }

    /**
     * Get file URL for public access
     * 
     * @param string $filePath File path relative to WRITEPATH
     * @return string File URL
     */
    public static function getFileUrl(string $filePath): string
    {
        // Since files are stored outside webroot, we need a controller to serve them
        return base_url("files/serve/{$filePath}");
    }
}
