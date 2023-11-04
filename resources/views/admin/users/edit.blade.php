@extends('adminlte::page')

@section('title', 'Admin - Edit Pengguna')

@section('content_header')
<h1>Edit Pengguna</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Form Edit Pengguna</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nama Pengguna</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ $user->name }}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" value="{{ $user->email }}">
            </div>
            <div class="form-group">
                <label for="password">Kata Sandi (Kosongkan jika tidak ingin mengubah)</label>
                <input type="password" name="password" class="form-control" id="password">
            </div>
            <button type="submit" class="btn btn-warning">Update</button>
        </form>
    </div>
</div>
@stop