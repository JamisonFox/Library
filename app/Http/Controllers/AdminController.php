<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Http\Requests\PostRequest;
use App\Http\Requests\ResultRequest;
use App\Models\Admin;
use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{

    public function index(Request $request) {
        $requests = Admin::query()
            ->orderBy('id','desc')
            ->paginate(9);
        return view('admin.index', [
            'requests' => $requests,
        ]);
    }
    public function request_id($req_id) {
        $data = Books::query()
            ->orderBy('id','desc')
            ->limit(5)
            ->get();
        return view('admin.book-single', ['data_id' => Admin::findOrFail($req_id), 'data' => $data]);
    }
    public function request_data(PostRequest $request) {

        Admin::query()->insert([
            'username' => $request->username,
            'book_name' => $request->book_name,
            'description' => $request->desc,
            'book_authors' => $request->book_authors,
            ]);
        return redirect(route('thank_you'));
        //dd($request);

    }
    public function request_result(ResultRequest $request) {
        //dd($request);
        Admin::query()->where('id', $request->id)->update([
                'status' => $request->result,
            ]);
        return redirect(route('admin_index'));

    }
    public function admin_cart() {
        return view('admin/cart');

    }
    public function admin_post(AdminRequest $request) {
        $id = Books::query()->insertGetId([
           'name' => $request->name,
           'description' => $request->description,
           'authors' => $request->authors,
           'pages' => $request->pages,
           'year' => $request->year,


        ]);
        $category = \App\Models\Category::find($request->categories);
        Books::find($id)->categories()->attach($category);
        return(redirect(route('admin_cart')));
    }
}
