<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class BrandProduct extends Controller
{
    public function add_brand_product()
    {
        return view('admin.add_brand_product');
    }

    public function all_brand_product()
    {
        $all_brand_product = DB::table('tbl_brand')-> get();
        $manager_brand_product = view('admin.all_brand_product')->with('all_brand_product',$all_brand_product);
        return view ('admin_layout')->with('admin.all_brand_product',$manager_brand_product);
    }

    public function save_brand_product(Request $request)
    {
        $data = array();
        $data['brand_name'] = $request->brand_name;
        $data['brand_desc'] = $request->brand_desc;
        $data['brand_status'] = $request->brand_status;
        DB::table('tbl_brand')-> insert($data);
        Session::put('message','Success');
        return Redirect::to('/laravel/php/add-brand-product');
    }

    public function active_brand_product($brand_id)
    {
        DB::table('tbl_brand')->where('brand_id',$brand_id)-> update(['brand_status'=>0]);

        return Redirect::to('/laravel/php/all-brand-product');
    }

    public function inactive_brand_product($brand_id)
    {
        DB::table('tbl_brand')->where('brand_id',$brand_id)-> update(['brand_status'=>1]);

        return Redirect::to('/laravel/php/all-brand-product');
    }

    public function edit_brand_product($brand_id)
    {
        $edit_brand_product = DB::table('tbl_brand')-> where('brand_id',$brand_id)->get();
        $manager_brand_product = view('admin.edit_brand_product')->with('edit_brand_product',$edit_brand_product);
        return view ('admin_layout')->with('admin.edit_brand_product',$manager_brand_product);
    }

    public function update_brand_product(Request $request, $brand_id)
    {
        $data = array();
        $data['brand_name'] = $request->brand_name;
        $data['brand_desc'] = $request->brand_desc;
        DB::table('tbl_brand')->where('brand_id',$brand_id)-> update($data);
        return Redirect::to('/laravel/php/all-brand-product');
    }

    public function delete_brand_product($brand_id)
    {
        DB::table('tbl_brand')->where('brand_id',$brand_id)-> delete();
        return Redirect::to('/laravel/php/all-brand-product');
    }
}
