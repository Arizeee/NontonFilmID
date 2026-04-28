<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call('UsersSeeder');
        $this->call('VenuesSeeder');
        $this->call('CategoriesSeeder');
        $this->call('EventsSeeder');
        $this->call('TicketTypesSeeder');
        $this->call('SeatsSeeder');
        $this->call('OrdersSeeder');
        $this->call('OrderItemsSeeder');
        $this->call('PaymentsSeeder');
        $this->call('ReviewsSeeder');
        $this->call('TicketsSeeder');
        $this->call('WishlistsSeeder');
    }
}
