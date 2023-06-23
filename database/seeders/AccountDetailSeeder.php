<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccountDetailSeeder extends Seeder
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
        \App\Models\AccountDetail::create([
            'id'	=> '2',
            'account_id'	=> '1',
            'debit'	=> '0',
            'credit'	=> '0',
            'name'	=> 'Fixed Assets',
            'desc'	=> 'atau harta tetap adalah harta yang sulit dan membutuhkan waktu lama untuk dikonversi menjadi uang karena nilainya yang lebih tinggi. Contohnya adalah mesin atau peralatan (equipment), kendaraan (vehicle), bangunan (plant), dan tanah (land).',
        ]);
        \App\Models\AccountDetail::create([
            'id'	=> '3',
            'account_id'	=> '3',
            'debit'	=> '0',
            'credit'	=> '0',
            'name'	=> 'current liability',
            'desc'	=> 'Utang jangka pendek',
        ]);
        \App\Models\AccountDetail::create([
            'id'	=> '4',
            'account_id'	=> '3',
            'debit'	=> '0',
            'credit'	=> '0',
            'name'	=> 'long term liability',
            'desc'	=> 'Utang jangka panjang',
        ]);
    }
}
