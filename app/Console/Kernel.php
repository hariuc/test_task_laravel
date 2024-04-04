<?php

namespace App\Console;

use App\Application\Modules\Currency\Commands\CurrencyUploadFromBNMCommand;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{

    protected $commands = [
        CurrencyUploadFromBNMCommand::class
    ];

    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
        $schedule->command("app:currency-upload-from-bnm-command")
            //->daily("9:00")
            ->everyFiveMinutes()
            ->onSuccess(function () {
                Log::info("SUCCESS " . __METHOD__);
            })->onFailure(function () {
                Log::info("FAILURE " . __METHOD__);
            });
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
        /*
         * My Commands
         * */
        //$this->load(__DIR__ . "/../Application/Modules/Currency/Commands/");
    }
}
