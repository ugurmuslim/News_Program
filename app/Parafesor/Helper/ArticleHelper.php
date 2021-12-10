<?php


namespace App\Parafesor\Helper;


use App\Parafesor\Constants\ArticleStatus;
use App\Parafesor\Constants\ArticleTypes;
use App\Parafesor\Constants\CacheConst;
use App\Parafesor\Constants\CategorySectionTypes;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Modules\Admin\Entities\Article;
use Modules\Admin\Entities\ArticleType;
use Modules\Admin\Entities\CrawledArticle;
use Modules\Admin\Entities\StockTube;

class ArticleHelper
{
    public static function updateCache(array $articleTypes, bool $stockTube = false)
    {
        foreach ($articleTypes as $type) {
            $articleType = ArticleType::find($type);

            $articlesByType = Article::where('articles.status', ArticleStatus::PUBLISHED)
                ->where('article_type_id', $articleType->id)
                ->where('persistent', 0)
                ->where('show_case', CategorySectionTypes::NORMAL)
                ->orderby('articles.article_date', 'DESC')
                ->limit(15)
                ->get();

            $articlesMainSlider = Article::where('articles.status', ArticleStatus::PUBLISHED)
                ->where('article_type_id', $articleType->id)
                ->where('show_case', '=', CategorySectionTypes::MAIN_SLIDER)
                ->orderby('articles.article_date', 'DESC')
                ->limit(4)
                ->get();

            $articlesSecondSlider = Article::where('articles.status', ArticleStatus::PUBLISHED)
                ->where('article_type_id', $articleType->id)
                ->where('show_case', '=', CategorySectionTypes::SECOND_SLIDER)
                ->orderby('articles.article_date', 'DESC')
                ->limit(4)
                ->get();

            $articlesPersistent = Article::where('articles.status', ArticleStatus::PUBLISHED)
                ->where('article_type_id', $articleType->id)
                ->where('persistent', '=', 1)
                ->orderby('articles.article_date', 'DESC')
                ->limit(1)
                ->get();


            Cache::put(CacheConst::ARTICLE . $articleType->title . ":" . CategorySectionTypes::NORMAL, $articlesByType);
            Cache::put(CacheConst::ARTICLE . $articleType->title . ":" . CategorySectionTypes::MAIN_SLIDER, $articlesMainSlider);
            Cache::put(CacheConst::ARTICLE . $articleType->title . ":" . CategorySectionTypes::SECOND_SLIDER, $articlesSecondSlider);
            Cache::put(CacheConst::ARTICLE . $articleType->title . ":" . CategorySectionTypes::PERSISTENT, $articlesPersistent);

        }

        if ($stockTube) {
            $stockTubes = StockTube::where('status', ArticleStatus::PUBLISHED)
                ->where('show_case', CategorySectionTypes::NORMAL)
                ->limit(15)
                ->get();

            $stockTubesChannel = StockTube::where('status', ArticleStatus::PUBLISHED)
                ->where('show_case', CategorySectionTypes::CHANNEL)
                ->limit(15)
                ->get();

            $stockTubesShowCase = StockTube::where('status', ArticleStatus::PUBLISHED)
                ->where('show_case', CategorySectionTypes::MAIN_SLIDER)
                ->limit(1)
                ->get();

            Cache::put(CacheConst::ARTICLE . 'Borsa Tube:' . CategorySectionTypes::NORMAL, $stockTubes);
            Cache::put(CacheConst::ARTICLE . 'Borsa Tube:' . CategorySectionTypes::CHANNEL, $stockTubesChannel);
            Cache::put(CacheConst::ARTICLE . 'Borsa Tube:' . CategorySectionTypes::MAIN_SLIDER, $stockTubesShowCase);
        }

        $articles = Article::where('articles.status', ArticleStatus::PUBLISHED)
            ->where('articles.header_slider', 1)
            ->orderby('articles.created_at', 'DESC')
            ->limit(7)
            ->get();

        $lastMinute = Article::where('articles.status', ArticleStatus::PUBLISHED)
            ->where('articles.article_type_id', '!=', ArticleTypes::Twitter)
            ->where('articles.article_type_id', '!=', ArticleTypes::KoseYazilari)
            ->where('articles.article_type_id', '!=', ArticleTypes::BorsaTube)
            ->where('articles.article_type_id', '!=', ArticleTypes::SirketHaberleri)
            ->orderby('articles.created_at', 'DESC')
            ->limit(7)
            ->get();


        Cache::put(CacheConst::ARTICLE . "Son Dakika:" . CategorySectionTypes::NORMAL, $lastMinute);
        Cache::put(CacheConst::ARTICLE . CategorySectionTypes::HEADER_SLIDER, $articles);

    }

    public static function updateMostReadArticles()
    {
        $articles = Article::whereBetween('created_at', [ Carbon::now()->subDays(2), Carbon::now() ])
            ->where('status', '=', ArticleStatus::PUBLISHED)
            ->where('article_type_id', '!=', ArticleTypes::Twitter)
            ->where('article_type_id', '!=', ArticleTypes::KoseYazilari)
            ->where('article_type_id', '!=', ArticleTypes::SirketHaberleri)
            ->orderBy('read', 'DESC')
            ->limit(8)
            ->get();

        Cache::put(CacheConst::MOST_READ_ARTICLE . 'Articles', $articles);

    }

    public static function checkDifferences($originalArticle, $updatedArticle)
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

    public static function similarTextCheck($strippedOriginal, $strippedUpdated)
    {
        $strippedOriginal = preg_replace('/\s+/', '', strip_tags($strippedOriginal));
        $strippedUpdated = preg_replace('/\s+/', '', strip_tags($strippedUpdated));
        $lengthOfStrippedArticle = strlen($strippedOriginal);
        $similartText = similar_text($strippedOriginal, $strippedUpdated);
        return $similartText / $lengthOfStrippedArticle * 100 > 70;
    }

    public static function arrayTextCheck($strippedOriginal, $strippedUpdated)
    {

        $strippedOriginal = explode(' ', strip_tags($strippedOriginal));
        $strippedUpdated = explode(' ', strip_tags($strippedUpdated));
        $difference = array_diff($strippedOriginal, $strippedUpdated);
        while ($a = array_search("", $difference)) {
            unset($difference[$a]);
        }

        return count($difference) / count($strippedOriginal) * 100 > 20;
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
                    ->where('original_link', $article->link)
                    ->first();

                if ($articleInMain) {
                    continue;
                }

                Article::create([
                    'article_type_id' => ArticleTypes::KoseYazilari,
                    'title'           => $article->title,
                    'body'            => $body,
                    'original_link'   => $article->original_link,
                    'status'          => ArticleStatus::PUBLISHED,
                    'image_path'      => $article->image_path,
                    'article_date'    => $article->pub_date,
                    'language_id'     => 'TR',
                    'show_case'       => CategorySectionTypes::NORMAL,
                ]);

                $article->assigned = 1;
                $article->save();
            }
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
