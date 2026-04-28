<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class OrderItemsSeeder extends Seeder
{
    public function run()
    {
        $data = [];
        $ticketTypePrices = [
            1 => 150000, 2 => 350000, 3 => 750000,
            4 => 50000, 5 => 200000, 6 => 500000,
            7 => 100000, 8 => 300000, 9 => 200000,
            10 => 1000000, 11 => 50000, 12 => 200000,
        ];
        for ($orderId = 1; $orderId <= 10; $orderId++) {
            $ticketTypeId = rand(1, 12);
            $data[] = [
                'order_id' => $orderId,
                'ticket_type_id' => $ticketTypeId,
                'seat_id' => null,
                'unit_price' => $ticketTypePrices[$ticketTypeId],
                'qty' => rand(1, 3),
            ];
        }
        $this->db->table('order_items')->insertBatch($data);
    }
}
