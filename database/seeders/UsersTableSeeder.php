<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'name' => 'Admin User',
                'email' => 'admin.crm@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'admin',
            ],
            [
                'name' => 'Seller Ubi Jalar Ungu',
                'email' => 'seller1.crm@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'seller',
            ],
            [
                'name' => 'Seller Ubi Jalar Merah',
                'email' => 'seller2.crm@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'seller',
            ],
            [
                'name' => 'Buyer1',
                'email' => 'buyer1.crm@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'buyer',
            ],
            [
                'name' => 'Buyer2',
                'email' => 'buyer2.crm@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'buyer',
            ],
            [
                'name' => 'Buyer3',
                'email' => 'buyer3.crm@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'buyer',
            ],
            [
                'name' => 'Buyer4',
                'email' => 'buyer4.crm@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'buyer',
            ],
            [
                'name' => 'Buyer5',
                'email' => 'buyer5.crm@gmail.com',
                'password' => bcrypt('12345678'),
                'role' => 'buyer',
            ],
        ];

        // Tambahkan timestamps
        $timestamp = now();
        $users = array_map(function ($user) use ($timestamp) {
            $user['created_at'] = $timestamp;
            $user['updated_at'] = $timestamp;
            return $user;
        }, $users);

        // Insert data ke tabel Users
        DB::table('users')->insert($users);
    }
}
