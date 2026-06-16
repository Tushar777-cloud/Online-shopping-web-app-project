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
                    @foreach($categories as $category)
                        <li>
                            <a href="{{ route('products.index', ['category' => $category->id]) }}" class="text-decoration-none">
                                {{ $category->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
                <h6 class="mt-3">Price Range</h6>
                <form method="GET" class="d-flex gap-2">
                    <input type="number" name="min_price" class="form-control form-control-sm" placeholder="Min" value="{{ request('min_price') }}">
                    <input type="number" name="max_price" class="form-control form-control-sm" placeholder="Max" value="{{ request('max_price') }}">
                    <button type="submit" class="btn btn-sm btn-primary"><i class="bi bi-search"></i></button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-9">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4>Products ({{ $products->total() }})</h4>
            <form method="GET" class="d-flex align-items-center">
                <select name="sort" class="form-select" onchange="this.form.submit()">
                    <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Sort: Newest</option>
                    <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Price: Low to High</option>
                    <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Price: High to Low</option>
                </select>
                <input type="text" name="search" class="form-control ms-2" placeholder="Search..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary ms-2"><i class="bi bi-search"></i></button>
            </form>
        </div>

        @if($products->isEmpty())
            <div class="text-center py-5">
                <i class="bi bi-bag display-1 text-muted"></i>
                <p class="mt-3">No products found.</p>
            </div>
        @else
            <div class="row">
                @foreach($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="{{ $product->images[0] ?? 'https://placehold.co/300x200?text=Product' }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <div class="mb-2">
                                <span class="text-warning">
                                    @for($s = 1; $s <= 5; $s++)
                                        <i class="bi bi-star{{ $s <= round($product->reviews->avg('rating') ?? 0) ? '-fill' : '' }}"></i>
                                    @endfor
                                </span>
                            </div>
                            <p class="card-text fw-bold text-accent">
                                Rs. {{ $product->display_price }}
                                @if($product->sale_price)
                                    <small class="text-muted"><del>Rs. {{ $product->price }}</del></small>
                                @endif
                            </p>
                            <a href="{{ route('products.show', $product->slug) }}" class="btn btn-outline-primary w-100">View Details</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            {{ $products->links() }}
        @endif
    </div>
</div>
@endsection