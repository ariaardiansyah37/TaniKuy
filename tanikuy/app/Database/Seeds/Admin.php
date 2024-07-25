<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Admin extends Seeder
{
    public function run()
    {
        $data = [
            'username'   => 'devan',
            'password'   => password_hash('devan', PASSWORD_DEFAULT), // Ganti dengan password yang di-hash
            'role'       => 'admin',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        // Insert data
        $this->db->table('admin')->insert($data);
    }
}
