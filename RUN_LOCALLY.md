# Running Moonstar School Website Locally

## Quick Start Guide (5 Minutes)

Follow these steps to run the Moonstar School website on your local machine.

---

## Prerequisites

Before starting, ensure you have:

- ✅ **PHP 8.1 or higher** installed
- ✅ **MySQL/MariaDB** running
- ✅ **Composer** installed
- ✅ **Git** (optional, for version control)

### Check Your Setup

```bash
# Check PHP version
php -v

# Check Composer
composer --version

# Check MySQL
mysql --version
```

---

## Step-by-Step Setup

### 1. Navigate to Project Directory

```bash
cd /Users/wiredtechie/Desktop/moonstar
```

### 2. Install Dependencies (Already Done)

If not already installed:

```bash
composer install
```

### 3. Configure Environment

The `.env` file is already created. Update it with your database credentials:

```bash
# Open .env file in your editor
nano .env
# or
code .env
```

Update these lines:

```env
database.default.database = moonstar_db
database.default.username = root
database.default.password = YOUR_MYSQL_PASSWORD
```

### 4. Create Database

```bash
# Login to MySQL
mysql -u root -p

# In MySQL prompt, run:
CREATE DATABASE moonstar_db CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
EXIT;
```

### 5. Run Migrations

Create all database tables:

```bash
php spark migrate
```

You should see output like:

```
Running: 2025-01-01-000001_CreateUsersTable
Running: 2025-01-01-000002_CreateStudentsTable
Running: 2025-01-01-000003_CreateTeachersTable
Running: 2025-01-01-000004_CreateAdmissionsTable
Running: 2025-01-01-000005_CreateEventsTable
Running: 2025-01-01-000006_CreateNoticesTable
Running: 2025-01-01-000007_CreateGalleryTable
Running: 2025-01-01-000008_CreatePagesTable
Running: 2025-01-01-000009_CreateSettingsTable
```

### 6. Seed Admin User

```bash
php spark db:seed AdminUserSeeder
```

**Default Admin Credentials:**
- Email: `admin@moonstar.test`
- Password: `Moon@1234`

### 7. Start Development Server

```bash
php spark serve
```

You should see:

```
CodeIgniter development server started on http://localhost:8080
```

### 8. Open in Browser

Open your browser and navigate to:

**🌐 http://localhost:8080**

---

## Website Pages to Test

Once the server is running, test these pages:

### Public Pages

| Page | URL | Description |
|------|-----|-------------|
| **Home** | http://localhost:8080 | Homepage with hero, features, events, notices |
| **About** | http://localhost:8080/about | School history, mission, values, leadership |
| **Academics** | http://localhost:8080/academics | Academic programs and curriculum |
| **Admissions** | http://localhost:8080/admissions | Admission process and online application |
| **Gallery** | http://localhost:8080/gallery | Photo gallery with lightbox |
| **Contact** | http://localhost:8080/contact | Contact information and form |

### Admin/Management (Future)

| Page | URL | Description |
|------|-----|-------------|
| **Students** | http://localhost:8080/students | Student management (CRUD) |

---

## Testing the Features

### 1. Test Admissions Form

1. Go to http://localhost:8080/admissions
2. Scroll to "Online Application Form"
3. Fill out all required fields
4. Click "Submit Application"
5. You should see a success message with an application number

✅ **Verify**: Check the `admissions` table in your database

```sql
SELECT * FROM admissions ORDER BY created_at DESC LIMIT 5;
```

### 2. Test Contact Form

1. Go to http://localhost:8080/contact
2. Fill out the contact form
3. Submit the form
4. You should see a success message

### 3. Test Gallery Lightbox

1. Go to http://localhost:8080/gallery
2. Click on any image placeholder
3. Lightbox should open
4. Test navigation:
   - Click arrow buttons to navigate
   - Use keyboard arrows
   - Press ESC to close

### 4. Test Mobile Menu

1. Resize browser window to mobile size (< 768px)
2. Click hamburger menu icon
3. Menu should slide in
4. Click outside to close

---

## Adding Sample Data (Optional)

### Add Sample Events

```sql
INSERT INTO events (title, description, event_date, event_time, location, status, created_at, updated_at) VALUES
('Annual Day Celebration', 'Join us for our annual day celebration with performances, awards, and fun activities.', '2025-02-15', '10:00:00', 'School Auditorium', 1, NOW(), NOW()),
('Science Fair', 'Students showcase their innovative science projects and experiments.', '2025-03-10', '14:00:00', 'Science Lab', 1, NOW(), NOW()),
('Sports Day', 'Inter-house sports competition with various athletic events.', '2025-03-25', '09:00:00', 'Sports Ground', 1, NOW(), NOW());
```

### Add Sample Notices

```sql
INSERT INTO notices (title, content, priority, target_audience, status, created_at, updated_at) VALUES
('School Reopening Notice', 'School will reopen for the new academic year on January 10, 2025. Students are requested to report by 8:30 AM.', 'high', 'all', 1, NOW(), NOW()),
('Parent-Teacher Meeting', 'PTM scheduled for January 20, 2025. Parents are requested to meet respective class teachers.', 'medium', 'parents', 1, NOW(), NOW()),
('Library Extended Hours', 'Library will remain open until 6 PM on weekdays starting this month.', 'low', 'students', 1, NOW(), NOW());
```

