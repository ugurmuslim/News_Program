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

Route::get('/', 'HomeController@indexTest')
    ->name('home.indextest');


Route::prefix('home')->group(function () {
    Route::get('/sliders', 'HomeController@mainSliders')
        ->name('home.mainSliders');
});

Route::get('/sample', [ \Modules\Admin\Http\Controllers\SystemController::class, 'sample' ])
    ->name('systemFront.sample');


Route::get('/{slug}', [ \Modules\Home\Http\Controllers\ArticleController::class, 'show' ])
    ->name('article.show');

Route::get('/kategori/{type}', [ \Modules\Home\Http\Controllers\ArticleController::class, 'index' ])
    ->name('home_article.index');

Route::get('/article/dimensions/{typeId}', [ \Modules\Home\Http\Controllers\ArticleController::class, 'imageDimensions' ])
    ->name('article.imageDimensions');
