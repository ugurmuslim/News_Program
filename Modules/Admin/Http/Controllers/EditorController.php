<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\User;
use App\Parafesor\Constants\ArticleStatus;
use App\Parafesor\Constants\ArticleTypes;
use App\Parafesor\Helper\ArticleHelper;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Modules\Admin\Entities\Article;
use Modules\Admin\Entities\ArticleType;

class EditorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function report()
    {
        $editorNews = DB::table('users')
            ->leftJoin('articles', 'users.id', '=', 'editor_id')
            ->where('articles.created_at', '>', Carbon::now()->subDays(30))
            ->get();

        $editors = [];
        foreach ($editorNews as $newsWithEditor) {

            isset($editors[$newsWithEditor->name]) ? : $editors[$newsWithEditor->name] = [];
            $date = $newsWithEditor->article_date ? new \Carbon\Carbon($newsWithEditor->article_date) : \Carbon\Carbon::now();
            isset($editors[$newsWithEditor->name]['assigned']) ? : $editors[$newsWithEditor->name]['assigned'] = 0;

            if($newsWithEditor->status == 'ASSIGNED') {
                $editors[$newsWithEditor->name]['assigned'] = $editors[$newsWithEditor->name]['assigned'] + 1;
            }

            $passedMinutes = $date->diffInMinutes(new \Carbon\Carbon($newsWithEditor->created_at));
            if ($passedMinutes > 20) {
                isset($editors[$newsWithEditor->name]['passed']) ? : $editors[$newsWithEditor->name]['passed'] = 0;
                $editors[$newsWithEditor->name]['passed'] = $editors[$newsWithEditor->name]['passed'] + 1;
            } else {
                isset($editors[$newsWithEditor->name]['onTime']) ? : $editors[$newsWithEditor->name]['onTime'] = 0;
                $editors[$newsWithEditor->name]['onTime'] = $editors[$newsWithEditor->name]['onTime'] + 1;
            }
        }
        return view('admin::Editor.report')
            ->with('editors', $editors);
    }


    public function log()
    {
        $query = Article::where('article_type_id','!=',ArticleTypes::BorsaTube)
        ->where('article_type_id','!=',ArticleTypes::KoseYazilari)
        ->where('article_type_id','!=',ArticleTypes::Twitter);

        $editorId = Auth::user()->id;
        $editors = User::role('Yazar')->get();

        $query = $query->orderBy('created_at', 'DESC');

        if (Request::input('editor')) {
            $query = $query->where('editor_id', $editorId);
        }

        $articles = $query->paginate(15);

        return view('admin::Editor.log')
            ->with('articles', $articles)
            ->with('editors', $editors);

    }


}

