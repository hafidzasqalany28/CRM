@extends('layouts.master')

@section('title', 'Temukan Toko Ubi Jalar Kami')
@section('header', 'Toko Ubi Jalar')
@section('header-description', 'Jelajahi toko ubi jalar kami dan temukan esensi pertanian berkelanjutan serta cita rasa
yang kaya.')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($products as $product)
            <div class="col mb-4">
                <div class="card h-100 border-0 shadow animate__animated animate__fadeIn">
                    <img class="card-img-top rounded-top" src="{{ asset($product->image) }}"
                        alt="{{ $product->name }}" />

                    @if($product->isOnSale() && $product->promos->isNotEmpty())
                    <div class="badge bg-danger position-absolute top-0 end-0 mt-2">Diskon -{{
                        $product->promos->first()->discount }}%</div>
                    @endif

                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text text-muted">{{ $product->description }}</p>
                        <p class="card-text">Stok: {{ $product->stock }} item</p>

                        <div class="d-flex justify-content-between align-items-center">
                            @if($product->isOnSale())
                            <div>
                                <span class="text-muted text-decoration-line-through small">Rp {{
                                    number_format($product->originalPrice(), 0, ',', '.') }}</span>
                                <span class="fw-bold text-danger ms-2">Rp {{ number_format($product->currentPrice(), 0,
                                    ',', '.') }}</span>
                            </div>
                            @else
                            <p class="fw-bold">Rp {{ number_format($product->originalPrice(), 0, ',', '.') }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="card-footer bg-transparent">
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="mb-0">Dijual oleh: {{ $product->seller->name }}</p>
                            <a class="btn btn-outline-dark"
                                href="{{ route('buyer.product.detail', ['id' => $product->id]) }}">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection