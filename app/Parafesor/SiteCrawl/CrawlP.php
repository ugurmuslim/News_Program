<?php

namespace App\Parafesor\SiteCrawl;

use Modules\Admin\Entities\CrawledArticle;
use Psr\Http\Message\UriInterface;
use Spatie\Crawler\CrawlProfiles\CrawlProfile;

class CrawlP extends CrawlProfile
{

    public function shouldCrawl(UriInterface $url): bool
    {
       $crawledArticle = CrawledArticle::where('original_link', $url)->first();
        if($crawledArticle) {
            echo $url . " is not being crawled" . PHP_EOL;
            return false;
        }
        return true;
    }
}
