<?php
// app/Database/Seeds/AdminSeeder.php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        // Cek apakah admin sudah ada
        $existingAdmin = $this->db->table('users')
            ->where('username', 'admin')
            ->orWhere('email', 'admin@example.com')
            ->get()
            ->getRow();

        if (!$existingAdmin) {
            $data = [
                'username' => 'admin',
                'email'    => 'admin@example.com',
                'password' => password_hash('admin123', PASSWORD_DEFAULT),
                'role'     => 'admin',
                'is_active'=> 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];

            $this->db->table('users')->insert($data);
            echo "Admin user created successfully!\n";
        } else {
            echo "Admin user already exists!\n";
        }
    }
}