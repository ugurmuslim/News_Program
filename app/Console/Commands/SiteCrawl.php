<?php

namespace App\Console\Commands;

use App\Parafesor\FeedParser\FeedParserHelper;
use Illuminate\Console\Command;

class SiteCrawl extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'site:crawl';

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
        \App\Parafesor\SiteCrawl\SiteCrawl::siteCrawl();
    }
}
