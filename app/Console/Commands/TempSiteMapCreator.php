<?php

namespace App\Console\Commands;

use App\Models\Article;
use Artisan;
use Carbon\Carbon;
use File;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class TempSiteMapCreator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:temp-create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Geçici bir temp. SİLİNECEK TODO';

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
        if (!File::exists(public_path('sitemaps'))) {
            File::makeDirectory(public_path('sitemaps'));
        }

//				for ($i = 0; $i < 4; $i++) {
//						$sitemap = Sitemap::create();
//						if ($i == 0) {
//								$date = Carbon::now();
//						} else {
//								$date = Carbon::now()->subMonths($i); //Now da dahil.
//						}
//
//						$this->sitemap($sitemap, $date);
//				}
        $this->sitemap(Sitemap::create(), Carbon::now());
        Artisan::call('sitemap:index');
    }

    public function sitemap(Sitemap $sitemap, Carbon $date)
    {
        $articles = Article::whereMonth('article_date', $date->month)
          ->orderBy('article_date', 'desc')
          ->whereNotNull('slug')
          ->get();

        foreach ($articles as $article) {
            $sitemap->add(Url::create($article->slug)
              ->setLastModificationDate($article->updated_at));
        }
        $sitemap->writeToFile(public_path('sitemaps/'.$date->month.'-'.$date->year.'-news.xml'));
    }
}

