<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
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
        return view('admin.SystemUser.index')
          ->with('users', $users);
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
        $roles = Role::all();
        if ($id) {
            $user = User::find($id);
            if (!$user) {
                abort(404);
            }
            return view('admin.SystemUser.postUpdate')->with('roles', $roles)
              ->with("user", $user);
        }

        return view('admin.SystemUser.postUpdate')->with('roles', $roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     *
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $validator = Validator::make(Request::all(), [
          'Name' => 'required|string',
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

        if (Request::input('Password')) {
            $user->password = Hash::make(Request::input('Password'));
        }
        $user->name = Request::input('Name');
        $user->email = Request::input('Email');
        $user->assignRole(Request::input('Role'));
        $user->save();

        Session::flash('success', "Başarı ile yaratıldı");
        return back();
    }


}

