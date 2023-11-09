@extends('adminlte::page')

@section('content_header')
<h1>Order History</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Order Date</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->created_at->format('F d, Y H:i:s') }}</td>
                        <td>{{ $order->product->name }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>Rp {{ number_format($order->total_price, 0) }}</td>
                        <td>
                            @php
                            $badgeClass = [
                            'pending' => 'warning',
                            'completed' => 'success',
                            'canceled' => 'danger',
                            ][$order->status];
                            @endphp
                            <span class="badge badge-{{ $badgeClass }}">{{ ucfirst($order->status) }}</span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">No order history available.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop