@extends('adminlte::page')

@section('title', 'Daftar Promosi')

@section('content_header')
<h1>Daftar Promosi</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Daftar Promosi</h3>
        <a href="{{ route('seller.input-promo.create') }}" class="btn btn-success float-right">Tambah Promosi</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Berakhir</th>
                        <th>Discount (%)</th>
                        <th>Produk Terkait</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($promotions as $promotion)
                    <tr>
                        <td>{{ $promotion->id }}</td>
                        <td>{{ $promotion->name }}</td>
                        <td>{{ $promotion->description }}</td>
                        <td>{{ $promotion->start_date }}</td>
                        <td>{{ $promotion->end_date }}</td>
                        <td>{{ $promotion->discount }}</td>
                        <td>{{ $promotion->product->name }}</td>
                        <td>
                            <a href="{{ route('seller.input-promo.edit', ['input_promo' => $promotion]) }}"
                                class="btn btn-primary btn-action">Edit</a>
                            <form action="{{ route('seller.input-promo.destroy', ['input_promo' => $promotion->id]) }}"
                                method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-action"
                                    onclick="return confirm('Are you sure you want to delete this promotion?')">Hapus</button>
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