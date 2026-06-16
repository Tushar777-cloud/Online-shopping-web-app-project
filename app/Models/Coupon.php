<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = ['code', 'discount_type', 'discount_value', 'min_order', 'expires_at', 'usage_limit', 'used_count'];

    protected $casts = [
        'expires_at' => 'datetime',
        'discount_value' => 'decimal:2',
        'min_order' => 'decimal:2',
    ];

    public function isValid(float $orderTotal = 0): bool
    {
        if ($this->expires_at && $this->expires_at->isPast()) {
            return false;
        }
        if ($this->usage_limit > 0 && $this->used_count >= $this->usage_limit) {
            return false;
        }
        if ($orderTotal < $this->min_order) {
            return false;
        }
        return true;
    }

    public function calculateDiscount(float $orderTotal): float
    {
        if ($this->discount_type === 'percentage') {
            return min(($this->discount_value / 100) * $orderTotal, $orderTotal);
        }
        return min($this->discount_value, $orderTotal);
    }
}