<?php


namespace App\Parafesor\Helper;

use App\Models\Article;
use App\Models\ArticleType;
use App\Models\CrawledArticle;
use App\Models\StockTube;
use App\Parafesor\Constants\ArticleStatus;
use App\Parafesor\Constants\ArticleTypes;
use App\Parafesor\Constants\CacheConst;
use App\Parafesor\Constants\CategorySectionTypes;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;

class ArticleHelper
{
    public static function updateCache(array $articleTypes, bool $stockTube = false)
    {
        foreach ($articleTypes as $type) {
            $articleType = ArticleType::find($type);
            $articlesByType = Article::where('articles.status', ArticleStatus::PUBLISHED)
                ->select('title', 'original_link', 'image_path', 'summary', 'slug', 'article_date')
                ->when($type == ArticleTypes::Twitter, function ($query, $type) {
                    return $query->leftJoin('external_source_users', 'external_source_user_id', '=', 'external_source_users.id')
                        ->select('articles.body', 'articles.external_site_id', 'articles.external_source_user_id', 'articles.article_date', 'external_source_users.image', 'external_source_users.name');
                })
                ->where('articles.article_type_id', $articleType->id)
                ->where('persistent', 0)
                ->when($type == ArticleTypes::GUNDEM, function ($query, $type) {
                    return $query->where('header_slider', 0);
                })
                ->where('start_date', '<', Carbon::now())
                ->where('show_case', CategorySectionTypes::NORMAL)
                ->orderby('articles.article_date', 'DESC')
                ->limit(15)
                ->get()
                ->toArray();

            $articlesMainSlider = Article::where('articles.status', ArticleStatus::PUBLISHED)
                ->select('title', 'original_link', 'image_path', 'summary', 'slug', 'article_date')
                ->where('article_type_id', $articleType->id)
                ->when($type == ArticleTypes::GUNDEM, function ($query, $type) {
                    return $query->where('header_slider', 0);
                })
                ->where('show_case', '=', CategorySectionTypes::MAIN_SLIDER)
                ->where('start_date', '<', Carbon::now())
                ->orderby('articles.article_date', 'DESC')
                ->limit(6)
                ->get()
                ->toArray();

            $articlesSecondSlider = Article::where('articles.status', ArticleStatus::PUBLISHED)
                ->select('title', 'original_link', 'image_path', 'summary', 'slug', 'article_date')
                ->where('article_type_id', $articleType->id)
                ->when($type == ArticleTypes::GUNDEM, function ($query, $type) {
                    return $query->where('header_slider', 0);
                })
                ->where('show_case', '=', CategorySectionTypes::SECOND_SLIDER)
                ->where('start_date', '<', Carbon::now())
                ->orderby('articles.article_date', 'DESC')
                ->limit(6)
                ->get()
                ->toArray();

            /*    $articlesPersistent = Article::where('articles.status', ArticleStatus::PUBLISHED)
                    ->select('title','original_link', 'image_path','summary', 'slu
            g','article_date')
                    ->where('article_type_id', $articleType->id)
                    ->when($type == ArticleTypes::GUNDEM, function ($query, $type) {
                        return $query->where('header_slider', 0);
                    })
                    ->where('persistent', '=', 1)
                    ->where('start_date', '<', Carbon::now())
                    ->orderby('articles.article_date', 'DESC')
                    ->limit(1)
                    ->get();*/


            Cache::put(CacheConst::ARTICLE . $articleType->title . ":" . CategorySectionTypes::NORMAL, $articlesByType);
            Cache::put(CacheConst::ARTICLE . $articleType->title . ":" . CategorySectionTypes::MAIN_SLIDER,
                $articlesMainSlider);
            Cache::put(CacheConst::ARTICLE . $articleType->title . ":" . CategorySectionTypes::SECOND_SLIDER,
                $articlesSecondSlider);
//            Cache::put(CacheConst::ARTICLE . $articleType->title . ":" . CategorySectionTypes::PERSISTENT, $articlesPersistent);

            Log::info("Article Type " . $articleType->title . " cached");
        }

        if ($stockTube) {
            $stockTubes = StockTube::where('status', ArticleStatus::PUBLISHED)
                ->select('original_link', 'image_path')
                ->where('show_case', CategorySectionTypes::NORMAL)
                ->orderBy('created_at', 'DESC')
                ->limit(15)
                ->get();

            $stockTubesChannel = StockTube::where('status', ArticleStatus::PUBLISHED)
                ->select('original_link', 'image_path')
                ->where('show_case', CategorySectionTypes::CHANNEL)
                ->orderBy('created_at', 'DESC')
                ->limit(15)
                ->get();

            $stockTubesShowCase = StockTube::where('status', ArticleStatus::PUBLISHED)
                ->select('original_link', 'image_path')
                ->where('show_case', CategorySectionTypes::MAIN_SLIDER)
                ->orderBy('created_at', 'DESC')
                ->limit(1)
                ->get();

            Cache::put(CacheConst::ARTICLE . 'Borsa Tube:' . CategorySectionTypes::NORMAL, $stockTubes);
            Cache::put(CacheConst::ARTICLE . 'Borsa Tube:' . CategorySectionTypes::CHANNEL, $stockTubesChannel);
            Cache::put(CacheConst::ARTICLE . 'Borsa Tube:' . CategorySectionTypes::MAIN_SLIDER, $stockTubesShowCase);
        }

        $articles = Article::where('articles.status', ArticleStatus::PUBLISHED)
            ->select('title', 'original_link', 'image_path', 'summary', 'created_at', 'slug', 'article_date')
            ->where('articles.header_slider', 1)
            ->orderby('articles.created_at', 'DESC')
            ->limit(10)
            ->get();

        $lastMinute = Article::where('articles.status', ArticleStatus::PUBLISHED)
            ->select('title', 'original_link', 'image_path', 'summary', 'slug', 'article_date')
            ->where('articles.article_type_id', '!=', ArticleTypes::Twitter)
            ->where('articles.article_type_id', '!=', ArticleTypes::KoseYazilari)
            ->where('articles.article_type_id', '!=', ArticleTypes::BorsaTube)
            ->where('articles.article_type_id', '!=', ArticleTypes::SirketHaberleri)
            ->where('start_date', '<', Carbon::now())
            ->orderby('articles.created_at', 'DESC')
            ->limit(15)
            ->get()
            ->toArray();


        Cache::put(CacheConst::ARTICLE . "Son Dakika:" . CategorySectionTypes::NORMAL, $lastMinute);
        Cache::put(CacheConst::ARTICLE . CategorySectionTypes::HEADER_SLIDER, $articles);
    }

