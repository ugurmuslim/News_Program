<?php

namespace App\Http\Controllers\Admin;

use App\Jobs\FreshArticleSiteMapJob;
use App\Models\Article;
use App\Models\ArticleType;
use App\Models\Company;
use App\Models\CrawledArticle;
use App\Models\SitesToCrawl;
use App\Models\User;
use App\Parafesor\Constants\ArticleStatus;
use App\Parafesor\Constants\ArticleTypes;
use App\Parafesor\Helper\ArticleHelper;
use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request as RequestData;
use Yajra\DataTables\DataTables;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     * @throws Exception
     */
    public function index(RequestData $request)
    {
        $sites = SitesToCrawl::select('site_name')->groupBy('site_name')->get();
        $articleTypes = ArticleType::all();

        if ($request->ajax()) {
            return $this->searchDataTable($request);
        }

        return view('admin.Article.index')
            ->with('sites', $sites)
            ->with('articleTypes', $articleTypes);
    }

    /**
     * @throws Exception
     */
    public function searchDataTable(RequestData $request)
    {
        $user = User::find(Auth::user()->id);
        $editorId = Auth::user()->id;

        $articleTypeId = $request->input('ArticleTypeId');
        $status = $request->input('status');
        $database = $request->input('database');

        if ($database == "maria") {
            $query = Article::query();
        } else {
            $query = CrawledArticle::query();
            $query = $query->where('assigned', false);
        }

        $editorAssign = $editorId && $database == "maria" && ($request->input('editor') != 'all') && !$user->can('assign articles');
        Log::debug($editorId);
        $query->when($status, function ($query, $status) {
            return $query->where('status', $status);
        })
            ->when($articleTypeId, function ($query, $articleTypeId) {
                return $query->where('article_type_id', $articleTypeId);
            })
            ->when(!$articleTypeId && !$status, function ($query) {
                return $query->where('article_type_id', ArticleTypes::Ekonomi);
            })
            ->where('article_type_id', '!=', ArticleTypes::Twitter)
            ->where('article_type_id', '!=', ArticleTypes::KoseYazilari)
            ->with(['articleType']);

        if ($editorAssign) {
            Log::debug($editorId);
            $query = $query->where('editor_id', $editorId);
        }

        if ($database == "maria") {
            $query = $query->orderBy('created_at', 'DESC');
        } else {
            $query = $query->orderBy('pub_date', 'DESC');
        }

        return Datatables::of($query)
            ->editColumn('summary', function ($article) {
                return strip_tags(str_limit($article->summary));
            })
            ->editColumn('title', function ($article) {
                return '<a href="' . $article->original_link . '" target="_blank">' . $article->title . '</a>';
            })
            ->editColumn('image_path', function ($article) {
                return $article->image_path ? '<img src="' . asset($article->image_path) . '" width="100" loading="lazy" />' : '';
            })
            ->editColumn('editor_id', function ($article) {
                return $article->editor_id ? $article->editor->name : '-';
            })
            ->editColumn('assigner_id', function ($article) {
                return $article->assigner_id ? $article->assigner->name : '-';
            })
            ->editColumn('article_date', function ($article) use ($database) {
                $min = null;
                if (isset($article->status) && $article->status == 'ASSIGNED') {
                    $passedMinutes = \Carbon\Carbon::now()->diffInMinutes(new \Carbon\Carbon($article->created_at));
                    $passed = $passedMinutes > 20;
                    $min = '<button class="btn ' . ($passed ? "btn-danger" : "btn-success") . '">' . $passedMinutes . ' Dakika</button>';
                }

                if (isset($article->pub_date)) {
                    $date = '<span class="badge badge-dark">' . $article->pub_date . '</span>' . $min;
                } else {
                    $date = '<span class="badge badge-dark">' . $article->article_date . '</span>' . $min;
                }


                return $date;
            })
            /*->orderColumn('article_date', function ($query, $order) use ($database) {
                if (isset($article->pub_date)) {
                    $query->orderBy('pub_date', $order);
                } elseif (isset($article->article_date)) {
                    $query->orderBy('article_date', $order);
                } else {
                    $query->orderBy('created_at', $order);
                }
            })*/
            ->filterColumn('article_date', function ($query, $keyword) use ($database) {
                if (isset($article->pub_date)) {
                    $query->where('pub_date', 'like', "%{$keyword}%");
                } elseif (isset($article->article_date)) {
                    $query->where('article_date', 'like', "%{$keyword}%");
                } else {
                    $query->where('created_at', 'like', "%{$keyword}%");
                }
            })
            ->addColumn('action', function ($article) use ($database, $user) {
                $action = '<div class="btn-group">';
                if ($user->can('assign articles')) {
                    $action .= '<a href="' . route('article.assign',
                            $article->id) . '" class="btn btn-xs btn-primary">Atama</a> &nbsp;';
                }
                if ($user->can('edit articles')) {
                    $action .= '&nbsp;<a href="' . route('article.postUpdate',
                            $article->id) . '" class="btn btn-xs btn-info">Düzenle</a>';
                }
                if ($user->can('assign articles') && $database == "maria") {
                    $action .= '&nbsp;<button data-link="' . route('article.destroy',
                            $article->id) . '" class="btn btn-xs btn-danger rows-delete">Sil</button>';
                }
//            if ($user->can('assign articles')) {
//                $action .= '&nbsp;<form method="post" action="'.route('article.destroy', $article->id).'">
//                            <input type="hidden" name="_token" value="'.csrf_token().'">
//                            <input type="hidden" name="_method" value="DELETE">
//                            <input type="hidden" name="id" value="'.$article->id.'">
//                            <button type="submit" class="btn btn-xs btn-danger"> Sil</button>
//                        </form>';
//            }
                $action .= '</div>';
                return $action;
            })
            ->filterColumn('editor_id', function ($query, $keyword) {
                if (isset($query->editor_id)) {
                    $query->whereHas('editor', function ($query) use ($keyword) {
                        $query->where('name', 'like', "%{$keyword}%");
                    });
                }
            })
            ->filterColumn('assigner_id', function ($query, $keyword) {
                if (isset($query->assigner_id)) {
                    $query->whereHas('assigner', function ($query) use ($keyword) {
                        $query->where('name', 'like', "%{$keyword}%");
                    });
                }
            })
            ->rawColumns(['image_path', 'action', 'article_date', 'title'])
            ->make();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function assign($id)
    {
        $editors = User::role('Yazar')->get();
        $assigners = User::role('Editor')->get();
        $mergedUsers = $editors->merge($assigners);
        $companies = Company::all();
        $news = CrawledArticle::find($id);
        $articleTypes = ArticleType::all();
        return view('admin.Article.assign')
            ->with('news', $news)
            ->with('editors', $mergedUsers)
            ->with('companies', $companies)
            ->with('articleTypes', $articleTypes);
    }

    /**
     * Display a listing of the resource.
     *
     * @return RedirectResponse
     */
    public function assignStore($id)
    {
        $validator = Validator::make(Request::all(), [
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
        /*if (!$editor->hasRole('Yazar')) {
            Session::flash('error', "Rol bulunamadı!");
            return back();
        }*/

        $news = CrawledArticle::find($id);

        $articleType = ArticleType::find(Request::input("ArticleTypeId"));
        $company = Company::find(Request::input('CompanyId'));

        $image = $company ? $company->image_path : $news->image_path;

        if ($articleType->status == 0) {
            Session::flash('error', $articleType->title . " : Geçerli bir kategori girin! ");
            return back();
        }

        if (!$articleType) {
            Session::flash('error', "Haber tipi bulunamadı!");
            return back();
        }

        if (($articleType->id == ArticleTypes::SirketHaberleri || $articleType->id == ArticleTypes::Hisse) && !Request::input('CompanyId')) {
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
        $article->title = Request::input('Title');
        $article->company_id = Request::input('CompanyId');
        $article->show_case = Request::input('PlacementSection');
        $article->header_slider = Request::input('HeaderSection');
        $article->persistent = 0;
        $article->status = ArticleStatus::ASSIGNED;
        $article->summary = $news->summary;
        $article->external_site_id = $news->news_id;
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
     * @return bool|Application|Factory|View
     */
    public function postUpdate($id = null)
    {
        $companies = Company::all();
        $articleTypes = ArticleType::all();
        $user = User::find(Auth::user()->id);
        if ($id) {
            $article = Article::find($id);
            if (!$article) {
                abort(404);
            }
            return view('admin.Article.postUpdate')->with('articleTypes', $articleTypes)
                ->with("companies", $companies)
                ->with("user", $user)
                ->with("article", $article);
        }

        return view('admin.Article.postUpdate')->with('articleTypes', $articleTypes)
            ->with("companies", $companies);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function store(): RedirectResponse
    {
        Log::debug(json_encode([
            'type' => 'Article Object',
            'request' => Request::except(['image1']),
        ]));

        $validator = Validator::make(Request::all(), [
            'Title' => 'required|string',
            'Body' => 'required|string',
            'SeoTitle' => 'required|max:155|min:1',
        ]);

        if ($validator->fails()) {
            Log::debug(json_encode([
                'type' => 'Article validation error',
                'request' => $validator->errors(),
            ]));
            Session::flash('error', $validator->errors());
            return back()->withInput(Request::all());
        }

        $oldArticleTypeId = null;
        $articleCheck = false;
        $article = new Article();
        $slug = str_slug(Request::input('Title') . '-' . Carbon::now()->format('d-m-Y'), "-");
        if (Request::input('ArticleId')) {
            /**
             * @var $article Article
             */
            $article = Article::find(Request::input('ArticleId'));
            if (!$article) {
                abort(404);
            }
            $oldArticleTypeId = $article->article_type_id;
            $articleCheck = $article->status !== ArticleStatus::PUBLISHED;
            if ($article->status == ArticleStatus::PUBLISHED) {
                $slug = $article->slug;
            }
        }

        /* if ($articleCheck) {
             if (!ArticleHelper::checkDifferences(Request::input('BodyCheck'), Request::input('Body'))) {
                 Session::flash('error', "Metinde daha fazla değişiklik yapmanız lazım!");
                 return back()->withInput(Request::all());
             }
         }*/
        $articleType = ArticleType::find(Request::input('ArticleTypeId'));
        $imageUpload = ArticleHelper::checkImageUpload($articleType->id);

        if ($articleType->status == 0) {
            Session::flash('error', $articleType->title . " : Geçerli bir kategori girin! ");
            return back();
        }

        try {
            if (!Request::input('sameImage') && Request::input('savedImage') && !Request::hasFile('image') && $articleType->id != ArticleTypes::SirketHaberleri) {
                Log::debug(json_encode([
                    'type' => 'Article Started',
                    'message' => "Image is not inserted",
                    'user_id' => Auth::user()->id,
                    'user_name' => Auth::user()->name,
                ]));
                Session::flash('error', "Görsel seçmediniz halihazırdaki görseli de kullanmayacaksınız");
                return back()->withInput(Request::all());
            }

            $imageDimensions = json_decode($articleType->image_dimensions, true);
            if ($imageUpload) {
                if (Request::hasFile('image')) {
                    Log::debug(json_encode([
                        'type' => 'Image Saving',
                        'article_type' => $articleType->title,
                        'user_id' => Auth::user()->id,
                        'user_name' => Auth::user()->name,
                        'image' => Request::input('image'),
                        'image1' => Str::limit(Request::input('image1'), 20, $end = '...'),
                    ]));
                    $image_parts = explode(";base64,", Request::input('image1'));
                    $image_type_aux = explode("image/", $image_parts[0]);
                    $image_type = $image_type_aux[1];
                    $image_base64 = base64_decode($image_parts[1]);
                    $file = "images/" . uniqid() . '.webp';

                    if (Request::input('PlacementSection')) {
                        Image::make($image_base64)->encode('webp',
                            90)->resize($imageDimensions[Request::input('PlacementSection')]['width'],
                            $imageDimensions[Request::input('PlacementSection')]['height'])->save($file);
                    }

                    $article->image_path = $file;
                }
            }

            if (!$imageUpload) {
                if (!Request::input('CompanyId')) {
                    Log::debug(json_encode([
                        'type' => 'Article validation error',
                        'request' => "Company should be selected",
                    ]));
                    Session::flash('error', "Şirket seçilmeli");
                    return back()->withInput(Request::all());
                }
                $company = Company::find(Request::input('CompanyId'));
                $article->image_path = $company->image_path;
            }
            $article->title = Request::input('Title');
            $article->body = Request::input('Body');
            $article->status = ArticleStatus::PUBLISHED;
            $article->article_type_id = Request::input('ArticleTypeId');
            $article->show_case = Request::input('PlacementSection');
            $article->header_slider = Request::input('HeaderSection');
            $article->persistent = 0;
            $article->summary = Request::input('Description');
            $article->start_date = Request::input('StartedOn');
            $article->end_date = Carbon::now()->addYears(3);
            $article->editor_id = Auth::user()->id;
            $article->slug = $slug;
            $article->seo_title = Request::input('SeoTitle');
            $article->seo_description = Request::input('SeoDescription');
            $article->sort = 1;
//            $article->seo_keywords = Request::input('SeoKeywords');
            $article->article_date = Request::input('ArticleDate');
            Log::debug(json_encode([
                'type' => 'Article Saving',
                'article_type' => $articleType->title,
                'user_id' => Auth::user()->id,
                'user_name' => Auth::user()->name,
            ]));

            $article->save();
            //Sitemap index.
            dispatch(new FreshArticleSiteMapJob($article));
            if (Request::input('ArticleId')) {
                $articleDate = new Carbon($article->article_date);
                Artisan::call('sitemap:index', ['month' => $articleDate->month, 'year' => $articleDate->year]);
            }

            ArticleHelper::updateCache([$articleType->id]);

            if ($oldArticleTypeId) {
                ArticleHelper::updateCache([$oldArticleTypeId]);
            }
        } catch (Exception $e) {
            Log::error(json_encode([
                'type' => 'Article Save Error',
                'message' => $e->getMessage(),
            ]));
            Session::flash('error', $e->getMessage());
            return back()->withInput(Request::all());
        }

        Log::debug(json_encode([
            'type' => 'Article Saved',
            'article_type' => $articleType->title,
            'user_id' => Auth::user()->id,
            'user_name' => Auth::user()->name,
        ]));
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
        return view('admin.show');
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
        return view('admin.edit');
    }

    /**
     * Show the specified resource.
     */
    public function preview()
    {
        $returnHTML = view('admin.Article.preview')
            ->with('title', Request::input('title'))
            ->with('summary', Request::input('summary'))
            ->with('body', Request::input('body'))
            ->with('image', Request::input('file'))
            ->render();

        return response()->json(['success' => true, 'html' => $returnHTML]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
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
     * @return JsonResponse
     */
    public function destroy($id)
    {
        /**
         * @var $article Article
         */
        $article = Article::findOrFail($id);
        $articleTypeId = $article->article_type_id;
        $article->delete();

        ArticleHelper::updateCache([$articleTypeId]);

        dispatch(new FreshArticleSiteMapJob($article));

        Session::flash('success', "Başarı ile silindi");

        return response()->json(['success' => true]);
    }

    public
    function editorImageUpload()
    {
        $imagePath = "images/" . uniqid() . '.webp';
        Log::debug("EditorImageUpload Started");
        Image::make(request()->file('file'))->encode('webp', 90)
//            ->resize(480, 270)
            ->save($imagePath);
        Log::debug("EditorImageUpload Saved and will return");

        return response()->json(['location' => url('/') . "/" . $imagePath]);
    }

    public
    function imageDownload(
        $id
    )
    {
        $article = Article::find($id);
        $pieces = explode(" ", $article->title);
        $slug = str_slug(implode(" ", array_splice($pieces, 0, 5)));
        $img = $slug . '.jpg';
        file_put_contents($img, file_get_contents($article->image_path));

        return Response::download(public_path($img))->deleteFileAfterSend(true);
    }
}
