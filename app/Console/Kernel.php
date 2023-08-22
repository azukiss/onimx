<?php

namespace App\Console;

use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Console\Scheduling\Schedule;
use DateTimeZone;
use App\Services\Membership\PlanInvoiceService;

class Kernel extends ConsoleKernel
{
    protected function scheduleTimezone(): DateTimeZone|string|null
    {
        return config('app.timezone', 'Asia/Jakarta');
    }
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
        $schedule->call(function(PlanInvoiceService $planInvoiceService) {
            $planInvoiceService->scheduleStatus();
        })->everyMinute()
        ->appendOutputTo(storage_path('logs/schedule.log'));
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
