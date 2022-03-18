<?php

namespace App\Parafesor\SiteCrawl;

use App\Parafesor\Constants\CacheConst;
use App\Parafesor\Constants\CategorySectionTypes;
use App\Parafesor\Constants\CrawlTypes;
use App\Parafesor\SimplePie\SimplePie;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Modules\Admin\Entities\SiteAttributes;
use Modules\Admin\Entities\SitesToCrawl;
use Spatie\Crawler\Crawler;

class SiteCrawl
{
    public static function siteCrawl($siteTitle = null, $test = false)
    {
        $siteCrawl = Cache::get(CacheConst::SITE_CRAWL);

        if ($siteCrawl) {
            return;
        }

        Cache::put(CacheConst::SITE_CRAWL, true);
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
                ->setConcurrency(1)
                ->acceptNofollowLinks()
                ->setMaximumDepth(1)
                ->startCrawling($site->title);
        }

        Cache::forget(CacheConst::SITE_CRAWL);
    }
}
