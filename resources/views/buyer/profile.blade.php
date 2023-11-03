@extends('adminlte::page')

@section('title', 'Buyer Profile')

@section('content_header')
<h1>Buyer Profile</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card card-primary">
            <div class="card-body text-center d-flex flex-column align-items-center">
                <i class="fas fa-user-circle fa-7x mb-3 text-primary"></i>
                <h4 class="card-title">{{ $user->name }}</h4>
                <p class="card-text">{{ $user->email }}</p>
                <div class="mt-4">
                    <a href="#" class="btn btn-primary">Edit Profile</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Profile Information</h4>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <strong>Role:</strong> {{ $user->role }}
                    </li>
                    <li class="list-group-item">
                        <strong>Joined Since:</strong>
                        {{ $user->created_at ? $user->created_at->format('F d, Y') : 'Not available' }}
                    </li>
                </ul>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">User Statistics</h4>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <strong>Total Orders:</strong> {{ $user->orders->count() }}
                    </li>
                    <li class="list-group-item">
                        <strong>Average Order Amount:</strong>
                        Rp {{ number_format($user->orders->avg('total_price'), 0) }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@stop