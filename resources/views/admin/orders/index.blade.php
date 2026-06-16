@extends('layouts.app')
@section('title', 'Orders - Admin')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Manage Orders</h2>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="6" class="text-center">No orders found.</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection