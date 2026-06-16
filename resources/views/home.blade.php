@extends('layouts.app')
@section('title', 'Welcome to OnlMart')
@section('content')
<div class="hero-banner text-center py-5 mb-4 bg-primary text-white rounded">
    <div class="container">
        <h1 class="display-4 fw-bold">Welcome to OnlMart</h1>
        <p class="lead">Your trusted online shopping destination for Nepal</p>
        <a href="{{ route('products.index') }}" class="btn btn-light btn-lg">Shop Now</a>
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-4">
        <div class="card text-center">
            <div class="card-body">
                <i class="bi bi-truck display-4 text-primary"></i>
                <h5 class="card-title mt-3">Free Delivery</h5>
                <p class="card-text">Free delivery on orders over Rs. 1000</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-center">
            <div class="card-body">
                <i class="bi bi-credit-card display-4 text-accent"></i>
                <h5 class="card-title mt-3">Secure Payment</h5>
                <p class="card-text">Pay with eSewa or Cash on Delivery</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-center">
            <div class="card-body">
                <i class="bi bi-arrow-return-left display-4 text-success"></i>
                <h5 class="card-title mt-3">Easy Returns</h5>
                <p class="card-text">30-day easy return policy</p>
            </div>
        </div>
    </div>
</div>

<h2 class="mb-4">Featured Products</h2>
<div class="row">
    @for($i = 1; $i <= 4; $i++)
    <div class="col-md-3 mb-4">
        <div class="card h-100">
            <img src="https://placehold.co/300x200?text=Product+{{ $i }}" class="card-img-top" alt="Product">
            <div class="card-body">
                <h5 class="card-title">Product {{ $i }}</h5>
                <p class="card-text text-accent fw-bold">Rs. {{ rand(500, 2000) }}</p>
                <a href="{{ route('products.show', 'product-'.$i) }}" class="btn btn-primary w-100">View Details</a>
            </div>
        </div>
    </div>
    @endfor
</div>
@endsection