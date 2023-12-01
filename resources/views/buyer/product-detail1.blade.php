@extends('layouts.master')

@section('title', 'Product Detail')
@section('header', 'Product Detail')
@section('header-description', 'Details of the selected product')

@section('content')
<!-- Product section -->
<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <img class="img-fluid rounded" src="{{ asset($product->image) }}" alt="{{ $product->name }}" />
            </div>
            <div class="col-lg-6">
                <div class="small mb-2 text-muted">SKU: {{ $product->id }}</div>
                <h1 class="display-5 fw-bolder">{{ $product->name }}</h1>
                <div class="fs-5 mb-4">
                    @if($productPromo)
                    <span class="text-decoration-line-through text-muted">Rp {{ number_format($product->originalPrice(),
                        0, ',', '.') }}</span>
                    <span class="fw-bold">Rp {{ number_format($product->currentPrice(), 0, ',', '.') }}</span>
                    @else
                    <span class="fw-bold">Rp {{ number_format($product->originalPrice(), 0, ',', '.') }}</span>
                    @endif
                </div>
                <p class="lead mb-4">{{ $product->description }}</p>
                <div class="mt-3">
                    <p class="small mb-1 text-muted">Available Stock: {{ $product->stock }}</p>
                    <p class="small mb-1">Promotions:
                        @forelse($product->promos as $promo)
                        {{ $promo->name }} - <span class="badge bg-dark">{{ $promo->discount }}% off</span>
                        @empty
                        No promotions currently.
                        @endforelse
                    </p>
                    <p class="small mb-1">Sold by: {{ $product->seller->name }}</p>
                </div>

                <form action="{{ route('buyer.order', ['product_id' => $product->id]) }}" method="POST">
                    @csrf
                    <div class="d-flex align-items-center flex-wrap mt-4">
                        <label for="quantity" class="me-2">Quantity:</label>
                        <input class="form-control me-3" id="quantity" name="quantity" type="number" value="1" min="1"
                            style="max-width: 3rem" onchange="updateTotalPrice()">
                        <label for="totalPrice" class="me-2">Total Payment:</label>
                        <input type="text" class="form-control me-3" id="totalPayment" name="totalPrice"
                            style="max-width: 10rem" readonly
                            value="Rp {{ number_format($product->currentPrice(), 0) }}">
                        <button class="btn btn-outline-dark flex-shrink-0 mt-3 me-3" type="submit">
                            <i class="bi-cart-fill me-1"></i> Booking Now
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>

<!-- Related items section -->
<section class="py-5 bg-light">
    <div class="container px-4 px-lg-5 mt-5">
        <h2 class="fw-bolder mb-4 text-center">Related products</h2>
        <div class="row gx-4 gx-lg-5 row-cols-1 row-cols-md-2 row-cols-xl-4 justify-content-center">
            @foreach($relatedProducts as $relatedProduct)
            <div class="col mb-4">
                <div class="card h-100 position-relative">
                    <!-- Discount badge -->
                    @if($relatedProduct->isOnSale() && $relatedProduct->promos->isNotEmpty())
                    <div class="discount-badge position-absolute top-0 end-0 mt-2">
                        <span class="badge bg-dark text-white">Sale -{{ $relatedProduct->promos->first()->discount
                            }}%</span>
                    </div>
                    @endif
                    <!-- Product image -->
                    <img class="card-img-top" src="{{ asset($relatedProduct->image) }}"
                        alt="{{ $relatedProduct->name }}" />
                    <!-- Product details -->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <h5 class="fw-bolder">{{ $relatedProduct->name }}</h5>
                            <p class="text-muted mb-2">{{ $relatedProduct->description }}</p>
                            @if($relatedProduct->isOnSale())
                            <span class="text-muted text-decoration-line-through">Rp {{
                                number_format($relatedProduct->originalPrice(), 0, ',', '.') }}</span>
                            <span class="fw-bold">Rp {{ number_format($relatedProduct->currentPrice(), 0, ',', '.')
                                }}</span>
                            @else
                            <span class="fw-bold">Rp {{ number_format($relatedProduct->originalPrice(), 0, ',', '.')
                                }}</span>
                            @endif
                        </div>
                    </div>
                    <!-- Product actions -->
                    <div class="card-footer p-4 border-top-0 bg-transparent">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="mb-0 text-muted">Seller: {{ $relatedProduct->seller->name }}</p>
                            </div>
                            <a class="btn btn-outline-dark"
                                href="{{ route('buyer.product.detail', ['id' => $relatedProduct->id]) }}">View
                                details</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var quantity = document.getElementById('quantity');
        quantity.addEventListener('input', updateTotalPrice);

        // Inisialisasi total pembayaran dengan harga awal
        updateTotalPrice();
    });

    function updateTotalPrice() {
        var quantity = document.getElementById('quantity').value;
        var productPrice = {{ $product->currentPrice() }};

        console.log('Quantity:', quantity);
        console.log('Product Price:', productPrice);

        var totalPrice = quantity * productPrice;

        // Pastikan elemen dengan ID 'totalPayment' ada di HTML
        var totalPaymentElement = document.getElementById('totalPayment');
        if (totalPaymentElement) {
            totalPaymentElement.value = formatCurrency(totalPrice);
        } else {
            console.error("Element with ID 'totalPayment' not found.");
        }
    }

    function formatCurrency(value) {
        return 'Rp ' + new Intl.NumberFormat('id-ID').format(value);
    }
</script>

@endsection