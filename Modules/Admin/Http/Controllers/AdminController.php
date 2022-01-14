<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\User;
use App\Parafesor\Constants\ArticleStatus;
use App\Parafesor\Constants\ArticleTypes;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Admin\Entities\Article;
use Modules\Admin\Entities\ArticleType;
use Modules\Admin\Entities\CrawledArticle;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function index()
    {
        $crawledArticleCount = CrawledArticle::whereDate('created_at', Carbon::today())->count();
        $publishedArticleCount = Article::where('status', ArticleStatus::PUBLISHED)->count();
        $assignedArticleCount = Article::where('status', ArticleStatus::ASSIGNED)->count();
        $readerCount = User::role('Editor')->count();
        $publishedArticles = Article::where('status', ArticleStatus::PUBLISHED)
            ->where('article_type_id', '!=', ArticleTypes::BorsaTube)
            ->where('article_type_id', '!=', ArticleTypes::Twitter)
            ->where('article_type_id', '!=', ArticleTypes::KoseYazilari)
            ->orderBy('article_date', 'DESC')
            ->limit(20)->get();

        return view('admin::index')
            ->with('crawledArticleCount', $crawledArticleCount)
            ->with('publishedArticleCount', $publishedArticleCount)
            ->with('assignedArticleCount', $assignedArticleCount)
            ->with('readerCount', $readerCount)
            ->with('publishedArticles', $publishedArticles);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Renderable
     */
    public function create()
    {
        return view('admin::create');
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
        return view('admin::show');
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
        return view('admin::edit');
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
