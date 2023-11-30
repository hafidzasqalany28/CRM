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
        return view('buyer.dashboard1', compact('products', 'promos'));
    }

    public function productDetail($id)
    {
        $product = Product::find($id);
        $productPromo = Promo::where('product_id', $product->id)->first();

        if (!$product || $product->stock <= 0) {
            return redirect()->route('buyer.dashboard')->with('error', 'Product not found or out of stock.');
        }

        $relatedProducts = Product::where('stock', '>', 0)->inRandomOrder()->limit(4)->get();

        return view('buyer.product-detail1', compact('product', 'productPromo', 'relatedProducts'));
    }


    public function profile()
    {
        $user = Auth::user();
        return view('buyer.profile1', compact('user'));
    }

    public function orderHistory()
    {
        $user = Auth::user();
        $orders = Order::where('buyer_id', $user->id)->orderBy('created_at', 'desc')->get();
        return view('buyer.order-history1', compact('orders'));
    }

    public function order($product_id, Request $request)
    {
        // Validasi input quantity
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        // Temukan produk berdasarkan $product_id
        $product = Product::find($product_id);

        if (!$product) {
            return redirect()->route('buyer.dashboard')->with('error', 'Product not found.');
        }

        // Hitung total harga berdasarkan harga produk dan kuantitas
        $quantity = $request->input('quantity');
        $totalPrice = $product->price * $quantity;

        // Simpan data pesanan ke dalam tabel orders dengan status "selesai"
        $user = Auth::user();
        $order = new Order();
        $order->buyer_id = $user->id;
        $order->product_id = $product->id;
        $order->quantity = $quantity;
        $order->total_price = $totalPrice;
        $order->status = 'completed';
        $order->save();

        // Update stok produk
        $product->stock -= $quantity;
        $product->save();

        return redirect()->route('buyer.dashboard')->with('success', 'Order successful.');
    }
}
