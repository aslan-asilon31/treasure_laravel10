<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Product::create([
            'name'	=> 'Nike SB Grey',
            'image' => 'product-blank.png',
            'price'	=> 400000,
            'stock'	=> 30,
            'discount'	=> 10,
            'status'	=> 'on-sale',
            'slug'	=> '-',
        ]);
        \App\Models\Product::create([
            'name'	=> 'Nike SB Black',
            'image' => 'product-blank.png',
            'price'	=> 499000,
            'stock'	=> 12,
            'discount'	=> 20,
            'status'	=> 'sold-out',
            'slug'	=> '-',
        ]);
        \App\Models\Product::create([
            'name'	=> 'Jordan One Take 4 PF Blue',
            'image' => 'product-blank.png',
            'price'	=> 1499000,
            'stock'	=> 149,
            'discount'	=> 20,
            'status'	=> 'pre-order',
            'slug'	=> '-',
        ]);
        \App\Models\Product::create([
            'name'	=> 'Jordan One Take 4 PF White',
            'image' => 'product-blank.png',
            'price'	=> 1499000,
            'stock'	=> 16,
            'discount'	=> 15,
            'status'	=> 'limited-stock',
            'slug'	=> '-',
        ]);
        \App\Models\Product::create([
            'name' => 'Nike Air Max 270',
            'image' => 'product-blank.png',
            'price' => 1500000,
            'stock' => 40,
            'discount' => 10,
            'status' => 'back-order',
            'slug' => 'nike-air-max-270',
        ]);
        \App\Models\Product::create([
            'name' => 'Nike Air Jordan 1 Retro High OG',
            'image' => 'product-blank.png',
            'price' => 1700000,
            'stock' => 30,
            'discount' => 30,
            'status' => 'clearance',
            'slug' => 'nike-air-jordan-1-retro-high-og',
        ]);
        \App\Models\Product::create([
            'name' => 'Nike Air Max 270',
            'image' => 'product-blank.png',
            'price' => 1500000,
            'stock' => 30,
            'discount' => 20,
            'status' => 'Available',
            'slug' => 'nike-air-max-270',
        ]);
        \App\Models\Product::create([
            'name' => 'Nike Air Jordan 1 Retro High OG',
            'image' => 'product-blank.png',
            'price' => 1700000,
            'stock' => 14,
            'discount' => 15,
            'status' => 'Available',
            'slug' => 'nike-air-jordan-1-retro-high-og',
        ]);
        \App\Models\Product::create([
            'name' => 'Nike Dri-FIT Training T-Shirt',
            'image' => 'product-blank.png',
            'price' => 300000,
            'stock' => 45,
            'discount' => 10,
            'status' => 'pre-order',
            'slug' => 'nike-dri-fit-training-t-shirt',
        ]);
        \App\Models\Product::create([
            'name' => 'Nike Pro Compression Shorts',
            'image' => 'product-blank.png',
            'price' => 400000,
            'stock' => 12,
            'discount' => 5,
            'status' => 'sold-out',
            'slug' => 'nike-pro-compression-shorts',
        ]);
    }
}
