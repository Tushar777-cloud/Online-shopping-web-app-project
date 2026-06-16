@extends('layouts.app')
@section('title', 'Dashboard - OnlMart')
@section('content')
<h2 class="mb-4">My Account</h2>

<div class="row">
    <div class="col-md-3">
        <div class="list-group">
            <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action active">Dashboard</a>
            <a href="{{ route('orders.index') }}" class="list-group-item list-group-item-action">My Orders</a>
            <a href="{{ route('wishlist.index') }}" class="list-group-item list-group-item-action">Wishlist</a>
            <a href="#" class="list-group-item list-group-item-action">Profile</a>
            <a href="#" class="list-group-item list-group-item-action">Change Password</a>
        </div>
    </div>
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">Account Overview</div>
            <div class="card-body">
                <p>Welcome back, {{ auth()->user()->name }}!</p>
                <p>Email: {{ auth()->user()->email }}</p>
                <p>Phone: {{ auth()->user()->phone ?? 'Not provided' }}</p>
            </div>
        </div>
    </div>
</div>
@endsection