@extends('adminlte::page')

@section('title', 'Admin - Tambah Pengguna')

@section('content_header')
<h1>Tambah Pengguna Baru</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Form Tambah Pengguna</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nama Pengguna</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Nama Pengguna">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="password">Kata Sandi</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Kata Sandi">
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <select name="role" class="form-control" id="role">
                    <option value="admin">admin</option>
                    <option value="buyer">buyer</option>
                    <option value="seller">seller</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@stop