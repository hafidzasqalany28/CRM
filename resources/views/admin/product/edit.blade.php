@extends('adminlte::page')

@section('title', 'Admin - Edit Produk')

@section('content_header')
<h1>Edit Produk</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Form Edit Produk</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nama Produk</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ $product->name }}">
            </div>
            <div class="form-group">
                <label for="price">Harga</label>
                <input type="number" name="price" class="form-control" id="price" value="{{ $product->price }}">
            </div>
            <div class="form-group">
                <label for="stock">Stok Saat Ini</label>
                <input type="number" name="stock" class="form-control" id="stock" value="{{ $product->stock }}">
            </div>
            <button type="submit" class="btn btn-warning">Update</button>
        </form>
    </div>
</div>
@stop