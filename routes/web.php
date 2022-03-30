<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ArticleTypeController;
use App\Http\Controllers\Admin\BotController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\EditorController;
use App\Http\Controllers\Admin\MegaMenuController;
use App\Http\Controllers\Admin\StockTubeController;
use App\Http\Controllers\Admin\SystemController;
use App\Http\Controllers\Admin\SystemUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Currency\CurrencyController;
use App\Http\Controllers\Home\ArticleController;
use App\Http\Controllers\Home\HomeController;
use Illuminate\Support\Facades\Route;

//use Modules\Admin\Http\Controllers\SystemController;

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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/', [HomeController::class, 'indexTest'])->name('home.indextest');


Route::prefix('home')->group(function () {
    Route::get('/sliders', 'HomeController@mainSliders')
      ->name('home.mainSliders');
});

Route::get('/sample', [SystemController::class, 'sample'])
  ->name('systemFront.sample');

Route::get('/admin', [SystemController::class, 'admin'])
  ->middleware('auth')
  ->name('systemFront.admin');

Route::get('/{slug}', [ArticleController::class, 'show'])
  ->name('article.show');

Route::get('/kategori/{type}', [ArticleController::class, 'index'])
  ->name('home_article.index');

Route::get('/article/dimensions/{typeId}', [ArticleController::class, 'imageDimensions'])
  ->name('article.imageDimensions');


Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])
      ->middleware('auth')
      ->name('admin.index');

    Route::get('/register', [RegisteredUserController::class, 'create'])->middleware('guest')->name('register');

    Route::post('/register', [RegisteredUserController::class, 'store'])
      ->middleware('guest');

    Route::get('/login', [AuthenticatedSessionController::class, 'create'])
      ->middleware('guest')
      ->name('login');

    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
      ->middleware('guest');

    Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
      ->middleware('guest')
      ->name('password.request');

    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
      ->middleware('guest')
      ->name('password.email');

    Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
      ->middleware('guest')
      ->name('password.reset');

    Route::post('/reset-password', [NewPasswordController::class, 'store'])
      ->middleware('guest')
      ->name('password.update');

    Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])
      ->middleware('auth')
      ->name('verification.notice');

    Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
      ->middleware(['auth', 'signed', 'throttle:6,1'])
      ->name('verification.verify');

    Route::post('/email/verification-notification', [EmailVerificationPromptController::class, 'store'])
      ->middleware(['auth', 'throttle:6,1'])
      ->name('verification.send');

    Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
      ->middleware('auth')
      ->name('password.confirm');

    Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])
      ->middleware('auth');

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
      ->middleware('auth')
      ->name('logout');

    Route::prefix('article')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\ArticleController::class, 'index'])
          ->middleware('auth')
          ->name('article.index');

        Route::delete('/{id}', [\App\Http\Controllers\Admin\ArticleController::class, 'destroy'])
          ->middleware('auth')
          ->name('article.destroy');

        Route::get('/assign/{id}', [\App\Http\Controllers\Admin\ArticleController::class, 'assign'])
          ->middleware('auth')
          ->name('article.assign');

        Route::post('/assign/{id}', [\App\Http\Controllers\Admin\ArticleController::class, 'assignStore'])
          ->middleware('auth')
          ->name('article.assignStore');

        Route::get('/postUpdate/{id?}', [\App\Http\Controllers\Admin\ArticleController::class, 'postUpdate'])
          ->middleware('auth')
          ->name('article.postUpdate');

        Route::get('/stock-tube', [StockTubeController::class, 'index'])
          ->middleware('auth')
          ->name('stockTube.index');

        Route::get('/stock-tube/postUpdate/{id?}',
          [StockTubeController::class, 'postUpdate'])
          ->middleware('auth')
          ->name('stockTube.postUpdate');

        Route::post('/stock-tube/postUpdate/{id?}', [StockTubeController::class, 'store'])
          ->middleware('auth')
          ->name('stockTube.store');

        Route::delete('/stock-tube/{id}', [StockTubeController::class, 'destroy'])
          ->middleware('auth')
          ->name('stockTube.destroy');

        Route::post('/preview', [\App\Http\Controllers\Admin\ArticleController::class, 'preview'])
          ->middleware('auth')
          ->name('article.preview');


        Route::post('/postUpdate/{id?}', [\App\Http\Controllers\Admin\ArticleController::class, 'store'])
          ->middleware('auth')
          ->name('article.store');

        Route::post('/editor/image', [\App\Http\Controllers\Admin\ArticleController::class, 'editorImageUpload'])
          ->name('articleText.imageUpload');

        Route::get('/image/download/{id}', [\App\Http\Controllers\Admin\ArticleController::class, 'imageDownload'])
          ->middleware('auth')
          ->name('article.image.download');
    });

    Route::prefix('bot')->group(function () {
        Route::get('/', [BotController::class, 'index'])
          ->middleware('auth')
          ->name('bot.index');

        Route::get('/attribute/{botId}/title/{title}',
          [BotController::class, 'botAttributes'])
          ->middleware('auth')
          ->name('bot.attribute');

        Route::get('/postUpdate/{id?}', [BotController::class, 'postUpdate'])
          ->middleware('auth')
          ->name('bot.postUpdate');

        Route::post('/store', [BotController::class, 'store'])
          ->middleware('auth')
          ->name('bot.store');


        Route::post('/attribute/{botId}/title/{title}',
          [BotController::class, 'updateAttributes'])
          ->middleware('auth')
          ->name('bot.updateAttributes');

        Route::get('/report/{date}/compare/{compareDate}', [BotController::class, 'report'])
          ->middleware('auth')
          ->name('bot.report');

        Route::get('/run', [BotController::class, 'run'])
          ->middleware('auth')
          ->name('bot.run');


        Route::get('/test/{id}', [BotController::class, 'test'])
          ->middleware('auth')
          ->name('bot.test');
    });

    Route::prefix('articleType')->group(function () {
        Route::get('/', [ArticleTypeController::class, 'index'])
          ->middleware('auth')
          ->name('articleType.index');

        Route::get('/postUpdate/{id?}', [ArticleTypeController::class, 'postUpdate'])
          ->middleware('auth')
          ->name('articleType.postUpdate');

        Route::post('/postUpdate/{id?}', [ArticleTypeController::class, 'store'])
          ->middleware('auth')
          ->name('articleType.store');
    });


    Route::prefix('editor')->group(function () {
        Route::get('/report', [EditorController::class, 'report'])
          ->middleware('auth')
          ->name('editor.report');

        Route::get('/log', [EditorController::class, 'log'])
          ->middleware('auth')
          ->name('editor.log');
    });

    Route::prefix('system')->middleware('auth')->group(function () {
        Route::get('/menu', [SystemController::class, 'menuIndex'])
          ->name('system.menu.index');

        Route::get('/menu/postUpdate/{id?}', [SystemController::class, 'menuPostUpdate'])
          ->name('system.menu.postUpdate');

        Route::post('/menu/postUpdate/{id?}', [SystemController::class, 'menuStore'])
          ->name('system.menu.store');

        //Resource route olmuyor.
        Route::get('/mega-menu',
          [MegaMenuController::class, 'index'])->name('system.mega-menu.index');
        Route::get('/mega-menu/create',
          [MegaMenuController::class, 'create'])->name('system.mega-menu.create');
        Route::post('/mega-menu',
          [MegaMenuController::class, 'store'])->name('system.mega-menu.store');
        Route::get('/mega-menu/{megaMenu}/edit',
          [MegaMenuController::class, 'edit'])->name('system.mega-menu.edit');
        Route::put('/mega-menu/{megaMenu}/update',
          [MegaMenuController::class, 'update'])->name('system.mega-menu.update');
        Route::get('/mega-menu/{megaMenu}',
          [MegaMenuController::class, 'destroy'])->name('system.mega-menu.delete');
    });

    Route::prefix('system-user')->group(function () {
        Route::get('/', [SystemUserController::class, 'index'])
          ->middleware('auth')
          ->name('system_user.index');

        Route::get('/postUpdate/{id?}', [SystemUserController::class, 'postUpdate'])
          ->middleware('auth')
          ->name('system_user.postUpdate');

        Route::post('/postUpdate/{id?}', [SystemUserController::class, 'store'])
          ->middleware('auth')
          ->name('system_user.store');
    });

    Route::prefix('system-company')->group(function () {
        Route::get('/', [CompanyController::class, 'index'])
          ->middleware('auth')
          ->name('system.company.index');

        Route::get('/postUpdate/{id?}', [CompanyController::class, 'postUpdate'])
          ->middleware('auth')
          ->name('system.company.postUpdate');

        Route::post('/postUpdate/{id?}', [CompanyController::class, 'store'])
          ->middleware('auth')
          ->name('system.company.store');
    });

    Route::prefix('download')->group(function () {
        Route::get('/sitemap', [SystemController::class, 'sitemapDownload'])
          ->middleware('auth')
          ->name('system.download.sitemap');
    });
});


//Currency
Route::prefix('currency')->group(function () {
    Route::get('/', [CurrencyController::class, 'index']);
});
