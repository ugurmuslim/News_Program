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
use Spatie\Permission\Models\Role;

class SystemUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function index()
    {
        $users = User::with('roles')->get();
        return view('admin::SystemUser.index')
            ->with('users', $users);

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

        $roles = Role::all();
        if ($id) {
            $user = User::find($id);
            if (!$user) {
                abort(404);
            }
            return view('admin::SystemUser.postUpdate')->with('roles', $roles)
                ->with("user", $user);
        }

        return view('admin::SystemUser.postUpdate')->with('roles', $roles);
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
            'Name'     => 'required|string',
        ]);

        if ($validator->fails()) {
            Session::flash('error', $validator->errors());
            return back()->withInput(Request::all());
        }

        $user = new User();
        if (Request::input('UserId')) {
            $user = User::find(Request::input('UserId'));
            if (!$user) {
                abort(404);
            }
            $role = $user->roles()->first()->name;
            $user->removeRole($role);
        }

        if(Request::input('Password')) {
            $user->password =  Hash::make(Request::input('Password'));
        }
        $user->name = Request::input('Name');
        $user->email = Request::input('Email');
        $user->assignRole(Request::input('Role'));
        $user->save();

        Session::flash('success', "Başarı ile yaratıldı");
        return back();

    }


}

