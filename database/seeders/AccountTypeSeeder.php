<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccountTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\AccountType::create([
            'id'	=> '1',
            'name'	=> 'Real Account',
            'desc'	=> '-',
        ]);
        \App\Models\AccountType::create([
            'id'	=> '2',
            'name'	=> 'Nominal Account',
            'desc'	=> '-',
        ]);
    }
}
