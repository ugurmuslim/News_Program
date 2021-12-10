<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

Route::prefix('home')->group(function() {
    Route::get('/sample', 'HomeController@index')
    ->name('home.index');

    Route::get('/', 'HomeController@indexTest')
        ->name('home.indextest');

    Route::get('/sliders', 'HomeController@mainSliders')
        ->name('home.mainSliders');
});



Route::prefix('home/article')->group(function () {
    Route::get('/{slug}', [ \Modules\Home\Http\Controllers\ArticleController::class, 'show' ])
        ->name('article.show');

    Route::get('/type/{type}', [ \Modules\Home\Http\Controllers\ArticleController::class, 'index' ])
        ->name('home_article.index');

});
Route::get('/article/dimensions/{typeId}', [ \Modules\Home\Http\Controllers\ArticleController::class, 'imageDimensions' ])
    ->name('article.imageDimensions');
