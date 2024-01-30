<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class SellerOrderController extends Controller
{
    public function index()
    {
        // Ambil daftar pesanan berdasarkan product_id yang terkait dengan seller
        $orders = Order::whereIn('product_id', function ($query) {
            $query->select('id')
                ->from('products')
                ->where('seller_id', auth()->id());
        })
            ->orderBy('created_at', 'desc')
            ->get();

        return view('seller.manage-order.index', compact('orders'));
    }

    public function complete(Order $order)
    {
        // Ubah status menjadi "completed"
        $order->status = 'completed';
        $order->save();

        // Kurangi stok produk
        $order->product->stock -= $order->quantity;
        $order->product->save();

        return redirect()->route('seller.manage-order.index')->with('success', 'Order completed successfully.');
    }
}
