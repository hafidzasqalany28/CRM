<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Promo;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $activeProductCount = Product::where('stock', '>', 0)->count();
        $activePromoCount = Promo::where('end_date', '>', now())->count();

        // Mengambil semua pengguna
        $totalUsers = User::count();

        // Menghitung jumlah seller dan buyer
        $totalSellers = User::where('role', 'seller')->count();
        $totalBuyers = User::where('role', 'buyer')->count();

        $totalOrders = Order::count();

        // Mengambil produk terbaru (misalnya, 5 produk terbaru)
        $latestProducts = Product::orderBy('created_at', 'desc')->take(5)->get();

        return view('admin.dashboard', compact(
            'activeProductCount',
            'activePromoCount',
            'totalUsers',
            'totalSellers',
            'totalBuyers',
            'totalOrders',
            'latestProducts'
        ));
    }
}
