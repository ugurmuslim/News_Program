<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Modules\Admin\Entities\Article;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\SitemapIndex;
use Spatie\Sitemap\Tags\Url;
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
				$now = Carbon::now();
				$sitemap = Sitemap::create();

				$articles = Article::whereMonth('created_at', $now->month)
					->whereNotNull('slug')
					->get();

				$path=public_path('/sitemaps/' . $now->year . '-' . $now->month . '.xml');
				foreach ($articles as $article) {
						$sitemap->add(Url::create(url($article->slug))
							->setChangeFrequency(Url::CHANGE_FREQUENCY_HOURLY));
				}

				$sitemap->writeToFile($path);

				$sitemapIndex = SitemapIndex::create();

				$articlesChunk = Article::select(['slug', 'updated_at'])
					->chunk(50000, function ($articles, $chunk) use ($sitemapIndex) {
							$sitemapName = 'articles_sitemap_'.$chunk.'.xml';
							$sitemap = Sitemap::create();

							foreach ($articles as $article) {
									$sitemap->add(Url::create($article->slug)
										->setLastModificationDate($article->updated_at));
							}

							$sitemap->writeToFile(public_path($sitemapName));
							$sitemapIndex->add($sitemapName);
					});

				$sitemapIndex->writeToFile(public_path('sitemap.xml'));

//				Sitemap::create()->add(Url::create('/sitemaps/' . $now->year . '-' . $now->month . '.xml'))
//					->writeToFile(public_path('sitemap.xml'));

//				SitemapGenerator::create(config('app.url'))
//					->maxTagsPerSitemap(10)
//					->writeToFile(public_path('sitemap.xml'));
//				$sitemap = Sitemap::create()->maxTagsPerSitemap(2);
//				$articles = Article::all();
//
//				foreach ($articles as $article) {
//						$sitemap->add(Url::create(url($article->slug))
//							->setChangeFrequency(Url::CHANGE_FREQUENCY_HOURLY));
//				}
//
//				$sitemap->writeToFile(public_path('/sitemaps/' . $now->year . '-' . $now->month . '.xml'));
//
//
//				Sitemap::create()->add(Url::create('/sitemaps/' . $now->year . '-' . $now->month . '.xml'))
//					->writeToFile(public_path('sitemap.xml'));
		}
}

