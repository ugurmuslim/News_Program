<?php


namespace App\Parafesor\FeedParser;


use App\Parafesor\Constants\ArticleTypes;
use App\Parafesor\Constants\CrawlTypes;
use App\Parafesor\SimplePie\SimplePie;
use App\Parafesor\SimplePie\SimplePie\Item;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Modules\Admin\Entities\Article;
use Modules\Admin\Entities\CrawledArticle;
use Modules\Admin\Entities\CrawledArticleTestLog;
use Modules\Admin\Entities\SitesToCrawl;
use SebastianBergmann\CodeCoverage\Report\PHP;

class FeedParserHelper
{
    public static function parseFeed($siteTitle = null, $test = false)
    {
        if (!$siteTitle) {
            $sites = SitesToCrawl::where('status', true)
                ->where('article_type_id', '!=', ArticleTypes::KoseYazilari)
                ->where('crawl_type', '=', CrawlTypes::RSS)->get();
        }

        if ($siteTitle) {
            $sites = SitesToCrawl::where('article_type_id', '!=', ArticleTypes::KoseYazilari)
                ->where('title', $siteTitle)
                ->where('crawl_type', '=', CrawlTypes::RSS)->get();
        }
        foreach ($sites as $site) {
            $feed = new SimplePie();
            $feed->cache = false;
            $feed->set_feed_url($site->title);
            $success = $feed->init();
            $feed->handle_content_type();
            foreach ($feed->get_items() as $item) {

                if (!$test) {
                    $crawledArticle = CrawledArticle::where('original_link', $item->get_link())->first();
                }

                if ($test) {
                    $crawledArticle = CrawledArticleTestLog::where('original_link', $item->get_link())->first();
                }

                if ($crawledArticle) {
                    echo $item->get_link() . " found in the table. Wıll not be crawled" . PHP_EOL;
                    continue;
                }
                /**
                 * @var $item  Item
                 */

                $desc_dom = $item->get_description();

                $doc = new \DOMDocument();
                @$doc->loadHTML($desc_dom);

                $image = null;

                $tags = $doc->getElementsByTagName('img');

                if ($tags->count() > 0) {
                    foreach ($tags as $tag) {
                        $image = $tag->getAttribute('src');
                    }
                }

                if ($image == null) {
                    $image = $item->get_thumbnail();
                }

                if ($image == null) {
                    if (isset($item->data['child'][""]['image'][0]['data'])) {
                        $image = $item->data['child'][""]['image'][0]['data'];
                    }
                }

                if ($image == null) {
                    if ($d = $item->get_enclosure()) {
                        $image = $d->get_link();
                    }
                    if ($image == null) {
                        echo "Could not find image";
                    }
                }
                if (in_array('yazarlar', explode('/', $item->get_link()))) {
                    continue;
                }

                try {
                    if (!$test) {
                        CrawledArticle::insert([
                            "news_id"         => $item->get_id(),
                            "title"           => strip_tags($item->get_title()),
                            "original_link"   => $item->get_link(),
                            "article_type_id" => $site->article_type_id,
                            "pub_date"        => Carbon::createFromFormat('d F Y, g:i A', $item->get_date())->format('Y-m-d H:i:s'),
                            "summary"         => strip_tags($item->get_description()),
                            "image_path"      => $image,
                            "try_number"      => 0,
                            "site_name"       => $site->site_name,
                            "body"            => null,
                            "created_at"      => Carbon::now(),
                            "updated_at"      => Carbon::now(),
                        ]);
                        echo "Saved \n";
                    }

                    if ($test) {
                        CrawledArticleTestLog::create([
                            "title"            => strip_tags($item->get_title()),
                            "site_to_crawl_id" => $site->id,
                            "original_link"    => $item->get_link(),
                            "article_type_id"  => $site->article_type_id,
                            "pub_date"         => Carbon::createFromFormat('d F Y, g:i A', $item->get_date())->format('Y-m-d H:i:s'),
                            "summary"          => strip_tags($item->get_description()),
                            "image_path"       => $image,
                            "site_name"        => $site->site_name,
                            "body"             => null,
                            "message"          => '[]',
                            "created_at"       => Carbon::now(),
                            "updated_at"       => Carbon::now(),
                        ]);
                        echo "Saved \n";
                    }
                } catch (\Exception $e) {
                    echo $e->getMessage();
                }

            }

        }

    }

