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
//Route::get('/', function () {
\Illuminate\Support\Facades\Auth::routes();
Route::get('admin/cart', [\App\Http\Controllers\AdminController::class, 'admin_cart'])->name('admin_cart');
Route::get('/', [MainController::class, 'index'])->middleware('auth')->name('index');

Route::post('admin/posts', [\App\Http\Controllers\AdminController::class, 'admin_post'])->name('admin_post');



Route::get('admin',[\App\Http\Controllers\AdminController::class, 'index'])->name('admin_index');
Route::get('admin/{req_id?}',[\App\Http\Controllers\AdminController::class,'request_id'])->name('request_id');
Route::get('thank_you',[MainController::class, 'thank_you'])->name('thank_you');
Route::get('personal', [MainController::class, 'personal'])->name('personal');


Route::post('post', [\App\Http\Controllers\AdminController::class, 'request_data'])->name('req_data');
Route::post('posts', [\App\Http\Controllers\AdminController::class, 'request_result'])->name('req_res');

Route::get('cart',[MainController::class, 'cart'])->middleware('auth')->name('cart');
Route::get('register', [MainController::class, 'register'])->name('register');
Route::get('catalog', [MainController::class, 'catalog'])->middleware('auth')->name('catalog');
Route::get('catalog/{id?}', [MainController::class, 'book_id'])->middleware('auth')->name('book_id');
Route::get('search',[MainController::class, 'search'])->middleware('auth')->name('search');
Route::get('about', [MainController::class, 'about'])->middleware('auth')->name('about');

// ВСТАВКА В ПРОМЕЖУТОЧНУЮ ТАБЛИЦУ
//$book = \App\Models\Books::create([
//    'name'  =>  'HOwl masf',
//    'authors' =>  'fasfasf',
//]);
//$category = \App\Models\Category::find([1,2]); // Modren Chairs, Home Chairs
//$book->categories()->attach($category);
//Auth::routes();

// ДЛЯ ФИЛЬТРАЦИИ
//$category = \App\Models\Category::find(1,2);
//dd($category->books); // вернет все продукты для категории 1

//Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
