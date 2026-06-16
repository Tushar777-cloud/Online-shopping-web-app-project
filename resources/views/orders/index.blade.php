@extends('layouts.app')
@section('title', 'My Orders - OnlMart')
@section('content')
<h2 class="mb-4">My Orders</h2>

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
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @for($i = 1; $i <= 3; $i++)
                    <tr>
                        <td>#ORD-{{ rand(1000, 9999) }}</td>
                        <td>{{ now()->subDays($i)->format('M d, Y') }}</td>
                        <td><span class="badge bg-warning">Pending</span></td>
                        <td>Rs. {{ rand(1000, 5000) }}</td>
                        <td><a href="#" class="btn btn-sm btn-outline-primary">View</a></td>
                    </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection