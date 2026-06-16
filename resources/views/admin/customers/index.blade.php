@extends('layouts.app')
@section('title', 'Customers - Admin')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Manage Customers</h2>
</div>

<div class="card">
    <div class="card-body">
        @if($customers->isEmpty())
            <p>No customers found.</p>
        @else
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Orders</th>
                            <th>Joined</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($customers as $customer)
                        <tr>
                            <td>{{ $customer->id }}</td>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->phone ?? '-' }}</td>
                            <td>{{ $customer->orders()->count() }}</td>
                            <td>{{ $customer->created_at->format('M d, Y') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $customers->links() }}
        @endif
    </div>
</div>
@endsection