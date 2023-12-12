@extends('adminlte::page')

@section('title', 'Admin - Daftar Promosi')

@section('content_header')
<h1>Daftar Promosi</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Daftar Semua Promosi</h3>
    </div>
    <div class="card-body">
        <a href="{{ route('admin.promos.create') }}" class="btn btn-primary mb-3">Tambah Promosi</a>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Produk</th>
                        <th>Penjual</th>
                        <th>Diskon (%)</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($promos as $promo)
                    <tr>
                        <td>{{ $promo->id }}</td>
                        <td>{{ $promo->name }}</td>
                        <td>{{ $promo->product->name }}</td>
                        <td>{{ $promo->seller->name }}</td>
                        <td>{{ $promo->discount }} %</td>
                        <td>
                            <a href="{{ route('admin.promos.show', $promo->id) }}" class="btn btn-info">Tampil</a>
                            <a href="{{ route('admin.promos.edit', $promo->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.promos.destroy', $promo->id) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Anda yakin ingin menghapus promosi ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop