@extends('layouts.app')
@section('title', 'Order #' . $order->id . ' - Admin')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Order #{{ $order->id }}</h2>
    <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-secondary">Back to Orders</a>
</div>

<div class="row">
    <div class="col-md-8">
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
                            @foreach($order->items as $item)
                            <tr>
                                <td>{{ $item->product->name ?? 'Product Deleted' }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>Rs. {{ $item->unit_price }}</td>
                                <td>Rs. {{ $item->subtotal }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card mb-4">
            <div class="card-header">Order Summary</div>
            <div class="card-body">
                <div class="d-flex justify-content-between mb-2">
                    <span>Status</span>
                    <span class="badge bg-warning">{{ ucfirst($order->status) }}</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span>Payment Method</span>
                    <span>{{ strtoupper($order->payment_method) }}</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span>Payment Status</span>
                    <span>{{ ucfirst($order->payment_status) }}</span>
                </div>
                <hr>
                <div class="d-flex justify-content-between">
                    <strong>Total</strong>
                    <strong>Rs. {{ $order->total }}</strong>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">Customer Info</div>
            <div class="card-body">
                <p><strong>Name:</strong> {{ $order->user->name }}</p>
                <p><strong>Email:</strong> {{ $order->user->email }}</p>
                <p><strong>Phone:</strong> {{ $order->user->phone ?? '-' }}</p>
            </div>
        </div>
    </div>
</div>
@endsection