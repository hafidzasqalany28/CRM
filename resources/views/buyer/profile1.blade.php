@extends('layouts.master')

@section('title', 'Profil Saya')
@section('header', 'Profil Saya')
@section('header-description', 'Informasi profil Anda')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-lg-3">
                <div class="mb-3">
                    <img src="{{ asset('assets/user.png') }}" alt="Gambar Profil" class="img-fluid rounded-circle"
                        style="width: 150px;">
                </div>
                <h4 class="fw-bolder">{{ $user->name }}</h4>
                <p class="text-muted">{{ $user->email }}</p>
            </div>
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Informasi Pribadi</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>Nama Lengkap</span>
                                <span>{{ $user->name }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>Email</span>
                                <span>{{ $user->email }}</span>
                            </li>
                            <!-- Tambahkan lebih banyak bidang informasi pribadi sesuai kebutuhan -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection