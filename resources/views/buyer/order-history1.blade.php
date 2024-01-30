@extends('layouts.master')

@section('title', 'Riwayat Pesanan')
@section('header', 'Riwayat Pesanan')
@section('header-description', 'Jelajahi riwayat pesanan ubi jalar Anda')

@section('content')
<section class="py-5">
    <div class="container">
        <h2 class="fw-bolder mb-4">Riwayat Pesanan Anda</h2>
        @if($orders->isEmpty())
        <p class="text-muted">Anda tidak memiliki riwayat pesanan.</p>
        @else
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="border-0">ID Pesanan</th>
                        <th class="border-0">Produk</th>
                        <th class="border-0">Kuantitas</th>
                        <th class="border-0">Total Harga</th>
                        <th class="border-0">Status</th>
                        <th class="border-0">Tanggal Pesan</th>
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