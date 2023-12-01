@extends('layouts.master')

@section('title', 'Sweet Potato Orders')
@section('header', 'Order History')
@section('header-description', 'Explore your history of sweet potato orders')

@section('content')
<section class="py-5">
    <div class="container">
        <h2 class="fw-bolder mb-4">Your Order History</h2>
        @if($orders->isEmpty())
        <p class="text-muted">You have no order history.</p>
        @else
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="border-0">Order ID</th>
                        <th class="border-0">Product</th>
                        <th class="border-0">Quantity</th>
                        <th class="border-0">Total Price</th>
                        <th class="border-0">Status</th>
                        <th class="border-0">Order Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td class="align-middle">{{ $order->id }}</td>
                        <td class="align-middle">{{ $order->product->name }}</td>
                        <td class="align-middle">{{ $order->quantity }}</td>
                        <td class="align-middle">
                            <span class="d-inline-block" style="white-space: nowrap;">Rp {{
                                number_format($order->total_price, 0, ',', '.') }}</span>
                        </td>
                        <td class="align-middle">{{ $order->status }}</td>
                        <td class="align-middle">{{ $order->created_at->format('Y-m-d H:i:s') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
</section>
@endsection