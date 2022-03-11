<?php

namespace App\Providers;

use App\Parafesor\Constants\CacheConst;
use Cache;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Modules\Admin\Entities\Menu;
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

				$headerMenu = Cache::get(CacheConst::MENU . 'Header', Menu::orderBy('sort', 'asc')->get());
				View::share('headerMenu', $headerMenu);
				//testcommit
		}
}
