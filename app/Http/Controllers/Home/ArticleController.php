<?php

namespace App\Http\Controllers\Home;

use App\Parafesor\Constants\ArticleStatus;
use App\Parafesor\Constants\ArticleTypes;
use App\Parafesor\Constants\CacheConst;
use App\Parafesor\Constants\CategorySectionTypes;
use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use App\Models\Article;
use App\Models\ArticleType;
use App\Models\StockTube;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function index($type)
    {
        $articleType = ArticleType::where('slug', $type)->first();

        if (!$articleType) {
            abort(404);
        }

        $articles = [];
        $articles[$articleType->title][CategorySectionTypes::MAIN_SLIDER] = Cache::get(CacheConst::ARTICLE.$articleType->title.":".CategorySectionTypes::MAIN_SLIDER);
        $articles[$articleType->title][CategorySectionTypes::NORMAL] = Cache::get(CacheConst::ARTICLE.$articleType->title.":".CategorySectionTypes::NORMAL);
        $articles[$articleType->title][CategorySectionTypes::SECOND_SLIDER] = Cache::get(CacheConst::ARTICLE.$articleType->title.":".CategorySectionTypes::SECOND_SLIDER);
        $articles[$articleType->title][CategorySectionTypes::CHANNEL] = Cache::get(CacheConst::ARTICLE.$articleType->title.":".CategorySectionTypes::CHANNEL);
//        $articles[$articleType->title][CategorySectionTypes::PERSISTENT] = Cache::get(CacheConst::ARTICLE . $articleType->title . ":" . CategorySectionTypes::PERSISTENT);

        $articlesDB = [];
        $articlesDB[$articleType->title] = Article::where('status', ArticleStatus::PUBLISHED)
          ->where('article_type_id', $articleType->id)
          ->where('show_case', CategorySectionTypes::NORMAL)
          ->orderBy('id', 'DESC')
          ->limit(50)
          ->get();

        if ($articleType->id == ArticleTypes::SonDakika) {
            $articlesDB[$articleType->title] = Article::where('status', ArticleStatus::PUBLISHED)
              ->where('article_type_id', '!=', ArticleTypes::KoseYazilari)
              ->where('article_type_id', '!=', ArticleTypes::Twitter)
              ->where('article_type_id', '!=', ArticleTypes::BorsaTube)
              ->orderBy('id', 'DESC')
              ->limit(30)
              ->get();
        }

        if ($articleType->id == ArticleTypes::EnCokOkunanlar) {
            $articlesDB[$articleType->title] = Article::where('status', ArticleStatus::PUBLISHED)
              ->where('article_type_id', '!=', ArticleTypes::KoseYazilari)
              ->where('article_type_id', '!=', ArticleTypes::Twitter)
              ->where('article_type_id', '!=', ArticleTypes::BorsaTube)
              ->orderBy('read', 'DESC')
              ->limit(32)
              ->get();
        }

        if ($articleType->id == ArticleTypes::BorsaTube) {
            $articlesDB[$articleType->title] = StockTube::where('status', ArticleStatus::PUBLISHED)
              ->where('show_case', CategorySectionTypes::NORMAL)
              ->skip(11)
              ->orderBy('id', 'DESC')
              ->limit(32)
              ->get();
        }

        $currencies['Crypto'] = Cache::get(CacheConst::CURRENCIES.'CRYPTO');
        $currencies['Fiat'] = Cache::get(CacheConst::CURRENCIES.'FIAT');

        return view($articleType->page_path)
          ->with('articles', $articles)
          ->with('articlesDB', $articlesDB)
          ->with('currencies', $currencies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Renderable
     */
    public function create()
    {
        return view('home::create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     *
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    public function imageDimensions($typeId)
    {
        $articleType = ArticleType::find($typeId);

        if (!$articleType) {
            return Response::json(["error" => "Kategori bulunamadı"]);
        }

        $array = json_decode($articleType->image_dimensions, true);

        return Response::json($array);
    }

    /**
     * Show the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|RedirectResponse
     */
    public function show($slug)
    {
        $article = Article::where('slug', $slug)->first();

        if (!isset($article->articleType->title)) {
            return back();
        }

        $relatedArticles = Cache::get(CacheConst::ARTICLE.$article->articleType->title.":".CategorySectionTypes::NORMAL);

        if (!$article) {
            abort(404);
        }

        if (\Illuminate\Support\Facades\Request::header('x-forwarded-for')) {
            if (!$article->ip_addresses || !in_array(\Illuminate\Support\Facades\Request::header('x-forwarded-for'),
                $article->ip_addresses)) {
                Log::debug('ip => '.\Illuminate\Support\Facades\Request::header('x-forwarded-for').'Read for the first time');
                $article->read = $article->read + 1;
                $article->timestamps = false;
                $ipArray = $article->ip_addresses;

                if (!$ipArray) {
                    $ipArray = [];
                }

                $ipArray[] = \Illuminate\Support\Facades\Request::header('x-forwarded-for');
                $article->ip_addresses = $ipArray;
                try {
                    $article->save([]);
                } catch (Exception $e) {
                    Log::debug('error in Article show => '.$e->getMessage());
                }
            }
        }

        return view('home.Article.show')
          ->with('article', $article)
          ->with('relatedArticles', $relatedArticles);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return Renderable
     */
    public function edit($id)
    {
        return view('home::edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     *
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
