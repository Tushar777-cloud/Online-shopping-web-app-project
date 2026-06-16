<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = ['name', 'slug', 'parent_id', 'image', 'is_active'];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function subcategories(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
}