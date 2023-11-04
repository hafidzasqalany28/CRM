<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductTableSeeder extends Seeder
{
    public function run()
    {
        $seller1 = User::where('email', 'seller1@example.com')->first();
        $seller2 = User::where('email', 'seller2@example.com')->first();

        if ($seller1) {
            $timestamp = now();

            $productsUbiJalarUngu = [
                [
                    'name' => 'Ubi Jalar Ungu Premium',
                    'description' => 'Ubi jalar ungu segar dengan kualitas terbaik.',
                    'price' => 150000,
                    'stock' => 150,
                    'image' => 'img/ubi-jalar-ungu.jpeg',
                    'seller_id' => $seller1->id,
                    'created_at' => $timestamp,
                    'updated_at' => $timestamp,
                ],
                [
                    'name' => 'Ubi Jalar Ungu Kualitas Bagus',
                    'description' => 'Ubi jalar ungu berkualitas dengan harga terjangkau.',
                    'price' => 120000,
                    'stock' => 100,
                    'image' => 'img/ubi-jalar-ungu2.jpeg',
                    'seller_id' => $seller1->id,
                    'created_at' => $timestamp,
                    'updated_at' => $timestamp,
                ],
                [
                    'name' => 'Ubi Jalar Ungu Berkualitas',
                    'description' => 'Ubi jalar ungu dengan stok terbatas.',
                    'price' => 160000,
                    'stock' => 75,
                    'image' => 'img/ubi-jalar-ungu3.jpeg',
                    'seller_id' => $seller1->id,
                    'created_at' => $timestamp,
                    'updated_at' => $timestamp,
                ],
            ];

            // Insert data ke tabel Product
            DB::table('products')->insert($productsUbiJalarUngu);
        }

        if ($seller2) {
            $timestamp = now();

            $productsUbiJalarMerah = [
                [
                    'name' => 'Ubi Jalar Merah Fresh',
                    'description' => 'Ubi jalar merah segar dari kebun kami.',
                    'price' => 180000,
                    'stock' => 150,
                    'image' => 'img/ubi-jalar-merah.jpeg',
                    'seller_id' => $seller2->id,
                    'created_at' => $timestamp,
                    'updated_at' => $timestamp,
                ],
                [
                    'name' => 'Ubi Jalar Merah Pilihan',
                    'description' => 'Pilihan terbaik untuk Anda yang suka Ubi Jalar Merah.',
                    'price' => 200000,
                    'stock' => 100,
                    'image' => 'img/ubi-jalar-merah2.jpeg',
                    'seller_id' => $seller2->id,
                    'created_at' => $timestamp,
                    'updated_at' => $timestamp,
                ],
                [
                    'name' => 'Ubi Jalar Merah Premium',
                    'description' => 'Ubi jalar merah dengan kualitas premium.',
                    'price' => 220000,
                    'stock' => 75,
                    'image' => 'img/ubi-jalar-merah3.jpeg',
                    'seller_id' => $seller2->id,
                    'created_at' => $timestamp,
                    'updated_at' => $timestamp,
                ],
            ];

            // Insert data ke tabel Product
            DB::table('products')->insert($productsUbiJalarMerah);
        }
    }
}
