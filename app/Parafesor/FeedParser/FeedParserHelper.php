<?php


namespace App\Parafesor\FeedParser;


use App\Parafesor\Constants\ArticleTypes;
use App\Parafesor\SimplePie\SimplePie;
use App\Parafesor\SimplePie\SimplePie\Item;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Modules\Admin\Entities\Article;
use Modules\Admin\Entities\CrawledArticle;
use Modules\Admin\Entities\SitesToCrawl;

class FeedParserHelper
{
    public static function parseFeed()
    {

        $sites = SitesToCrawl::where('status', true)
            ->where('article_type_id','!=', ArticleTypes::KoseYazilari)->get();
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

}

