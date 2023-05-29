<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\ProductDetail::create([
            'product_id' => 1,
            'sold' => 540,
            'shipping' => 'jakarta',
            'color' => 'blue',
            'size' => '43',
            'rating' => 10,
            'wishlist' => 832,
            'description' => 'lorem ipsum dolor',
            'slug' => 'product-1',
        ]);
        \App\Models\ProductDetail::create([
            'product_id' => 1,
            'sold' => 394,
            'shipping' => 'bandung',
            'color' => 'red',
            'size' => '43',
            'rating' => 8,
            'wishlist' => 832,
            'description' => 'lorem ipsum dolor',
            'slug' => 'product-1',
        ]);
        \App\Models\ProductDetail::create([
            'product_id' => 1,
            'sold' => 540,
            'shipping' => 'surabaya',
            'color' => 'green',
            'size' => '41',
            'rating' => 7,
            'wishlist' => 832,
            'description' => 'lorem ipsum dolor',
            'slug' => 'product-1',
        ]);
    }
}
