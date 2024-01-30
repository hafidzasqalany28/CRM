<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Promo;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerController extends Controller
{
    public function index()
    {
        $seller = Auth::user();

        // Mengambil produk yang dimiliki oleh penjual
        $products = Product::where('seller_id', $seller->id)->get();

        // Mengambil pesanan (order) yang terkait dengan produk penjual dengan status "completed"
        $orderIds = $products->pluck('id');
        $orders = Order::whereIn('product_id', $orderIds)->where('status', 'completed')->get();

        // Mengambil daftar promosi yang dimiliki oleh penjual dan produk terkait promosi
        $promos = Promo::where('seller_id', $seller->id)->with('product')->get();

        // Hitung total produk terjual dari pesanan yang memiliki status "completed"
        $totalProductsSold = $orders->sum('quantity');

        // Hitung total pendapatan dari pesanan yang memiliki status "completed"
        $totalRevenue = $orders->sum(function ($order) {
            return $order->quantity * $order->product->price;
        });

        return view('seller.dashboard', compact('products', 'orders', 'promos', 'totalProductsSold', 'totalRevenue'));
    }
}
