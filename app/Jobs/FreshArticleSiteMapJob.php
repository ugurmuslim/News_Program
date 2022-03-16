<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Modules\Admin\Entities\Article;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class FreshArticleSiteMapJob implements ShouldQueue
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
				$articles = Article::whereDate('article_date', $articleDate->month)
					->news()
					->get();

				$sitemap = Sitemap::create();
				foreach ($articles as $article) {
						$sitemap->add(Url::create($article->slug)
							->setLastModificationDate($article->updated_at));
				}

				$sitemap->writeToFile(public_path('sitemaps/' . $articleDate->month . '-' . $articleDate->year . '-news.xml'));
		}
}