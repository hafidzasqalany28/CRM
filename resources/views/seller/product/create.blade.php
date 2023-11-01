@extends('adminlte::page')

@section('title', 'Tambah Produk Baru')

@section('content_header')
<h1>Tambah Produk Baru</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('seller.input-product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nama Produk:</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi:</label>
                <textarea id="description" name="description" class="form-control" rows="4" required></textarea>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="price" class="form-label">Harga:</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" id="price" name="price" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="stock" class="form-label">Stok:</label>
                        <input type="number" id="stock" name="stock" class="form-control" required>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Upload Gambar Produk:</label>
                <input type="file" name="image" class="form-control-file" required>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-success float-right">
                    <i class="fa fa-plus"></i> Tambah Produk
                </button>
            </div>
        </form>
    </div>
</div>
@stop