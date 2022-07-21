<?php

use App\Http\Controllers\MainController;

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
\Illuminate\Support\Facades\Auth::routes();

Route::get('register', [MainController::class, 'register'])->name('register');

Route::middleware(\App\Http\Middleware\AdminCheck::class)->group(function () {
    Route::get('admin/cart', [\App\Http\Controllers\AdminController::class, 'admin_cart'])->name('admin_cart');
    Route::post('admin/posts', [\App\Http\Controllers\AdminController::class, 'admin_post'])->name('admin_post');
    Route::get('admin',[\App\Http\Controllers\AdminController::class, 'index'])->name('admin_index');
    Route::get('admin/{req_id?}',[\App\Http\Controllers\AdminController::class,'request_id'])->name('request_id');
} );

Route::middleware('auth')->group(function () {
    Route::get('/', [MainController::class, 'index'])->name('index');
    Route::get('catalog', [MainController::class, 'catalog'])->name('catalog');
    Route::get('catalog/{id?}', [MainController::class, 'book_id'])->name('book_id');
    Route::get('search',[MainController::class, 'search'])->name('search');
    Route::get('about', [MainController::class, 'about'])->name('about');
    Route::get('cart',[MainController::class, 'cart'])->name('cart');
    Route::get('personal', [MainController::class, 'personal'])->name('personal');
    Route::get('thank_you',[MainController::class, 'thank_you'])->name('thank_you');
}
);
Route::post('post', [\App\Http\Controllers\AdminController::class, 'request_data'])->name('req_data');
Route::post('posts', [\App\Http\Controllers\AdminController::class, 'request_result'])->name('req_res');
