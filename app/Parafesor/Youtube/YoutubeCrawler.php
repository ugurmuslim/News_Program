<?php

namespace App\Parafesor\Youtube;

use App\Parafesor\Constants\ArticleTypes;
use App\Parafesor\Constants\CrawlTypes;
use Carbon\Carbon;
use Modules\Admin\Entities\CrawledArticle;
use Modules\Admin\Entities\SitesToCrawl;
use Modules\Admin\Entities\StockTube;

class YoutubeCrawler
{
    /**
     * @var mixed
     */
    private $apiKey;

    public function __construct()
    {
        $this->apiKey = env('YOUTUBE_API_KEY');
    }

    public function crawler()
    {
        $channelsToCrawl = SitesToCrawl::where('article_type_id', ArticleTypes::Youtube)
            ->orWhere('article_type_id', ArticleTypes::BorsaTube)
            ->where('status', 1)
            ->get();

        foreach ($channelsToCrawl as $channelToCrawl) {
            $array = explode('channel/', $channelToCrawl->title);
            if (!isset($array[1])) {
                continue;
            }
            $channelId = $array[1];
            $Max_Results = 5;

// Get videos from channel by YouTube Data API
            $apiData = @file_get_contents('https://www.googleapis.com/youtube/v3/search?order=date&part=snippet&channelId=' . $channelId . '&maxResults=' . $Max_Results . '&key=' . $this->apiKey . '');
            if ($apiData) {
                $videoList = json_decode($apiData, true);
            } else {
                echo 'Invalid API key or channel ID.';
                continue;
            }
            foreach ($videoList['items'] as $video) {
                try {
                    if ($channelToCrawl->article_type_id == ArticleTypes::Youtube) {
                        CrawledArticle::create([
                            'news_id'         => $video['id']['videoId'],
                            'article_type_id' => $channelToCrawl->article_type_id,
                            'title'           => $video['snippet']['title'],
                            'summary'         => $video['snippet']['description'],
                            'original_link'   => 'https://www.youtube.com/watch?v=' . $video['id']['videoId'],
                            'image_path'      => $video['snippet']['thumbnails']['high']['url'],
                            'site_name'       => $channelToCrawl->site_name,
                            'pub_date'        => new Carbon($video['snippet']['publishedAt']),
                        ]);
                    }
                    if ($channelToCrawl->article_type_id == ArticleTypes::BorsaTube) {
                        $crawled = StockTube::where('original_link', 'https://www.youtube.com/watch?v=' . $video['id']['videoId'])->first();
                        if($crawled) {
                            continue;
                        }
                        StockTube::create([
                            'title'         => $video['snippet']['title'],
                            'original_link' => 'https://www.youtube.com/watch?v=' . $video['id']['videoId'],
                            'image_path'    => $video['snippet']['thumbnails']['high']['url'],
                            'show_case'     => 'NORMAL',
                            'status'        => 'PUBLISHED',
                        ]);
                    }
                } catch (\Exception $e) {
                    echo $e->getMessage() . PHP_EOL;
                }

            }
        }
    }
}
