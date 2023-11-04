@extends('adminlte::page')

@section('title', 'Admin - Detail Pengguna')

@section('content_header')
<h1>Detail Pengguna</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Detail Pengguna</h3>
    </div>
    <div class="card-body">
        <p><strong>ID:</strong> {{ $user->id }}</p>
        <p><strong>Nama:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
    </div>
</div>
@stop