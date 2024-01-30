<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
    {
        $products = Product::with('orders')->get();

        $products->each(function ($product) {
            $completedOrders = $product->orders->where('status', 'completed')->sum('quantity');
            $product->current_stock = max(0, $product->stock - $completedOrders);
        });

        return view('admin.product.index', compact('products'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang masuk
        $validatedData = $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'current_stock' => 'required|integer',
        ]);

        // Simpan produk baru ke database
        $product = new Product();
        $product->name = $validatedData['name'];
        $product->price = $validatedData['price'];
        $product->current_stock = $validatedData['current_stock'];
        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
{
    $product = Product::with('orders')->find($id);

    if (!$product) {
        abort(404); // Product not found
    }

    $completedOrders = $product->orders->where('status', 'completed')->sum('quantity');
    $product->current_stock = max(0, $product->stock - $completedOrders);

    return view('admin.product.show', compact('product'));
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id); // Mengambil data produk berdasarkan ID
        return view('admin.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi data yang masuk
        $validatedData = $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'current_stock' => 'required|integer',
        ]);

        $product = Product::find($id); // Mengambil data produk berdasarkan ID
        $product->name = $validatedData['name'];
        $product->price = $validatedData['price'];
        $product->current_stock = $validatedData['current_stock'];
        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id); // Mengambil data produk berdasarkan ID
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus.');
    }
}
