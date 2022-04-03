<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapIndex;
use Spatie\Sitemap\Tags\Sitemap;

class SiteMapMonthlyIndexCommand extends Command
{
		protected $signature = 'sitemap:index {month?} {year?}';

		protected $description = 'Monthly sitemap index.';


		public function handle()
		{
				$formattedDateAndNames = [];
				$period = CarbonPeriod::create('2022-01', Carbon::now());
				foreach ($period as $date) {
						$formattedDateAndNames[$date->month . '-' . $date->year] = [
							'name' => 'sitemaps/' . $date->month . '-' . $date->year . '-news.xml',
						];
						if ($date->isCurrentMonth() && $date->isCurrentYear()) {
								$formattedDateAndNames[$date->month . '-' . $date->year]['last_modification_date'] = Carbon::now();
						} else {
								//Eğer bir argument gönderildiyse geçmiş tarihli olduğunu düşünerek sitemap indexi güncelleyecek (now)
								$formattedDateAndNames[$date->month . '-' . $date->year]['last_modification_date'] = $this->argument('month') == $date->month && $this->argument('year') == $date->year ? Carbon::now() : $date->endOfMonth();
						}

						$sitemapIndex = SitemapIndex::create();
						foreach ($formattedDateAndNames as $month) {
								$sitemapIndex->add(Sitemap::create('https://parafesor.net/'.$month['name'])
									->setLastModificationDate($month['last_modification_date']));
						}
						$sitemapIndex->writeToFile(public_path('sitemap.xml'));
				}
		}
}

