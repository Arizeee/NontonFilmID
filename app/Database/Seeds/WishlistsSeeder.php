<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class WishlistsSeeder extends Seeder
{
    public function run()
    {
        // Unique (user_id, event_id) pairs
        $pairs = [
            [1, 2], [1, 3], [2, 1], [2, 4],
            [3, 5], [4, 1], [5, 2], [6, 3],
            [7, 4], [8, 5],
        ];
        $data = [];
        foreach ($pairs as [$userId, $eventId]) {
            $data[] = [
                'user_id' => $userId,
                'event_id' => $eventId,
                'created_at' => date('Y-m-d H:i:s'),
            ];
        }
        $this->db->table('wishlists')->insertBatch($data);
    }
}
