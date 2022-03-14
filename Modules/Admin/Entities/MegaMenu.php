<?php

namespace Modules\Admin\Entities;

use App\Parafesor\Constants\CacheConst;
use Cache;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MegaMenu extends Model
{
		use HasFactory;

		protected $table = 'mega_menu';

		protected $fillable = ['title', 'url', 'sort', 'bold', 'active', 'external', 'right_menu'];

		protected static function booted()
		{
				static::created(function () {
						Cache::put(CacheConst::MENU . 'Mega', MegaMenu::where('active', 1)->orderBy('sort', 'asc')->get());
				});
				static::updated(function () {
						Cache::put(CacheConst::MENU . 'Mega', MegaMenu::where('active', 1)->orderBy('sort', 'asc')->get());
				});
				static::deleted(function () {
						Cache::put(CacheConst::MENU . 'Mega', MegaMenu::where('active', 1)->orderBy('sort', 'asc')->get());
				});
		}
}
