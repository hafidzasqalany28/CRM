@extends('adminlte::page')

@section('title', 'Tambah Promosi Baru')

@section('content_header')
<h1>Tambah Promosi Baru</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('seller.input-promo.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="product_id">Produk Terkait:</label>
                <select id="product_id" name="product_id" class="form-control" required>
                    @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="name">Nama Promosi:</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Deskripsi:</label>
                <textarea id="description" name="description" class="form-control" rows="4" required></textarea>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="start_date">Tanggal Mulai:</label>
                    <input type="date" id="start_date" name="start_date" class="form-control" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="end_date">Tanggal Berakhir:</label>
                    <input type="date" id="end_date" name="end_date" class="form-control" required>
                </div>
            </div>

            <div class="form-group">
                <label for="discount">Diskon (%):</label>
                <input type="number" id="discount" name="discount" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success">
                <i class="fa fa-plus"></i> Tambah Promosi
            </button>
        </form>
    </div>
</div>
@stop