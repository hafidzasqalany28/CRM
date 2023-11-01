@extends('adminlte::page')

@section('content_header')
<h1>Dashboard Pembeli</h1>
@stop

@section('content')
<div class="row">
    @foreach($products as $product)
    @php
    $productPromo = $promos->firstWhere('product_id', $product->id);
    @endphp
    <div class="col-md-3 mb-4">
        <div class="card">
            <img src="{{ asset($product->image) }}" alt="Product Image" class="card-img-top" style="max-height: 150px">
            <div class="card-body">
                <h6 class="card-title text-primary">{{ $product->name }}</h6>
                <p class="card-text">{{ $product->description }}</p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <i class="fas fa-money-bill"></i> Price: Rp {{ number_format($product->price, 0) }}
                    </li>
                    <li class="list-group-item">
                        <i class="fas fa-box"></i> Stock: {{ $product->stock - $product->orders->sum('quantity') }}
                        pieces available
                    </li>
                </ul>
            </div>
            <div class="card-footer">
                @if ($product->updated_at)
                <small class="text-muted"><i class="far fa-clock"></i> Last updated {{
                    $product->updated_at->diffForHumans() }}</small>
                @endif

                <a href="{{ route('buyer.product.detail', ['id' => $product->id]) }}" class="btn btn-primary btn-block">
                    <i class="fas fa-info-circle"></i> View Details
                </a>

                @if ($productPromo)
                <p class="text-success mt-2">
                    <i class="fas fa-tags"></i> Promo: {{ $productPromo->description }}
                    - Diskon {{ $productPromo->discount }}% hingga {{ $productPromo->end_date }}
                </p>
                @else
                <p class="text-muted mt-2">
                    <i class="fas fa-tags"></i> Promo: Tidak ada promo saat ini
                </p>
                @endif
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection