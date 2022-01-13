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
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Modules\Admin\Entities\Article;
use Modules\Admin\Entities\ArticleType;
use Modules\Admin\Entities\Menu;
use Spatie\Permission\Models\Role;
use Spatie\Sitemap\SitemapGenerator;

class SystemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function menuIndex()
    {
        $menu = Menu::orderBy('sort', 'ASC')->get();
        return view('admin::System.Menu.index')
            ->with('menu', $menu);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function menuPostUpdate($id = null)
    {

        if ($id) {
            $menuTitle = Menu::find($id);
            if (!$menuTitle) {
                abort(404);
            }
            return view('admin::System.Menu.postUpdate')
                ->with("menuTitle", $menuTitle);
        }

        return view('admin::System.Menu.postUpdate');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function menuStore($id = null)
    {
        $validator = Validator::make(\Illuminate\Support\Facades\Request::all(), [
            'Title' => 'required|string',
            'Url'   => 'required|string',
            'Sort'  => 'required|max:2|min:1',
        ]);

        if ($validator->fails()) {
            Session::flash('error', $validator->errors());
            return back()->withInput(Request::all());
        }

        $articleCheck = false;
        $menuTitle = new Menu();
        if (Request::input('MenuTitleId')) {
            $menuTitle = Menu::find(Request::input('MenuTitleId'));
            if (!$menuTitle) {
                abort(404);
            }
        }

        $menuTitle->title = Request::input('Title');
        $menuTitle->url = Request::input('Url');
        $menuTitle->sort = Request::input('Sort');
        $menuTitle->save();

        Session::flash('success', "İşlem Başarı ile Gerçekleştirildi");
        return back();

    }

    public function sitemapDownload() {
        SitemapGenerator::create('https://parafesor.net')->writeToFile('sitemap.xml');
        return response()->download('sitemap.xml', 'sitemap.xml',['Content-type => text/xml']);
    }
}

