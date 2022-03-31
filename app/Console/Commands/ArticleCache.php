<?php

namespace App\Console\Commands;

use App\Models\ArticleType;
use App\Parafesor\Helper\ArticleHelper;
use Illuminate\Console\Command;

class ArticleCache extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'article:cache {--typeId=}';

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
        $articleTypes = ArticleType::where('status', 1)->pluck('id')->toArray();
        ArticleHelper::updateCache($articleTypes, true);
    }
}