    public static function updateMostReadArticles()
    {
        $articles = Article::where('created_at', '>', Carbon::now()->startOfDay())
            ->select('title', 'original_link', 'image_path', 'summary', 'slug', 'article_date')
            ->where('status', '=', ArticleStatus::PUBLISHED)
            ->where('article_type_id', '!=', ArticleTypes::Twitter)
            ->where('article_type_id', '!=', ArticleTypes::KoseYazilari)
            ->where('article_type_id', '!=', ArticleTypes::SirketHaberleri)
            ->where('start_date', '<', Carbon::now())
            ->orderBy('read', 'DESC')
            ->limit(8)
            ->get()
            ->toArray();

        /*$articles = Article::where('created_at', '>', Carbon::now()->startOfDay())
          ->where('start_date', '<', Carbon::now())
          ->whereNotIn('status', [ArticleStatus::PUBLISHED, ArticleTypes::Twitter, ArticleTypes::KoseYazilari, ArticleTypes::SirketHaberleri])
          ->orderBy('read', 'DESC')
          ->limit(8)
          ->get(['title', 'original_link', 'image_path', 'summary', 'slug', 'article_date']);*/

        Cache::put(CacheConst::MOST_READ_ARTICLE . 'Articles', $articles);
    }


    public static function checkDifferences($originalArticle, $updatedArticle): bool
    {
        $strippedOriginal = strip_tags($originalArticle);
        $strippedUpdated = strip_tags($updatedArticle);
        /*if (!self::similarTextCheck($strippedOriginal, $strippedUpdated)) {
            dd(1);
            return false;
        }
*/
        if (!self::arrayTextCheck($strippedOriginal, $strippedUpdated)) {
            return false;
        }
        return true;
    }

    public static function arrayTextCheck($strippedOriginal, $strippedUpdated): bool
    {
        $strippedOriginal = explode(' ', strip_tags($strippedOriginal));
        $strippedUpdated = explode(' ', strip_tags($strippedUpdated));
        $difference = array_diff($strippedOriginal, $strippedUpdated);
        while ($a = array_search("", $difference)) {
            unset($difference[$a]);
        }

        return count($difference) / count($strippedOriginal) * 100 > 20;
    }

    public static function similarTextCheck($strippedOriginal, $strippedUpdated): bool
    {
        $strippedOriginal = preg_replace('/\s+/', '', strip_tags($strippedOriginal));
        $strippedUpdated = preg_replace('/\s+/', '', strip_tags($strippedUpdated));
        $lengthOfStrippedArticle = strlen($strippedOriginal);
        $similartText = similar_text($strippedOriginal, $strippedUpdated);
        return $similartText / $lengthOfStrippedArticle * 100 > 70;
    }

    public static function PostgreToMariaSyncer()
    {
        /*$connection = DB::connection('pgsql');
        $query = $connection->table("newsCrawler_news");
        $articlesInPostgre = $query->where('category', "COLUMN")
            ->whereDate('pubDate', Carbon::today())
            ->get();*/

        $articles = CrawledArticle::where('article_type_id', ArticleTypes::KoseYazilari)
            ->where('assigned', 0)
            ->get();

        try {
            foreach ($articles as $article) {
                $body = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", strip_tags($article->body));

                $articleInMain = Article::where('article_type_id', 3)
                    ->where('original_link', $article->original_link)
                    ->first();

                if ($articleInMain) {
                    continue;
                }

                Article::create([
                    'article_type_id' => ArticleTypes::KoseYazilari,
                    'title' => $article->title,
                    'body' => $body,
                    'summary' => $body,
                    'original_link' => $article->original_link,
                    'status' => ArticleStatus::PUBLISHED,
                    'image_path' => $article->image_path,
                    'article_date' => $article->pub_date,
                    'show_case' => CategorySectionTypes::NORMAL,
                    'start_date' => Carbon::now(),
                    'end_date' => Carbon::now()->add(1, 'day'),
                ]);

                $article->assigned = 1;
                $article->save();
            }
        } catch (Exception $e) {
            dd($e);
        }
    }

    public static function checkImageUpload($articleTypeId): bool
    {
        if ($articleTypeId == ArticleTypes::SirketHaberleri && Request::input('PlacementSection') == CategorySectionTypes::MAIN_SLIDER) {
            return true;
        }

        if ($articleTypeId == ArticleTypes::SirketHaberleri || $articleTypeId == ArticleTypes::Hisse) {
            return false;
        }

        return true;
    }
}
