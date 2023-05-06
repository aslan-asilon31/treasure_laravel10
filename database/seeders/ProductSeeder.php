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
            'price'	=> '400000',
            'size'	=> 'S',
            'color'	=> 'grey',
            'status'	=> 'waiting',
            'description'	=> "There's nothing wrong with living in your own world. Pull on this soft midweight cotton Nike SB tee and make your place in it. The roomy fit and fresh graphics keep you stylish and comfy wherever you are, wherever you're going",
        ]);
        \App\Models\Product::create([
            'name'	=> 'Nike SB Black',
            'price'	=> '499000',
            'size'	=> 'M',
            'color'	=> 'Black',
            'status'	=> 'waiting',
            'description'	=> "There's nothing wrong with living in your own world. Pull on this soft midweight cotton Nike SB tee and make your place in it. The roomy fit and fresh graphics keep you stylish and comfy wherever you are, wherever you're going.",
        ]);
        \App\Models\Product::create([
            'name'	=> 'Jordan One Take 4 PF Blue',
            'price'	=> '1499000',
            'size'	=> '43',
            'color'	=> 'Blue',
            'status'	=> 'sold-out',
            'description'	=> "Get that speed you need, just like Russ. Inspired by Russell Westbrook's latest signature shoe, the outsole of the Jordan One Take 4 wraps up nearly to the midsole so you can start, stop or change direction in an instant. Meanwhile, energy-returning Zoom Air cushioning in the forefoot keeps you goin' (and goin' and goin')..",
        ]);
        \App\Models\Product::create([
            'name'	=> 'Jordan One Take 4 PF White',
            'price'	=> '1499000',
            'size'	=> '42',
            'color'	=> 'White',
            'status'	=> 'sold-out',
            'description'	=> "Get that speed you need, just like Russ. Inspired by Russell Westbrook's latest signature shoe, the outsole of the Jordan One Take 4 wraps up nearly to the midsole so you can start, stop or change direction in an instant. Meanwhile, energy-returning Zoom Air cushioning in the forefoot keeps you goin' (and goin' and goin')..",
        ]);
    }
}
