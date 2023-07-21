<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\AccountDetail::create([
            'id'	=> '1',
            'account_id'	=> '1',
            'debit'	=> '0',
            'credit'	=> '0',
            'name'	=> 'Current Assets',
            'desc'	=> 'atau Current Assets Harta lancar adalah harta yang dengan mudah dan cepat dikonversi menjadi uang, atau sering juga disebut likuiditas tinggi. Contoh akun yang termasuk harta lancar',
        ]);
    }
}
