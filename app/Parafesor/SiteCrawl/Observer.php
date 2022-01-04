<?php

namespace App\Parafesor\SiteCrawl;


use Carbon\Carbon;
use DOMDocument;
use DOMXPath;
use Exception;
use Modules\Admin\Entities\CrawledArticle;
use Modules\Admin\Entities\SitesToCrawl;
use Psr\Http\Message\UriInterface;
use Illuminate\Support\Facades\Log;

use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Exception\RequestException;
use Spatie\Crawler\Crawler;
use Spatie\Crawler\CrawlObservers\CrawlObserver;

/**
 * @property array $links
 */
class Observer extends CrawlObserver
{
    protected $links;
    /**
     * @var \SitesToCrawl
     */
    private $site;

    public function __construct(SitesToCrawl  $site)
    {
        $this->site = $site;
    }

    /**
     * Called when the crawler will crawl the url.
     *
     * @param \Psr\Http\Message\UriInterface $url
     */
    public function willCrawl(UriInterface $url)
    {

    }

    /**
     * Called when the crawler has crawled the given url successfully.
     *
     * @param \Psr\Http\Message\UriInterface      $url
     * @param \Psr\Http\Message\ResponseInterface $response
     * @param \Psr\Http\Message\UriInterface|null $foundOnUrl
     */
    public function crawled(
        UriInterface      $url,
        ResponseInterface $response,
        ?UriInterface     $foundOnUrl = null
    ): void
    {

        echo $url . " is being crawled" . PHP_EOL;
        $doc = new DOMDocument();
        @$doc->loadHTML($response->getBody());
        $finder = new DomXPath($doc);
        $nodeList = $finder->query('//div[starts-with(@class, "dtail")]');
        if ($nodeList->count() == 0) {
            return;
        }
        $title = $finder->query('//div[starts-with(@class, "dtail")]/h1/text()')[0];
        $imgPath = $finder->query('//div[starts-with(@class, "pht")]/img')[0];

        if (!$imgPath) {
            return;
        }
        $src = $imgPath->getAttribute('src');
        $summary = $finder->query('//div[starts-with(@class, "dtail")]/h2/text()')[0];
        if (!$summary) {
            return;
        }
        $date = $finder->query('//meta[starts-with(@itemprop, "datePublished")]')[0];
        $pubDate = $date->getAttribute('content');
        try {
            CrawledArticle::create([
                "news_id"         => $url,
                "title"           => $title->nodeValue,
                "original_link"   => $url,
                "article_type_id" => $this->site->article_type_id,
                "pub_date"        => date('Y-m-d H:i:s', strtotime($pubDate)),
                "summary"         => $summary->nodeValue,
                "image_path"      => $src,
                "try_number"      => 0,
                "site_name"       => $this->site->site_name,
                "body"            => null,
                "created_at"      => Carbon::now(),
                "updated_at"      => Carbon::now(),
            ]);
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        echo $url . " with title : " . $title->nodeValue . " saved " . PHP_EOL;

    }

    /**
     * Called when the crawler had a problem crawling the given url.
     *
     * @param \Psr\Http\Message\UriInterface         $url
     * @param \GuzzleHttp\Exception\RequestException $requestException
     * @param \Psr\Http\Message\UriInterface|null    $foundOnUrl
     */
    public function crawlFailed(
        UriInterface     $url,
        RequestException $requestException,
        ?UriInterface    $foundOnUrl = null
    ): void
    {
        echo "Failed : " . $url;
        Log::error('crawlFailed: ' . $url);
    }

    /**
     * Called when the crawl has ended.
     */
    public function finishedCrawling(): void
    {
    }
}
