@extends('layouts.app')
@section('title', 'Checkout - OnlMart')
@section('content')
<h2 class="mb-4">Checkout</h2>

<div class="row">
    <div class="col-lg-8">
        <div class="card mb-4">
            <div class="card-header">Delivery Address</div>
            <div class="card-body">
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Province</label>
                        <select class="form-select" required>
                            <option>Select Province</option>
                            <option>Province 1</option>
                            <option>Province 2</option>
                            <option>Province 3</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Delivery Address</label>
                        <textarea class="form-control" rows="3" required></textarea>
                    </div>
                </form>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">Payment Method</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <input type="radio" name="payment" id="esewa" checked>
                                <label for="esewa" class="ms-2">eSewa</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <input type="radio" name="payment" id="cod">
                                <label for="cod" class="ms-2">Cash on Delivery</label>
                            </div>
                        </div>
                    </div>
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
                <button class="btn btn-primary w-100">Place Order</button>
            </div>
        </div>
    </div>
</div>
@endsection