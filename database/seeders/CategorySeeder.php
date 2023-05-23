<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Category::create([
            'name'	=> 'Sports Shoes',
            'image'	=> 'product-blank.png',
            'retro_model'	=> '',
            'collaboration'	=> '',
            'limited_edition'	=> '',
        ]);
        \App\Models\Category::create([
            'name'	=> 'Sports Apparel',
            'image'	=> 'product-blank.png',
            'retro_model'	=> '',
            'collaboration'	=> '',
            'limited_edition'	=> '',
        ]);
        \App\Models\Category::create([
            'name'	=> 'Sports Accessories',
            'image'	=> 'product-blank.png',
            'retro_model'	=> '',
            'collaboration'	=> '',
            'limited_edition'	=> '',
        ]);
        \App\Models\Category::create([
            'name'	=> 'Sports Equipment',
            'image'	=> 'product-blank.png',
            'retro_model'	=> '',
            'collaboration'	=> '',
            'limited_edition'	=> '',
        ]);
    }
}
