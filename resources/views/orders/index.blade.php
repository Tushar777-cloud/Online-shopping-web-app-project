@extends('layouts.app')
@section('title', 'My Orders - OnlMart')
@section('content')
<h2 class="mb-4">My Orders</h2>

@if($orders->isEmpty())
    <div class="text-center py-5">
        <i class="bi bi-bag display-1 text-muted"></i>
        <p class="mt-3">No orders found. <a href="{{ route('products.index') }}">Start shopping</a></p>
    </div>
@else
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Total</th>
                            <th>Payment</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>#{{ $order->id }}</td>
                            <td>{{ $order->created_at->format('M d, Y') }}</td>
                            <td>
                                <span class="badge {{ $order->status_badge_class }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td>Rs. {{ $order->total }}</td>
                            <td>{{ strtoupper($order->payment_method) }}</td>
                            <td>
                                <a href="{{ route('orders.show', $order) }}" class="btn btn-sm btn-outline-primary">View</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $orders->links() }}
        </div>
    </div>
@endif
@endsection