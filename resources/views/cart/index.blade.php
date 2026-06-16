@extends('layouts.app')
@section('title', 'Shopping Cart - OnlMart')
@section('content')
<h2 class="mb-4">Shopping Cart</h2>

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
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="https://placehold.co/80x80?text=Product" class="rounded me-3" alt="Product">
                                        <span>Product Name</span>
                                    </div>
                                </td>
                                <td>Rs. 999</td>
                                <td><input type="number" class="form-control" style="width: 80px;" value="1"></td>
                                <td>Rs. 999</td>
                                <td><button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button></td>
                            </tr>
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
                    <span>Rs. 999</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span>Delivery Fee</span>
                    <span>Rs. 100</span>
                </div>
                <hr>
                <div class="d-flex justify-content-between mb-3">
                    <strong>Total</strong>
                    <strong>Rs. 1099</strong>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Coupon code">
                    <button class="btn btn-outline-secondary w-100 mt-2">Apply Coupon</button>
                </div>
                <a href="{{ route('checkout.index') }}" class="btn btn-primary w-100">Proceed to Checkout</a>
            </div>
        </div>
    </div>
</div>
@endsection