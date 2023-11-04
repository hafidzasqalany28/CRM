@extends('adminlte::page')

@section('title', 'Admin - Tambah Produk')

@section('content_header')
<h1>Tambah Produk Baru</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Form Tambah Produk</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.products.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nama Produk</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Nama Produk">
            </div>
            <div class="form-group">
                <label for="price">Harga</label>
                <input type="number" name="price" class="form-control" id="price" placeholder="Harga">
            </div>
            <div class="form-group">
                <label for="stock">Stok</label>
                <input type="number" name="stock" class="form-control" id="stock" placeholder="Stok Saat Ini">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@stop