<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Payment;
use Carbon\Carbon;

class UpdateStatusPayment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update_status_payment:cron';

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
        $payments = Payment::where('status', 'waiting')
        ->where('created_at', '<=', Carbon::now()->subMinutes(1))
        ->get();

        foreach ($payments as $payment) {
            $payment->status = 'failed';
            $payment->save();
        }
        \Log::info("Payment Status success to update " . date('Y-m-d H:i:s'));
    }
}
