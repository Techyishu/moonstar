<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ContentManagementSeeder extends Seeder
{
    public function run()
    {
        $db = \Config\Database::connect();

        // Create disclosure_documents table
        $db->query("CREATE TABLE IF NOT EXISTS `disclosure_documents` (
            `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
            `title` VARCHAR(255) NOT NULL,
            `description` TEXT NULL,
            `document_file` VARCHAR(255) NOT NULL,
            `category` VARCHAR(100) DEFAULT 'General',
            `display_order` INT(11) DEFAULT 0,
            `status` TINYINT(1) DEFAULT 1 COMMENT '1=Active, 0=Inactive',
            `created_at` DATETIME NULL,
            `updated_at` DATETIME NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

        // Create bus_routes table
        $db->query("CREATE TABLE IF NOT EXISTS `bus_routes` (
            `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
            `route_number` VARCHAR(50) NOT NULL,
            `route_name` VARCHAR(255) NOT NULL,
            `areas_covered` TEXT NOT NULL,
            `pickup_time` VARCHAR(50) NOT NULL,
            `drop_time` VARCHAR(50) NOT NULL,
            `monthly_fee` DECIMAL(10,2) NOT NULL,
            `status` TINYINT(1) DEFAULT 1 COMMENT '1=Active, 0=Inactive',
            `created_at` DATETIME NULL,
            `updated_at` DATETIME NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

        // Create fee_structure table
        $db->query("CREATE TABLE IF NOT EXISTS `fee_structure` (
            `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
            `class_name` VARCHAR(100) NOT NULL,
            `class_category` VARCHAR(100) NULL,
            `admission_fee` DECIMAL(10,2) NOT NULL,
            `tuition_fee_quarterly` DECIMAL(10,2) NOT NULL,
            `annual_charges` DECIMAL(10,2) NOT NULL,
            `display_order` INT(11) DEFAULT 0,
            `status` TINYINT(1) DEFAULT 1 COMMENT '1=Active, 0=Inactive',
            `created_at` DATETIME NULL,
            `updated_at` DATETIME NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

        echo "Tables created successfully!\n";
    }
}
