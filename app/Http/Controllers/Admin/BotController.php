<?php


namespace App\Http\Controllers\Admin;


use App\Models\ArticleType;
use App\Models\CrawledArticle;
use App\Models\CrawledArticleTestLog;
use App\Models\SiteAttributes;
use App\Models\SitesToCrawl;
use App\Parafesor\Constants\ArticleTypes;
use App\Parafesor\FeedParser\FeedParserHelper;
use App\Parafesor\SiteCrawl\SiteCrawl;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class BotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function index()
    {

        $query = SitesToCrawl::query();
        $articleTypes = ArticleType::all();
        if (Request::input('ArticleTypeId')) {
            $query = $query->where('article_type_id', Request::input('ArticleTypeId'));
        }

        if (Request::input('siteName')) {
            $query = $query->where('siteName', Request::input('siteName'));
        }


        $bots = $query->paginate(15);
        return view('admin.Bot.index')
            ->with('bots', $bots)
            ->with('articleTypes', $articleTypes);
    }


    public function botAttributes($botId, $title)
    {
        $articleTypes = ArticleType::all();
        $botAttributes = SiteAttributes::where('title', $title)->get();
        $bot = SitesToCrawl::find($botId);

        $crawledArticles = CrawledArticleTestLog::where('site_to_crawl_id', $botId)
            ->where('message', '=', '[]')
            ->orderBy('pub_date', 'DESC')
            ->limit(15)
            ->get();

        $errors = CrawledArticleTestLog::where('site_to_crawl_id', $botId)
            ->whereNull('title')
            ->orderBy('id', 'DESC')
            ->limit(15)
            ->get();

        return view('admin.Bot.attribute')
            ->with('botAttributes', $botAttributes)
            ->with('bot', $bot)
            ->with('articleTypes', $articleTypes)
            ->with('crawledArticles', $crawledArticles)
            ->with('crawledErrors', $errors);
    }

    public function postUpdate($id = null)
    {
        $articleTypes = ArticleType::all();

        if ($id) {
            $siteToCrawl = SitesToCrawl::find($id);
            return view('admin.Bot.postUpdate')
                ->with('articleTypes', $articleTypes)
                ->with('siteToCrawl', $siteToCrawl);
        }
        return view('admin.Bot.postUpdate')
            ->with('articleTypes', $articleTypes);
    }

    public function store()
    {
        $validator = Validator::make(\Illuminate\Support\Facades\Request::all(), [
            'Name'          => 'required|string',
            'ChannelLink'   => 'required|string',
            'ArticleTypeId' => 'required',
        ]);

        if ($validator->fails()) {
            Session::flash('error', $validator->errors());
            return back()->withInput(Request::all());
        }

        if (Request::input('ArticleTypeId') == ArticleTypes::Youtube || Request::input('ArticleTypeId') == ArticleTypes::BorsaTube) {
            $strings = explode('/', Request::input('ChannelLink'));
            if (!in_array('channel', $strings)) {
                Session::flash('error', 'Youtube linkinin içinde channel geçmeli!');
                return back()->withInput(Request::all());
            }
        }

        $siteToCrawl = new SitesToCrawl();
        if (Request::input('id')) {
            $siteToCrawl = SitesToCrawl::find(Request::input('id'));
        }

        $siteToCrawl->article_type_id = Request::input('ArticleTypeId');
        $siteToCrawl->title = Request::input('ChannelLink');
        $siteToCrawl->site_name = Request::input('Name');
        $siteToCrawl->crawl_type = Request::input('CrawlType');
        $siteToCrawl->status = Request::input('status') ? 1 : 0;
        $siteToCrawl->save();

        Session::flash('success', "Başarı ile gerçekleştirildi");
        return back();
    }


    public function updateAttributes($botId, $title)
    {
        $runnable = true;

        if (!Request::input("runnable")) {
            $runnable = false;
        }

        SitesToCrawl::find($botId)
            ->update([ 'status' => $runnable, 'article_type_id' => Request::input("ArticleTypeId") ]);

        $requiredFields = [
            'title'   => [
                "attr"    => 'titleAttr',
                "content" => 'titleAttrContentPlace',
            ],
            'image'   => [
                "attr"    => 'imageAttr',
                "content" => 'imageAttrContentPlace',
            ],
            'summary' => [
                "attr"    => 'summaryAttr',
                "content" => 'summaryAttrContentPlace',
            ],
            'date'    => [
                "attr"    => 'dateAttr',
                "content" => 'dateAttrContentPlace',
            ],
            'source'  => [
                "attr"    => 'sourceAttr',
                "content" => 'sourceAttrContentPlace',
            ],
        ];
        foreach ($requiredFields as $key => $value) {
            SiteAttributes::updateOrCreate([ 'title' => $title, 'type' => $key ],
                [ 'value' => Request::input($value['attr']), 'content_place' => Request::input($value['content'] ), 'sites_to_crawl_id' => 1 ]);
        }
        ////div[@class="pht"]//img

        Session::flash('success', "Başarı ile değiştirildi!");
        return back();
    }

    public function report($date, $compareDate)
    {

        $dateReport = CrawledArticle::whereDate('created_at', new Carbon($date))->select('site_name', DB::raw('count(*) as total'))->groupBy('site_name')->pluck('total', 'site_name');

        $compareDateReport = CrawledArticle::whereDate('created_at', new Carbon($compareDate))->select('site_name', DB::raw('count(*) as total'))->groupBy('site_name')->pluck('total', 'site_name');
        $report = [];

        $dateFailure = CrawledArticle::whereDate('created_at', new Carbon($date))->whereNull('body')
            ->where('try_number', '>', 0)
            ->select('site_name', DB::raw('count(*) as total'))
            ->groupBy('site_name')
            ->pluck('total', 'site_name');

        $compareDateFailure = CrawledArticle::whereDate('created_at', new Carbon($compareDate))
            ->where('try_number', '>', 0)
            ->select('site_name', DB::raw('count(*) as total'))
            ->groupBy('site_name')
            ->pluck('total', 'site_name');

        foreach ($dateReport as $siteName => $total) {
            $report[$siteName]['total'] = $total;
            $report[$siteName]['failure'] = $dateFailure[$siteName] ?? 0;
            $report[$siteName]['compareTotal'] = $compareDateReport[$siteName] ?? 0;
            $report[$siteName]['compareFailure'] = $compareDateFailure[$siteName] ?? 0;
        }

        foreach ($compareDateReport as $siteName => $total) {
            if (!isset($report[$siteName])) {
                $report[$siteName]['total'] = 0;
                $report[$siteName]['failure'] = 0;
                $report[$siteName]['compareTotal'] = $total;
                $report[$siteName]['compareFailure'] = $compareDateFailure[$siteName] ?? 0;
            }
        }

        return view('admin.Bot.report')
            ->with('report', $report)
            ->with('date', $date)
            ->with('compareDate', $compareDate);

    }

    public function run()
    {
       /* Artisan::queue('feed:parser', [
        ]);

        Artisan::queue('site:crawl', [
        ]);*/
        Session::flash('success', " RSS Botları başarı ile çalıştı!");
        return back();

    }

    public function test($id)
    {
        $site = SitesToCrawl::find($id);

        if (!$site) {
            Session::flash('error', " Crawler bulunamadı.");
            return back();
        }

        $rssCrawl = $site->crawl_type == 0;

        if ($rssCrawl) {
            FeedParserHelper::parseFeed($site->title, true);
            Session::flash('success', " Çekildi. Kontrol edebilirsiniz!");
            return back();
        }

        SiteCrawl::siteCrawl($site->title, true);
        Session::flash('success', " Çekildi. Kontrol edebilirsiniz!");
        return back();

    }
}
