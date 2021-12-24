<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\User;
use App\Parafesor\Constants\ArticleStatus;
use App\Parafesor\Constants\ArticleTypes;
use App\Parafesor\Constants\CategorySectionTypes;
use App\Parafesor\Helper\ArticleHelper;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Modules\Admin\Entities\Article;
use Modules\Admin\Entities\ArticleType;
use Modules\Admin\Entities\StockTube;
use Symfony\Component\Console\Input\Input;

class StockTubeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function index()
    {
        $channel = 0;
        if (Request::input('channel')) {
            $channel = 1;
        }
        if ($channel == 0) {
            $articles = StockTube::where('status', ArticleStatus::PUBLISHED)
                ->whereIn('show_case', [ CategorySectionTypes::NORMAL, CategorySectionTypes::MAIN_SLIDER ])
                ->paginate(15);
        }

        if ($channel == 1) {
            $articles = StockTube::where('status', ArticleStatus::PUBLISHED)
                ->whereIn('show_case', [ CategorySectionTypes::CHANNEL])
                ->paginate(15);
        }
        return view("admin::StockTube.index")
            ->with('articles', $articles)
            ->with('channel', $channel);
    }


    public function postUpdate($id = null)
    {

        $channel = Request::input('channel');
        if ($id) {
            $article = StockTube::find($id);
            if (!$article) {
                abort(404);
            }
            return view('admin::StockTube.postUpdate')
                ->with("article", $article)
                ->with('channel', $channel);;
        }

        return view('admin::StockTube.postUpdate')
            ->with('channel', $channel);
    }


    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $validator = Validator::make(\Illuminate\Support\Facades\Request::all(), [
            'Title' => 'required|string',
        ]);

        $articleFound = false;
        $article = new StockTube();
        if (Request::input('ArticleId')) {
            $article = StockTube::find(Request::input('ArticleId'));
            if (!$article) {
                abort(404);
            }
            $articleFound = true;
        }

        if (Request::hasFile('image')) {
            $image_parts = explode(";base64,", Request::input('image1'));
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $file = "images/" . uniqid() . '.webp';
            $articleType = ArticleType::find(ArticleTypes::BorsaTube);
            $imageDimensions = json_decode($articleType->image_dimensions, true);

            if (Request::input('isShowCase') == 0) {
                Image::make($image_base64)->encode('webp', 90)->resize($imageDimensions['Normal']['width'], $imageDimensions['Normal']['height'])->save($file);
            }

            if (Request::input('isShowCase') == 1) {
                Image::make($image_base64)->encode('webp', 90)->resize($imageDimensions['Slider']['width'], $imageDimensions['Slider']['height'])->save($file);
            }

            if (Request::input('isShowCase') == 2) {
                Image::make($image_base64)->encode('webp', 90)->resize($imageDimensions['Logo']['width'], $imageDimensions['Logo']['height'])->save($file);
            }

            $article->image_path = $file;
        }

        $article->title = Request::input('Title');
        $article->original_link = Request::input('originalLink');
        $article->show_case = Request::input('isShowCase');

        $article->save();

        ArticleHelper::updateCache([], true);

        Session::flash('success', "Başarı ile yaratıldı");
        return back()->withInput(Request::all());

    }

}

