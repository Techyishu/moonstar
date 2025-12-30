# Moonstar School Management System

A production-ready **CodeIgniter 4** school management system with comprehensive features for managing students, teachers, admissions, events, notices, gallery, pages, and settings.

## Features

- **User Management**: Authentication system with admin, teacher, and staff roles
- **Student Management**: Complete student records with admission numbers, personal details, and photos
- **Teacher Management**: Faculty management with employee records and qualifications
- **Admission System**: Track and manage student applications
- **Events**: Schedule and manage school events
- **Notices**: Post announcements with priority levels and target audiences
- **Gallery**: Photo management with categories
- **Pages**: Dynamic CMS for static content
- **Settings**: Configurable application settings

## Technology Stack

- **Framework**: CodeIgniter 4.6.4
- **PHP**: >= 8.1
- **Database**: MySQL 5.7+ / MariaDB 10.3+
- **Frontend**: Bootstrap 5.3.2 (via CDN)
- **Icons**: Bootstrap Icons 1.11.2

## Project Structure

```
moonstar/
├── app/
│   ├── Controllers/        # Application controllers
│   │   ├── Home.php       # Homepage controller
│   │   └── Students.php   # Students CRUD controller
│   ├── Models/            # Database models with validation
│   │   ├── UserModel.php
│   │   ├── StudentModel.php
│   │   ├── TeacherModel.php
│   │   ├── AdmissionModel.php
│   │   ├── EventModel.php
│   │   ├── NoticeModel.php
│   │   ├── GalleryModel.php
│   │   ├── PageModel.php
│   │   └── SettingModel.php
│   ├── Views/             # View templates
│   │   └── layouts/
│   │       └── main.php   # Base template with Bootstrap 5
│   └── Database/
│       ├── Migrations/    # Database migrations (9 tables)
│       └── Seeds/
│           └── AdminUserSeeder.php
├── public/                # Web root (index.php)
├── writable/             # Logs, cache, uploads, sessions
├── .env                  # Environment configuration (auto-created)
├── .env.example          # Sample environment file
└── composer.json         # Dependencies
```

## Installation

### Prerequisites

- PHP 8.1 or higher
- MySQL 5.7+ or MariaDB 10.3+
- Composer
- Apache/Nginx web server (or use built-in PHP server for development)

### Step 1: Clone or Download

The project is already set up in `/Users/wiredtechie/Desktop/moonstar`

### Step 2: Install Dependencies

```bash
cd /Users/wiredtechie/Desktop/moonstar
composer install
```

### Step 3: Configure Environment

The `.env` file has been created. Update database credentials:

```env
database.default.hostname = localhost
database.default.database = moonstar_db
database.default.username = root
database.default.password = your_password
database.default.DBDriver = MySQLi
database.default.port = 3306
```

### Step 4: Create Database

```bash
# Login to MySQL
mysql -u root -p

# Create database
CREATE DATABASE moonstar_db CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
EXIT;
```

### Step 5: Run Migrations

Execute migrations to create all database tables:

```bash
php spark migrate
```

This will create 9 tables:
- `users` - System users (admin, teachers, staff)
- `students` - Student records
- `teachers` - Teacher/faculty records
- `admissions` - Admission applications
- `events` - School events
- `notices` - Announcements and notices
- `gallery` - Photo gallery
- `pages` - CMS pages
- `settings` - Application settings

### Step 6: Run Seeders

Add the default admin user:

```bash
php spark db:seed AdminUserSeeder
```

**Default Admin Credentials:**
- Email: `admin@moonstar.test`
- Password: `Moon@1234`

### Step 7: Generate Encryption Key (Optional but Recommended)

```bash
php spark key:generate
```

This will update your `.env` file with a secure encryption key.

### Step 8: Start Development Server

```bash
php spark serve
```

The application will be available at: **http://localhost:8080**

## Database Schema

### Users Table
- id, name, email, password, role (admin/teacher/staff), status, timestamps

### Students Table
- id, admission_number, first_name, last_name, date_of_birth, gender, class, section, parent_name, parent_phone, parent_email, address, photo, status, timestamps

