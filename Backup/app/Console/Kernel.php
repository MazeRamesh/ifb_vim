<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->exec('C:\xampp\htdocs\mazeworks_vim\public\JKfenner\get_sap_invoices\get_sap_invoices\1010444793.pdf')->everyMinute();
        $schedule->exec('C:\xampp\htdocs\mazeworks_vim\public\VIM\MazeWorks_Digital_Signer.jar')->everyMinute();
        // $schedule->call(function () {
        //     DB::table('error_logs')->delete();
        // })->everyMinute();
        // $schedule->command('inspire')
        //          ->hourly();
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
