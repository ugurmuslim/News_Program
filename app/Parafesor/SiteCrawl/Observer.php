<?php

namespace App\Parafesor\SiteCrawl;


use Carbon\Carbon;
use DOMDocument;
use DOMXPath;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use App\Models\CrawledArticle;
use App\Models\CrawledArticleTestLog;
use App\Models\SitesToCrawl;
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
    /**
     * @var Collection
     */
    private $attributes;

    public function __construct(SitesToCrawl $site, Collection $attributes, $test = false)
    {
        $this->site = $site;
        $this->attributes = $attributes;
        $this->test = $test;
    }

    /**
     * Called when the crawler will crawl the url.
     *
     * @param \Psr\Http\Message\UriInterface $url
     */
    public function willCrawl(UriInterface $url): void
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
        $errors = [];
        $goToEnd = false;

        echo $url . " is being crawled" . PHP_EOL;
        $doc = new DOMDocument();
        if(!$response->getBody()) {
            echo "response body is empty" . PHP_EOL;
            return;
        }
        @$doc->loadHTML($response->getBody());
        $finder = new DomXPath($doc);
//        $nodeList = $finder->query('//div[starts-with(@class, "dtail")]');
        $nodeList = $finder->query($this->attributes->where('type', 'title')->first()->value);
        if ($nodeList->count() == 0) {
            $errors[] = "Baslik Bulunamadi";
            if ($this->test) {
                $goToEnd = true;
            }
        }

        if (!$this->test && count($errors) > 0) {
            echo "could not find any node" . PHP_EOL;
            return;
        }

        if (!$goToEnd) {
            $title = $finder->query($this->attributes->where('type', 'title')->first()->value)[0];
            $imgRow = $this->attributes->where('type', 'image')->first();
            $imgPath = $finder->query($imgRow->value)[0];
            if (!$imgPath) {
                $img = null;
            } else {
                $img = $imgPath->getAttribute($imgRow->content_place);
            }

            $summary = $finder->query($this->attributes->where('type', 'summary')->first()->value)[0];
            if (!$summary) {
                $summary = $title;
            }
            $dateRow = $this->attributes->where('type', 'date')->first();
            $date = $finder->query($dateRow->value)[0];

            if (!$date) {
                $errors[] = "Tarih Bulunamadı";
                if ($this->test) {
                    $goToEnd = true;
                }
            }
            if (!$goToEnd) {
                if (!$this->test && count($errors) > 0) {
                    echo "could not find any date" . PHP_EOL;
                    return;
                }

                $pubDate = $date->getAttribute($dateRow->content_place);
            }
        }
        try {
            if (!$this->test) {
                CrawledArticle::create([
                    "news_id"         => $url,
                    "title"           => $title->nodeValue,
                    "original_link"   => $url,
                    "article_type_id" => $this->site->article_type_id,
                    "pub_date"        => date('Y-m-d H:i:s', strtotime($pubDate)),
                    "summary"         => $summary->nodeValue,
                    "image_path"      => $img,
                    "try_number"      => 0,
                    "site_name"       => $this->site->site_name,
                    "body"            => null,
                    "created_at"      => Carbon::now(),
                    "updated_at"      => Carbon::now(),
                ]);
            } else {
                if ($url->getScheme() . "//" .  $url->getHost() . $url->getPath() !== $this->site->title) {
                    CrawledArticleTestLog::create([
                        "title"            => isset($title) ? $title->nodeValue : null,
                        "site_to_crawl_id" => $this->site->id,
                        "original_link"    => $url,
                        "article_type_id"  => $this->site->article_type_id,
                        "pub_date"         => isset($pubDate) ? date('Y-m-d H:i:s', strtotime($pubDate)) : null,
                        "summary"          => isset($summary) ? $summary->nodeValue : null,
                        "image_path"       => isset($img) ? $img : null,
                        "site_name"        => $this->site->site_name,
                        "body"             => null,
                        "message"          => json_encode($errors),
                        "created_at"       => Carbon::now(),
                        "updated_at"       => Carbon::now(),
                    ]);
                }
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        if (!$this->test) {
            echo $url . " with title : " . $title->nodeValue . " saved " . PHP_EOL;
        }
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
