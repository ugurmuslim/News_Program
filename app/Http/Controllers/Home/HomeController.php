<?php

namespace App\Http\Controllers\Home;

use App\Parafesor\Constants\CacheConst;
use App\Parafesor\Constants\CategorySectionTypes;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Response;
use Jenssegers\Date\Date;
use App\Models\ArticleType;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function index()
    {
        $slider = Cache::get(CacheConst::ARTICLE.'Slider');

        $articleTypes = ArticleType::all();
        $mostReads = Cache::get(CacheConst::MOST_READ_ARTICLE.'Articles');
        $articles = [];
        foreach ($articleTypes as $articleType) {
            $articles[$articleType->title]["Normal"] = Cache::get(CacheConst::ARTICLE.$articleType->title.":"."Normal");
            $articles[$articleType->title]["ShowCase"] = Cache::get(CacheConst::ARTICLE.$articleType->title.":"."ShowCase");
        }
        $currencies['Crypto'] = Cache::get(CacheConst::CURRENCIES.'CRYPTO');
        $currencies['Fiat'] = Cache::get(CacheConst::CURRENCIES.'FIAT');

        return view('home.index4')
          ->with('articles', $articles)
          ->with('slider', $slider)
          ->with('currencies', $currencies)
          ->with('mostReads', $mostReads);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function indexTest()
    {
        $articles = [];
//
//        $sliders = Cache::get(CacheConst::ARTICLE . 'Slider');
        $articleTypes = ArticleType::all();
        $mostReads = Cache::get(CacheConst::MOST_READ_ARTICLE.'Articles');
        $mainSliders = Cache::get(CacheConst::ARTICLE.CategorySectionTypes::HEADER_SLIDER);

        foreach ($articleTypes as $articleType) {
            $articles[$articleType->title][CategorySectionTypes::MAIN_SLIDER] = Cache::get(CacheConst::ARTICLE.$articleType->title.":".CategorySectionTypes::MAIN_SLIDER);
            $articles[$articleType->title][CategorySectionTypes::NORMAL] = Cache::get(CacheConst::ARTICLE.$articleType->title.":".CategorySectionTypes::NORMAL);
            $articles[$articleType->title][CategorySectionTypes::SECOND_SLIDER] = Cache::get(CacheConst::ARTICLE.$articleType->title.":".CategorySectionTypes::SECOND_SLIDER);
            $articles[$articleType->title][CategorySectionTypes::CHANNEL] = Cache::get(CacheConst::ARTICLE.$articleType->title.":".CategorySectionTypes::CHANNEL);
        }
        $currencies['Crypto'] = Cache::get(CacheConst::CURRENCIES.'CRYPTO');
        $currencies['Fiat'] = Cache::get(CacheConst::CURRENCIES.'FIAT');

        return view('home.index3', [
          'articles'    => $articles,
          'currencies'  => $currencies,
          'mostReads'   => $mostReads,
          'mainSliders' => $mainSliders
        ]);

    }


    public function mainSliders()
    {
        $sliders = Cache::get(CacheConst::ARTICLE.CategorySectionTypes::HEADER_SLIDER);

        $sliderArray = [];
        foreach ($sliders as $slider) {
            $sliderArray[] = [
              "caption"       => $slider->title,
              "image"         => asset($slider->image_path),
              "slug"          => $slider->slug,
              "createdAt"     => Date::parse($slider->article_date)->format('j F'),
              "createdAtTime" => Carbon::parse($slider->article_date)->format('H:i'),
            ];
        }

        return Response::json($sliderArray);
    }
}
