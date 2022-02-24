<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        //lenh test
        $schedule->command('ReportToday:cron')->everyMinute();
        //$schedule->command('ReportMonth:cron')->everyMinute();

        //lenh chay chinh thuc tren server
        // $schedule->command('ReportToday:cron')->dailyAt('00:00');
        // $schedule->command('ReportMonth:cron')->lastDayOfMonth('23:59');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
