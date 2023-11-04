@extends('adminlte::page')

@section('title', 'Admin - Detail Produk')

@section('content_header')
<h1>Detail Produk</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Detail Produk</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-4">
                    <p><strong>ID:</strong> {{ $product->id }}</p>
                    <p><strong>Nama Produk:</strong> {{ $product->name }}</p>
                    <p><strong>Deskripsi:</strong> {{ $product->description }}</p>
                </div>
                <div class="mb-4">
                    <p><strong>Harga:</strong> Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    <p><strong>Stok Saat Ini:</strong> {{ $product->stock - $product->orders->sum('quantity') }}</p>
                    <p><strong>Penjual:</strong> {{ $product->seller->name }}</p>
                </div>
                <p><strong>Tanggal Pembuatan:</strong> {{ optional($product->created_at)->format('d M Y H:i') }}</p>
                <!-- Anda dapat menambahkan lebih banyak informasi di sini -->
            </div>
            <div class="col-md-6">
                <div class="text-center">
                    @if($product->image)
                    <img src="{{ asset($product->image) }}" alt="Gambar Produk" class="img-fluid rounded"
                        style="max-width: 100%;">
                    @else
                    <p class="mt-4">Produk ini tidak memiliki gambar.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@stop