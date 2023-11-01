@extends('adminlte::page')

@section('content_header')
<h1>Buyer Profile</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Profile Information</h5>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Name: {{ $user->name }}</li>
            <li class="list-group-item">Email: {{ $user->email }}</li>
            <li class="list-group-item">Role: Buyer</li>
            <li class="list-group-item">
                Joined Since: {{ $user->created_at ? $user->created_at->format('F d, Y') : 'Not available' }}
            </li>
        </ul>
    </div>
</div>
@endsection