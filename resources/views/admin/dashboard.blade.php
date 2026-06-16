@extends('layouts.app')
@section('title', 'Admin Dashboard - OnlMart')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Admin Dashboard</h2>
</div>

<div class="row">
    <div class="col-md-3 mb-4">
        <div class="card bg-primary text-white">
            <div class="card-body">
                <h5 class="card-title">Total Revenue</h5>
                <h2 class="mb-0">Rs. 0</h2>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card bg-success text-white">
            <div class="card-body">
                <h5 class="card-title">Orders Today</h5>
                <h2 class="mb-0">0</h2>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card bg-info text-white">
            <div class="card-body">
                <h5 class="card-title">New Customers</h5>
                <h2 class="mb-0">0</h2>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card bg-warning text-white">
            <div class="card-body">
                <h5 class="card-title">Products</h5>
                <h2 class="mb-0">0</h2>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Recent Orders</div>
            <div class="card-body">
                <p>No orders found.</p>
            </div>
        </div>
    </div>
</div>
@endsection