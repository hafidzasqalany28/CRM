<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Promo;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        // Menghitung jumlah produk aktif
        $activeProductCount = Product::where('stock', '>', 0)->count();

        // Menghitung jumlah promo aktif
        $activePromoCount = Promo::where('end_date', '>', now())->count();

        // Menghitung jumlah pengguna seller dan buyer
        $totalSellers = User::where('role', 'seller')->count();
        $totalBuyers = User::where('role', 'buyer')->count();
        $totalUsers = $totalSellers + $totalBuyers;

        // Menghitung jumlah pesanan
        $totalOrders = Order::count();

        // Mengambil produk terbaru (misalnya, 5 produk terbaru)
        $latestProducts = Product::orderBy('created_at', 'desc')->take(5)->get();

        // Mengambil data penjualan seller
        $sellerData = User::where('role', 'seller')
            ->with('products.orders')
            ->get();

        $products = [];

        foreach ($sellerData as $seller) {
            $products[$seller->name] = [
                'product_names' => $seller->products->pluck('name'),
                'total_prices' => $seller->products->sum(function ($product) {
                    return $product->orders->sum('total_price');
                }),
                'stocks' => $seller->products->sum(function ($product) {
                    // Perbarui stok berdasarkan pesanan
                    $totalOrders = $product->orders->sum('quantity');
                    return $product->stock - $totalOrders;
                }),
            ];
        }

        return view('admin.dashboard', compact(
            'activeProductCount',
            'activePromoCount',
            'totalUsers',
            'totalSellers',
            'totalBuyers',
            'totalOrders',
            'latestProducts',
            'products'
        ));
    }
}
