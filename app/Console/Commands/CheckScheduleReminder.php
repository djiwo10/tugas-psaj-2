<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Schedule;
use App\Notifications\ScheduleReminder;

class CheckScheduleReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-schedule-reminder';

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
    $schedules = Schedule::whereDate('date', now())
        ->whereTime('time', '<=', now())
        ->where('is_reminded', false)
        ->get();

    foreach ($schedules as $schedule) {

        $schedule->user->notify(new ScheduleReminder($schedule));

        $schedule->update([
            'is_reminded' => true
        ]);
    }
}
}
