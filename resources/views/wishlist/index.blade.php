@extends('layouts.app')
@section('title', 'Wishlist - OnlMart')
@section('content')
<h2 class="mb-4">My Wishlist</h2>

@if($wishlist->isEmpty())
    <div class="text-center py-5">
        <i class="bi bi-heart display-1 text-muted"></i>
        <p class="mt-3">Your wishlist is empty. <a href="{{ route('products.index') }}">Browse products</a></p>
    </div>
@else
    <div class="row">
        @foreach($wishlist as $item)
        <div class="col-md-3 mb-4">
            <div class="card h-100">
                <img src="{{ $item->product->images[0] ?? 'https://placehold.co/300x200?text=Product' }}" class="card-img-top" alt="{{ $item->product->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->product->name }}</h5>
                    <p class="card-text text-accent fw-bold">Rs. {{ $item->product->display_price }}</p>
                    <div class="d-grid gap-2">
                        <form method="POST" action="{{ route('cart.add', $item->product) }}">
                            @csrf
                            <input type="hidden" name="quantity" value="1">
                            <button class="btn btn-primary btn-sm" {{ !$item->product->is_in_stock ? 'disabled' : '' }}>
                                <i class="bi bi-cart-plus"></i> Add to Cart
                            </button>
                        </form>
                        <form method="POST" action="{{ route('wishlist.toggle', $item->product) }}">
                            @csrf
                            <button class="btn btn-outline-danger btn-sm" type="submit">
                                <i class="bi bi-trash"></i> Remove
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endif
@endsection