    public static function parseFeedMock()
    {

        $sites = SitesToCrawl::where('status', true)->get();
        foreach ($sites as $site) {
            $feed = new SimplePie();
            $feed->cache = false;
            $feed->set_feed_url($site->title);
            $success = $feed->init();
            $feed->handle_content_type();
            foreach ($feed->get_items() as $item) {
                /**
                 * @var $item  Item
                 */

                $desc_dom = $item->get_description();

                $doc = new \DOMDocument();
                @$doc->loadHTML($desc_dom);

                $image = null;

                $tags = $doc->getElementsByTagName('img');

                if ($tags->count() > 0) {
                    foreach ($tags as $tag) {
                        $image = $tag->getAttribute('src');
                    }
                }

                if ($image == null) {
                    $image = $item->get_thumbnail();
                }

                if ($image == null) {
                    if (isset($item->data['child'][""]['image'][0]['data'])) {
                        $image = $item->data['child'][""]['image'][0]['data'];
                    }
                }

                if ($image == null) {
                    if ($d = $item->get_enclosure()) {
                        $image = $d->get_link();
                    }
                    if ($image == null) {
                        echo "Could not find image";
                    }
                }


                try {
                    Article::insert([
                        'title'           => strip_tags($item->get_title()),
                        'body'            => strip_tags($item->get_description()),
                        'status'          => 'PUBLISHED',
                        'article_type_id' => $site->article_type_id,
                        'image_path'      => $image,
                        'show_case'       => 'NORMAL',
                        'header_slider'   => 1,
                        'persistent'      => 0,
                        'summary'         => strip_tags($item->get_description()),
                        'editor_id'       => 1,
                        'slug'            => str_slug(strip_tags($item->get_title()), "-"),
                        'seo_title'       => strip_tags($item->get_title()),
                        'seo_description' => strip_tags($item->get_title()),
                        'sort'            => 1,
                        'seo_keywords'    => strip_tags($item->get_title()),
                        'article_date'    => Carbon::now(),
                    ]);
                    echo "Saved \n";
                } catch (\Exception $e) {
                    echo $e->getMessage();
                }

            }

        }

    }

    public static function aaBotParser()
    {

        $categoryArray = [
            5 => ArticleTypes::Teknoloji,
            1 => ArticleTypes::Ekonomi,
            2 => ArticleTypes::Spor,
            3 => ArticleTypes::Ekonomi,
            4 => ArticleTypes::Yasam,
            6 => ArticleTypes::Ekonomi,
            7 => ArticleTypes::Yasam,
        ];

        foreach ($categoryArray as $key => $value) {
            $response = Http::withBasicAuth("api_aa_bot", 'Yazilim2022')->asForm()
                ->post("https://api.aa.com.tr/abone/search/", [
                    'filter_category' => $key,
                    'filter_type'     => 1,
                    'limit'           => 20,
//                    'end_date'        => '2022-01-30T23:00:00Z',
                ])
                ->json();

            if (!isset($response['data']['result'])) {
                continue;
            }

            foreach ($response['data']['result'] as $item) {
                $crawled = CrawledArticle::where('news_id', $item['id'])->first();
                if ($crawled) {
                    echo "Already crawled : " . $item['id'] . PHP_EOL;
                    continue;
                }
                try {
                    $article = CrawledArticle::create([
                        "news_id"         => $item['group_id'] ?? $item['id'],
                        "title"           => $item['title'],
                        "original_link"   => $item['id'],
                        "article_type_id" => $value,
                        "pub_date"        => date('Y-m-d H:i:s', strtotime($item['date'])),
                        "summary"         => $item['title'],
                        "image_path"      => null,
                        "try_number"      => 0,
                        "site_name"       => 'AABOT',
                        "body"            => null,
                        "created_at"      => Carbon::now(),
                        "updated_at"      => Carbon::now(),
                    ]);
                    echo "sleeping : " . PHP_EOL;
                    usleep(600000);
                    echo "slept : " . PHP_EOL;

                    $response = Http::withBasicAuth("api_aa_bot", 'Yazilim2022')->asForm()
                        ->get('https://api.aa.com.tr/abone/document/' . $item['id'] . '/newsml29', [
                        ])->body();
                    $xml = simplexml_load_string($response);
                    $json = json_encode($xml);
                    $array = json_decode($json, true);

                    $body = null;
                    $keywords = null;
                    $image = null;
                    $link = false;
                    if (isset($array['itemSet']['newsItem']['contentSet']['inlineXML']['nitf']['body']['body.content'])) {
                        echo "Body Found " . PHP_EOL;
                        $body = $array['itemSet']['newsItem']['contentSet']['inlineXML']['nitf']['body']['body.content'];
                    }

                    if (isset($array['itemSet']['newsItem']['contentMeta']['keyword'])) {
                        $keywords = $array['itemSet']['newsItem']['contentMeta']['keyword'];
                        if (!is_array($keywords)) {
                            $keywords = [ $keywords ];
                        }
                    }


                    if (isset($array['itemSet']['newsItem']['itemMeta']['link'])) {
                        foreach ($array['itemSet']['newsItem']['itemMeta']['link'] as $link) {
                            if (isset($link['@attributes']['residref'])) {
                                if (in_array('picture', explode(':', $link['@attributes']['residref']))) {
                                    $response = Http::withoutRedirecting()->withBasicAuth("api_aa_bot", 'Yazilim2022')->asForm()
                                        ->get('https://api.aa.com.tr/abone/token/' . $link['@attributes']['residref'] . '/print', [
                                        ]);
                                    $image = $response->header('Location');
                                }
                            }
                        }
                    }

                    $article->keywords = $keywords;
                    $article->body = $body;
                    $article->image_path = $image;
                    $article->save();

                    echo "Saved \n";
                } catch (\Exception $e) {
                    echo $e->getMessage();
                }
            }
        }
    }

}

