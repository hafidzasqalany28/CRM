@extends('adminlte::page')

@section('title', 'Admin - Daftar Produk')

@section('content_header')
<h1>Daftar Produk</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Semua Produk</h3>
    </div>
    <div class="card-body">
        <a href="{{ route('admin.products.create') }}" class="btn btn-success mb-3">Tambah Data</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Produk</th>
                    <th>Stok</th>
                    <th>Nama Penjual</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                @php
                $totalOrders = $product->orders->sum('quantity');
                $currentStock = $product->stock - $totalOrders;
                @endphp
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $currentStock }}</td>
                    <td>{{ $product->seller->name }}</td>
                    <td>
                        <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-primary">Lihat</a>
                        <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop