<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'price', 'sale_price', 'stock', 'category_id', 'vendor_id', 'images', 'is_active'];

    protected $casts = [
        'images' => 'array',
        'price' => 'decimal:2',
        'sale_price' => 'decimal:2',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function vendor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'vendor_id');
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getDisplayPriceAttribute(): float
    {
        return $this->sale_price ?? $this->price;
    }

    public function getIsInStockAttribute(): bool
    {
        return $this->stock > 0;
    }
}