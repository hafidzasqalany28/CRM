@extends('adminlte::page')

@section('title', 'Admin - Detail Promosi')

@section('content_header')
<h1>Detail Promosi</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <h2>{{ $promo->name }}</h2>
        <p>{{ $promo->description }}</p>
        <p>Tanggal Mulai: {{ $promo->start_date }}</p>
        <p>Tanggal Berakhir: {{ $promo->end_date }}</p>
        <p>Diskon: {{ $promo->discount }}%</p>
        <p>Penjual: {{ $promo->seller->name }}</p>
        @if ($promo->product)
        <p>Produk Terkait: {{ $promo->product->name }}</p>
        @else
        <p>Tidak ada produk terkait</p>
        @endif
        <a href="{{ route('admin.promos.index') }}" class="btn btn-primary">Kembali</a>
    </div>
</div>
@stop