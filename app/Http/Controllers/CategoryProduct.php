<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class CategoryProduct extends Controller
{
    public function add_category_product()
    {
        return view('admin.add_category_product');
    }

    public function all_category_product()
    {
        $all_category_product = DB::table('tbl_category_product')-> get();
        $manager_category_product = view('admin.all_category_product')->with('all_category_product',$all_category_product);
        return view ('admin_layout')->with('admin.all_category_product',$manager_category_product);
    }

    public function save_category_product(Request $request)
    {
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_desc'] = $request->category_desc;
        $data['category_status'] = $request->category_status;

        DB::table('tbl_category_product')-> insert($data);
        Session::put('message','Success');
        return Redirect::to('/laravel/php/add-category-product');
    }

    public function active_category_product($category_id)
    {
        DB::table('tbl_category_product')->where('category_id',$category_id)-> update(['category_status'=>0]);

        return Redirect::to('/laravel/php/all-category-product');
    }

    public function inactive_category_product($category_id)
    {
        DB::table('tbl_category_product')->where('category_id',$category_id)-> update(['category_status'=>1]);

        return Redirect::to('/laravel/php/all-category-product');
    }
}
