<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = auth()->user()->wishlists()->with('product')->get();
        return view('wishlist.index', compact('wishlist'));
    }

    public function toggle(Product $product)
    {
        $wishlist = auth()->user()->wishlists()->where('product_id', $product->id)->first();

        if ($wishlist) {
            $wishlist->delete();
            return back()->with('success', 'Product removed from wishlist!');
        }

        auth()->user()->wishlists()->create(['product_id' => $product->id]);
        return back()->with('success', 'Product added to wishlist!');
    }

    public function add(Product $product)
    {
        auth()->user()->wishlists()->firstOrCreate(['product_id' => $product->id]);
        return back()->with('success', 'Product added to wishlist!');
    }
}