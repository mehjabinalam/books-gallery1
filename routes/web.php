<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index']);

Auth::routes();

Route::group(['middleware' => ['auth']], function() {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::group(['middleware' => ['can:isAdmin']], function() {
        Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
    });
    Route::resource('books', BookController::class)->except('show');
    Route::get('wishlist', [BookController::class, 'index'])->name('wishlist');
});
