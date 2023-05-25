<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class BackupDbCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'BackupDb:cron';

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
        \Log::info("Cron job Berhasil di jalankan " . date('Y-m-d H:i:s'));

        $response = Http::get('https://jsonplaceholder.typicode.com/users');
        
        $users = $response->json();
    
        if (!empty($users)) {
            foreach ($users as $key => $user) {
                if(!User::where('email', $user['email'])->exists() ){
                    User::create([
                        'name' => $user['name'],
                        'email' => $user['email'],
                        'password' => bcrypt('aslanuser')
                    ]);
                }
            }
        }

    }
}
