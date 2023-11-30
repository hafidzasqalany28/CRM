@extends('layouts.master')

@section('title', 'Shop Homepage')
@section('header', 'Shop in Style')
@section('header-description', 'With this shop homepage template')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($products as $product)
            <div class="col mb-4">
                <div class="card h-100 position-relative">
                    <img class="card-img-top" src="{{ asset($product->image) }}" alt="{{ $product->name }}" />
                    @if($product->isOnSale() && $product->promos->isNotEmpty())
                    <div class="discount-badge position-absolute top-0 end-0 mt-2">
                        <span class="badge bg-dark text-white">Sale -{{ $product->promos->first()->discount }}%</span>
                    </div>
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text text-muted">{{ $product->description }}</p>
                        <p class="card-text">Stock: {{ $product->stock }} items</p>
                        <div class="d-flex justify-content-between align-items-center">
                            @if($product->isOnSale())
                            <span class="text-muted text-decoration-line-through">Rp {{
                                number_format($product->originalPrice(), 0, ',', '.') }}</span>
                            <p class="fw-bold">Rp {{ number_format($product->currentPrice(), 0, ',', '.') }}</p>
                            @else
                            <p class="fw-bold">Rp {{ number_format($product->originalPrice(), 0, ',', '.') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="card-footer bg-transparent">
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="mb-0">Sold by: {{ $product->seller->name }}</p>
                            <a class="btn btn-outline-dark"
                                href="{{ route('buyer.product.detail', ['id' => $product->id]) }}">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection