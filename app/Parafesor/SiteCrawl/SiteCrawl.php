<?php

namespace App\Parafesor\SiteCrawl;

use App\Parafesor\Constants\CrawlTypes;
use App\Parafesor\SimplePie\SimplePie;
use Modules\Admin\Entities\SiteAttributes;
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
            $attributes = SiteAttributes::where('title',$site->site_name)->get();
            Crawler::create()
                ->setCrawlObserver(new Observer($site, $attributes))
                ->setCrawlProfile(new CrawlP($site))
                ->ignoreRobots()
                ->setConcurrency(3)
                ->acceptNofollowLinks()
                ->setMaximumDepth(1)
                ->startCrawling($site->title);
        }
    }
}
