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
            'name'	=> 'Shoes',
            'image'	=> '',
            'retro_model'	=> '',
            'collaboration'	=> '',
            'limited_edition'	=> '',
        ]);
        \App\Models\Category::create([
            'name'	=> 'Clothing',
            'image'	=> '',
            'retro_model'	=> '',
            'collaboration'	=> '',
            'limited_edition'	=> '',
        ]);
        \App\Models\Category::create([
            'name'	=> 'Accessories & Equipment',
            'image'	=> '',
            'retro_model'	=> '',
            'collaboration'	=> '',
            'limited_edition'	=> '',
        ]);
    }
}
