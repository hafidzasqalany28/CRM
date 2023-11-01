@extends('adminlte::page')

@section('title', 'Edit Promosi')

@section('content_header')
<h1>Edit Promosi</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('seller.input-promo.update', ['input_promo' => $promo->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="product_id">Produk Terkait:</label>
                <select id="product_id" name="product_id" class="form-control" required>
                    @foreach ($products as $product)
                    <option value="{{ $product->id }}" {{ $product->id == $promo->product_id ? 'selected' : '' }}>
                        {{ $product->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="name">Nama Promosi:</label>
                <input type="text" id="name" name="name" value="{{ $promo->name }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Deskripsi:</label>
                <textarea id="description" name="description" class="form-control" rows="4"
                    required>{{ $promo->description }}</textarea>
            </div>



            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="start_date">Tanggal Mulai:</label>
                    <input type="date" id="start_date" name="start_date" value="{{ $promo->start_date }}"
                        class="form-control" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="end_date">Tanggal Berakhir:</label>
                    <input type="date" id="end_date" name="end_date" value="{{ $promo->end_date }}" class="form-control"
                        required>
                </div>
            </div>

            <div class="form-group">
                <label for="discount">Diskon (%):</label>
                <input type="number" id="discount" name="discount" value="{{ $promo->discount }}" class="form-control"
                    required>
            </div>

            <button type="submit" class="btn btn-primary">
                Update
            </button>
        </form>
    </div>
</div>
@stop