### Teachers Table
- id, employee_id, first_name, last_name, email, phone, subject, qualification, joining_date, address, photo, status, timestamps

### Admissions Table
- id, application_number, student_name, date_of_birth, gender, class_applied, parent_name, parent_phone, parent_email, address, previous_school, application_status, remarks, timestamps

### Events Table
- id, title, description, event_date, event_time, location, image, status, timestamps

### Notices Table
- id, title, content, priority (low/medium/high), target_audience, attachment, status, timestamps

### Gallery Table
- id, title, description, image_path, category, display_order, status, timestamps

### Pages Table
- id, title, slug, content, meta_title, meta_description, status, timestamps

### Settings Table
- id, setting_key, setting_value, setting_type, description, timestamps

## Usage

### Running Migrations

```bash
# Run all migrations
php spark migrate

# Rollback last batch
php spark migrate:rollback

# Refresh all migrations (drop and re-run)
php spark migrate:refresh

# Check migration status
php spark migrate:status
```

### Running Seeders

```bash
# Run a specific seeder
php spark db:seed AdminUserSeeder

# Run all seeders (if you have a DatabaseSeeder)
php spark db:seed
```

### Starting Development Server

```bash
# Start on default port 8080
php spark serve

# Start on custom port
php spark serve --port=8000

# Start on specific host
php spark serve --host=0.0.0.0
```

### Creating New Migrations

```bash
# Create a new migration
php spark make:migration CreateTableName

# Create migration for a model
php spark make:model ModelName --migration
```

### Creating New Seeders

```bash
php spark make:seeder SeederName
```

### Creating New Controllers

```bash
php spark make:controller ControllerName
```

### Creating New Models

```bash
php spark make:model ModelName
```

## Production Deployment

Before deploying to production:

1. **Update Environment**
   ```env
   CI_ENVIRONMENT = production
   app.baseURL = 'https://yourdomain.com/'
   app.forceGlobalSecureRequests = true
   ```

2. **Secure Database Credentials**
   - Use a dedicated database user
   - Set strong passwords
   - Limit database user privileges

3. **Set Encryption Key**
   ```bash
   php spark key:generate
   ```

4. **Configure File Permissions**
   ```bash
   chmod -R 755 /path/to/moonstar
   chmod -R 777 writable/
   ```

5. **Set Up SSL Certificate**
   - Use Let's Encrypt or purchase SSL
   - Configure your web server for HTTPS

6. **Web Server Configuration**
   - Point document root to `public/` folder
   - Enable `.htaccess` (Apache) or configure rewrites (Nginx)

7. **Enable Logging**
   ```env
   logger.threshold = 3  # Error level for production
   ```

8. **Database Backups**
   - Set up automated daily backups
   - Test restore procedures

## Composer Dependencies

```json
{
    "require": {
        "php": "^8.1",
        "codeigniter4/framework": "^4.6"
    },
    "require-dev": {
        "fakerphp/faker": "^1.24",
        "phpunit/phpunit": "^10.5"
    }
}
```

## File Structure Overview

- **app/Config/** - Application configuration files
- **app/Controllers/** - Business logic and request handling
- **app/Models/** - Database interaction with validation
- **app/Views/** - HTML templates and layouts
- **public/** - Web-accessible files (CSS, JS, images)
- **writable/** - Logs, cache, uploads (needs write permissions)

## Default Routes

- `GET /` - Homepage
- `GET /students` - List all students
- `GET /students/create` - Show create student form
- `POST /students/store` - Save new student
- `GET /students/edit/{id}` - Show edit form
- `POST /students/update/{id}` - Update student
- `GET /students/delete/{id}` - Delete student

## Support

For issues or questions:
- Check CodeIgniter 4 documentation: https://codeigniter.com/user_guide/
- Review the User Guide for best practices
- Check logs in `writable/logs/`

## License

This is a custom school management system built with CodeIgniter 4.

## Credits

- **Framework**: CodeIgniter 4
- **UI Framework**: Bootstrap 5
- **Icons**: Bootstrap Icons
- **PHP Dependencies**: Managed via Composer

---

**Built with ❤️ using CodeIgniter 4**
