<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Twitt;

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
        // scheduled function delete twitts that contain specific words from array every day

        $schedule->call(function () {

            $twittIdsWithSpecificWordsArray = array();
            $specificWordsArray = ['bad', 'worst', 'not good'];

            $twittIdsWithSpecificWordsArray = Twitt::select('id')
                ->whereIn('body', $specificWordsArray)
                ->get()->toArray();

            Twitt::whereIn('id', $twittIdsWithSpecificWordsArray)->delete();
        })->daily();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
