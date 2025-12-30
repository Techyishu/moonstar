# Moonstar School Management System - Quick Start Guide

## Quick Setup (5 Minutes)

### 1. Install Dependencies
```bash
composer install
```

### 2. Create Database
```bash
mysql -u root -p
CREATE DATABASE moonstar_db;
EXIT;
```

### 3. Configure .env
Edit `.env` file and update database credentials:
```env
database.default.database = moonstar_db
database.default.username = root
database.default.password = your_password
```

### 4. Run Migrations
```bash
php spark migrate
```

### 5. Seed Admin User
```bash
php spark db:seed AdminUserSeeder
```

### 6. Start Server
```bash
php spark serve
```

Visit: **http://localhost:8080**

## Default Credentials
- Email: `admin@moonstar.test`
- Password: `Moon@1234`

## Alternative: Use SQL File

If you prefer SQL over migrations:

```bash
mysql -u root -p < database_schema.sql
```

This creates the database, all tables, and inserts the admin user.

## Common Commands

```bash
# Migrations
php spark migrate              # Run migrations
php spark migrate:status       # Check status
php spark migrate:rollback     # Rollback last batch

# Seeders
php spark db:seed AdminUserSeeder

# Development Server
php spark serve                # Port 8080
php spark serve --port=8000    # Custom port

# Generate Keys
php spark key:generate         # Security key

# Clear Cache
php spark cache:clear
```

## File Permissions

```bash
chmod -R 755 /path/to/moonstar
chmod -R 777 writable/
```

## Troubleshooting

### Database Connection Failed
- Check database credentials in `.env`
- Ensure MySQL is running
- Verify database exists

### 404 Errors
- Check `app.baseURL` in `.env`
- Ensure mod_rewrite is enabled (Apache)
- Clear cache: `php spark cache:clear`

### Permission Denied
- Check `writable/` folder permissions
- Run: `chmod -R 777 writable/`

### Encryption Key Error
- Run: `php spark key:generate`
- Check `.env` file for `encryption.key`

## Project Structure

```
moonstar/
├── app/
│   ├── Controllers/       # Request handlers
│   ├── Models/           # Database models
│   ├── Views/            # Templates
│   └── Database/
│       ├── Migrations/   # Database migrations
│       └── Seeds/        # Data seeders
├── public/               # Web root
├── writable/            # Logs, cache, uploads
└── .env                 # Configuration
```

## Next Steps

1. **Create Routes**: Edit `app/Config/Routes.php`
2. **Add Controllers**: `php spark make:controller ControllerName`
3. **Add Models**: `php spark make:model ModelName`
4. **Create Views**: Add files in `app/Views/`
5. **Add Migrations**: `php spark make:migration MigrationName`

## Production Deployment

```bash
# Set environment to production
CI_ENVIRONMENT = production

# Update base URL
app.baseURL = 'https://yourdomain.com/'

# Force HTTPS
app.forceGlobalSecureRequests = true

# Generate encryption key
php spark key:generate

# Set proper permissions
chmod -R 755 .
chmod -R 777 writable/
```

## Support

- Documentation: https://codeigniter.com/user_guide/
- Logs: `writable/logs/`
- Debug: Set `CI_ENVIRONMENT = development` in `.env`

---

**Ready to go! 🚀**
