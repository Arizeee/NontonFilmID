<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeatsSeeder extends Seeder
{
    public function run()
    {
        $data = [];
        // Venue 1 (GBK) - sections A & B, rows 1-5, seats 1-10
        foreach (['A', 'B'] as $section) {
            foreach (['1', '2', '3', '4', '5'] as $row) {
                for ($seat = 1; $seat <= 10; $seat++) {
                    $data[] = [
                        'venue_id' => 1,
                        'section' => $section,
                        'row_label' => $row,
                        'seat_number' => (string)$seat,
                        'status' => 'available',
                    ];
                }
            }
        }
        // Venue 3 (Istora) - section VIP, rows A-B, seats 1-5
        foreach (['A', 'B'] as $row) {
            for ($seat = 1; $seat <= 5; $seat++) {
                $data[] = [
                    'venue_id' => 3,
                    'section' => 'VIP',
                    'row_label' => $row,
                    'seat_number' => (string)$seat,
                    'status' => 'available',
                ];
            }
        }
        $this->db->table('seats')->insertBatch($data);
    }
}
