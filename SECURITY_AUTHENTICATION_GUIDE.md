# Admin Authentication Security - Implementation Guide

## Overview
This document covers the security enhancements added to the **admin-only** authentication system for the Moonstar School website. The public website is fully accessible without authentication - only admins need to log in to manage content.

---

## 🔐 Security Features Implemented

### 1. **Password Hashing - BCrypt**
- **Implementation**: Uses `password_hash()` with `PASSWORD_BCRYPT` (in `UserModel.php`)
- **Verification**: Uses `password_verify()` in `Admin/Auth.php`
- **Where**: Admin login only
- **Status**: ✅ Already implemented

### 2. **CSRF Protection**
- **Status**: ✅ Enabled by default in CodeIgniter 4
- **Configuration**: `app/Config/Security.php`
- **Settings**:
  - Protection method: Cookie
  - Token expiration: 2 hours (7200 seconds)
  - Regeneration: Yes (on every form submission)
- **Usage**: All admin forms automatically protected

### 3. **Prepared Queries / Query Builder**
- **Implementation**: All database queries use CodeIgniter's Query Builder
- **Status**: ✅ No raw SQL concatenation
- **Example**:
  ```php
  $user = $userModel->where('email', $email)->first();
  ```

### 4. **Rate Limiting on Admin Login**
- **NEW FEATURE**: Added to `Admin/Auth.php`
- **Model**: `app/Models/LoginAttemptModel.php`
- **Rules**: 
  - Maximum 5 failed login attempts within 15 minutes
  - Tracked by IP address
  - Shows remaining lockout time
  - Failed attempts cleared after successful login
  - Automatic cleanup of old attempts (>24 hours)
- **Table**: `login_attempts`

### 5. **Session Security**
- **NEW FEATURE**: Session ID regenerated on login (prevents session fixation)
- **Implementation**: Added `session()->regenerate()` in `Admin/Auth.php`
- **Session data includes**: user_id, name, email, role, isLoggedIn

### 6. **Secure File Uploads**
- **NEW FEATURE**: `app/Helpers/SecureFileUpload.php`
- **Security Features**:
  - ✅ MIME type validation using `finfo_file()` (content-based, not just extension)
  - ✅ File size limits (5MB images, 10MB documents, 50MB archives)
  - ✅ Secure random filenames
  - ✅ Storage in `writable/uploads/` (outside webroot)
  - ✅ Auto-creates `.htaccess` to prevent PHP execution
  - ✅ Proper file permissions (0644)

---

## 📁 Files Created/Modified

### Enhanced Files
- ✅ `app/Controllers/Admin/Auth.php` - Added rate limiting and session regeneration

### New Files
- ✅ `app/Models/LoginAttemptModel.php` - Login tracking and rate limiting
- ✅ `app/Database/Migrations/2025-01-01-000012_CreateLoginAttemptsTable.php`
- ✅ `app/Helpers/SecureFileUpload.php` - Secure file upload helper
- ✅ `app/Commands/CleanupAttempts.php` - Maintenance command

### Existing Files (Already Working)
- ✅ `app/Models/UserModel.php` - Password hashing via callback
- ✅ `app/Filters/AuthFilter.php` - Route protection
- ✅ `app/Config/Security.php` - CSRF configuration
- ✅ `app/Views/admin/auth/login.php` - Admin login form

---

## 🚀 Setup Instructions

### 1. Run Database Migration
The `login_attempts` table has already been created:
```bash
php spark migrate
```

✅ **Status**: Migration completed successfully

### 2. Configure Rate Limiting (Optional)
Default settings in `LoginAttemptModel.php`:
- Max attempts: 5
- Timeframe: 15 minutes

To change, modify the method calls in `Admin/Auth.php`:
```php
// Change to 3 attempts within 10 minutes
if ($loginAttemptModel->isRateLimited($ipAddress, 3, 10)) {
    // ...
}
```

### 3. Set Up Cleanup Command (Optional)
Clean old login attempts (>24 hours) automatically:

