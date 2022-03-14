<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Modules\Admin\Entities\MegaMenu;
use Modules\Admin\Http\Requests\MegaMenuStoreRequest;
use Modules\Admin\Http\Requests\MegaMenuUpdateRequest;

class MegaMenuController extends Controller
{
		/**
		 * Display a listing of the resource.
		 * @return Renderable
		 */
		public function index()
		{
				$menu = MegaMenu::orderBy('sort')->get();

				return view('admin::System.MegaMenu.index', compact('menu'));
		}

		/**
		 * Show the form for creating a new resource.
		 * @return Renderable
		 */
		public function create()
		{
				$last = MegaMenu::max('sort');

				return view('admin::System.MegaMenu.create', compact('last'));
		}

		/**
		 * Store a newly created resource in storage.
		 * @param MegaMenuStoreRequest $request
		 * @return RedirectResponse
		 */
		public function store(MegaMenuStoreRequest $request)
		{
				MegaMenu::create($request->validated());

				Session::flash('success', "İşlem Başarı ile Gerçekleştirildi");

				return back();
		}

		/**
		 * Show the specified resource.
		 * @param int $id
		 * @return Renderable
		 */
		public function show($id)
		{
				return view('admin::show');
		}

		/**
		 * Show the form for editing the specified resource.
		 * @param MegaMenu $megaMenu
		 * @return Renderable
		 */
		public function edit(MegaMenu $megaMenu)
		{
				return view('admin::System.MegaMenu.edit', compact('megaMenu'));
		}

		/**
		 * Update the specified resource in storage.
		 * @param MegaMenuUpdateRequest $request
		 * @param MegaMenu $megaMenu
		 * @return RedirectResponse
		 */
		public function update(MegaMenuUpdateRequest $request, MegaMenu $megaMenu)
		{
				$megaMenu->update($request->validated());

				Session::flash('success', "İşlem Başarı ile Gerçekleştirildi");

				return back();
		}

		/**
		 * Remove the specified resource from storage.
		 * @param MegaMenu $megaMenu
		 * @return RedirectResponse
		 */
		public function destroy(MegaMenu $megaMenu)
		{
				$megaMenu->delete();

				Session::flash('success', "İşlem Başarı ile Gerçekleştirildi");

				return back();
		}
}
