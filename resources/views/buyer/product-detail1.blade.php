@extends('layouts.master')

@section('title', 'Detail Produk')
@section('header', 'Detail Produk')
@section('header-description', 'Detail produk yang dipilih')

@section('content')
<!-- Bagian produk -->
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
                    <p class="small mb-1 text-muted">Stok Tersedia: {{ $product->stock }}</p>
                    <p class="small mb-1">Promosi:
                        @forelse($product->promos as $promo)
                        {{ $promo->name }} - <span class="badge bg-dark">{{ $promo->discount }}% off</span>
                        @empty
                        Tidak ada promosi saat ini.
                        @endforelse
                    </p>
                    <p class="small mb-1">Dijual oleh: {{ $product->seller->name }}</p>
                </div>

                <form action="{{ route('buyer.order', ['product_id' => $product->id]) }}" method="POST">
                    @csrf
                    <div class="row align-items-center mt-4">
                        <div class="col-md-4 col-12 mb-3">
                            <label for="quantity" class="form-label">Kuantitas:</label>
                            <div class="input-group">
                                <button class="btn btn-outline-dark" type="button"
                                    onclick="decreaseQuantity()">-</button>
                                <input class="form-control" id="quantity" name="quantity" type="number" value="1"
                                    min="1" style="max-width: 3rem" onchange="updateTotalPrice()">
                                <button class="btn btn-outline-dark" type="button"
                                    onclick="increaseQuantity()">+</button>
                            </div>
                        </div>
                        <div class="col-md-4 col-12 mb-3">
                            <label for="totalPrice" class="form-label">Total Pembayaran:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="totalPayment" name="totalPrice"
                                    style="max-width: 10rem" readonly
                                    value="Rp {{ number_format($product->currentPrice(), 0) }}">
                            </div>
                        </div>
                        <div class="col-md-4 col-12 ">
                            <button class="btn btn-outline-dark mt-3" type="submit"><i class="bi-cart-fill me-1"></i>
                                Pesan Sekarang</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>

<!-- Bagian produk terkait -->
<section class="py-5 bg-light">
    <div class="container px-4 px-lg-5 mt-5">
        <h2 class="fw-bolder mb-4 text-center">Produk Terkait</h2>
        <div class="row gx-4 gx-lg-5 row-cols-1 row-cols-md-2 row-cols-xl-4 justify-content-center">
            @foreach($relatedProducts as $relatedProduct)
            <div class="col mb-4">
                <div class="card h-100 position-relative border-0 shadow animate__animated animate__fadeIn">
                    <!-- Badge diskon -->
                    @if($relatedProduct->isOnSale() && $relatedProduct->promos->isNotEmpty())
                    <div class="badge bg-danger position-absolute top-0 end-0 mt-2">Diskon -{{
                        $relatedProduct->promos->first()->discount }}%</div>
                    @endif
                    <!-- Gambar produk -->
                    <img class="card-img-top" src="{{ asset($relatedProduct->image) }}"
                        alt="{{ $relatedProduct->name }}" />
                    <!-- Detail produk -->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <h5 class="fw-bolder">{{ $relatedProduct->name }}</h5>
                            <p class="text-muted mb-2">{{ $relatedProduct->description }}</p>
                            @if($relatedProduct->isOnSale())
                            <span class="text-muted text-decoration-line-through">Rp {{
                                number_format($relatedProduct->originalPrice(), 0, ',', '.') }}</span>
                            <span class="fw-bold text-danger ms-2">Rp {{ number_format($relatedProduct->currentPrice(),
                                0, ',', '.') }}</span>
                            @else
                            <span class="fw-bold">Rp {{ number_format($relatedProduct->originalPrice(), 0, ',', '.')
                                }}</span>
                            @endif
                        </div>
                    </div>
                    <!-- Aksi produk -->
                    <div class="card-footer p-4 border-top-0 bg-transparent">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="mb-0 text-muted">Penjual: {{ $relatedProduct->seller->name }}</p>
                            </div>
                            <a class="btn btn-outline-dark"
                                href="{{ route('buyer.product.detail', ['id' => $relatedProduct->id]) }}">Lihat
                                detail</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>



<script>
    function increaseQuantity() {
        var quantityInput = document.getElementById('quantity');
        quantityInput.value = parseInt(quantityInput.value) + 1;
        updateTotalPrice();
    }

    function decreaseQuantity() {
        var quantityInput = document.getElementById('quantity');
        if (parseInt(quantityInput.value) > 1) {
            quantityInput.value = parseInt(quantityInput.value) - 1;
            updateTotalPrice();
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        var quantity = document.getElementById('quantity');
        quantity.addEventListener('input', updateTotalPrice);

       
        updateTotalPrice();
    });

    function updateTotalPrice() {
        var quantity = document.getElementById('quantity').value;
        var productPrice = {{ $product->currentPrice() }};

        console.log('Quantity:', quantity);
        console.log('Product Price:', productPrice);

        var totalPrice = quantity * productPrice;

       
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