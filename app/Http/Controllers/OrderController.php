<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'payment_method' => 'required|in:esewa,cod',
            'shipping_address.name' => 'required|string',
            'shipping_address.phone' => 'required|string',
            'shipping_address.province' => 'required|string',
            'shipping_address.address' => 'required|string',
        ]);

        $cart = Session::get('cart', []);
        if (empty($cart)) {
            return back()->with('error', 'Your cart is empty!');
        }

        $total = 0;
        $items = [];

        foreach ($cart as $productId => $quantity) {
            $product = Product::findOrFail($productId);
            $subtotal = $product->display_price * $quantity;
            $total += $subtotal;
            $items[] = [
                'product_id' => $product->id,
                'quantity' => $quantity,
                'unit_price' => $product->display_price,
                'subtotal' => $subtotal,
            ];
        }

        DB::transaction(function () use ($validated, $items, $total) {
            $order = auth()->user()->orders()->create([
                'status' => 'pending',
                'payment_method' => $validated['payment_method'],
                'payment_status' => $validated['payment_method'] === 'cod' ? 'pending' : 'pending',
                'total' => $total,
                'shipping_address' => $validated['shipping_address'],
            ]);

            foreach ($items as $item) {
                $order->items()->create($item);
            }

            Session::forget('cart');
        });

        return redirect()->route('orders.index')->with('success', 'Order placed successfully!');
    }

    public function index()
    {
        $orders = auth()->user()->orders()->latest()->paginate(10);
        return view('orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        if ($order->user_id !== auth()->id() && !auth()->user()->isAdmin()) {
            abort(403);
        }
        return view('orders.show', compact('order'));
    }
}