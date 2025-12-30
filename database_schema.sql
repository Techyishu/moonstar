-- ====================================================================
-- Moonstar School Management System - Database Schema
-- ====================================================================
-- This SQL file can be used as an alternative to migrations
-- Execute this file if you prefer SQL over CodeIgniter migrations
-- ====================================================================

-- Create Database
CREATE DATABASE IF NOT EXISTS moonstar_db CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE moonstar_db;

-- ====================================================================
-- Users Table
-- ====================================================================
CREATE TABLE IF NOT EXISTS `users` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL UNIQUE,
    `password` VARCHAR(255) NOT NULL,
    `role` ENUM('admin', 'teacher', 'staff') DEFAULT 'staff',
    `status` TINYINT(1) DEFAULT 1,
    `created_at` DATETIME NULL,
    `updated_at` DATETIME NULL,
    PRIMARY KEY (`id`),
    INDEX `idx_email` (`email`),
    INDEX `idx_role` (`role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ====================================================================
-- Students Table
-- ====================================================================
CREATE TABLE IF NOT EXISTS `students` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `admission_number` VARCHAR(50) NOT NULL UNIQUE,
    `first_name` VARCHAR(100) NOT NULL,
    `last_name` VARCHAR(100) NOT NULL,
    `date_of_birth` DATE NOT NULL,
    `gender` ENUM('male', 'female', 'other') NOT NULL,
    `class` VARCHAR(50) NOT NULL,
    `section` VARCHAR(10) NOT NULL,
    `parent_name` VARCHAR(255) NOT NULL,
    `parent_phone` VARCHAR(20) NOT NULL,
    `parent_email` VARCHAR(255) NULL,
    `address` TEXT NOT NULL,
    `photo` VARCHAR(255) NULL,
    `status` TINYINT(1) DEFAULT 1,
    `created_at` DATETIME NULL,
    `updated_at` DATETIME NULL,
    PRIMARY KEY (`id`),
    INDEX `idx_admission_number` (`admission_number`),
    INDEX `idx_class_section` (`class`, `section`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ====================================================================
-- Teachers Table
-- ====================================================================
CREATE TABLE IF NOT EXISTS `teachers` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `employee_id` VARCHAR(50) NOT NULL UNIQUE,
    `first_name` VARCHAR(100) NOT NULL,
    `last_name` VARCHAR(100) NOT NULL,
    `email` VARCHAR(255) NOT NULL UNIQUE,
    `phone` VARCHAR(20) NOT NULL,
    `subject` VARCHAR(100) NOT NULL,
    `qualification` VARCHAR(255) NOT NULL,
    `joining_date` DATE NOT NULL,
    `address` TEXT NOT NULL,
    `photo` VARCHAR(255) NULL,
    `status` TINYINT(1) DEFAULT 1,
    `created_at` DATETIME NULL,
    `updated_at` DATETIME NULL,
    PRIMARY KEY (`id`),
    INDEX `idx_employee_id` (`employee_id`),
    INDEX `idx_email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ====================================================================
-- Admissions Table
-- ====================================================================
CREATE TABLE IF NOT EXISTS `admissions` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `application_number` VARCHAR(50) NOT NULL UNIQUE,
    `student_name` VARCHAR(255) NOT NULL,
    `date_of_birth` DATE NOT NULL,
    `gender` ENUM('male', 'female', 'other') NOT NULL,
    `class_applied` VARCHAR(50) NOT NULL,
    `parent_name` VARCHAR(255) NOT NULL,
    `parent_phone` VARCHAR(20) NOT NULL,
    `parent_email` VARCHAR(255) NOT NULL,
    `address` TEXT NOT NULL,
    `previous_school` VARCHAR(255) NULL,
    `application_status` ENUM('pending', 'approved', 'rejected', 'admitted') DEFAULT 'pending',
    `remarks` TEXT NULL,
    `created_at` DATETIME NULL,
    `updated_at` DATETIME NULL,
    PRIMARY KEY (`id`),
    INDEX `idx_application_number` (`application_number`),
    INDEX `idx_status` (`application_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ====================================================================
-- Events Table
-- ====================================================================
CREATE TABLE IF NOT EXISTS `events` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(255) NOT NULL,
    `description` TEXT NOT NULL,
    `event_date` DATE NOT NULL,
    `event_time` TIME NULL,
    `location` VARCHAR(255) NULL,
    `image` VARCHAR(255) NULL,
    `status` TINYINT(1) DEFAULT 1,
    `created_at` DATETIME NULL,
    `updated_at` DATETIME NULL,
    PRIMARY KEY (`id`),
    INDEX `idx_event_date` (`event_date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ====================================================================
-- Notices Table
-- ====================================================================
CREATE TABLE IF NOT EXISTS `notices` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(255) NOT NULL,
    `content` TEXT NOT NULL,
    `priority` ENUM('low', 'medium', 'high') DEFAULT 'medium',
    `target_audience` VARCHAR(100) NULL COMMENT 'students, teachers, parents, all',
    `attachment` VARCHAR(255) NULL,
    `status` TINYINT(1) DEFAULT 1,
    `created_at` DATETIME NULL,
    `updated_at` DATETIME NULL,
    PRIMARY KEY (`id`),
    INDEX `idx_priority` (`priority`),
    INDEX `idx_created_at` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ====================================================================
-- Gallery Table
-- ====================================================================
CREATE TABLE IF NOT EXISTS `gallery` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(255) NOT NULL,
    `description` TEXT NULL,
    `image_path` VARCHAR(255) NOT NULL,
    `category` VARCHAR(100) NULL,
    `display_order` INT(11) DEFAULT 0,
    `status` TINYINT(1) DEFAULT 1,
    `created_at` DATETIME NULL,
    `updated_at` DATETIME NULL,
    PRIMARY KEY (`id`),
    INDEX `idx_category` (`category`),
    INDEX `idx_display_order` (`display_order`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ====================================================================
-- Pages Table
-- ====================================================================
CREATE TABLE IF NOT EXISTS `pages` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(255) NOT NULL,
    `slug` VARCHAR(255) NOT NULL UNIQUE,
    `content` TEXT NOT NULL,
    `meta_title` VARCHAR(255) NULL,
    `meta_description` TEXT NULL,
    `status` TINYINT(1) DEFAULT 1,
    `created_at` DATETIME NULL,
    `updated_at` DATETIME NULL,
    PRIMARY KEY (`id`),
    INDEX `idx_slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ====================================================================
-- Settings Table
-- ====================================================================
CREATE TABLE IF NOT EXISTS `settings` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `setting_key` VARCHAR(100) NOT NULL UNIQUE,
    `setting_value` TEXT NOT NULL,
    `setting_type` VARCHAR(50) DEFAULT 'text' COMMENT 'text, textarea, number, boolean, email, url',
    `description` VARCHAR(255) NULL,
    `created_at` DATETIME NULL,
    `updated_at` DATETIME NULL,
    PRIMARY KEY (`id`),
    INDEX `idx_setting_key` (`setting_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ====================================================================
-- Insert Default Admin User
-- ====================================================================
-- Password: Moon@1234 (hashed with PASSWORD_DEFAULT)
INSERT INTO `users` (`name`, `email`, `password`, `role`, `status`, `created_at`, `updated_at`) 
VALUES (
    'Administrator', 
    'admin@moonstar.test', 
    '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 
    'admin', 
    1, 
    NOW(), 
    NOW()
);

-- ====================================================================
-- Insert Sample Settings
-- ====================================================================
INSERT INTO `settings` (`setting_key`, `setting_value`, `setting_type`, `description`, `created_at`, `updated_at`) VALUES
('school_name', 'Moonstar School', 'text', 'School name', NOW(), NOW()),
('school_email', 'info@moonstar.test', 'email', 'School contact email', NOW(), NOW()),
('school_phone', '+1 234 567 8900', 'text', 'School contact phone', NOW(), NOW()),
('school_address', '123 Education Street, City, State, ZIP', 'textarea', 'School address', NOW(), NOW()),
('academic_year', '2024-2025', 'text', 'Current academic year', NOW(), NOW()),
('timezone', 'America/New_York', 'text', 'School timezone', NOW(), NOW());

-- ====================================================================
-- End of Schema
-- ====================================================================
