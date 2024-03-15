<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\Reservation;
use Illuminate\Console\Command;
use App\Mail\RemindMail;
use Illuminate\Support\Facades\Mail;

class DailyCheckCommand extends Command
{
    protected $signature = 'custom:dailyCheck';
    protected $description = 'Perform daily checks';
    /**
     * Execute the console command.
     */
    public function handle()
    {
        // 今日の日付を取得
        $today = now()->format('Y-m-d');
        $reservations = Reservation::whereDate('date', $today)->get();

        foreach ($reservations as $reservation) {            
            $user = User::find( $reservation->user_id);
            $email = $user->email;
            Mail::send(new RemindMail($user, $reservation));
        }
    }
}
