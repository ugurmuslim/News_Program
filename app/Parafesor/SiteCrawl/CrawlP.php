<?php

namespace App\Parafesor\SiteCrawl;

use Modules\Admin\Entities\CrawledArticle;
use Modules\Admin\Entities\SitesToCrawl;
use Psr\Http\Message\UriInterface;
use Spatie\Crawler\CrawlProfiles\CrawlProfile;

class CrawlP extends CrawlProfile
{
    /**
     * @var SitesToCrawl
     */
    private $site;
    /**
     * @var false|mixed
     */
    private $test;

    public function __construct(SitesToCrawl $site, $test = false)
    {
        $this->site = $site;
        $this->test = $test;
    }

    public function shouldCrawl(UriInterface $url): bool
    {
        if ($this->test) {
            return true;
        }
        $crawledArticle = CrawledArticle::where('original_link', $url)->first();
        if ($crawledArticle) {
            echo $url . " is not being crawled" . PHP_EOL;
            return false;
        }
        $parsedUrl = $url->getHost();
        $parsedSiteUrl = parse_url($this->site->title);
        if ($parsedSiteUrl['host'] != $parsedUrl) {
            echo $url . " is not the same host wih " . $parsedSiteUrl['host'];
            return false;
        }

        /*   if($this->site->site_name == 'BloombergHt') {
               echo $url->getPath() . PHP_EOL;
               if(count(explode( '/', $url->getPath())) > 0) {
                   echo $url . " is not crawlable" . PHP_EOL;
                   return false;
               }
           }*/

        return true;
    }
}
