# Hostinger Shared Hosting Deployment Guide (GitHub)

This guide outlines the steps to deploy the Moonstar School application to Hostinger shared hosting using GitHub.

## Prerequisites

1.  **GitHub Repository:** Push this project to a GitHub repository.
2.  **Hostinger Account:** Access to hPanel.

## Step 1: Prepare the Project (Already Done)

*   **Public Folder Rewrite:** A `.htaccess` file has been added to the root directory. This redirects all traffic to the `public/` folder, so you don't need to change the file structure or move files around on the server.
*   **Database Config:** The application is ready to use `.env` configuration.

## Step 2: Set up Git on Hostinger

1.  Log in to **hPanel**.
2.  Go to **Websites** and manage your site.
3.  Search for **Git** in the Advanced section.
4.  **Repository:** Enter your GitHub repository URL (e.g., `https://github.com/your-username/moonstar.git`).
5.  **Branch:** `main` (or `master`).
6.  **Directory:** Leave empty to deploy to `public_html` (root domain) or specify a subfolder (e.g., `moonstar` for `domain.com/moonstar`).
7.  Click **Create** (or **Deploy**).

**Note:** If it asks for SSH keys, you may need to add the Hostinger SSH key to your GitHub repository's "Deploy Keys".

## Step 3: Configure Database

1.  In hPanel, go to **Databases** -> **Management**.
2.  Create a new **MySQL Database** and **User**.
    *   Note down the **Database Name**, **Username**, and **Password**.

## Step 4: Configure Environment (.env)

1.  Use **File Manager** in hPanel to navigate to your deployment directory.
2.  Locate the `.env.example` file.
3.  **Duplicate/Copy** it and rename the copy to `.env` (note the dot at the start).
4.  Edit the `.env` file with your database details:

    ```ini
    CI_ENVIRONMENT = production

    # ...

    database.default.hostname = localhost
    database.default.database = u123456789_moonstar  <-- Your Hostinger DB Name
    database.default.username = u123456789_admin     <-- Your Hostinger DB User
    database.default.password = YourStrongPassword
    database.default.DBDriver = MySQLi
    
    # Base URL (Important for assets/links)
    app.baseURL = 'https://your-domain.com/'
    ```

## Step 5: Install Dependencies

1.  Go to the **Advanced** section in hPanel and open **SSH Access** (or use the **Terminal** if available in the dashboard).
    *   *Alternatively, Hostinger "Git" section often has an "Install Composer Dependencies" checkbox or button.*
2.  If using Terminal/SSH, navigate to your folder:
    ```bash
    cd public_html
    # or cd public_html/moonstar
    ```
3.  Run Composer install:
    ```bash
    composer install --no-dev --optimize-autoloader
    ```

## Step 6: Run Migrations

1.  While in the Terminal/SSH within your project folder, run:
    ```bash
    php spark migrate
    ```
    This will create all the necessary tables (users, toppers, staff, etc.) in your database.

## Step 7: Create Admin User

1.  You can manually insert an admin user into the database using **phpMyAdmin**, or run a database seeder if one exists.
2.  Since we don't have a registration page enabled by default for admins, you might want to run a seed command or insert via SQL:
    ```sql
    INSERT INTO users (name, email, password, role, created_at) 
    VALUES ('Admin', 'admin@moonstar.com', '$2y$10$YourHashedPassword...', 'superadmin', NOW());
    ```
    *(Note: Passwords must be hashed using Bcrypt. You can use an online generator or `php spark seed UserSeeder` if created.)*

## Troubleshooting

*   **404 Errors:** Ensure the `.htaccess` file exists in BOTH the root directory and the `public/` directory.
*   **Database Errors:** Double-check `.env` credentials.
*   **Permission Errors:** Ensure the `writable` folder is writable by the web server. run `chmod -R 777 writable` (or 755/775 depending on user config) in the terminal.
