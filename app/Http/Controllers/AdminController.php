<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'total_revenue' => Order::where('payment_status', 'paid')->sum('total'),
            'orders_today' => Order::whereDate('created_at', today())->count(),
            'new_customers' => User::where('role', 'customer')->whereDate('created_at', today())->count(),
            'total_products' => Product::where('is_active', true)->count(),
        ];

        $recentOrders = Order::with('user')->latest()->limit(5)->get();

        return view('admin.dashboard', compact('stats', 'recentOrders'));
    }

    public function products()
    {
        $products = Product::with('category')->latest()->paginate(15);
        $categories = \App\Models\Category::where('is_active', true)->get();
        return view('admin.products.index', compact('products', 'categories'));
    }

    public function orders()
    {
        $orders = Order::with('user')->latest()->paginate(15);
        return view('admin.orders.index', compact('orders'));
    }

    public function updateOrderStatus(Request $request, Order $order)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,processing,shipped,delivered,cancelled',
        ]);

        $order->update(['status' => $validated['status']]);

        return back()->with('success', 'Order status updated!');
    }

    public function customers()
    {
        $customers = User::where('role', 'customer')->latest()->paginate(15);
        return view('admin.customers.index', compact('customers'));
    }

    public function showOrder(Order $order)
    {
        return view('admin.orders.show', compact('order'));
    }
}