```bash
# Add to crontab (crontab -e)
0 3 * * * cd /path/to/moonstar && php spark app:cleanup-attempts
```

Or run manually:
```bash
php spark app:cleanup-attempts
```

---

## 🎯 How It Works

### Admin Login Flow
```
Admin enters credentials → Check rate limit → 
Validate inputs → Verify credentials → 
Record attempt → Clear failed attempts → 
Regenerate session → Set session data → 
Log audit trail → Redirect to dashboard
```

### Rate Limiting Logic
```
1. Check failed attempts from IP in last 15 minutes
2. If >= 5 attempts: Block login, show remaining time
3. If < 5 attempts: Allow login attempt
4. On failed login: Record attempt
5. On successful login: Clear all failed attempts for that IP
```

### File Upload Flow (For Gallery, etc.)
```
Admin uploads file → Validate MIME type → Check size → 
Generate secure filename → Create .htaccess (if needed) → 
Move to writable/uploads/ → Set permissions → Return path
```

---

## 💻 Using the Secure File Upload Helper

### Basic Usage
```php
use App\Helpers\SecureFileUpload;

// In your controller (e.g., AdminGallery)
public function store()
{
    $file = $_FILES['photo'];
    
    $result = SecureFileUpload::upload(
        $file,
        'image',              // Category: image, document, archive
        'uploads/gallery'     // Path within writable/
    );
    
    if ($result['success']) {
        // Save file path to database
        $filePath = $result['file_path'];
        
        $this->galleryModel->save([
            'title' => $this->request->getPost('title'),
            'image_path' => $filePath,
        ]);
        
        return redirect()->back()->with('success', 'Image uploaded successfully!');
    }
    
    return redirect()->back()->with('error', $result['message']);
}
```

### File Categories and Limits

| Category | Max Size | Allowed Types |
|----------|----------|---------------|
| `image` | 5 MB | JPEG, PNG, GIF, WebP |
| `document` | 10 MB | PDF, DOC, DOCX, XLS, XLSX |
| `archive` | 50 MB | ZIP, RAR |

### Advanced Usage
```php
// Delete uploaded file
SecureFileUpload::deleteFile('uploads/gallery/123456_abc.jpg');

// Get file URL (if you create a file serving controller)
$url = SecureFileUpload::getFileUrl('uploads/gallery/123456_abc.jpg');
```

---

## 🧪 Testing

### Test Rate Limiting
1. Go to `/admin/login`
2. Enter wrong password 5 times
3. On 6th attempt: Should see rate limit message
4. **Verify**: Check database:
   ```sql
   SELECT * FROM login_attempts 
   WHERE attempted_at > DATE_SUB(NOW(), INTERVAL 15 MINUTE)
   ORDER BY attempted_at DESC;
   ```

### Test Successful Login
1. Login with correct credentials
2. **Verify**: Session ID changed (check browser DevTools → Application → Cookies)
3. **Verify**: Failed attempts cleared:
   ```sql
   SELECT * FROM login_attempts WHERE ip_address = 'YOUR_IP' AND success = 0;
   -- Should be empty after successful login
   ```

### Test File Upload
1. Go to Admin Gallery upload page
2. Upload a valid image (< 5MB, JPG/PNG)
3. **Expected**: Success message
4. **Verify**: File exists in `writable/uploads/gallery/`
5. **Verify**: `.htaccess` exists in `writable/uploads/`
6. Try to upload PHP file renamed as `.jpg`
7. **Expected**: Error "Invalid file type"

---

## 🔧 Configuration Reference

### CSRF Protection
**File**: `app/Config/Security.php`
```php
public string $csrfProtection = 'cookie';  // Already enabled
public bool $regenerate = true;            // Already enabled
public int $expires = 7200;                // 2 hours
```
✅ No changes needed

### Rate Limiting
**File**: `app/Models/LoginAttemptModel.php`
```php
// Default: 5 attempts, 15 minutes
public function isRateLimited(string $ipAddress, int $maxAttempts = 5, int $minutes = 15)
```

