<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PaymentsSeeder extends Seeder
{
    public function run()
    {
        $methods = ['bank_transfer', 'credit_card', 'ewallet', 'qris'];
        $providers = ['BCA', 'Mandiri', 'GoPay', 'OVO', 'Dana', null];
        $statuses = ['pending', 'success', 'failed', 'expired', 'refunded'];
        $data = [];
        for ($i = 1; $i <= 10; $i++) {
            $status = $statuses[array_rand($statuses)];
            $data[] = [
                'order_id' => $i,
                'method' => $methods[array_rand($methods)],
                'provider' => $providers[array_rand($providers)],
                'reference_no' => 'REF' . strtoupper(substr(md5($i), 0, 12)),
                'amount' => rand(1, 5) * 150000 + 5000,
                'status' => $status,
                'paid_at' => $status === 'success' ? date('Y-m-d H:i:s') : null,
                'created_at' => date('Y-m-d H:i:s'),
            ];
        }
        $this->db->table('payments')->insertBatch($data);
    }
}
