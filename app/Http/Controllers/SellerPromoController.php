<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Notifications\NewProductAndPromoNotification;

class SellerPromoController extends Controller
{
    public function index()
    {
        $sellerId = auth()->id();
        $promotions = Promo::where('seller_id', $sellerId)->with('product')->get();
        return view('seller.promo.index', compact('promotions'));
    }

    public function create()
    {
        $products = Product::where('seller_id', auth()->id())->get();
        return view('seller.promo.create', compact('products'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'discount' => 'required|numeric',
            'product_id' => 'required|exists:products,id', // Tambahkan validasi product_id
        ]);

        $promo = new Promo([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'start_date' => $validatedData['start_date'],
            'end_date' => $validatedData['end_date'],
            'discount' => $validatedData['discount'],
            'seller_id' => auth()->id(),
            'product_id' => $validatedData['product_id'], // Hubungkan promo dengan produk
        ]);

        $promo->save();

        $buyers = \App\Models\User::where('role', 'buyer')->get();
        foreach ($buyers as $buyer) {
            $buyer->notify(new NewProductAndPromoNotification($promo));
        }
        return redirect()->route('seller.input-promo.index')->with('success', 'Promo created successfully.');
    }

    public function show(string $id)
    {
        $promo = Promo::where('seller_id', auth()->id())->with('product')->find($id);
        return view('seller.promo.show', compact('promo'));
    }

    public function edit(string $id)
    {
        $products = Product::where('seller_id', auth()->id())->get();
        $promo = Promo::where('seller_id', auth()->id())->with('product')->find($id);
        return view('seller.promo.edit', compact('promo', 'products'));
    }

    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'discount' => 'required|numeric',
            'product_id' => 'required|exists:products,id', // Tambahkan validasi product_id
        ]);

        $promo = Promo::find($id);

        $promo->name = $validatedData['name'];
        $promo->description = $validatedData['description'];
        $promo->start_date = $validatedData['start_date'];
        $promo->end_date = $validatedData['end_date'];
        $promo->discount = $validatedData['discount'];
        $promo->product_id = $validatedData['product_id']; // Hubungkan promo dengan produk
        $promo->save();

        return redirect()->route('seller.input-promo.index')->with('success', 'Promo updated successfully.');
    }

    public function destroy(string $id)
    {
        $promo = Promo::find($id);
        $promo->delete();

        return redirect()->route('seller.input-promo.index')->with('success', 'Promo deleted successfully.');
    }
}
