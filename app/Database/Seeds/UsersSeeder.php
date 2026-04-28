<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $data = [];
        for ($i = 1; $i <= 10; $i++) {
            $data[] = [
                'name' => "User $i",
                'email' => "user$i@example.com",
                'phone' => "08100000000$i",
                'password_hash' => password_hash('password123', PASSWORD_BCRYPT),
                'avatar_url' => null,
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
        }
        $this->db->table('users')->insertBatch($data);
    }
}
