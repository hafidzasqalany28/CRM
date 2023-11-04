<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Promo;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminPromoController extends Controller
{
    public function index()
    {
        $promos = Promo::all();
        return view('admin.promos.index', compact('promos'));
    }

    public function create()
    {
        $products = Product::all();
        $sellers = User::where('role', 'seller')->get();

        return view('admin.promos.create', compact('products', 'sellers'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'discount' => 'required|numeric',
            'seller_id' => 'required|exists:users,id',
            'product_id' => 'nullable|exists:products,id',
        ]);

        $promo = new Promo($validatedData);
        $promo->save();

        return redirect()->route('admin.promos.index')->with('success', 'Promosi berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $promo = Promo::find($id);
        return view('admin.promos.show', compact('promo'));
    }

    public function edit(string $id)
    {
        $promo = Promo::find($id);
        $products = Product::all();
        $sellers = User::where('role', 'seller')->get();

        return view('admin.promos.edit', compact('promo', 'sellers', 'products'));
    }

    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'discount' => 'required|numeric',
            'seller_id' => 'required|exists:users,id',
            'product_id' => 'nullable|exists:products,id',
        ]);

        $promo = Promo::find($id);
        $promo->update($validatedData);

        return redirect()->route('admin.promos.index')->with('success', 'Promosi berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $promo = Promo::find($id);
        $promo->delete();

        return redirect()->route('admin.promos.index')->with('success', 'Promosi berhasil dihapus.');
    }
}
