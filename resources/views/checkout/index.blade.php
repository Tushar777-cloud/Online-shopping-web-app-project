@extends('layouts.app')
@section('title', 'Checkout - OnlMart')
@section('content')
<h2 class="mb-4">Checkout</h2>

@if(empty($items))
    <div class="text-center py-5">
        <i class="bi bi-cart display-1 text-muted"></i>
        <p class="mt-3">Your cart is empty. <a href="{{ route('products.index') }}">Continue shopping</a></p>
    </div>
@else
<form method="POST" action="{{ route('checkout.store') }}">
    @csrf
    <input type="hidden" name="payment_method" value="cod">

    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-header">Delivery Address</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="shipping_address[name]" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Phone Number</label>
                            <input type="tel" name="shipping_address[phone]" class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Province</label>
                        <select name="shipping_address[province]" class="form-select" required>
                            <option>Select Province</option>
                            <option>Province 1</option>
                            <option>Province 2</option>
                            <option>Province 3</option>
                            <option>Province 4</option>
                            <option>Province 5</option>
                            <option>Province 6</option>
                            <option>Province 7</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Delivery Address</label>
                        <textarea name="shipping_address[address]" class="form-control" rows="3" required></textarea>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">Payment Method</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <input type="radio" name="payment_method" id="esewa" value="esewa">
                                    <label for="esewa" class="ms-2">eSewa</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <input type="radio" name="payment_method" id="cod" value="cod" checked>
                                    <label for="cod" class="ms-2">Cash on Delivery</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">Order Items</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($items as $item)
                                <tr>
                                    <td>{{ $item['product']->name }}</td>
                                    <td>{{ $item['quantity'] }}</td>
                                    <td>Rs. {{ $item['product']->display_price }}</td>
                                    <td>Rs. {{ $item['subtotal'] }}</td>
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
                    <button type="submit" class="btn btn-primary w-100">Place Order</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endif
@endsection