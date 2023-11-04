<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Promo;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PromoTableSeeder extends Seeder
{
    public function run()
    {
        // Mendapatkan seller1 dan seller2
        $seller1 = User::where('email', 'seller1@example.com')->first();
        $seller2 = User::where('email', 'seller2@example.com')->first();

        // Hanya melanjutkan jika penjual ditemukan
        if ($seller1) {
            // Mendapatkan produk Ubi Jalar Ungu
            $ubiJalarUngu = Product::where('name', 'Ubi Jalar Ungu Premium')->first();
            $ubiJalarUngu2 = Product::where('name', 'Ubi Jalar Ungu Kualitas Bagus')->first();

            if ($ubiJalarUngu && $ubiJalarUngu2) {
                $timestamp = now();

                $promosUbiJalarUngu = [
                    [
                        'name' => 'Diskon Ubi Jalar Ungu',
                        'description' => 'Diskon spesial untuk Ubi Jalar Ungu!',
                        'start_date' => $timestamp,
                        'end_date' => $timestamp->addDays(7),
                        'discount' => 10,
                        'seller_id' => $seller1->id,
                        'product_id' => $ubiJalarUngu->id,
                        'created_at' => $timestamp,
                        'updated_at' => $timestamp,
                    ],
                    [
                        'name' => 'Promo Beli 2 Gratis 1',
                        'description' => 'Beli 2 Ubi Jalar Ungu, dapatkan 1 gratis!',
                        'start_date' => $timestamp,
                        'end_date' => $timestamp->addDays(14),
                        'discount' => 100,
                        'seller_id' => $seller1->id,
                        'product_id' => $ubiJalarUngu2->id,
                        'created_at' => $timestamp,
                        'updated_at' => $timestamp,
                    ],
                ];

                // Insert data ke tabel Promo
                DB::table('promos')->insert($promosUbiJalarUngu);
            }
        }

        // Lanjutkan untuk seller2 (Ubi Jalar Merah) dengan cara yang sama
        if ($seller2) {
            $ubiJalarMerah = Product::where('name', 'Ubi Jalar Merah Fresh')->first();
            $ubiJalarMerah2 = Product::where('name', 'Ubi Jalar Merah Pilihan')->first();

            if ($ubiJalarMerah && $ubiJalarMerah2) {
                $timestamp = now();

                $promosUbiJalarMerah = [
                    [
                        'name' => 'Potongan Harga Ubi Jalar Merah',
                        'description' => 'Diskon spesial untuk Ubi Jalar Merah!',
                        'start_date' => $timestamp,
                        'end_date' => $timestamp->addDays(10),
                        'discount' => 15,
                        'seller_id' => $seller2->id,
                        'product_id' => $ubiJalarMerah->id,
                        'created_at' => $timestamp,
                        'updated_at' => $timestamp,
                    ],
                    [
                        'name' => 'Promo Beli 3 Gratis 1',
                        'description' => 'Beli 3 Ubi Jalar Merah, dapatkan 1 gratis!',
                        'start_date' => $timestamp,
                        'end_date' => $timestamp->addDays(21),
                        'discount' => 100,
                        'seller_id' => $seller2->id,
                        'product_id' => $ubiJalarMerah2->id,
                        'created_at' => $timestamp,
                        'updated_at' => $timestamp,
                    ],
                ];

                // Insert data ke tabel Promo
                DB::table('promos')->insert($promosUbiJalarMerah);
            }
        }
    }
}
