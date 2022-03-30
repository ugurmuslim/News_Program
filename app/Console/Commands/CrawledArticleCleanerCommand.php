<?php

namespace App\Console\Commands;

use App\Models\CrawledArticle;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CrawledArticleCleanerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawled:cleaner';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        CrawledArticle::where('pub_date','<', Carbon::now()->subDays(1))->delete();
    }
}
