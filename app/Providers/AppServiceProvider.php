<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use App\Models\MegaMenu;
use App\Models\Menu;
use View;

class AppServiceProvider extends ServiceProvider
{
		/**
		 * Register any application services.
		 *
		 * @return void
		 */
		public function register()
		{
				setlocale(LC_TIME, config('app.locale'));
		}

		/**
		 * Bootstrap any application services.
		 *
		 * @return void
		 */
		public function boot()
		{
				Paginator::useBootstrap();
				Carbon::setLocale(config('app.locale'));

				$headerMenu = Menu::orderBy('sort', 'asc')->get();
				$megaMenu = MegaMenu::where('active', 1)->orderBy('sort', 'asc')->get();

				View::share('headerMenu', $headerMenu);
				View::share('megaMenu', $megaMenu);
		}
}
