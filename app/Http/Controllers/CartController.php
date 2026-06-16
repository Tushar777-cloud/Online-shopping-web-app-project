<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $cart = Session::get('cart', []);
        $items = [];
        $total = 0;

        foreach ($cart as $productId => $quantity) {
            $product = Product::find($productId);
            if ($product) {
                $items[] = [
                    'product' => $product,
                    'quantity' => $quantity,
                    'subtotal' => $product->display_price * $quantity
                ];
                $total += $product->display_price * $quantity;
            }
        }

        return view('cart.index', compact('items', 'total'));
    }

    public function add(Request $request, Product $product)
    {
        $request->validate(['quantity' => 'required|integer|min:1|max:' . $product->stock]);

        $cart = Session::get('cart', []);
        $cart[$product->id] = ($cart[$product->id] ?? 0) + $request->quantity;
        Session::put('cart', $cart);

        return back()->with('success', 'Product added to cart!');
    }

    public function update(Request $request, Product $product)
    {
        $request->validate(['quantity' => 'required|integer|min:1|max:' . $product->stock]);

        $cart = Session::get('cart', []);
        $cart[$product->id] = $request->quantity;
        Session::put('cart', $cart);

        return back()->with('success', 'Cart updated!');
    }

    public function remove(Product $product)
    {
        $cart = Session::get('cart', []);
        unset($cart[$product->id]);
        Session::put('cart', $cart);

        return back()->with('success', 'Product removed from cart!');
    }
}