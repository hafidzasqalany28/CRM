@extends('adminlte::page')

@section('content_header')
<h1 class="m-3">Product Detail</h1>
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card product-card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ asset($product->image) }}" alt="Product Image" class="img-fluid rounded mb-3">
                        </div>
                        <div class="col-md-6">
                            <h2 class="text-primary">{{ $product->name }}</h2>
                            <p class="text-muted mb-4">{{ $product->description }}</p>

                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <i class="fas fa-tags text-primary"></i> <strong>Price:</strong> Rp {{
                                    number_format($product->price, 0) }}
                                </li>
                                <li class="list-group-item">
                                    <i class="fas fa-cubes text-success"></i> <strong>Stock:</strong> {{ $product->stock
                                    - $product->orders->sum('quantity') }} pieces available
                                </li>
                                @if ($productPromo)
                                <li class="list-group-item">
                                    <i class="fas fa-gift text-warning"></i> <strong>Promo Description:</strong> {{
                                    $productPromo->description }}
                                </li>
                                <li class="list-group-item">
                                    <i class="fas fa-percent text-danger"></i> <strong>Discount:</strong> {{
                                    $productPromo->discount }}%
                                </li>
                                <li class="list-group-item">
                                    <i class="far fa-clock text-info"></i> <strong>Valid Until:</strong> {{
                                    $productPromo->end_date }}
                                </li>
                                @endif
                            </ul>

                            @if (!$productPromo)
                            <p class="text-muted mt-4"><i class="fas fa-exclamation-triangle text-warning"></i> No
                                active promo at the moment.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('css')
<style>
    /* Animasi Hover untuk Tombol Order */
    .order-button {
        transition: transform 0.2s;
    }

    .order-button:hover {
        transform: scale(1.05);
    }
</style>
@endpush