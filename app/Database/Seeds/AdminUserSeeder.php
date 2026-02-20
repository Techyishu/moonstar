<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'name' => 'Moonstar Admin',
            'email' => 'moonstar.gharaunda@gmail.com',
            'password' => password_hash('admin123', PASSWORD_DEFAULT),
            'role' => 'superadmin',
            'status' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        // Check if user already exists
        $existing = $this->db->table('users')->where('email', $data['email'])->get()->getRow();

        if ($existing) {
            echo "User with email {$data['email']} already exists. Skipping.\n";
            return;
        }

        $this->db->table('users')->insert($data);
        echo "Admin user created successfully!\n";
        echo "Email: moonstar.gharaunda@gmail.com\n";
        echo "Password: admin123\n";
        echo "IMPORTANT: Please change the password after first login.\n";
    }
}
