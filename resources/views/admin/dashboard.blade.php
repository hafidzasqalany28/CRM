@extends('adminlte::page')

@section('title', 'Admin Dashboard')

@section('content_header')
<h1>Admin Dashboard</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $activeProductCount }}</h3>
                    <p>Jumlah Produk Aktif</p>
                </div>
                <div class="icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <a href="#" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $activePromoCount }}</h3>
                    <p>Jumlah Promo Aktif</p>
                </div>
                <div class="icon">
                    <i class="fas fa-tags"></i>
                </div>
                <a href="#" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $totalBuyers }}</h3>
                    <p>Jumlah Buyers</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="#" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $totalSellers }}</h3>
                    <p>Jumlah Sellers</p>
                </div>
                <div class="icon">
                    <i class="fas fa-shopping-basket"></i>
                </div>
                <a href="#" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <div class="row">
        {{-- grafik --}}
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Grafik Penjualan Seller dan Jumlah Produk Aktif</h3>
                </div>
                <div class="card-body">
                    <canvas id="combined-chart" height="200"></canvas>
                </div>
            </div>
        </div>
        <!-- Tabel Produk Terbaru -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header border-0">
                    <h3 class="card-title">Produk Terbaru</h3>
                    <div class="card-tools">
                        <a href="#" class="btn btn-tool btn-sm">
                            <i class="fas fa-download"></i>
                        </a>
                        <a href="#" class="btn btn-tool btn-sm">
                            <i class="fas fa-bars"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-striped table-valign-middle">
                        <thead>
                            <tr>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Stock Saat Ini</th>
                                <th>Seller</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($latestProducts as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                                <td>{{ $product->stock - $product->orders->sum('quantity') }}</td>
                                <td>{{ $product->seller->name }}</td>
                                <td>{{ $product->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var sellerData = @json($products);
        var sellerNames = Object.keys(sellerData);
        var sellerTotalPrices = Object.values(sellerData).map(data => data.total_prices);
        var sellerStocks = Object.values(sellerData).map(data => data.stocks);
        var productCounts = Object.values(sellerData).map(data => data.product_names.length);

        var ctx = document.getElementById('combined-chart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: sellerNames,
                datasets: [
                    {
                        label: 'Total Harga Penjualan',
                        data: sellerTotalPrices,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1,
                    },
                    {
                        label: 'Total Stok Produk',
                        data: sellerStocks,
                        backgroundColor: 'rgba(192, 75, 75, 0.2)',
                        borderColor: 'rgba(192, 75, 75, 1)',
                        borderWidth: 1,
                    },
                    {
                        label: 'Jumlah Produk Aktif',
                        data: productCounts,
                        backgroundColor: 'rgba(75, 75, 192, 0.2)',
                        borderColor: 'rgba(75, 75, 192, 1)',
                        borderWidth: 1,
                    },
                ],
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                    },
                    title: {
                        display: true,
                        text: 'Grafik Penjualan Seller dan Jumlah Produk Aktif',
                        fontSize: 16,
                    },
                },
                tooltips: {
                    callbacks: {
                        label: function (context) {
                            var label = context.dataset.label || '';
                            if (label) {
                                label += ': ';
                            }
                            label += context.parsed.y.toLocaleString('en-US', {
                                style: 'currency',
                                currency: 'USD',
                            });

                            if (context.datasetIndex === 0) {
                                label += ' (' + sellerData[context.label].total_sold + ' terjual)';
                            } else if (context.datasetIndex === 1) {
                                label += ' (' + context.parsed.y + ' produk)';
                            } else if (context.datasetIndex === 2) {
                                label += ' (' + context.parsed.y + ' produk)';
                            }

                            return label;
                        },
                    },
                },
            }
        });
</script>
@stop