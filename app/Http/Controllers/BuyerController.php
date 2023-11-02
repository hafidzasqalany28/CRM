<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Promo;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BuyerController extends Controller
{
    public function index()
    {
        $products = Product::where('stock', '>', 0)->get();
        $promos = Promo::whereIn('product_id', $products->pluck('id'))->get();
        return view('buyer.dashboard', compact('products', 'promos'));
    }

    public function productDetail($id)
    {
        $product = Product::find($id);
        $productPromo = Promo::where('product_id', $product->id)->first();

        if (!$product) {
            return redirect()->route('buyer.dashboard')->with('error', 'Product not found.');
        }

        return view('buyer.product-detail', compact('product', 'productPromo'));
    }

    public function profile()
    {
        $user = Auth::user();
        return view('buyer.profile', compact('user'));
    }

    public function orderHistory()
    {
        $user = Auth::user();
        $orders = Order::where('buyer_id', $user->id)->orderBy('created_at', 'desc')->get();
        return view('buyer.order-history', compact('orders'));
    }
}
