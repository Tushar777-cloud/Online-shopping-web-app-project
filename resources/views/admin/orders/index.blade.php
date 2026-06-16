@extends('layouts.app')
@section('title', 'Manage Orders - Admin')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Manage Orders</h2>
</div>

<div class="card">
    <div class="card-body">
        @if($orders->isEmpty())
            <p>No orders found.</p>
        @else
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Payment</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>#{{ $order->id }}</td>
                            <td>{{ $order->user->name }}</td>
                            <td>{{ $order->created_at->format('M d, Y') }}</td>
                            <td>
                                <form method="POST" action="{{ route('admin.orders.update-status', $order) }}" class="d-inline">
                                    @csrf @method('PATCH')
                                    <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                                        @foreach(['pending', 'processing', 'shipped', 'delivered', 'cancelled'] as $status)
                                            <option value="{{ $status }}" {{ $order->status === $status ? 'selected' : '' }}>
                                                {{ ucfirst($status) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </form>
                            </td>
                            <td>{{ strtoupper($order->payment_method) }}</td>
                            <td>Rs. {{ $order->total }}</td>
                            <td>
                                <a href="{{ route('admin.orders.show', $order) }}" class="btn btn-sm btn-outline-primary">View</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $orders->links() }}
        @endif
    </div>
</div>
@endsection