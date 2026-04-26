<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class VenuesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Gelora Bung Karno',
                'city' => 'Jakarta',
                'province' => 'DKI Jakarta',
                'address' => 'Jl. Pintu Satu Senayan, Jakarta Pusat',
                'latitude' => -6.218400,
                'longitude' => 106.801900,
                'capacity' => 77000,
                'image_url' => null,
            ],
            [
                'name' => 'Jakarta International Expo',
                'city' => 'Jakarta',
                'province' => 'DKI Jakarta',
                'address' => 'Jl. Benyamin Sueb, Kemayoran, Jakarta Utara',
                'latitude' => -6.154600,
                'longitude' => 106.865600,
                'capacity' => 50000,
                'image_url' => null,
            ],
            [
                'name' => 'Istora Senayan',
                'city' => 'Jakarta',
                'province' => 'DKI Jakarta',
                'address' => 'Jl. Pintu Satu Senayan, Jakarta Pusat',
                'latitude' => -6.219800,
                'longitude' => 106.800600,
                'capacity' => 7500,
                'image_url' => null,
            ],
            [
                'name' => 'Lapangan Banteng',
                'city' => 'Jakarta',
                'province' => 'DKI Jakarta',
                'address' => 'Jl. Lapangan Banteng Utara, Jakarta Pusat',
                'latitude' => -6.171900,
                'longitude' => 106.833700,
                'capacity' => 20000,
                'image_url' => null,
            ],
            [
                'name' => 'Stadion Utama Bandung',
                'city' => 'Bandung',
                'province' => 'Jawa Barat',
                'address' => 'Jl. Ahmad Yani, Bandung',
                'latitude' => -6.901800,
                'longitude' => 107.618100,
                'capacity' => 40000,
                'image_url' => null,
            ],
        ];
        $this->db->table('venues')->insertBatch($data);
    }
}
