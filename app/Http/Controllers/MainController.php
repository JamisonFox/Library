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
        $data = Books::query()
            ->orderBy('id','desc')
            ->limit(5)->get();
        return view('index',['data' => $data]);
    }

    public function register() {
        return view('auth/register');
    }

    public function catalog(Request $request) {
        $books = Books::query()->orderBy('id','desc')->paginate(9);
        if(isset($request->category)) {
            $books = DB::table('books_category')
                ->leftJoin('books','books_category.books_id','=','books.id')
                ->whereIn('books_category.category_id',$request->category)
                ->orderBy('books.id','desc')
                ->paginate(9);
        }
        return view('catalog', [
            'books' => $books,
        ]);

    }

    public function book_id($id) {
        $data_all = Books::query()
            ->orderBy('id','desc')
            ->limit(5)->get();
        $categories = $books = DB::table('books_category')
            ->leftJoin('category','books_category.category_id','=','category.id')
            ->where('books_category.books_id',$id)
            ->get();
        //dd($categories);
        return view('book-single', ['data' => Books::findOrFail($id), 'data_all' => $data_all, 'categories' => $categories]);
    }

    public function search(Request $request) {
        $search = $request->search;
        $books = Books::query()
            ->where('name', 'LIKE',"%{$search}%")
            ->orWhere('authors', 'LIKE',"%{$search}%")
            ->orderBy('id','desc')
            ->paginate(9);
        return view('catalog', [
            'books' => $books,
        ]);
    }

    public function cart() {
        $req = Admin::query()
            ->where('username', Auth::user()->name)
            ->orderBy('id','desc')
            ->get();
        $arr_id = [];
        foreach($req as $item) {
            array_push($arr_id,$item->id);
        }
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

