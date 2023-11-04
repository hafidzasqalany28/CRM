@extends('adminlte::page')

@section('content_header')
<h1 class="m-0">Dashboard Penjual</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Statistik Penjualan dan Pendapatan</h3>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="mb-0">
                            <span class="text-lg text-bold">Total Produk Terjual: {{ $totalProductsSold }}</span>
                        </p>
                        <p class="mb-0">
                            <span class="text-lg text-bold">Total Pendapatan: Rp {{ number_format($totalRevenue, 0, ',',
                                '.') }}</span>
                        </p>
                    </div>
                    <div class="position-relative mt-4">
                        <canvas id="productChart" style="height: 300px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Daftar Produk</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                                    <td>{{ $product->stock - $product->orders->sum('quantity') }}</td>
                                    <td>
                                        <a href="{{ route('seller.input-product.index') }}" class="btn btn-primary">
                                            <i class="fas fa-search"></i> Lihat Detail
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Promo Aktif</h3>
                </div>
                <div class="card-body">
                    @if(count($promos) > 0)
                    <div class="list-group">
                        @foreach($promos as $promo)
                        <div class="list-group-item">
                            <h5 class="text-success"><i class="fas fa-tag"></i> {{ $promo->name }}</h5>
                            <p class="text-muted"><i class="far fa-calendar-alt"></i> Mulai {{ $promo->start_date }} -
                                Berakhir {{ $promo->end_date }}</p>
                            <p class="text-muted"><i class="fas fa-shopping-cart"></i> Produk Terkait: {{
                                $promo->product->name }}</p>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <p class="text-center">Tidak ada promo aktif saat ini.</p>
                    @endif
                </div>
            </div>
        </div>


        <div class="col-lg-6">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title text-white">Laporan Penjualan dan Pendapatan</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nama Produk</th>
                                <th>Total Terjual</th>
                                <th>Total Pendapatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->orders->sum('quantity') }}</td>
                                <td>Rp {{ number_format($product->orders->sum(function($order) {
                                    return $order->quantity * $order->product->price;
                                    }), 0, ',', '.') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
<script>
    $(document).ready(function () {
        var productData = {!! json_encode($products) !!};

        var salesData = productData.map(function (product) {
            var totalSold = product.orders.reduce(function (total, order) {
                return total + order.quantity;
            }, 0);
            var totalRevenue = product.orders.reduce(function (total, order) {
                return total + order.quantity * product.price;
            }, 0);
            var stockAvailable = product.stock - totalSold;
            return {
                name: product.name,
                price: product.price,
                totalSold: totalSold,
                totalRevenue: totalRevenue,
                stockAvailable: stockAvailable
            };
        });

        var ctx = document.getElementById('productChart').getContext('2d');

        var productChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: salesData.map(product => product.name),
                datasets: [
                    {
                        label: 'Harga',
                        data: salesData.map(product => product.price),
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Total Terjual',
                        data: salesData.map(product => product.totalSold),
                        backgroundColor: 'rgba(192, 75, 75, 0.2)',
                        borderColor: 'rgba(192, 75, 75, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Total Pendapatan',
                        data: salesData.map(product => product.totalRevenue),
                        backgroundColor: 'rgba(75, 75, 192, 0.2)',
                        borderColor: 'rgba(75, 75, 192, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Stok Tersedia',
                        data: salesData.map(product => product.stockAvailable),
                        backgroundColor: 'rgba(192, 192, 75, 0.2)',
                        borderColor: 'rgba(192, 192, 75, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            beginAtZero: true,
                            callback: function (value, index, values) {
                                return value.toLocaleString();
                            }
                        }
                    },
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    }
                }
            }
        });
    });
</script>
@endsection
@stop