### Add Sample Dynamic Page

```sql
INSERT INTO pages (title, slug, content, meta_title, meta_description, status, created_at, updated_at) VALUES
('Privacy Policy', 'privacy-policy', 
'<h2>Privacy Policy</h2>
<p>At Moonstar School, we are committed to protecting your privacy and personal information.</p>
<h3>Information We Collect</h3>
<ul>
<li>Student and parent contact information</li>
<li>Academic records and progress reports</li>
<li>Emergency contact details</li>
</ul>
<h3>How We Use Your Information</h3>
<p>We use collected information solely for educational purposes and school administration.</p>',
'Privacy Policy - Moonstar School',
'Learn about how Moonstar School protects your privacy and handles personal information.',
1, NOW(), NOW());
```

Access the page at: **http://localhost:8080/page/privacy-policy**

---

## Common Issues & Solutions

### Issue 1: Database Connection Error

**Error**: `Unable to connect to database`

**Solution**:
1. Check MySQL is running: `sudo systemctl status mysql` (Linux) or check Activity Monitor (Mac)
2. Verify credentials in `.env` file
3. Ensure database exists: `SHOW DATABASES;`

### Issue 2: Migration Fails

**Error**: `Migration failed`

**Solution**:
```bash
# Check migration status
php spark migrate:status

# Rollback if needed
php spark migrate:rollback

# Run again
php spark migrate
```

### Issue 3: Port Already in Use

**Error**: `Address already in use`

**Solution**:
```bash
# Use a different port
php spark serve --port=8081
```

### Issue 4: Blank Page/White Screen

**Solutions**:
1. Check error logs: `writable/logs/`
2. Enable debugging in `.env`:
   ```env
   CI_ENVIRONMENT = development
   ```
3. Check file permissions:
   ```bash
   chmod -R 777 writable/
   ```

### Issue 5: CSS/JavaScript Not Loading

**Solution**:
1. Clear browser cache (Ctrl+Shift+R or Cmd+Shift+R)
2. Check console for errors (F12 → Console tab)
3. Verify CDN links are accessible

---

## Optional: Generate Encryption Key

For enhanced security:

```bash
php spark key:generate
```

This updates your `.env` file with a secure encryption key.

---

## Development Tips

### Live Reload

For auto-reload on file changes, use:

```bash
# Install globally (optional)
npm install -g browser-sync

# Run in project root
browser-sync start --proxy "localhost:8080" --files "app/**/*"
```

### Database GUI Tools

Recommended tools for viewing database:
- **phpMyAdmin** (web-based)
- **TablePlus** (Mac/Windows)
- **MySQL Workbench** (cross-platform)
- **DBeaver** (cross-platform, free)

### Clear Cache

If you encounter caching issues:

```bash
php spark cache:clear
```

---

## Stopping the Server

To stop the development server:

1. Go to the terminal where server is running
2. Press **Ctrl+C**

---

## Next Steps

Once everything is running:

1. ✅ Browse all pages to ensure they load correctly
2. ✅ Test the admissions form submission
3. ✅ Test the contact form
4. ✅ Add sample events and notices to populate homepage
5. ✅ Customize content, colors, and branding
6. ✅ Add real images to gallery
7. ✅ Configure email settings for form notifications
8. ✅ Set up proper file upload directories

---

## Production Deployment

When ready to deploy to production server:

1. Update `.env`:
   ```env
   CI_ENVIRONMENT = production
   app.baseURL = 'https://yourdomain.com/'
   ```

2. Secure database credentials

3. Set proper file permissions:
   ```bash
   chmod -R 755 .
   chmod -R 777 writable/
   ```

4. Enable HTTPS with SSL certificate

5. Configure web server (Apache/Nginx) to point to `public/` folder

See **WEBSITE_DOCUMENTATION.md** for detailed deployment guide.

---

## Quick Reference

```bash
# Start server
php spark serve

# Different port
php spark serve --port=8001

# Run migrations
php spark migrate

# Seed database
php spark db:seed AdminUserSeeder

# Check migration status
php spark migrate:status

# Rollback migrations
php spark migrate:rollback

# Clear cache
php spark cache:clear

# List routes
php spark routes
```

---

## Files Created Summary

**Views (9 files):**
- `app/Views/layouts/main.php` - Base layout
- `app/Views/partials/navbar.php` - Navigation
- `app/Views/partials/footer.php` - Footer
- `app/Views/home/index.php` - Homepage
- `app/Views/about/index.php` - About page
- `app/Views/academics/index.php` - Academics
- `app/Views/admissions/index.php` - Admissions with form
- `app/Views/gallery/index.php` - Gallery with lightbox
- `app/Views/contact/index.php` - Contact form
- `app/Views/pages/view.php` - Dynamic pages

**Controllers (7 files):**
- `PublicHome.php` - Homepage
- `About.php` - About page
- `Academics.php` - Academics
- `Admissions.php` - Admissions + form processing
- `Gallery.php` - Gallery
- `Contact.php` - Contact + form processing
- `Pages.php` - Dynamic pages

**Config:**
- `app/Config/Routes.php` - All routes configured

---

**🎉 Your Moonstar School website is ready to run!**

For detailed documentation, see **WEBSITE_DOCUMENTATION.md**
