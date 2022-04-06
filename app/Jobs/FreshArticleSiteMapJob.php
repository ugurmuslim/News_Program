<?php

namespace App\Jobs;

use App\Models\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class FreshArticleSiteMapJob
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;


    public $article;

    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    public function handle()
    {
        $articleDate = $this->article->article_date;
        $articles = Article::whereMonth('article_date', $articleDate->month)
          ->whereNotNull('slug')
          ->orderBy('article_date', 'desc')
          ->get();

        $sitemap = Sitemap::create();
        foreach ($articles as $article) {
            $sitemap->add(Url::create('https://parafesor.net/'.$article->slug)
              ->setLastModificationDate($article->updated_at));
        }
        $sitemap->writeToFile(public_path('sitemaps/'.$articleDate->month.'-'.$articleDate->year.'-news.xml'));
    }
}
