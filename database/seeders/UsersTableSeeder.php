<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => bcrypt('12345678'),
                'role' => 'admin',
            ],
            [
                'name' => 'Seller Ubi Jalar Ungu',
                'email' => 'seller1@example.com',
                'password' => bcrypt('12345678'),
                'role' => 'seller',
            ],
            [
                'name' => 'Seller Ubi Jalar Merah',
                'email' => 'seller2@example.com',
                'password' => bcrypt('12345678'),
                'role' => 'seller',
            ],
            [
                'name' => 'Buyer1',
                'email' => 'buyer1@example.com',
                'password' => bcrypt('12345678'),
                'role' => 'buyer',
            ],
            [
                'name' => 'Buyer2',
                'email' => 'buyer2@example.com',
                'password' => bcrypt('12345678'),
                'role' => 'buyer',
            ],
            [
                'name' => 'Buyer3',
                'email' => 'buyer3@example.com',
                'password' => bcrypt('12345678'),
                'role' => 'buyer',
            ],
            [
                'name' => 'Buyer4',
                'email' => 'buyer4@example.com',
                'password' => bcrypt('12345678'),
                'role' => 'buyer',
            ],
            [
                'name' => 'Buyer5',
                'email' => 'buyer5@example.com',
                'password' => bcrypt('12345678'),
                'role' => 'buyer',
            ],
        ];

        User::insert($users);
    }
}
