<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class EventsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'category_id' => 1,
                'venue_id' => 1,
                'title' => 'Rock Fest Jakarta 2026',
                'slug' => 'rock-fest-jakarta-2026',
                'description' => 'The biggest rock festival in Indonesia.',
                'poster_url' => null,
                'status' => 'published',
                'min_price' => 150000,
                'max_price' => 750000,
                'start_at' => '2026-06-01 18:00:00',
                'end_at' => '2026-06-01 23:00:00',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'category_id' => 2,
                'venue_id' => 1,
                'title' => 'Indonesian Football Cup Final',
                'slug' => 'indonesian-football-cup-final-2026',
                'description' => 'National football championship final.',
                'poster_url' => null,
                'status' => 'published',
                'min_price' => 50000,
                'max_price' => 500000,
                'start_at' => '2026-07-15 19:00:00',
                'end_at' => '2026-07-15 21:00:00',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'category_id' => 3,
                'venue_id' => 3,
                'title' => 'Comedy Night Jakarta',
                'slug' => 'comedy-night-jakarta-2026',
                'description' => 'Stand-up comedy special featuring top comedians.',
                'poster_url' => null,
                'status' => 'published',
                'min_price' => 100000,
                'max_price' => 300000,
                'start_at' => '2026-05-20 19:30:00',
                'end_at' => '2026-05-20 22:00:00',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'category_id' => 5,
                'venue_id' => 2,
                'title' => 'Tech Summit Indonesia 2026',
                'slug' => 'tech-summit-indonesia-2026',
                'description' => 'Annual technology conference for innovators.',
                'poster_url' => null,
                'status' => 'published',
                'min_price' => 200000,
                'max_price' => 1000000,
                'start_at' => '2026-08-10 08:00:00',
                'end_at' => '2026-08-11 17:00:00',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'category_id' => 4,
                'venue_id' => 2,
                'title' => 'Art & Culture Expo 2026',
                'slug' => 'art-culture-expo-2026',
                'description' => 'Showcasing Indonesian art and culture.',
                'poster_url' => null,
                'status' => 'published',
                'min_price' => 50000,
                'max_price' => 200000,
                'start_at' => '2026-09-05 09:00:00',
                'end_at' => '2026-09-07 18:00:00',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];
        $this->db->table('events')->insertBatch($data);
    }
}
