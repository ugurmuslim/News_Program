<?php

namespace App\Parafesor\SiteCrawl;

use App\Parafesor\Constants\CrawlTypes;
use App\Parafesor\SimplePie\SimplePie;
use Modules\Admin\Entities\SitesToCrawl;
use Spatie\Crawler\Crawler;

class SiteCrawl
{
    public static function siteCrawl()
    {
        $sites = SitesToCrawl::where('crawl_type', CrawlTypes::SITE)
            ->where('status', 1)
            ->get();
        foreach ($sites as $site) {
            echo $site->article_type_id . "Started" . PHP_EOL;
            Crawler::create()
                ->setCrawlObserver(new Observer($site))
                ->ignoreRobots()
                ->setConcurrency(1)
                ->acceptNofollowLinks()
                ->setMaximumDepth(1)
                ->startCrawling($site->title);
        }
    }
}
