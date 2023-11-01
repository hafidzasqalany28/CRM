<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrderTableSeeder extends Seeder
{
    public function run()
    {
        $buyers = User::where('role', 'buyer')->get();
        $products = Product::all();

        foreach ($buyers as $buyer) {
            foreach ($products as $product) {
                $quantity = rand(6, 10);
                $totalPrice = $quantity * $product->price;

                $order = new Order([
                    'buyer_id' => $buyer->id,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'total_price' => $totalPrice,
                    'status' => 'completed',
                ]);

                $order->save();
            }
        }
    }
}
