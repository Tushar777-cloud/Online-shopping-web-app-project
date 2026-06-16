@extends('layouts.app')
@section('title', 'Shopping Cart - OnlMart')
@section('content')
<h2 class="mb-4">Shopping Cart</h2>

@if(empty($items))
    <div class="text-center py-5">
        <i class="bi bi-cart display-1 text-muted"></i>
        <p class="mt-3">Your cart is empty. <a href="{{ route('products.index') }}">Continue shopping</a></p>
    </div>
@else
    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Subtotal</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($items as $item)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ $item['product']->images[0] ?? 'https://placehold.co/80x80?text=Product' }}" class="rounded me-3" width="80" alt="{{ $item['product']->name }}">
                                            <span>{{ $item['product']->name }}</span>
                                        </div>
                                    </td>
                                    <td>Rs. {{ $item['product']->display_price }}</td>
                                    <td>
                                        <form method="POST" action="{{ route('cart.update', $item['product']) }}" class="d-inline">
                                            @csrf
                                            <input type="number" name="quantity" class="form-control" style="width: 80px;" value="{{ $item['quantity'] }}" min="1" max="{{ $item['product']->stock }}" onchange="this.form.submit()">
                                        </form>
                                    </td>
                                    <td>Rs. {{ $item['subtotal'] }}</td>
                                    <td>
                                        <form method="POST" action="{{ route('cart.remove', $item['product']) }}" class="d-inline">
                                            @csrf
                                            <button class="btn btn-sm btn-outline-danger" type="submit">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">Order Summary</div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-2">
                        <span>Subtotal</span>
                        <span>Rs. {{ $total }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Delivery Fee</span>
                        <span>Rs. 100</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between mb-3">
                        <strong>Total</strong>
                        <strong>Rs. {{ $total + 100 }}</strong>
                    </div>
                    <a href="{{ route('checkout.index') }}" class="btn btn-primary w-100">Proceed to Checkout</a>
                </div>
            </div>
        </div>
    </div>
@endif
@endsection