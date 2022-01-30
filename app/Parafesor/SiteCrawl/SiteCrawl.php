<?php

namespace App\Parafesor\SiteCrawl;

use App\Parafesor\Constants\CrawlTypes;
use App\Parafesor\SimplePie\SimplePie;
use Modules\Admin\Entities\SiteAttributes;
use Modules\Admin\Entities\SitesToCrawl;
use Spatie\Crawler\Crawler;

class SiteCrawl
{
    public static function siteCrawl($siteTitle = null, $test = false)
    {
        if (!$siteTitle) {
            $sites = SitesToCrawl::where('crawl_type', CrawlTypes::SITE)
                ->where('status', 1)
                ->get();
        }

        if ($siteTitle) {
            $sites = SitesToCrawl::where('crawl_type', CrawlTypes::SITE)
                ->where('title', $siteTitle)
                ->get();
        }
        foreach ($sites as $site) {
            $attributes = SiteAttributes::where('title', $site->site_name)->get();
            Crawler::create()
                ->setCrawlObserver(new Observer($site, $attributes, $test))
                ->setCrawlProfile(new CrawlP($site, $test))
                ->ignoreRobots()
                ->setConcurrency(3)
                ->acceptNofollowLinks()
                ->setMaximumDepth(1)
                ->startCrawling($site->title);
        }
    }
}
