@extends('layouts.app')
@section('title', 'Wishlist - OnlMart')
@section('content')
<h2 class="mb-4">My Wishlist</h2>

<div class="row">
    @for($i = 1; $i <= 4; $i++)
    <div class="col-md-3 mb-4">
        <div class="card h-100">
            <img src="https://placehold.co/300x200?text=Wishlist+{{ $i }}" class="card-img-top" alt="Product">
            <div class="card-body">
                <h5 class="card-title">Product {{ $i }}</h5>
                <p class="card-text text-accent fw-bold">Rs. {{ rand(500, 2000) }}</p>
                <div class="d-grid gap-2">
                    <button class="btn btn-primary btn-sm"><i class="bi bi-cart-plus"></i> Add to Cart</button>
                    <button class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i> Remove</button>
                </div>
            </div>
        </div>
    </div>
    @endfor
</div>
@endsection