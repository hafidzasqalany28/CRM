@extends('layouts.master')

@section('title', 'Discover Our Sweet Potato Shop')
@section('header', 'Shop')
@section('header-description', 'Explore our sweet potato shop and discover the essence of sustainable farming and rich
flavors.')

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
                    <div class="badge bg-danger position-absolute top-0 end-0 mt-2">Sale -{{
                        $product->promos->first()->discount }}%</div>
                    @endif

                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text text-muted">{{ $product->description }}</p>
                        <p class="card-text">Stock: {{ $product->stock }} items</p>

                        <div class="d-flex justify-content-between align-items-center">
                            @if($product->isOnSale())
                            <div>
                                <span class="text-muted text-decoration-line-through">Rp {{
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