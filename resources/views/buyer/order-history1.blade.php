@extends('layouts.master')

@section('title', 'Order History')
@section('header', 'Order History')
@section('header-description', 'Your order history')

@section('content')
<div class="content">
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <h2 class="fw-bolder mb-4">Your Order History</h2>
            @if($orders->isEmpty())
            <p class="text-muted">You have no order history.</p>
            @else
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th>Order Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->product->name }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                            <td>{{ $order->status }}</td>
                            <td>{{ $order->created_at->format('Y-m-d H:i:s') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>
    </section>
</div>
@endsection