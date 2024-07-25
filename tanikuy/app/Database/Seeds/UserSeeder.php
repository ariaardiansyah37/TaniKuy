<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'username'   => 'devan',
            'password'   => password_hash('123', PASSWORD_DEFAULT), // Ganti dengan password yang di-hash
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        // Insert data
        $this->db->table('users')->insert($data);
    }
}
