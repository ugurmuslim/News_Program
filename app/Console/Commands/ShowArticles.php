<?php

namespace App\Console\Commands;

use App\Parafesor\Constants\CacheConst;
use App\Parafesor\Constants\CategorySectionTypes;
use App\Parafesor\Youtube\YoutubeCrawler;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Ramsey\Collection\CollectionInterface;

class ShowArticles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'show:articles';

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
     * @return CollectionInterface
     */
    public function handle()
    {
        dd(Cache::get(CacheConst::ARTICLE . 'Gündem' . ":" . CategorySectionTypes::NORMAL));
    }
}
