<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\User;
use App\Parafesor\Constants\ArticleStatus;
use App\Parafesor\Helper\ArticleHelper;
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
use Modules\Admin\Entities\CrawledArticle;
use Modules\Admin\Entities\SitesToCrawl;

class ArticleTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function index()
    {
        $articleTypes = ArticleType::all();
        return view('admin::ArticleType.index')
            ->with('articleTypes', $articleTypes);

    }

    public function postUpdate($id = null)
    {
        if ($id) {
            $articleType = ArticleType::find($id);
            if (!$articleType) {
                abort(404);
            }
            $imageDimensions = json_decode($articleType->image_dimensions, true);

            return view('admin::ArticleType.postUpdate')
                ->with("articleType", $articleType)
                ->with("imageDimensions", $imageDimensions);
        }

        return view('admin::ArticleType.postUpdate');
    }

    public function store($id = null)
    {
        ;
        if ($id) {
            $articleType = ArticleType::find($id);
            if (!$articleType) {
                abort(404);
            }
            $articleType->image_Dimensions = json_encode(Request::input('images'));
            $articleType->save();
        }
        Session::flash('success', "Başarı ile yaratıldı");
        return back();
    }
}
