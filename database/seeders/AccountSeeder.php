<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    //  source desc : https://www.zenius.net/blog/penggolongan-akun-dalam-akuntansi
    public function run(): void
    {
        \App\Models\Account::create([
            'id'	=> '1',
            'account_type_id'	=> '1',
            'name'	=> 'Asset',
            'desc'	=> 'Asset atau Aktiva merujuk pada keseluruhan dari sumber daya yang Anda miliki.Aset merupakan sebuah nilai kekayaan perusahaan yang digunakan untuk kebutuhan sekaligus dukungan untuk operasional.Berdasarkan jangka waktu pemakaiannya, aktiva terbagi menjadi dua jenis, yaitu aktiva lancar dan aktiva tetap
                        ',
        ]);
        \App\Models\Account::create([
            'id'	=> '2',
            'account_type_id'	=> '1',
            'name'	=> 'Equity',
            'desc'	=> 'Equity atau Modal adalah harta yang disetorkan kepada usaha, supaya usaha bisa berjalan. Modal ini asalnya bisa dari Andrew dan dari pihak luar, seperti Bank Mamapapa tadi. Nah, modal ini nantinya juga bisa ditarik lagi oleh pihak-pihak yang mendukung usaha ini.
                        ',
        ]);
        \App\Models\Account::create([
            'id'	=> '3',
            'account_type_id'	=> '1',
            'name'	=> 'Liability',
            'desc'	=> 'Utang adalah kewajiban yang harus dibayar oleh perusahaan. Utang juga dibedakan menjadi dua, yaitu utang jangka pendek dan utang jangka panjang. Letak perbedaannya hanya di jangka waktu pelunasannya, kok, guys! Utang jangka pendek kudu dibayar dalam jangka waktu kurang dari setahun dan utang jangka panjang dibayar dalam jangka waktu lebih dari satu tahun.
                        ',
        ]);
        \App\Models\Account::create([
            'id'	=> '4',
            'account_type_id'	=> '2',
            'name'	=> 'Revenue',
            'desc'	=> 'atau Pendapatan adalah penghasilan perusahaan dari penjualan jasa dan barang, serta penghasilan di luar penjualan. Contohnya, perusahaan melakukan investasi di tempat lain.',
        ]);
        \App\Models\Account::create([
            'id'	=> '5',
            'account_type_id'	=> '2',
            'name'	=> 'Expense',
            'desc'	=> 'atau Beban adalah biaya-biaya yang dikeluarkan untuk menjalankan usaha. Misalnya, biaya listrik, telepon & internet, gaji, sewa gedung, serta perawatan peralatan.'
        ]);
    }
}
