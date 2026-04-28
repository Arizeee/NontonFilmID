<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['name' => 'Music', 'slug' => 'music', 'icon_url' => null],
            ['name' => 'Sports', 'slug' => 'sports', 'icon_url' => null],
            ['name' => 'Comedy', 'slug' => 'comedy', 'icon_url' => null],
            ['name' => 'Exhibition', 'slug' => 'exhibition', 'icon_url' => null],
            ['name' => 'Conference', 'slug' => 'conference', 'icon_url' => null],
        ];
        $this->db->table('categories')->insertBatch($data);
    }
}
