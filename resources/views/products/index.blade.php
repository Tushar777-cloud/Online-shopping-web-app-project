@extends('layouts.app')
@section('title', 'Products - OnlMart')
@section('content')
<div class="row">
    <div class="col-lg-3">
        <div class="card mb-4">
            <div class="card-header">Filters</div>
            <div class="card-body">
                <h6>Categories</h6>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-decoration-none">Electronics</a></li>
                    <li><a href="#" class="text-decoration-none">Clothing</a></li>
                    <li><a href="#" class="text-decoration-none">Home & Garden</a></li>
                </ul>
                <h6 class="mt-3">Price Range</h6>
                <input type="range" class="form-range" min="0" max="5000" step="100">
            </div>
        </div>
    </div>
    <div class="col-lg-9">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4>Products</h4>
            <div>
                <select class="form-select">
                    <option>Sort by: Newest</option>
                    <option>Price: Low to High</option>
                    <option>Price: High to Low</option>
                    <option>Rating</option>
                </select>
            </div>
        </div>

        <div class="row">
            @for($i = 1; $i <= 8; $i++)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="https://placehold.co/300x200?text=Product+{{ $i }}" class="card-img-top" alt="Product">
                    <div class="card-body">
                        <h5 class="card-title">Product {{ $i }}</h5>
                        <div class="mb-2">
                            <span class="text-warning">
                                @for($s = 1; $s <= 5; $s++)
                                    <i class="bi bi-star{{ $s <= 4 ? '-fill' : '' }}"></i>
                                @endfor
                            </span>
                        </div>
                        <p class="card-text fw-bold text-accent">Rs. {{ rand(500, 2000) }}</p>
                        <a href="{{ route('products.show', 'product-'.$i) }}" class="btn btn-outline-primary w-100">View Details</a>
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </div>
</div>
@endsection