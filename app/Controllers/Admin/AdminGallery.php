<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\GalleryModel;
use App\Models\AuditLogModel;

class AdminGallery extends BaseController
{
    protected $galleryModel;
    protected $auditLog;

    public function __construct()
    {
        $this->galleryModel = new GalleryModel();
        $this->auditLog = new AuditLogModel();
    }

    public function index()
    {
        $perPage = 20;
        $category = $this->request->getGet('category');

        $builder = $this->galleryModel;

        if ($category) {
            $builder = $builder->where('category', $category);
        }

        $data = [
            'title' => 'Manage Gallery',
            'images' => $builder->orderBy('display_order', 'ASC')->orderBy('created_at', 'DESC')->paginate($perPage),
            'pager' => $this->galleryModel->pager,
            'category' => $category,
        ];

        return view('admin/gallery/index', $data);
    }

    public function upload()
    {
        $data = ['title' => 'Upload Images'];
        return view('admin/gallery/upload', $data);
    }

    public function store()
    {
        $rules = [
            'title' => 'required|min_length[3]',
            'category' => 'required',
            'image' => 'uploaded[image]|max_size[image,5120]|is_image[image]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $file = $this->request->getFile('image');

        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();

            // Move to temp location first
            $file->move(FCPATH . 'uploads/gallery/temp', $newName);

            // Resize image to max 1600px
            $this->resizeImage(FCPATH . 'uploads/gallery/temp/' . $newName, FCPATH . 'uploads/gallery/' . $newName);

            // Delete temp file
            @unlink(FCPATH . 'uploads/gallery/temp/' . $newName);

            $data = [
                'title' => $this->request->getPost('title'),
                'description' => $this->request->getPost('description'),
                'image_path' => $newName,
                'category' => $this->request->getPost('category'),
                'display_order' => $this->request->getPost('display_order') ?: 0,
                'status' => $this->request->getPost('status') ? 1 : 0,
            ];

            if ($this->galleryModel->insert($data)) {
                $this->auditLog->logActivity('Uploaded gallery image', 'gallery', $this->galleryModel->getInsertID(), null, $data);
                return redirect()->to('/admin/gallery')->with('success', 'Image uploaded successfully.');
            }
        }

        return redirect()->back()->withInput()->with('error', 'Failed to upload image.');
    }

    /**
     * Store multiple images in bulk without title/description
     */
    public function bulkStore()
    {
        // Check if POST data is empty (likely due to post_max_size limit)
        if (empty($this->request->getPost()) && empty($this->request->getFiles())) {
            $postMaxSize = ini_get('post_max_size');
            log_message('error', "Bulk upload failed: POST data empty. Likely exceeded post_max_size ({$postMaxSize}).");
            return redirect()->back()->with('error', "Upload failed. The total size likely exceeds the server limit of {$postMaxSize}.");
        }

        $files = $this->request->getFiles();

        if (empty($files['images'])) {
            log_message('error', 'Bulk upload failed: No images found in request.');
            return redirect()->back()->with('error', 'No images selected.');
        }

        $uploadedCount = 0;
        $failedCount = 0;
        $errors = [];

        foreach ($files['images'] as $file) {
            if ($file->isValid() && !$file->hasMoved()) {
                // Validate file size manually as well
                if ($file->getSize() > 5120 * 1024) { // 5MB
                    $errors[] = "File {$file->getClientName()} exceeds 5MB limit.";
                    log_message('error', "Upload failed for {$file->getClientName()}: Size exceeds 5MB.");
                    $failedCount++;
                    continue;
                }

                $mimeType = $file->getMimeType();
                if (!in_array($mimeType, ['image/jpeg', 'image/png', 'image/gif', 'image/webp'])) {
                    $errors[] = "File {$file->getClientName()} has invalid type: {$mimeType}.";
                    log_message('error', "Upload failed for {$file->getClientName()}: Invalid mime type {$mimeType}.");
                    $failedCount++;
                    continue;
                }

                $newName = $file->getRandomName();

                try {
                    // Move to temp location first
                    $file->move(FCPATH . 'uploads/gallery/temp', $newName);

                    // Resize image to max 1600px
                    $this->resizeImage(FCPATH . 'uploads/gallery/temp/' . $newName, FCPATH . 'uploads/gallery/' . $newName);

                    // Delete temp file
                    @unlink(FCPATH . 'uploads/gallery/temp/' . $newName);

                    // Use filename as title, replacing underscores/dashes with spaces
                    $cleanTitle = pathinfo($file->getClientName(), PATHINFO_FILENAME);
                    $cleanTitle = str_replace(['_', '-'], ' ', $cleanTitle);

                    // Ensure title meets minimum length requirement (3 chars)
                    if (strlen($cleanTitle) < 3) {
                        $cleanTitle .= ' Image';
                    }

                    $data = [
                        'title' => $cleanTitle,
                        'description' => '',
                        'image_path' => $newName,
                        'category' => 'general',
                        'display_order' => 0,
                        'status' => 1,
                    ];

                    if ($this->galleryModel->insert($data)) {
                        $this->auditLog->logActivity('Bulk uploaded gallery image', 'gallery', $this->galleryModel->getInsertID(), null, $data);
                        $uploadedCount++;
                    } else {
                        log_message('error', "Database insert failed for {$file->getClientName()}.");
                        $errors[] = "Database error for {$file->getClientName()}.";
                        $failedCount++;
                    }
                } catch (\Exception $e) {
                    log_message('error', "Exception during upload/resize for {$file->getClientName()}: " . $e->getMessage());
                    $errors[] = "Error processing {$file->getClientName()}: " . $e->getMessage();
                    $failedCount++;
                    // Clean up if file was moved but processing failed
                    if (file_exists(FCPATH . 'uploads/gallery/temp/' . $newName)) {
                        @unlink(FCPATH . 'uploads/gallery/temp/' . $newName);
                    }
                }
            } else {
                $errorMsg = $file->getErrorString() . '(' . $file->getError() . ')';
                log_message('error', "Upload failed for {$file->getClientName()}: {$errorMsg}");
                $errors[] = "Failed to upload {$file->getClientName()}: {$errorMsg}";
                $failedCount++;
            }
        }

        if ($uploadedCount > 0) {
            $message = "{$uploadedCount} image(s) uploaded successfully.";
            if ($failedCount > 0) {
                $message .= " {$failedCount} image(s) failed. Check details in browser console.";
                return redirect()->to('/admin/gallery')->with('success', $message)->with('api_errors', $errors);
            }
            return redirect()->to('/admin/gallery')->with('success', $message);
        }

        return redirect()->back()->with('error', 'Failed to upload images. Check browser console for details.')->with('api_errors', $errors);
    }

