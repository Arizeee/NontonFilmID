<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ReviewsSeeder extends Seeder
{
    public function run()
    {
        $comments = [
            'Amazing event, will attend again!',
            'Great experience overall.',
            'Could be better organized.',
            'Loved the atmosphere!',
            'Worth every rupiah.',
        ];
        // Unique (event_id, user_id) pairs
        $pairs = [
            [1, 1], [1, 2], [2, 3], [2, 4],
            [3, 5], [3, 6], [4, 7], [4, 8],
            [5, 9], [5, 10],
        ];
        $data = [];
        foreach ($pairs as [$eventId, $userId]) {
            $data[] = [
                'event_id' => $eventId,
                'user_id' => $userId,
                'rating' => rand(3, 5),
                'comment' => $comments[array_rand($comments)],
                'created_at' => date('Y-m-d H:i:s'),
            ];
        }
        $this->db->table('reviews')->insertBatch($data);
    }
}