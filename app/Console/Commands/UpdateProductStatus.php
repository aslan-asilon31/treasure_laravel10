<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Payment;

class UpdateProductStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-product-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $schedule->call(function () {
            // Logika untuk mengubah status produk
            // Contoh: Mengubah status produk menjadi 'active' jika waktu pembuatan sudah lebih dari 1 menit yang lalu
            $threshold = Carbon::now()->subMinute();
            Payment::where('created_at', '<=', $threshold)->update(['status' => 'active']);
        })->everyMinute();
    }
}