### File Upload Limits
**File**: `app/Helpers/SecureFileUpload.php`
```php
private const MAX_FILE_SIZES = [
    'image' => 5242880,    // 5MB
    'document' => 10485760, // 10MB
    'archive' => 52428800,  // 50MB
];
```

---

## 📊 Database Queries

### Check Recent Login Attempts
```sql
SELECT 
    ip_address,
    email,
    attempted_at,
    success
FROM login_attempts
WHERE attempted_at > DATE_SUB(NOW(), INTERVAL 1 HOUR)
ORDER BY attempted_at DESC;
```

### Check Rate-Limited IPs
```sql
SELECT 
    ip_address,
    COUNT(*) as failed_attempts
FROM login_attempts
WHERE success = 0 
    AND attempted_at > DATE_SUB(NOW(), INTERVAL 15 MINUTE)
GROUP BY ip_address
HAVING failed_attempts >= 5;
```

### Clear Login Attempts for Testing
```sql
-- Clear all attempts
DELETE FROM login_attempts;

-- Clear attempts for specific IP
DELETE FROM login_attempts WHERE ip_address = '127.0.0.1';

-- Clear old attempts (>24 hours)
DELETE FROM login_attempts WHERE attempted_at < DATE_SUB(NOW(), INTERVAL 24 HOUR);
```

---

## 🚨 Troubleshooting

### Issue: "Too many failed login attempts" even after waiting
**Solution**:
- Check server time is correct: `SELECT NOW();` in MySQL
- Clear attempts manually:
  ```sql
  DELETE FROM login_attempts WHERE ip_address = 'YOUR_IP';
  ```

### Issue: File upload rejected (valid file)
**Solution**:
- Check PHP limits in `php.ini`:
  ```ini
  upload_max_filesize = 10M
  post_max_size = 10M
  ```
- Check `writable/uploads/` has write permissions:
  ```bash
  chmod -R 0755 writable/uploads/
  ```

### Issue: CSRF token mismatch
**Solution**:
- Clear browser cookies
- Ensure admin login form has CSRF field (should be automatic)
- Check `app/Config/Security.php` settings

---

## ✅ Security Checklist

- [x] Password hashing with BCrypt
- [x] CSRF protection enabled
- [x] Prepared queries (no raw SQL)
- [x] Rate limiting on admin login (5 attempts / 15 mins)
- [x] Session regeneration on login
- [x] File upload MIME type validation
- [x] File upload size validation
- [x] Secure file storage with .htaccess protection
- [x] Login attempt tracking
- [x] Audit logging (already in place)
- [x] Input validation
- [x] Error logging

---

## 📝 Maintenance

### Manual Cleanup
```bash
# Clean old login attempts (>24 hours)
php spark app:cleanup-attempts
```

### Automated Cleanup (Cron)
```bash
# Add to crontab (crontab -e)
0 3 * * * cd /path/to/moonstar && php spark app:cleanup-attempts >> /dev/null 2>&1
```

---

## 🎓 Summary

### What's Protected
✅ **Admin Login** - Rate limiting, bcrypt hashing, CSRF protection
✅ **Admin Routes** - AuthFilter middleware
✅ **File Uploads** - MIME type and size validation
✅ **Sessions** - Regeneration on login
✅ **Database** - Prepared queries

### What's Public (No Auth Needed)
- Home page
- About, Academics, Gallery
- Admissions form submission
- Contact form submission
- All public pages

### Admin Access
- Login: `/admin/login`
- Dashboard: `/admin/dashboard`
- All admin features protected by `AuthFilter`

---

**Status**: ✅ **READY FOR USE**

**Migration Status**: ✅ **COMPLETED**

**Next Steps**:
1. Test admin login with rate limiting
2. Test file upload in gallery
3. Set up cleanup cron job (optional)

---

**Created**: 2025-12-30  
**Version**: 1.0 (Admin-Only)
