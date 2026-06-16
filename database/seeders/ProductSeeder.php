<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Smartphone X',
                'slug' => 'smartphone-x',
                'description' => 'Latest smartphone with amazing features',
                'price' => 29999,
                'sale_price' => 24999,
                'stock' => 50,
                'category_id' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Cotton T-Shirt',
                'slug' => 'cotton-t-shirt',
                'description' => 'Comfortable cotton t-shirt',
                'price' => 1299,
                'stock' => 100,
                'category_id' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Garden Tools Set',
                'slug' => 'garden-tools-set',
                'description' => 'Complete garden tools kit',
                'price' => 3499,
                'stock' => 25,
                'category_id' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Programming Book',
                'slug' => 'programming-book',
                'description' => 'Learn programming with practical examples',
                'price' => 799,
                'stock' => 75,
                'category_id' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'Sports Shoes',
                'slug' => 'sports-shoes',
                'description' => 'Lightweight running shoes',
                'price' => 4999,
                'sale_price' => 3999,
                'stock' => 30,
                'category_id' => 5,
                'is_active' => true,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}