<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\User;
use App\Parafesor\Constants\ArticleStatus;
use App\Parafesor\Constants\ArticleTypes;
use App\Parafesor\Helper\ArticleHelper;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Modules\Admin\Entities\Article;
use Modules\Admin\Entities\ArticleType;
use Modules\Admin\Entities\Company;
use Modules\Admin\Entities\CrawledArticle;
use Modules\Admin\Entities\SitesToCrawl;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function index()
    {
        $sites = SitesToCrawl::select('site_name')->groupBy('site_name')->get();
        $articleTypeId = Request::input('ArticleTypeId');
        $status = Request::input('status');
        $database = Request::input('database');
        $editorId = Auth::user()->id;

        if ($database != "maria") {
            $query = CrawledArticle::query();
            $query = $query->where('assigned', false);;
        } else {
            $query = Article::query();
        }

        if ($status) {
            $query = $query->where('status', $status);
        }


        if ($editorId && $database == "maria" && ( Request::input('editor') != 'all' )) {
            $query = $query->where('editor_id', $editorId);
        }

        if ($articleTypeId && $database == "maria") {
            $query = $query->where('article_type_id', $articleTypeId);
        }

        if ($articleTypeId && $database != "maria") {
            $query = $query->where('article_type_id', $articleTypeId);
        }

        $query->orderBy('created_at', 'DESC');
        $newsAll = $query->paginate(15);
        $articleTypes = ArticleType::all();

        return view('admin::Article.index')
            ->with('sites', $sites)
            ->with('newsAll', $newsAll)
            ->with('articleTypes', $articleTypes);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function assign($id)
    {
        $editors = User::role('Yazar')->get();
        $companies = Company::all();
        $news = CrawledArticle::find($id);
        $articleTypes = ArticleType::all();
        return view('admin::Article.assign')
            ->with('news', $news)
            ->with('editors', $editors)
            ->with('companies', $companies)
            ->with('articleTypes', $articleTypes);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function assignStore($id)
    {
        $validator = Validator::make(\Illuminate\Support\Facades\Request::all(), [
            'editorId' => 'required',
        ]);

        if ($validator->fails()) {
            Session::flash('error', $validator->errors());
            return back()->withInput(Request::all());
        }


        $editorId = Request::input('editorId');
        $editor = User::find($editorId);

        if (!$editor) {
            Session::flash('error', "Editor bulunamadı!");
            return back();
        }
        if (!$editor->hasRole('Yazar')) {
            Session::flash('error', "Rol bulunamadı!");
            return back();
        }

        $news = CrawledArticle::find($id);

        $articleType = ArticleType::find(Request::input("ArticleTypeId"));
        $company = Company::find(Request::input('CompanyId'));

        $image = $company ? $company->image_path : $news->image_path;
        if (!$articleType) {
            Session::flash('error', "Haber tipi bulunamadı!");
            return back();
        }

        if ($articleType->id == ArticleTypes::SirketHaberleri && !Request::input('CompanyId')) {
            Session::flash('error', "Şirket Seçmeniz lazım!!");
            return back();

        }
        $body = trim(preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", strip_tags($news->body, '<p><script>')));

        $article = new Article();
        $article->old_body = $news->body;
        $article->editor_id = $editorId;
        $article->assigner_id = Auth::user()->id;
        $article->original_link = $news->original_link;
        $article->site_name = $news->site_name;
        $article->article_type_id = $articleType->id;
        $article->company_id = Request::input('CompanyId');
        $article->status = ArticleStatus::ASSIGNED;
        $article->summary = $news->summary;
        $article->external_site_id = $news->news_id;
        $article->title = $news->title;
        $article->image_path = $image;
        $article->article_date = $news->pubDate;
        $article->sort = 100;
        $article->save();

        $news->assigned = true;
        $news->save();

        Session::flash('success', "Haber Başarı ile devredildi");
        return redirect()->route('article.index');

    }


    /**
     * Show the form for creating a new resource.
     *
     * @param $id
     *
     * @return bool|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function postUpdate($id = null)
    {
        $companies = Company::all();
        $articleTypes = ArticleType::all();
        if ($id) {
            $article = Article::find($id);
            if (!$article) {
                abort(404);
            }
            return view('admin::Article.postUpdate')->with('articleTypes', $articleTypes)
                ->with("companies", $companies)
                ->with("article", $article);
        }

        return view('admin::Article.postUpdate')->with('articleTypes', $articleTypes)
            ->with("companies", $companies);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $validator = Validator::make(\Illuminate\Support\Facades\Request::all(), [
            'Title'    => 'required|string',
            'Body'     => 'required|string',
            'SeoTitle' => 'required|max:40|min:1',
        ]);

        if ($validator->fails()) {
            Session::flash('error', $validator->errors());
            return back()->withInput(Request::all());
        }

        $articleCheck = false;
        $article = new Article();
        if (Request::input('ArticleId')) {
            $article = Article::find(Request::input('ArticleId'));
            if (!$article) {
                abort(404);
            }
            $articleCheck = $article->status !== ArticleStatus::PUBLISHED;
        }

        if ($articleCheck) {
            if (!ArticleHelper::checkDifferences(Request::input('BodyCheck'), Request::input('Body'))) {
                Session::flash('error', "Metinde daha fazla değişiklik yapmanız lazım!");
                return back()->withInput(Request::all());
            }
        }
        $articleType = ArticleType::find(Request::input('ArticleTypeId'));
        Log::warning(json_encode([
            'type'         => 'Article Started',
            'article_type' => $articleType->title,
            'user_id'      => Auth::user()->id,
            'user_name'    => Auth::user()->name,
        ]));
        if (!Request::input('sameImage') && Request::input('savedImage') && !Request::hasFile('image') && $articleType->id != ArticleTypes::SirketHaberleri) {
            Session::flash('error', "Görsel seçmediniz halihazırdaki görseli de kullanmayacaksınız");
            return back()->withInput(Request::all());
        }

        $imageDimensions = json_decode($articleType->image_dimensions, true);
        if ($articleType->id != ArticleTypes::SirketHaberleri) {
            if (Request::hasFile('image')) {
                Log::warning(json_encode([
                    'type'         => 'Image Saving',
                    'article_type' => $articleType->title,
                    'user_id'      => Auth::user()->id,
                    'user_name'    => Auth::user()->name,
                    'image'        => Request::input('image'),
                    'image1'       => Str::limit(Request::input('image1'), 20, $end = '...'),
                ]));
                $image_parts = explode(";base64,", Request::input('image1'));
                $image_type_aux = explode("image/", $image_parts[0]);
                $image_type = $image_type_aux[1];
                $image_base64 = base64_decode($image_parts[1]);
                $file = "images/" . uniqid() . '.webp';

                if (Request::input('PlacementSection')) {
                    Image::make($image_base64)->encode('webp', 90)->resize($imageDimensions[Request::input('PlacementSection')]['width'], $imageDimensions[Request::input('PlacementSection')]['height'])->save($file);
                }

                $article->image_path = $file;
            }
        }

        if ($articleType->id == ArticleTypes::SirketHaberleri) {
            $company = Company::find(Request::input('CompanyId'));
            $article->image_path = $company->image_path;
        }
        $article->title = Request::input('Title');
        $article->body = Request::input('Body');
        $article->status = ArticleStatus::PUBLISHED;
        $article->article_type_id = Request::input('ArticleTypeId');
        $article->show_case = Request::input('PlacementSection');
        $article->header_slider = Request::input('HeaderSection');
        $article->persistent = Request::input('PersistentSection');
        $article->summary = Request::input('Description');
        $article->start_date = Request::input('StartedOn');
        $article->end_date = Request::input('EndOn');
        $article->editor_id = Auth::user()->id;
        $article->slug = str_slug(Request::input('Title'), "-");;
        $article->seo_title = Request::input('SeoTitle');
        $article->seo_description = Request::input('SeoDescription');
        $article->sort = 1;
        $article->seo_keywords = Request::input('SeoKeywords');
        $article->article_date = Request::input('ArticleDate');
        Log::warning(json_encode([
            'type'         => 'Article Saving',
            'article_type' => $articleType->title,
            'user_id'      => Auth::user()->id,
            'user_name'    => Auth::user()->name,
        ]));
        try {
            $article->save();
            ArticleHelper::updateCache([ $articleType->id ]);
        } catch (\Exception $e {
            Session::flash('error', $e->getMessage()et);
            return back();
        }


        Session::flash('success', "Başarı ile yaratıldı");
        return back();

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
     * Show the specified resource.
     */
    public function preview()
    {
        $returnHTML = view('admin::Article.preview')
            ->with('title', Request::input('title'))
            ->with('summary', Request::input('summary'))
            ->with('body', Request::input('body'))
            ->with('image', Request::input('file'))
            ->render();

        return response()->json([ 'success' => true, 'html' => $returnHTML ]);

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
