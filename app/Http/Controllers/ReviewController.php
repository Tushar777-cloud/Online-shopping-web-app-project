<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request, Product $product)
    {
        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        $user = auth()->user();

        $existingReview = $product->reviews()->where('user_id', $user->id)->first();
        if ($existingReview) {
            return back()->with('error', 'You have already reviewed this product!');
        }

        $hasOrdered = $user->orders()->whereHas('items', function ($query) use ($product) {
            $query->where('product_id', $product->id);
        })->where('status', 'delivered')->exists();

        if (!$hasOrdered) {
            return back()->with('error', 'You can only review products you have purchased!');
        }

        $product->reviews()->create([
            'user_id' => $user->id,
            'rating' => $validated['rating'],
            'comment' => $validated['comment'],
            'is_approved' => true,
        ]);

        return back()->with('success', 'Review submitted successfully!');
    }
}