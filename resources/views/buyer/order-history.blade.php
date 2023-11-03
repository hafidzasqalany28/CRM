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
                    @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->created_at->format('F d, Y H:i:s') }}</td>
                        <td>{{ $order->product->name }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>Rp {{ number_format($order->total_price, 0) }}</td>
                        <td>
                            @if ($order->status === 'pending')
                            <span class="badge badge-warning">{{ $order->status }}</span>
                            @elseif ($order->status === 'completed')
                            <span class="badge badge-success">{{ $order->status }}</span>
                            @else
                            <span class="badge badge-danger">{{ $order->status }}</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop