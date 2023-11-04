@extends('adminlte::page')

@section('title', 'Admin - Tambah Promosi')

@section('content_header')
<h1>Tambah Promosi</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form method="post" action="{{ route('admin.promos.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>
            <div class="form-group">
                <label for="start_date">Tanggal Mulai</label>
                <input type="date" class="form-control" id="start_date" name="start_date" required>
            </div>
            <div class="form-group">
                <label for="end_date">Tanggal Berakhir</label>
                <input type="date" class="form-control" id="end_date" name="end_date" required>
            </div>
            <div class="form-group">
                <label for="discount">Diskon (%)</label>
                <input type="number" step="0.01" class="form-control" id="discount" name="discount" required>
            </div>
            <div class="form-group">
                <label for="seller_id">Penjual</label>
                <select class="form-control" id="seller_id" name="seller_id" required>
                    @foreach ($sellers as $seller)
                    <option value="{{ $seller->id }}">{{ $seller->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="product_id">Produk (opsional)</label>
                <select class="form-control" id="product_id" name="product_id">
                    <option value="" selected>Pilih produk (jika ada)</option>
                    @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@stop