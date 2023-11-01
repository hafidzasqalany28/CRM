@extends('adminlte::page')

@section('title', 'Edit Produk')

@section('content_header')
<h1>Edit Produk</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('seller.input-product.update', ['input_product' => $product->id]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nama Produk:</label>
                <input type="text" id="name" name="name" value="{{ $product->name }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi:</label>
                <textarea id="description" name="description" class="form-control" rows="4"
                    required>{{ $product->description }}</textarea>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Harga:</label>
                <div class="input-group">
                    <span class="input-group-text">Rp</span>
                    <input type="number" id="price" name="price" value="{{ $product->price }}" class="form-control"
                        required>
                </div>
            </div>

            <div class="mb-3">
                <label for="stock" class="form-label">Stok:</label>
                <input type="number" id="stock" name="stock" value="{{ $product->stock }}" class="form-control"
                    required>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Upload Gambar Produk:</label>
                <input type="file" name="image" class="form-control-file">
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary float-right">
                    <i class="fa fa-check"></i> Update Produk
                </button>
            </div>
        </form>
    </div>
</div>
@stop