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

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminController@index')
        ->middleware('auth')
        ->name('admin.index');

    Route::get('/register', [ RegisteredUserController::class, 'create' ])
        ->middleware('guest')
        ->name('register');

    Route::post('/register', [ RegisteredUserController::class, 'store' ])
        ->middleware('guest');

    Route::get('/login', [ AuthenticatedSessionController::class, 'create' ])
        ->middleware('guest')
        ->name('login');

    Route::post('/login', [ AuthenticatedSessionController::class, 'store' ])
        ->middleware('guest');

    Route::get('/forgot-password', [ PasswordResetLinkController::class, 'create' ])
        ->middleware('guest')
        ->name('password.request');

    Route::post('/forgot-password', [ PasswordResetLinkController::class, 'store' ])
        ->middleware('guest')
        ->name('password.email');

    Route::get('/reset-password/{token}', [ NewPasswordController::class, 'create' ])
        ->middleware('guest')
        ->name('password.reset');

    Route::post('/reset-password', [ NewPasswordController::class, 'store' ])
        ->middleware('guest')
        ->name('password.update');

    Route::get('/verify-email', [ EmailVerificationPromptController::class, '__invoke' ])
        ->middleware('auth')
        ->name('verification.notice');

    Route::get('/verify-email/{id}/{hash}', [ VerifyEmailController::class, '__invoke' ])
        ->middleware([ 'auth', 'signed', 'throttle:6,1' ])
        ->name('verification.verify');

    Route::post('/email/verification-notification', [ EmailVerificationNotificationController::class, 'store' ])
        ->middleware([ 'auth', 'throttle:6,1' ])
        ->name('verification.send');

    Route::get('/confirm-password', [ ConfirmablePasswordController::class, 'show' ])
        ->middleware('auth')
        ->name('password.confirm');

    Route::post('/confirm-password', [ ConfirmablePasswordController::class, 'store' ])
        ->middleware('auth');

    Route::post('/logout', [ AuthenticatedSessionController::class, 'destroy' ])
        ->middleware('auth')
        ->name('logout');

    Route::prefix('article')->group(function () {
        Route::get('/', [ \Modules\Admin\Http\Controllers\ArticleController::class, 'index' ])
            ->middleware('auth')
            ->name('article.index');

        Route::delete('/{id}', [ \Modules\Admin\Http\Controllers\ArticleController::class, 'destroy' ])
            ->middleware('auth')
            ->name('article.destroy');

        Route::get('/assign/{id}', [ \Modules\Admin\Http\Controllers\ArticleController::class, 'assign' ])
            ->middleware('auth')
            ->name('article.assign');

        Route::post('/assign/{id}', [ \Modules\Admin\Http\Controllers\ArticleController::class, 'assignStore' ])
            ->middleware('auth')
            ->name('article.assignStore');

        Route::get('/postUpdate/{id?}', [ \Modules\Admin\Http\Controllers\ArticleController::class, 'postUpdate' ])
            ->middleware('auth')
            ->name('article.postUpdate');

        Route::get('/stock-tube', [ \Modules\Admin\Http\Controllers\StockTubeController::class, 'index' ])
            ->middleware('auth')
            ->name('stockTube.index');

        Route::get('/stock-tube/postUpdate/{id?}', [ \Modules\Admin\Http\Controllers\StockTubeController::class, 'postUpdate' ])
            ->middleware('auth')
            ->name('stockTube.postUpdate');

        Route::post('/stock-tube/postUpdate/{id?}', [ \Modules\Admin\Http\Controllers\StockTubeController::class, 'store' ])
            ->middleware('auth')
            ->name('stockTube.store');

        Route::delete('/stock-tube/{id}', [ \Modules\Admin\Http\Controllers\StockTubeController::class, 'destroy' ])
            ->middleware('auth')
            ->name('stockTube.destroy');

        Route::post('/preview', [ \Modules\Admin\Http\Controllers\ArticleController::class, 'preview' ])
            ->middleware('auth')
            ->name('article.preview');


        Route::post('/postUpdate/{id?}', [ \Modules\Admin\Http\Controllers\ArticleController::class, 'store' ])
            ->middleware('auth')
            ->name('article.store');

        Route::post('/editor/image', [ \Modules\Admin\Http\Controllers\ArticleController::class, 'editorImageUpload' ])
            ->name('articleText.imageUpload');

        Route::get('/image/download/{id}', [ \Modules\Admin\Http\Controllers\ArticleController::class, 'imageDownload' ])
            ->middleware('auth')
            ->name('article.image.download');

    });


    Route::prefix('bot')->group(function () {
        Route::get('/', [ \Modules\Admin\Http\Controllers\BotController::class, 'index' ])
            ->middleware('auth')
            ->name('bot.index');

        Route::get('/attribute/{botId}/title/{title}', [ \Modules\Admin\Http\Controllers\BotController::class, 'botAttributes' ])
            ->middleware('auth')
            ->name('bot.attribute');

        Route::get('/postUpdate/{id?}', [ \Modules\Admin\Http\Controllers\BotController::class, 'postUpdate' ])
            ->middleware('auth')
            ->name('bot.postUpdate');

        Route::post('/store', [ \Modules\Admin\Http\Controllers\BotController::class, 'store' ])
            ->middleware('auth')
            ->name('bot.store');


        Route::post('/attribute/{botId}/title/{title}', [ \Modules\Admin\Http\Controllers\BotController::class, 'updateAttributes' ])
            ->middleware('auth')
            ->name('bot.updateAttributes');

        Route::get('/report/{date}/compare/{compareDate}', [ \Modules\Admin\Http\Controllers\BotController::class, 'report' ])
            ->middleware('auth')
            ->name('bot.report');

        Route::get('/run', [ \Modules\Admin\Http\Controllers\BotController::class, 'run' ])
            ->middleware('auth')
            ->name('bot.run');



        Route::get('/test/{id}', [ \Modules\Admin\Http\Controllers\BotController::class, 'test' ])
            ->middleware('auth')
            ->name('bot.test');
    });

    Route::prefix('articleType')->group(function () {
        Route::get('/', [ \Modules\Admin\Http\Controllers\ArticleTypeController::class, 'index' ])
            ->middleware('auth')
            ->name('articleType.index');

        Route::get('/postUpdate/{id?}', [ \Modules\Admin\Http\Controllers\ArticleTypeController::class, 'postUpdate' ])
            ->middleware('auth')
            ->name('articleType.postUpdate');

        Route::post('/postUpdate/{id?}', [ \Modules\Admin\Http\Controllers\ArticleTypeController::class, 'store' ])
            ->middleware('auth')
            ->name('articleType.store');
    });


    Route::prefix('editor')->group(function () {

        Route::get('/report', [ \Modules\Admin\Http\Controllers\EditorController::class, 'report' ])
            ->middleware('auth')
            ->name('editor.report');

        Route::get('/log', [ \Modules\Admin\Http\Controllers\EditorController::class, 'log' ])
            ->middleware('auth')
            ->name('editor.log');
    });

    Route::prefix('system')->group(function () {
        Route::get('/menu', [ \Modules\Admin\Http\Controllers\SystemController::class, 'menuIndex' ])
            ->middleware('auth')
            ->name('system.menu.index');

        Route::get('/menu/postUpdate/{id?}', [ \Modules\Admin\Http\Controllers\SystemController::class, 'menuPostUpdate' ])
            ->middleware('auth')
            ->name('system.menu.postUpdate');

        Route::post('/menu/postUpdate/{id?}', [ \Modules\Admin\Http\Controllers\SystemController::class, 'menuStore' ])
            ->middleware('auth')
            ->name('system.menu.store');
    });

    Route::prefix('system-user')->group(function () {

        Route::get('/', [ \Modules\Admin\Http\Controllers\SystemUserController::class, 'index' ])
            ->middleware('auth')
            ->name('system_user.index');

        Route::get('/postUpdate/{id?}', [ \Modules\Admin\Http\Controllers\SystemUserController::class, 'postUpdate' ])
            ->middleware('auth')
            ->name('system_user.postUpdate');

        Route::post('/postUpdate/{id?}', [ \Modules\Admin\Http\Controllers\SystemUserController::class, 'store' ])
            ->middleware('auth')
            ->name('system_user.store');

    });

    Route::prefix('system-company')->group(function () {
        Route::get('/', [ \Modules\Admin\Http\Controllers\CompanyController::class, 'index' ])
            ->middleware('auth')
            ->name('system.company.index');

        Route::get('/postUpdate/{id?}', [ \Modules\Admin\Http\Controllers\CompanyController::class, 'postUpdate' ])
            ->middleware('auth')
            ->name('system.company.postUpdate');

        Route::post('/postUpdate/{id?}', [ \Modules\Admin\Http\Controllers\CompanyController::class, 'store' ])
            ->middleware('auth')
            ->name('system.company.store');
    });

    Route::prefix('download')->group(function () {
        Route::get('/sitemap', [ \Modules\Admin\Http\Controllers\SystemController::class, 'sitemapDownload' ])
            ->middleware('auth')
            ->name('system.download.sitemap');
    });
});
