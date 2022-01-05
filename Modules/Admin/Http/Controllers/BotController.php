<?php


namespace Modules\Admin\Http\Controllers;


use App\Console\Commands\FeedParser;
use App\Parafesor\Constants\ArticleTypes;
use App\Parafesor\FeedParser\FeedParserHelper;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Modules\Admin\Entities\ArticleType;
use Modules\Admin\Entities\CrawledArticle;
use Modules\Admin\Entities\SiteAttributes;
use Modules\Admin\Entities\SitesToCrawl;

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
        return view('admin::Bot.index')
            ->with('bots', $bots)
            ->with('articleTypes', $articleTypes);
    }


    public function botAttributes($botId, $title)
    {
        $articleTypes = ArticleType::all();
        $botAttributes = SiteAttributes::where('title', $title)->get();
        $bot = SitesToCrawl::find($botId);
        return view('admin::Bot.attribute')
            ->with('botAttributes', $botAttributes)
            ->with('bot', $bot)
            ->with('articleTypes', $articleTypes);
    }

    public function postUpdate()
    {
        $articleTypes = ArticleType::all();
        return view('admin::Bot.postUpdate')
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

        if (Request::input('ArticleTypeId') == ArticleTypes::Youtube) {
            $strings = explode('/', Request::input('ChannelLink'));
            if (!in_array('channel', $strings)) {
                Session::flash('error', 'Youtube linkinin içinde channel geçmeli!');
                return back()->withInput(Request::all());
            }
        }
        SitesToCrawl::create([
            'article_type_id' => Request::input('ArticleTypeId'),
            'title'           => Request::input('ChannelLink'),
            'site_name'       => Request::input('Name'),
            'crawl_type'      => 0,
            'status'          => 1,
        ]);

        Session::flash('success', "Başarı ile yaratıldı");
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

        SiteAttributes::where('title', $title)
            ->where('type', 'image')
            ->update([ 'value' => Request::input('imageAttr') ]);

        SiteAttributes::where('title', $title)
            ->where('type', 'body')
            ->update([ 'value' => Request::input('bodyAttr') ]);


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

        return view('admin::Bot.report')
            ->with('report', $report)
            ->with('date', $date)
            ->with('compareDate', $compareDate);

    }

    public function run()
    {
        Artisan::queue('feed:parser', [
        ]);
        Session::flash('success', " RSS Botları başarı ile çalıştı!");
        return back();

    }
}
