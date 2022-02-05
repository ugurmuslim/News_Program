<?php

namespace App\Console;

use App\Jobs\CurrencyUpdater;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;

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
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     *
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command("currency:updater")->everyMinute();
        $schedule->command("aaBot:crawl")->everyMinute();
        $schedule->command("update:mostRead")->everyMinute();
        $schedule->command("necessaryRows:sync")->everyMinute();
        $schedule->command("feed:parser")->everyTwoMinutes();
        $schedule->command("youtube:crawl")->hourly();
        $schedule->command("site:crawl")->everyTwoMinutes();
        $schedule->command("sitemap:create")->everySixHours();
        $schedule->command("article:cache")->everyMinute();
        $schedule->command("twitter:scrape")->everyFifteenMinutes();

        // $schedule->command('inspire')->hourly();
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
