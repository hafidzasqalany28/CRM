@extends('adminlte::page')

@section('title', 'Manajemen Produk')

@section('content_header')
<h1>Manajemen Produk</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Produk</h3>
            <a href="{{ route('seller.input-product.create') }}" class="btn btn-success float-right">
                <i class="fa fa-plus"></i> Tambah Produk
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>Rp {{ number_format($product->price, 0) }}</td>
                            <td>{{ max(0, $product->stock) }}</td>
                            <td>
                                <img src="{{ asset($product->image) }}" alt="Product Image" style="max-width: 100px;">
                            </td>
                            <td>
                                <a href="{{ route('seller.input-product.edit', ['input_product' => $product]) }}"
                                    class="btn btn-primary btn-action">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                                <form
                                    action="{{ route('seller.input-product.destroy', ['input_product' => $product->id]) }}"
                                    method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-action"
                                        onclick="return confirm('Are you sure you want to delete this product?')">
                                        <i class="fa fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop