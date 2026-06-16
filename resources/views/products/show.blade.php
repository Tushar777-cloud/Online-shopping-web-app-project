@extends('layouts.app')
@section('title', $product->name . ' - OnlMart')
@section('content')
<div class="row">
    <div class="col-md-6">
        <img src="{{ $product->images[0] ?? 'https://placehold.co/600x400?text=Product' }}" class="img-fluid rounded" alt="{{ $product->name }}">
    </div>
    <div class="col-md-6">
        <h2>{{ $product->name }}</h2>
        <div class="mb-2">
            <span class="text-warning">
                @for($s = 1; $s <= 5; $s++)
                    <i class="bi bi-star{{ $s <= round($product->reviews->avg('rating') ?? 0) ? '-fill' : '' }}"></i>
                @endfor
            </span>
            <span class="text-muted">({{ number_format($product->reviews->avg('rating') ?? 0, 1) }}/5)</span>
        </div>
        <p class="fs-3 fw-bold text-accent mb-3">
            Rs. {{ $product->display_price }}
            @if($product->sale_price)
                <small class="text-muted"><del>Rs. {{ $product->price }}</del></small>
            @endif
        </p>
        <p class="mb-3">{{ Str::limit($product->description, 200) }}</p>
        
        <div class="mb-3">
            <span class="badge {{ $product->is_in_stock ? 'bg-success' : 'bg-danger' }}">
                {{ $product->is_in_stock ? 'In Stock' : 'Out of Stock' }}
            </span>
        </div>

        <form method="POST" action="{{ route('cart.add', $product) }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Quantity</label>
                <input type="number" name="quantity" class="form-control" style="width: 100px;" value="1" min="1" max="{{ $product->stock }}">
            </div>
            
            @auth
                <div class="d-grid gap-2">
                    <button class="btn btn-primary btn-lg" {{ !$product->is_in_stock ? 'disabled' : '' }}>
                        <i class="bi bi-cart-plus"></i> Add to Cart
                    </button>
                    <a href="{{ route('wishlist.toggle', $product) }}" class="btn btn-outline-danger">
                        <i class="bi bi-heart"></i> Add to Wishlist
                    </a>
                </div>
            @else
                <div class="d-grid gap-2">
                    <a href="{{ route('login') }}" class="btn btn-primary btn-lg">Login to Buy</a>
                </div>
            @endauth
        </form>
    </div>
</div>

<div class="mt-5">
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#description">Description</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#reviews">Reviews ({{ $reviews->total() }})</button>
        </li>
    </ul>
    <div class="tab-content pt-3">
        <div class="tab-pane fade show active" id="description">
            <p>{{ $product->description }}</p>
        </div>
        <div class="tab-pane fade" id="reviews">
            @auth
                @if(auth()->user()->orders()->whereHas('items', function($q) use($product) {
                    $q->where('product_id', $product->id);
                })->where('status', 'delivered')->exists())
                    <form method="POST" action="{{ route('reviews.store', $product) }}" class="mb-4">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Rating</label>
                            <select name="rating" class="form-select" style="width: 100px;">
                                @for($i = 5; $i >= 1; $i--)
                                    <option value="{{ $i }}">{{ $i }} Star{{ $i > 1 ? 's' : '' }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="mb-3">
                            <textarea name="comment" class="form-control" rows="3" placeholder="Your review..."></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Review</button>
                    </form>
                @endif
            @endauth

            @foreach($reviews as $review)
                <div class="border-bottom pb-3 mb-3">
                    <div class="d-flex justify-content-between">
                        <strong>{{ $review->user->name }}</strong>
                        <span class="text-warning">
                            @for($s = 1; $s <= 5; $s++)
                                <i class="bi bi-star{{ $s <= $review->rating ? '-fill' : '' }}"></i>
                            @endfor
                        </span>
                    </div>
                    <p class="mb-0">{{ $review->comment }}</p>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection