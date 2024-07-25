<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Jeruk',
                'seller_id' => 1, // Pastikan seller_id valid
                'price' => 20000,
                'stock' => 20,
                'image' => 'fruite-item-1.jpg',
                'created_at' => date('Y-m-d H:i:s'),
            ],

            [
                'name' => "Rasvery",
                'seller_id' => 1,
                'price' => 10000,
                'stock' => 20,
                'image' => 'fruite-item-2.jpg',
                'created_at' => date("Y-m-d H:i::s")
            ],
            [
                'name' => "Pisang",
                'seller_id' => 1,
                'price' => 15000,
                'stock' => 10,
                'image' => 'fruite-item-3.jpg',
                'created_at' => date("Y-m-d H:i::s")
            ],
            [
                'name' => "Apokat",
                'seller_id' => 1,
                'price' => 10000,
                'stock' => 20,
                'image' => 'fruite-item-4.jpg',
                'created_at' => date("Y-m-d H:i::s")
            ],
            [
                'name' => "Anggur",
                'seller_id' => 1,
                'price' => 25000,
                'stock' => 20,
                'image' => 'fruite-item-5.jpg',
                'created_at' => date("Y-m-d H:i::s")
            ],
            [
                'name' => "Aple",
                'seller_id' => 1,
                'price' => 30000,
                'stock' => 20,
                'image' => 'fruite-item-6.jpg',
                'created_at' => date("Y-m-d H:i::s")
            ],
        ];

        foreach ($data as $item) {
            // insert semua data ke tabel
            $this->db->table('products')->insert($item);
        }
    }
}
