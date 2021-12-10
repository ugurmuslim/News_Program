<?php

namespace App\Console\Commands;

use App\Parafesor\Constants\ArticleStatus;
use App\Parafesor\Constants\ArticleTypes;
use App\Parafesor\Constants\CacheConst;
use App\Parafesor\Constants\CategorySectionTypes;
use App\Parafesor\Helper\ArticleHelper;
use http\Env\Request;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Modules\Admin\Entities\Article;
use Modules\Admin\Entities\ArticleType;
use Modules\Admin\Entities\StockTube;

class ArticleCache extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'article:cache {--typeId=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $articleTypes = ArticleType::where('status', 1)->pluck('id')->toArray();
        ArticleHelper::updateCache($articleTypes, true);

       /* foreach ($articleTypes as $articleType) {
            $articlesByType = Article::where('articles.status', ArticleStatus::PUBLISHED)
                ->where('article_type_id', $articleType->id)
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


        $articles = Article::where('articles.status', ArticleStatus::PUBLISHED)
            ->where('articles.header_slider', 1)
            ->orderby('articles.created_at', 'DESC')
            ->limit(7)
            ->get();

        $lastMinute = Article::where('articles.status', ArticleStatus::PUBLISHED)
            ->where('articles.article_type_id', '!=', ArticleTypes::Twitter)
            ->where('articles.article_type_id', '!=', ArticleTypes::KoseYazilari)
            ->where('articles.article_type_id', '!=', ArticleTypes::BorsaTube)
            ->orderby('articles.created_at', 'DESC')
            ->limit(7)
            ->get();


        Cache::put(CacheConst::ARTICLE . "Son Dakika:" . CategorySectionTypes::NORMAL, $lastMinute);
        Cache::put(CacheConst::ARTICLE . CategorySectionTypes::HEADER_SLIDER, $articles);
        Cache::put(CacheConst::ARTICLE . 'Borsa Tube:' . CategorySectionTypes::NORMAL, $stockTubes);
        Cache::put(CacheConst::ARTICLE . 'Borsa Tube:' . CategorySectionTypes::CHANNEL, $stockTubesChannel);
        Cache::put(CacheConst::ARTICLE . 'Borsa Tube:' . CategorySectionTypes::MAIN_SLIDER, $stockTubesShowCase);*/
    }
}
