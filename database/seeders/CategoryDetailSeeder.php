<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\CategoryDetail::create([
            'category_id'	=> 1,
            'name'	=> 'All Shoes',
            'description'	=> '',
        ]);
        \App\Models\CategoryDetail::create([
            'category_id'	=> 1,
            'name'	=> 'Newest Sneakers',
            'description'	=> '',
        ]);
        \App\Models\CategoryDetail::create([
            'category_id'	=> 1,
            'name'	=> 'Lifestyle',
            'description'	=> '',
        ]);
        \App\Models\CategoryDetail::create([
            'category_id'	=> 1,
            'name'	=> 'Jordan',
            'description'	=> '',
        ]);
        \App\Models\CategoryDetail::create([
            'category_id'	=> 1,
            'name'	=> 'Running',
            'description'	=> '',
        ]);
        \App\Models\CategoryDetail::create([
            'category_id'	=> 1,
            'name'	=> 'Basketball',
            'description'	=> '',
        ]);
        \App\Models\CategoryDetail::create([
            'category_id'	=> 1,
            'name'	=> 'Football',
            'description'	=> '',
        ]);
        \App\Models\CategoryDetail::create([
            'category_id'	=> 1,
            'name'	=> 'Gym and Training',
            'description'	=> '',
        ]);
        \App\Models\CategoryDetail::create([
            'category_id'	=> 1,
            'name'	=> 'Sandals and Slides',
            'description'	=> '',
        ]);
    }
}
