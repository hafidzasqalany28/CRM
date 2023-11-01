@extends('adminlte::page')

@section('content_header')
<h1 class="m-3">Product Detail</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <img src="{{ asset($product->image) }}" alt="Product Image" class="card-img-top">
        </div>
    </div>
    <div class="col-md-6">
        <div class="card p-4">
            <div class="card-body">
                <h3 class="card-title text-primary">{{ $product->name }}</h3>
                <p class="card-text">{{ $product->description }}</p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item bg-light">
                        <strong>Price:</strong> Rp {{ number_format($product->price, 0) }}
                    </li>
                    <li class="list-group-item bg-light">
                        <strong>Stock:</strong> {{ $product->stock }} pieces available
                    </li>
                </ul>
                @if ($product->promo)
                <div class="mt-3">
                    <h5 class="card-title text-success">Promo Details</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item bg-light">
                            <strong>Promo Description:</strong> {{ $product->promo->description }}
                        </li>
                        <li class="list-group-item bg-light">
                            <strong>Discount:</strong> {{ $product->promo->discount }}%
                        </li>
                        <li class="list-group-item bg-light">
                            <strong>Valid Until:</strong> {{ $product->promo->end_date }}
                        </li>
                    </ul>
                </div>
                @else
                <p class="text-muted mt-3">No active promo at the moment.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection