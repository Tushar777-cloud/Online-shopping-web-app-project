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
        <div class="card mb-4">
            <div class="card-header">Account Overview</div>
            <div class="card-body">
                <p>Welcome back, {{ auth()->user()->name }}!</p>
                <p>Email: {{ auth()->user()->email }}</p>
                <p>Phone: {{ auth()->user()->phone ?? 'Not provided' }}</p>
            </div>
        </div>

        @if(auth()->user()->isCustomer())
            <div class="card">
                <div class="card-header">Become a Vendor</div>
                <div class="card-body">
                    <p>Want to sell products on OnlMart? Apply to become a vendor!</p>
                    <form method="POST" action="{{ route('dashboard.become-vendor') }}">
                        @csrf
                        <button type="submit" class="btn btn-primary">Apply to Become Vendor</button>
                    </form>
                </div>
            </div>
        @elseif(auth()->user()->isVendor())
            <div class="card">
                <div class="card-header">Vendor Panel</div>
                <div class="card-body">
                    <p>You are a vendor on OnlMart.</p>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-primary">Manage Products</a>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection