<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SchoolLeavingCertificateSeeder extends Seeder
{
    public function run()
    {
        $this->db->query("CREATE TABLE IF NOT EXISTS `school_leaving_certificates` (
            `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
            `student_name` VARCHAR(255) NOT NULL,
            `admission_number` VARCHAR(50) NOT NULL,
            `date_of_birth` DATE NULL,
            `father_name` VARCHAR(255) NULL,
            `mother_name` VARCHAR(255) NULL,
            `class_leaving` VARCHAR(50) NULL,
            `leaving_date` DATE NOT NULL,
            `reason` TEXT NULL,
            `certificate_file` VARCHAR(255) NULL,
            `status` ENUM('active', 'inactive') DEFAULT 'active',
            `created_at` DATETIME NULL,
            `updated_at` DATETIME NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;");
    }
}
