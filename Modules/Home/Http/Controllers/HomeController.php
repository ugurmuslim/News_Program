<?php

namespace Modules\Home\Http\Controllers;

use App\Parafesor\Altinkaynak\Altinkaynak;
use App\Parafesor\Constants\CacheConst;
use App\Parafesor\Constants\CategorySectionTypes;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Response;
use Jenssegers\Date\Date;
use Modules\Admin\Entities\Article;
use Modules\Admin\Entities\ArticleType;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function index()
    {
        $slider = Cache::get(CacheConst::ARTICLE . 'Slider');

        $articleTypes = ArticleType::all();
        $mostReads = Cache::get(CacheConst::MOST_READ_ARTICLE . 'Articles');
        $articles = [];
        foreach ($articleTypes as $articleType) {
            $articles[$articleType->title]["Normal"] = Cache::get(CacheConst::ARTICLE . $articleType->title . ":" . "Normal");
            $articles[$articleType->title]["ShowCase"] = Cache::get(CacheConst::ARTICLE . $articleType->title . ":" . "ShowCase");
        }
        $currencies['Crypto'] = Cache::get(CacheConst::CURRENCIES . 'CRYPTO');
        $currencies['Fiat'] = Cache::get(CacheConst::CURRENCIES . 'FIAT');

        return view('home::index4')
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
        $sliders = Cache::get(CacheConst::ARTICLE . 'Slider');

        $articleTypes = ArticleType::all();
        $mostReads = Cache::get(CacheConst::MOST_READ_ARTICLE . 'Articles');
        $mainSliders = Cache::get(CacheConst::ARTICLE . CategorySectionTypes::HEADER_SLIDER);
        $articles = [];
        foreach ($articleTypes as $articleType) {
            $articles[$articleType->title][CategorySectionTypes::MAIN_SLIDER] = Cache::get(CacheConst::ARTICLE . $articleType->title . ":" . CategorySectionTypes::MAIN_SLIDER);
            $articles[$articleType->title][CategorySectionTypes::NORMAL] = Cache::get(CacheConst::ARTICLE . $articleType->title . ":" . CategorySectionTypes::NORMAL);
            $articles[$articleType->title][CategorySectionTypes::SECOND_SLIDER] = Cache::get(CacheConst::ARTICLE . $articleType->title . ":" . CategorySectionTypes::SECOND_SLIDER);
            $articles[$articleType->title][CategorySectionTypes::CHANNEL] = Cache::get(CacheConst::ARTICLE . $articleType->title . ":" . CategorySectionTypes::CHANNEL);
        }
        $currencies['Crypto'] = Cache::get(CacheConst::CURRENCIES . 'CRYPTO');
        $currencies['Fiat'] = Cache::get(CacheConst::CURRENCIES . 'FIAT');
        return view('home::index3')
            ->with('mainSliders', $mainSliders)
            ->with('articles', $articles)
            ->with('slider', $sliders)
            ->with('currencies', $currencies)
            ->with('mostReads', $mostReads);
    }


    public function mainSliders()
    {
        $sliders = Cache::get(CacheConst::ARTICLE . CategorySectionTypes::HEADER_SLIDER);

        $sliderArray = [];
        foreach ($sliders as $slider) {
            $sliderArray[] = [
                "caption" => $slider->title,
                "image" => asset($slider->image_path),
                "slug" => $slider->slug,
                "createdAt" => Date::parse($slider->article_date)->format('j F'),
                "createdAtTime" => Carbon::parse($slider->article_date)->format('H:i'),
            ];
        }

        return Response::json($sliderArray);
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
     * @param Request $request
     *
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     *
     * @param int $id
     *
     * @return Renderable
     */
    public function show($id)
    {
        return view('home::show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
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
     * @param Request $request
     * @param int     $id
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
     * @param int $id
     *
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
