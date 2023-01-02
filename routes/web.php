<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\PostController;
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



// routes/web.php

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    
    function () {

        
        Route::get('/', function () {
            return view('welcome');
        });
    Route::get('/dashboard/index', [DashboardController::class, 'index']);

    Auth::routes();
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


    /**Posts Routes */
    Route::group(["prefix" => "post" , "as" => "post." ] , (function () {

        Route::get('/', [PostController::class , 'index'])->name('index');
        Route::get('/create', [PostController::class, 'create'])->name('create');
        Route::post('/store', [PostController::class, 'store'])->name('store');
        Route::get('/delete/{post}', [PostController::class, 'delete'])->name('delete');
        Route::get('/show/{post}', [PostController::class, 'show'])->name('show');
        
    }));

});

/** OTHER PAGES THAT SHOULD NOT BE LOCALIZED **/

