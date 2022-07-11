<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Http\Requests\PostRequest;
use App\Http\Requests\ResultRequest;
use App\Models\Admin;
use App\Models\Books;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function index() {
        $requests = Admin::query()->get();

        return view('admin.index', [
            'requests' => $requests,
        ]);
    }
    public function request_id($req_id) {
        return view('admin.book-single', ['data' => Admin::findOrFail($req_id)]);
    }
    public function request_data(PostRequest $request) {
        Admin::query()->insert([
            'username' => $request->username,
            'book_name' => $request->book_name,
            'description' => $request->desc,
            ]);
        return redirect(route('thank_you'));
        //dd($request);

    }
    public function request_result(ResultRequest $request) {
        //dd($request);
        Admin::query()->where('id', $request->id)->update([
                'status' => $request->result,
            ]);


    }
    public function admin_cart() {
        return view('admin/cart');

    }
    public function admin_post(AdminRequest $request) {

        $id = Books::query()->insertGetId([
           'name' => $request->name,
           'authors' => $request->authors,
           //'description' => $request->desc,
        ]);
        $category = \App\Models\Category::find($request->categories);
        Books::find($id)->categories()->attach($category);
        return(redirect(route('admin_cart')));
    }
}
