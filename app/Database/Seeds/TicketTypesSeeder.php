<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TicketTypesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            // Event 1 - Rock Fest
            ['event_id' => 1, 'name' => 'Festival', 'description' => 'General standing area', 'price' => 150000, 'quota' => 5000, 'sold' => 120, 'sale_start' => '2026-04-01 00:00:00', 'sale_end' => '2026-05-31 23:59:59'],
            ['event_id' => 1, 'name' => 'Tribune', 'description' => 'Seated tribune area', 'price' => 350000, 'quota' => 2000, 'sold' => 80, 'sale_start' => '2026-04-01 00:00:00', 'sale_end' => '2026-05-31 23:59:59'],
            ['event_id' => 1, 'name' => 'VIP', 'description' => 'VIP front row access', 'price' => 750000, 'quota' => 500, 'sold' => 30, 'sale_start' => '2026-04-01 00:00:00', 'sale_end' => '2026-05-31 23:59:59'],
            // Event 2 - Football
            ['event_id' => 2, 'name' => 'Economy', 'description' => 'Economy stand', 'price' => 50000, 'quota' => 10000, 'sold' => 500, 'sale_start' => '2026-06-01 00:00:00', 'sale_end' => '2026-07-14 23:59:59'],
            ['event_id' => 2, 'name' => 'Business', 'description' => 'Business stand', 'price' => 200000, 'quota' => 3000, 'sold' => 150, 'sale_start' => '2026-06-01 00:00:00', 'sale_end' => '2026-07-14 23:59:59'],
            ['event_id' => 2, 'name' => 'VIP Box', 'description' => 'VIP box seats', 'price' => 500000, 'quota' => 200, 'sold' => 20, 'sale_start' => '2026-06-01 00:00:00', 'sale_end' => '2026-07-14 23:59:59'],
            // Event 3 - Comedy
            ['event_id' => 3, 'name' => 'Regular', 'description' => 'Regular seat', 'price' => 100000, 'quota' => 1000, 'sold' => 200, 'sale_start' => '2026-04-15 00:00:00', 'sale_end' => '2026-05-19 23:59:59'],
            ['event_id' => 3, 'name' => 'Premium', 'description' => 'Premium front seat', 'price' => 300000, 'quota' => 300, 'sold' => 50, 'sale_start' => '2026-04-15 00:00:00', 'sale_end' => '2026-05-19 23:59:59'],
            // Event 4 - Tech Summit
            ['event_id' => 4, 'name' => 'General', 'description' => 'General pass (1 day)', 'price' => 200000, 'quota' => 2000, 'sold' => 300, 'sale_start' => '2026-06-01 00:00:00', 'sale_end' => '2026-08-09 23:59:59'],
            ['event_id' => 4, 'name' => 'Full Pass', 'description' => '2-day all access', 'price' => 1000000, 'quota' => 500, 'sold' => 100, 'sale_start' => '2026-06-01 00:00:00', 'sale_end' => '2026-08-09 23:59:59'],
            // Event 5 - Art Expo
            ['event_id' => 5, 'name' => 'Daily', 'description' => '1-day entry', 'price' => 50000, 'quota' => 3000, 'sold' => 400, 'sale_start' => '2026-07-01 00:00:00', 'sale_end' => '2026-09-04 23:59:59'],
            ['event_id' => 5, 'name' => '3-Day Pass', 'description' => 'Full 3-day entry', 'price' => 200000, 'quota' => 1000, 'sold' => 80, 'sale_start' => '2026-07-01 00:00:00', 'sale_end' => '2026-09-04 23:59:59'],
        ];
        $this->db->table('ticket_types')->insertBatch($data);
    }
}
