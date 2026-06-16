@extends('layouts.app')
@section('title', 'Product Details - OnlMart')
@section('content')
<div class="row">
    <div class="col-md-6">
        <img src="https://placehold.co/600x400?text=Product+Image" class="img-fluid rounded" alt="Product">
    </div>
    <div class="col-md-6">
        <h2>Product Name</h2>
        <div class="mb-2">
            <span class="text-warning">
                @for($s = 1; $s <= 5; $s++)
                    <i class="bi bi-star{{ $s <= 4 ? '-fill' : '' }}"></i>
                @endfor
            </span>
            <span class="text-muted">(4.0/5)</span>
        </div>
        <p class="fs-3 fw-bold text-accent mb-3">Rs. 999</p>
        <p class="mb-3">Product description goes here. This is a sample product description for demonstration purposes.</p>
        
        <div class="mb-3">
            <label class="form-label">Quantity</label>
            <input type="number" class="form-control" style="width: 100px;" value="1" min="1" max="10">
        </div>

        <div class="d-grid gap-2">
            <button class="btn btn-primary btn-lg"><i class="bi bi-cart-plus"></i> Add to Cart</button>
            <button class="btn btn-outline-danger"><i class="bi bi-heart"></i> Add to Wishlist</button>
        </div>
    </div>
</div>

<div class="mt-5">
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#description">Description</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#reviews">Reviews</button>
        </li>
    </ul>
    <div class="tab-content pt-3">
        <div class="tab-pane fade show active" id="description">
            <p>Detailed product description content goes here...</p>
        </div>
        <div class="tab-pane fade" id="reviews">
            <p>Reviews will be displayed here...</p>
        </div>
    </div>
</div>
@endsection