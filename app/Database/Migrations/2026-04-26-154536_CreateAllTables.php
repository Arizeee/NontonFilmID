<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAllTables extends Migration
{
    public function up()
    {
        // ================= USERS =================
        $this->forge->addField([
            'id' => ['type' => 'INT', 'auto_increment' => true],
            'name' => ['type' => 'VARCHAR', 'constraint' => 150],
            'email' => ['type' => 'VARCHAR', 'constraint' => 200],
            'phone' => ['type' => 'VARCHAR', 'constraint' => 20, 'null' => true],
            'password_hash' => ['type' => 'VARCHAR', 'constraint' => 255],
            'avatar_url' => ['type' => 'TEXT', 'null' => true],
            'is_active' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 1],
            'created_at' => ['type' => 'TIMESTAMP', 'null' => true],
            'updated_at' => ['type' => 'TIMESTAMP', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('email');
        $this->forge->createTable('users');

        // ================= VENUES =================
        $this->forge->addField([
            'id' => ['type' => 'INT', 'auto_increment' => true],
            'name' => ['type' => 'VARCHAR', 'constraint' => 200],
            'city' => ['type' => 'VARCHAR', 'constraint' => 100],
            'province' => ['type' => 'VARCHAR', 'constraint' => 100],
            'address' => ['type' => 'TEXT'],
            'latitude' => ['type' => 'DECIMAL', 'constraint' => '9,6', 'null' => true],
            'longitude' => ['type' => 'DECIMAL', 'constraint' => '9,6', 'null' => true],
            'capacity' => ['type' => 'INT', 'null' => true],
            'image_url' => ['type' => 'TEXT', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('venues');

        // ================= CATEGORIES =================
        $this->forge->addField([
            'id' => ['type' => 'INT', 'auto_increment' => true],
            'name' => ['type' => 'VARCHAR', 'constraint' => 100],
            'slug' => ['type' => 'VARCHAR', 'constraint' => 100],
            'icon_url' => ['type' => 'TEXT', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('name');
        $this->forge->addUniqueKey('slug');
        $this->forge->createTable('categories');

        // ================= EVENTS =================
        $this->forge->addField([
            'id' => ['type' => 'INT', 'auto_increment' => true],
            'category_id' => ['type' => 'INT'],
            'venue_id' => ['type' => 'INT'],
            'title' => ['type' => 'VARCHAR', 'constraint' => 300],
            'slug' => ['type' => 'VARCHAR', 'constraint' => 300],
            'description' => ['type' => 'TEXT', 'null' => true],
            'poster_url' => ['type' => 'TEXT', 'null' => true],
            'status' => ['type' => 'ENUM', 'constraint' => ['draft', 'published', 'cancelled', 'completed'], 'default' => 'draft'],
            'min_price' => ['type' => 'DECIMAL', 'constraint' => '12,2', 'default' => 0],
            'max_price' => ['type' => 'DECIMAL', 'constraint' => '12,2', 'default' => 0],
            'start_at' => ['type' => 'TIMESTAMP'],
            'end_at' => ['type' => 'TIMESTAMP'],
            'created_at' => ['type' => 'TIMESTAMP', 'null' => true],
            'updated_at' => ['type' => 'TIMESTAMP', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('slug');
        $this->forge->addForeignKey('category_id', 'categories', 'id');
        $this->forge->addForeignKey('venue_id', 'venues', 'id');
        $this->forge->createTable('events');

        // ================= TICKET TYPES =================
        $this->forge->addField([
            'id' => ['type' => 'INT', 'auto_increment' => true],
            'event_id' => ['type' => 'INT'],
            'name' => ['type' => 'VARCHAR', 'constraint' => 100],
            'description' => ['type' => 'TEXT', 'null' => true],
            'price' => ['type' => 'DECIMAL', 'constraint' => '12,2'],
            'quota' => ['type' => 'INT'],
            'sold' => ['type' => 'INT', 'default' => 0],
            'sale_start' => ['type' => 'TIMESTAMP', 'null' => true],
            'sale_end' => ['type' => 'TIMESTAMP', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('event_id', 'events', 'id', 'CASCADE');
        $this->forge->createTable('ticket_types');

        // ================= SEATS =================
        $this->forge->addField([
            'id' => ['type' => 'INT', 'auto_increment' => true],
            'venue_id' => ['type' => 'INT'],
            'section' => ['type' => 'VARCHAR', 'constraint' => 50],
            'row_label' => ['type' => 'VARCHAR', 'constraint' => 10, 'null' => true],
            'seat_number' => ['type' => 'VARCHAR', 'constraint' => 10],
            'status' => ['type' => 'ENUM', 'constraint' => ['available', 'reserved', 'sold', 'blocked'], 'default' => 'available'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey(['venue_id', 'section', 'row_label', 'seat_number']);
        $this->forge->addForeignKey('venue_id', 'venues', 'id', 'CASCADE');
        $this->forge->createTable('seats');

        // ================= ORDERS =================
        $this->forge->addField([
            'id' => ['type' => 'INT', 'auto_increment' => true],
            'user_id' => ['type' => 'INT'],
            'order_code' => ['type' => 'VARCHAR', 'constraint' => 30],
            'subtotal' => ['type' => 'DECIMAL', 'constraint' => '12,2'],
            'discount' => ['type' => 'DECIMAL', 'constraint' => '12,2', 'default' => 0],
            'admin_fee' => ['type' => 'DECIMAL', 'constraint' => '12,2', 'default' => 0],
            'total' => ['type' => 'DECIMAL', 'constraint' => '12,2'],
            'status' => ['type' => 'ENUM', 'constraint' => ['pending', 'paid', 'cancelled', 'expired', 'refunded'], 'default' => 'pending'],
            'expires_at' => ['type' => 'TIMESTAMP', 'null' => true],
            'created_at' => ['type' => 'TIMESTAMP', 'null' => true],
            'updated_at' => ['type' => 'TIMESTAMP', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('order_code');
        $this->forge->addForeignKey('user_id', 'users', 'id');
        $this->forge->createTable('orders');

        // ================= ORDER ITEMS =================
        $this->forge->addField([
            'id' => ['type' => 'INT', 'auto_increment' => true],
            'order_id' => ['type' => 'INT'],
            'ticket_type_id' => ['type' => 'INT'],
            'seat_id' => ['type' => 'INT', 'null' => true],
            'unit_price' => ['type' => 'DECIMAL', 'constraint' => '12,2'],
            'qty' => ['type' => 'INT', 'default' => 1],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('order_id', 'orders', 'id', 'CASCADE');
        $this->forge->addForeignKey('ticket_type_id', 'ticket_types', 'id');
        $this->forge->addForeignKey('seat_id', 'seats', 'id');
        $this->forge->createTable('order_items');

        // ================= PAYMENTS =================
        $this->forge->addField([
            'id' => ['type' => 'INT', 'auto_increment' => true],
            'order_id' => ['type' => 'INT'],
            'method' => ['type' => 'VARCHAR', 'constraint' => 50],
            'provider' => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'reference_no' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'amount' => ['type' => 'DECIMAL', 'constraint' => '12,2'],
            'status' => ['type' => 'ENUM', 'constraint' => ['pending', 'success', 'failed', 'expired', 'refunded'], 'default' => 'pending'],
            'paid_at' => ['type' => 'TIMESTAMP', 'null' => true],
            'created_at' => ['type' => 'TIMESTAMP', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('order_id', 'orders', 'id');
        $this->forge->createTable('payments');

        // ================= REVIEWS =================
        $this->forge->addField([
            'id' => ['type' => 'INT', 'auto_increment' => true],
            'event_id' => ['type' => 'INT'],
            'user_id' => ['type' => 'INT'],
            'rating' => ['type' => 'SMALLINT', 'null' => true],
            'comment' => ['type' => 'TEXT', 'null' => true],
            'created_at' => ['type' => 'TIMESTAMP', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey(['event_id', 'user_id']);
        $this->forge->addForeignKey('event_id', 'events', 'id', 'CASCADE');
        $this->forge->addForeignKey('user_id', 'users', 'id');
        $this->forge->createTable('reviews');

        // ================= TICKETS =================
        $this->forge->addField([
            'id' => ['type' => 'INT', 'auto_increment' => true],
            'order_item_id' => ['type' => 'INT'],
            'ticket_code' => ['type' => 'VARCHAR', 'constraint' => 50],
            'qr_code_url' => ['type' => 'TEXT', 'null' => true],
            'status' => ['type' => 'ENUM', 'constraint' => ['valid', 'used', 'cancelled', 'expired'], 'default' => 'valid'],
            'used_at' => ['type' => 'TIMESTAMP', 'null' => true],
            'created_at' => ['type' => 'TIMESTAMP', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('ticket_code');
        $this->forge->addForeignKey('order_item_id', 'order_items', 'id');
        $this->forge->createTable('tickets');

        // ================= WISHLISTS =================
        $this->forge->addField([
            'id' => ['type' => 'INT', 'auto_increment' => true],
            'user_id' => ['type' => 'INT'],
            'event_id' => ['type' => 'INT'],
            'created_at' => ['type' => 'TIMESTAMP', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey(['user_id', 'event_id']);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE');
        $this->forge->addForeignKey('event_id', 'events', 'id', 'CASCADE');
        $this->forge->createTable('wishlists');
    }

    public function down()
    {
        $this->forge->dropTable('wishlists');
        $this->forge->dropTable('tickets');
        $this->forge->dropTable('reviews');
        $this->forge->dropTable('payments');
        $this->forge->dropTable('order_items');
        $this->forge->dropTable('orders');
        $this->forge->dropTable('seats');
        $this->forge->dropTable('ticket_types');
        $this->forge->dropTable('events');
        $this->forge->dropTable('categories');
        $this->forge->dropTable('venues');
        $this->forge->dropTable('users');
    }
}
