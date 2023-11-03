@extends('adminlte::page')

@section('content_header')
<h1 class="text-info">Buyer Dashboard</h1>
@stop

@section('content')
<div class="row">
    @foreach($products as $product)
    @php
    $productPromo = $promos->firstWhere('product_id', $product->id);
    $discountedPrice = $productPromo ? ($product->price - ($product->price * ($productPromo->discount / 100))) :
    $product->price;
    @endphp
    <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
        <div class="card h-100">
            <img src="{{ asset($product->image) }}" alt="Product Image" class="card-img-top" style="max-height: 150px">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title text-primary">{{ $product->name }}</h5>
                <p class="card-text text-muted">{{ $product->description }}</p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="d-flex justify-content-between">
                            <span class="text-success">Price:</span>
                            <span class="text-success font-weight-bold">
                                @if ($productPromo)
                                <del class="text-danger">Rp {{ number_format($product->price, 0) }}</del>
                                @endif
                                Rp {{ number_format($discountedPrice, 0) }}
                            </span>
                        </div>
                    </li>
                    <li class="list-group-item {{ $productPromo ? 'text-info' : 'text-muted' }}">
                        <i class="fas fa-tags"></i> Promo:
                        @if ($productPromo)
                        {{ $productPromo->description }} - {{ $productPromo->discount }}% off until {{
                        $productPromo->end_date }}
                        @else
                        No active promotions currently
                        @endif
                    </li>
                    <li class="list-group-item">
                        <i class="fas fa-box text-warning"></i> Stock: {{ $product->stock -
                        $product->orders->sum('quantity') }} pieces available
                    </li>
                </ul>
                <div class="mt-auto">
                    @if ($product->updated_at)
                    <small class="text-muted"><i class="far fa-clock"></i> Last updated {{
                        $product->updated_at->diffForHumans() }}</small>
                    @endif
                    <div class="d-flex justify-content-between mt-2">
                        <a href="{{ route('buyer.product.detail', ['id' => $product->id]) }}" class="btn btn-info">
                            <i class="fas fa-info-circle"></i> View Details
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection