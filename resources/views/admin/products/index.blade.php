@extends('layouts.app')
@section('title', 'Products - Admin')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Manage Products</h2>
    <a href="#" class="btn btn-primary"><i class="bi bi-plus"></i> Add Product</a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="6" class="text-center">No products found.</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection