@extends('adminlte::page')

@section('content_header')
<h1 class="text-info">Dashboard Pembeli</h1>
@stop

@section('content')
<div class="row">
    @foreach($products as $product)
    @php
    $productPromo = $promos->firstWhere('product_id', $product->id);
    @endphp
    <div class="col-md-3 mb-4">
        <div class="card card-primary" style="height: 95%">
            <img src="{{ asset($product->image) }}" alt="Product Image" class="card-img-top" style="max-height: 150px">
            <div class="card-body">
                <h6 class="card-title text-primary">{{ $product->name }}</h6>
                <p class="card-text text-muted">{{ $product->description }}</p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <i class="fas fa-money-bill text-success"></i> Price: <span
                            class="text-success font-weight-bold">Rp {{
                            number_format($product->price, 0) }}</span>
                    </li>
                    <li class="list-group-item">
                        <i class="fas fa-box text-warning"></i> Stock: {{ $product->stock -
                        $product->orders->sum('quantity') }}
                        pieces available
                    </li>
                    @if ($productPromo)
                    <li class="list-group-item text-info">
                        <i class="fas fa-tags"></i> Promo: {{ $productPromo->description }}
                        - Diskon {{ $productPromo->discount }}% hingga {{ $productPromo->end_date }}
                    </li>
                    @else
                    <li class="list-group-item text-muted">
                        <i class="fas fa-tags"></i> Promo: Tidak ada promo saat ini
                    </li>
                    @endif
                </ul>
            </div>
            <div class="card-footer bg-light">
                @if ($product->updated_at)
                <small class="text-muted"><i class="far fa-clock"></i> Last updated {{
                    $product->updated_at->diffForHumans() }}</small>
                @endif
                <div class="d-flex justify-content-between">
                    <a href="{{ route('buyer.product.detail', ['id' => $product->id]) }}" class="btn btn-info">
                        <i class="fas fa-info-circle"></i> View Details
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection