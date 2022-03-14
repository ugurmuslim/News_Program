<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Modules\Admin\Entities\Article;
use Spatie\Sitemap\Sitemap;
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
				$articles = Article::all();

				foreach ($articles as $article) {
						$sitemap->add(Url::create(url($article->slug))
							->setChangeFrequency(Url::CHANGE_FREQUENCY_HOURLY));
				}

				$sitemap->writeToFile(public_path('/sitemaps/' . $now->year . '-' . $now->month . '.xml'));


				Sitemap::create()->add(Url::create('/sitemaps/' . $now->year . '-' . $now->month . '.xml'))
					->writeToFile(public_path('sitemap.xml'));
		}
}
