<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class OrdersSeeder extends Seeder
{
    public function run()
    {
        $data = [];
        $statuses = ['pending', 'paid', 'cancelled', 'expired', 'refunded'];
        for ($i = 1; $i <= 10; $i++) {
            $subtotal = rand(1, 5) * 150000;
            $adminFee = 5000;
            $discount = 0;
            $data[] = [
                'user_id' => rand(1, 10),
                'order_code' => 'ORD' . strtoupper(substr(md5($i . time()), 0, 10)),
                'subtotal' => $subtotal,
                'discount' => $discount,
                'admin_fee' => $adminFee,
                'total' => $subtotal + $adminFee - $discount,
                'status' => $statuses[array_rand($statuses)],
                'expires_at' => date('Y-m-d H:i:s', strtotime('+1 hour')),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
        }
        $this->db->table('orders')->insertBatch($data);
    }
}
