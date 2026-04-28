<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TicketsSeeder extends Seeder
{
    public function run()
    {
        $statuses = ['valid', 'used', 'cancelled', 'expired'];
        $data = [];
        for ($i = 1; $i <= 10; $i++) {
            $status = $statuses[array_rand($statuses)];
            $data[] = [
                'order_item_id' => $i,
                'ticket_code' => 'TKT' . strtoupper(substr(md5($i . 'ticket'), 0, 12)),
                'qr_code_url' => null,
                'status' => $status,
                'used_at' => $status === 'used' ? date('Y-m-d H:i:s') : null,
                'created_at' => date('Y-m-d H:i:s'),
            ];
        }
        $this->db->table('tickets')->insertBatch($data);
    }
}