    public function edit($id)
    {
        $image = $this->galleryModel->find($id);

        if (!$image) {
            return redirect()->to('/admin/gallery')->with('error', 'Image not found.');
        }

        $data = [
            'title' => 'Edit Image',
            'image' => $image,
        ];

        return view('admin/gallery/edit', $data);
    }

    public function update($id)
    {
        $oldData = $this->galleryModel->find($id);

        if (!$oldData) {
            return redirect()->to('/admin/gallery')->with('error', 'Image not found.');
        }

        $rules = [
            'title' => 'required|min_length[3]',
            'category' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'category' => $this->request->getPost('category'),
            'display_order' => $this->request->getPost('display_order') ?: 0,
            'status' => $this->request->getPost('status') ? 1 : 0,
        ];

        // Handle new image upload
        $file = $this->request->getFile('image');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Delete old image
            if ($oldData['image_path'] && file_exists(FCPATH . 'uploads/gallery/' . $oldData['image_path'])) {
                unlink(FCPATH . 'uploads/gallery/' . $oldData['image_path']);
            }

            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/gallery/temp', $newName);
            $this->resizeImage(FCPATH . 'uploads/gallery/temp/' . $newName, FCPATH . 'uploads/gallery/' . $newName);
            @unlink(FCPATH . 'uploads/gallery/temp/' . $newName);

            $data['image_path'] = $newName;
        }

        if ($this->galleryModel->update($id, $data)) {
            $this->auditLog->logActivity('Updated gallery image', 'gallery', $id, $oldData, $data);
            return redirect()->to('/admin/gallery')->with('success', 'Image updated successfully.');
        }

        return redirect()->back()->withInput()->with('error', 'Failed to update image.');
    }

    public function delete($id)
    {
        $image = $this->galleryModel->find($id);

        if (!$image) {
            return redirect()->to('/admin/gallery')->with('error', 'Image not found.');
        }

        // Delete file
        if ($image['image_path'] && file_exists(FCPATH . 'uploads/gallery/' . $image['image_path'])) {
            unlink(FCPATH . 'uploads/gallery/' . $image['image_path']);
        }

        if ($this->galleryModel->delete($id)) {
            $this->auditLog->logActivity('Deleted gallery image', 'gallery', $id, $image);
            return redirect()->to('/admin/gallery')->with('success', 'Image deleted successfully.');
        }

        return redirect()->to('/admin/gallery')->with('error', 'Failed to delete image.');
    }

    /**
     * Resize image to max 1600px using GD library
     */
    private function resizeImage($sourcePath, $destinationPath, $maxWidth = 1600, $maxHeight = 1600)
    {
        // Get image info
        $imageInfo = getimagesize($sourcePath);
        $width = $imageInfo[0];
        $height = $imageInfo[1];
        $type = $imageInfo[2];

        // If image is already smaller, just copy it
        if ($width <= $maxWidth && $height <= $maxHeight) {
            copy($sourcePath, $destinationPath);
            return true;
        }

        // Calculate new dimensions
        $ratio = min($maxWidth / $width, $maxHeight / $height);
        $newWidth = (int) ($width * $ratio);
        $newHeight = (int) ($height * $ratio);

        // Create source image
        switch ($type) {
            case IMAGETYPE_JPEG:
                $source = imagecreatefromjpeg($sourcePath);
                break;
            case IMAGETYPE_PNG:
                $source = imagecreatefrompng($sourcePath);
                break;
            case IMAGETYPE_GIF:
                $source = imagecreatefromgif($sourcePath);
                break;
            default:
                copy($sourcePath, $destinationPath);
                return false;
        }

        // Create new image
        $newImage = imagecreatetruecolor($newWidth, $newHeight);

        // Preserve transparency for PNG and GIF
        if ($type == IMAGETYPE_PNG || $type == IMAGETYPE_GIF) {
            imagealphablending($newImage, false);
            imagesavealpha($newImage, true);
            $transparent = imagecolorallocatealpha($newImage, 255, 255, 255, 127);
            imagefilledrectangle($newImage, 0, 0, $newWidth, $newHeight, $transparent);
        }

        // Resize
        imagecopyresampled($newImage, $source, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

        // Save resized image
        switch ($type) {
            case IMAGETYPE_JPEG:
                imagejpeg($newImage, $destinationPath, 90);
                break;
            case IMAGETYPE_PNG:
                imagepng($newImage, $destinationPath, 9);
                break;
            case IMAGETYPE_GIF:
                imagegif($newImage, $destinationPath);
                break;
        }

        // Free memory
        imagedestroy($source);
        imagedestroy($newImage);

        return true;
    }
}
