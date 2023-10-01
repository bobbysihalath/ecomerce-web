<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/profile', [\App\Http\Controllers\ProfileController::class,'index'])->name('profile');
Route::put('/profile', [\App\Http\Controllers\ProfileController::class,'update'])->name('profile.update');

Route::get('/about', function () {
    return view('about');
})->name('about');

//middleware================================================================
//Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function()
//{

    //brand========================================================
    Route::post('/insert-brand',[BrandController::class, 'insert'])->name('insert-brand');
    Route::get('/insert-brand', [BrandController::class, 'insertBrand']);

    Route::get('/manage-brand', [BrandController::class,'getAll'])->name('manage-brand');

    Route::get('/delete-brand/{id}', [BrandController::class,'delete']);

    Route::post('/update-brand', [BrandController::class,'update'])->name('update-brand');
    Route::get('/update-brand/{id}', [BrandController::class,'updateBrand']);

    //product=======================================================
    Route::get('/insert-product', [ProductController::class,'insertProduct'])->name('insert-product');
    Route::post('/insert-product', [ProductController::class,'insert']);

    Route::get('/manage-product', [ProductController::class,'getAll'])->name('manage-product');

    Route::post('/update-product', [ProductController::class,'update'])->name('update-product');
    Route::get('/update-product/{id}', [ProductController::class,'updateProduct']);

    Route::get('/delete-product/{id}', [ProductController::class,'delete']);


    Route::get('/client', [\App\Http\Controllers\FrontController::class,'index']);
//});
