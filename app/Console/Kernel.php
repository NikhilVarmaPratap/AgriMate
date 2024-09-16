<?php

namespace App\Console;

use App\Jobs\CheckStoragePricesJob;
use App\Services\SMSService;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule)
    {
        // Schedule the job to run hourly
        $schedule->job(new CheckStoragePricesJob(new SMSService))->hourly();
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
