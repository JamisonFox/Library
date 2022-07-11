<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Books;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use phpDocumentor\Reflection\Types\Null_;

class MainController extends Controller
{
    public  function index() {
//        View::composer('layouts.navigation', function ($view) {
//            $view->with(['navigation' => Navigation::get()]);
//        });
        $data = Books::query()->orderBy('id','desc')->limit(5)->get();
        return view('index',['data' => $data]);
    }
    public function register() {
        return view('auth/register');
    }
    public function catalog(Request $request) {
        $books = Books::query()->where('description', NULL)->paginate(9);
        if(isset($request->category)) {
            $categories = Category::query()->whereIn('id', $request->category)->get();
            //dd($categories);
            $req = DB::table('books_category')->leftJoin('books','books_category.books_id','=','books.id')
                ->whereIn('books_category.category_id',[1,2,3])->get();
            dd($req);
            //SELECT * FROM `books_category` LEFT JOIN `books`
            //ON books_category.category_id = books.id WHERE books_category.category_id = 1
        }
//      if(isset($request->category)) {
//          $categories = Category::query()->whereIn('id', $request->category)->get();
//          $category = \App\Models\Books::find($categories);
//          dd($category->books);
//      }
      //SELECT CategoryName, ProductName FROM Categories LEFT JOIN Products ON Categories.CategoryID = Products.CategoryID
//        $categories = Category::query()->select()->get();
//          foreach ($array_id as $item) {
//               $category = \App\Models\Category::find($item);
//
////
////           } dd($category->books);
//          }

        //dd($books);
        return view('catalog', [
            'books' => $books,
        ]);


    }
    public function book_id($id) {
        return view('book-single', ['data' => Books::findOrFail($id)]);
    }
    //public  function register() {
     //   return view('auth/register');
   // }
    public function search(Request $request) {
        $search = $request->search;
        $books = Books::query()->where('name', 'LIKE',"%{$search}%")->paginate(9);
        return view('catalog', [
            'books' => $books,
        ]);
    }
    public function cart() {
        $req = Admin::query()->where('username', Auth::user()->name)->get();

        return view('cart', ['data' => $req]);
    }
    public function thank_you() {
        return view('thankyou');
    }
    public function personal() {
        return view('personal');
    }
    public function about() {
        return view('about');
    }
}

