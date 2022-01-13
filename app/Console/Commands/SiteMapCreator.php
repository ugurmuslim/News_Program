<?php

namespace App\Console\Commands;

use App\Parafesor\FeedParser\FeedParserHelper;
use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;

class SiteMapCreator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:create';

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
        SitemapGenerator::create('https://parafesor.net')->writeToFile('public/sitemap.xml');
    }
}
