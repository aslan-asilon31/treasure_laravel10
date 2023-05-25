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
            // 'price'	=> 400000,
            'size'	=> 'S',
            'color'	=> 'grey',
            'status'	=> 'waiting',
            'description'	=> "There's nothing wrong with living in your own world. Pull on this soft midweight cotton Nike SB tee and make your place in it. The roomy fit and fresh graphics keep you stylish and comfy wherever you are, wherever you're going",
        ]);
        \App\Models\Product::create([
            'name'	=> 'Nike SB Black',
            'image' => 'product-blank.png',
            // 'price'	=> 499000,
            'size'	=> 'M',
            'color'	=> 'Black',
            'status'	=> 'waiting',
            'description'	=> "There's nothing wrong with living in your own world. Pull on this soft midweight cotton Nike SB tee and make your place in it. The roomy fit and fresh graphics keep you stylish and comfy wherever you are, wherever you're going.",
        ]);
        \App\Models\Product::create([
            'name'	=> 'Jordan One Take 4 PF Blue',
            'image' => 'product-blank.png',
            // 'price'	=> 1499000,
            'size'	=> '43',
            'color'	=> 'Blue',
            'status'	=> 'sold-out',
            'description'	=> "Get that speed you need, just like Russ. Inspired by Russell Westbrook's latest signature shoe, the outsole of the Jordan One Take 4 wraps up nearly to the midsole so you can start, stop or change direction in an instant. Meanwhile, energy-returning Zoom Air cushioning in the forefoot keeps you goin' (and goin' and goin')..",
        ]);
        \App\Models\Product::create([
            'name'	=> 'Jordan One Take 4 PF White',
            'image' => 'product-blank.png',
            // 'price'	=> 1499000,
            'size'	=> '42',
            'color'	=> 'White',
            'status'	=> 'sold-out',
            'description'	=> "Get that speed you need, just like Russ. Inspired by Russell Westbrook's latest signature shoe, the outsole of the Jordan One Take 4 wraps up nearly to the midsole so you can start, stop or change direction in an instant. Meanwhile, energy-returning Zoom Air cushioning in the forefoot keeps you goin' (and goin' and goin')..",
        ]);
        \App\Models\Product::create([
            'name' => 'Nike Air Max 270',
            'image' => 'product-blank.png',
            // 'price' => 1500000,
            'size' => '7-12 (US)',
            'color' => 'Black/White',
            'status' => 'Available',
            'description' => 'Running shoes with Air Max technology for ultimate comfort.',
            'slug' => 'nike-air-max-270',
        ]);
        \App\Models\Product::create([
            'name' => 'Nike Air Jordan 1 Retro High OG',
            'image' => 'product-blank.png',
            // 'price' => 1700000,
            'size' => '6-14 (US)',
            'color' => 'Red/Black',
            'status' => 'Available',
            'description' => 'Classic basketball shoes with iconic design and premium quality.',
            'slug' => 'nike-air-jordan-1-retro-high-og',
        ]);
        \App\Models\Product::create([
            'name' => 'Nike Air Max 270',
            'image' => 'product-blank.png',
            // 'price' => 1500000,
            'size' => '7-12 (US)',
            'color' => 'Black/White',
            'status' => 'Available',
            'description' => 'Running shoes with Air Max technology for ultimate comfort.',
            'slug' => 'nike-air-max-270',
        ]);
        \App\Models\Product::create([
            'name' => 'Nike Air Jordan 1 Retro High OG',
            'image' => 'product-blank.png',
            // 'price' => 1700000,
            'size' => '6-14 (US)',
            'color' => 'Red/Black',
            'status' => 'Available',
            'description' => 'Classic basketball shoes with iconic design and premium quality.',
            'slug' => 'nike-air-jordan-1-retro-high-og',
        ]);
        \App\Models\Product::create([
            'name' => 'Nike Dri-FIT Training T-Shirt',
            'image' => 'product-blank.png',
            // 'price' => 300000,
            'size' => 'XS-XXL',
            'color' => 'Grey',
            'status' => 'Available',
            'description' => 'Sports t-shirt with Dri-FIT technology to keep you dry and comfortable during workouts.',
            'slug' => 'nike-dri-fit-training-t-shirt',
        ]);
        \App\Models\Product::create([
            'name' => 'Nike Pro Compression Shorts',
            'image' => 'product-blank.png',
            // 'price' => 400000,
            'size' => 'S-XL',
            'color' => 'Black',
            'status' => 'Available',
            'description' => 'Compression shorts that provide muscle support and optimal temperature regulation.',
            'slug' => 'nike-pro-compression-shorts',
        ]);
    }
}
