<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();


class ProductController extends Controller
{
     public function add_product()
    {
        $category = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand = DB::table('tbl_brand')->orderby('brand_id','desc')->get();

        return view ('admin.add_product')->with('category',$category)->with('brand',$brand);
    }

    public function all_product()
    {
        $all_product = DB::table('tbl_product')-> get();
        $manager_product = view('admin.all_product')->with('all_product',$all_product);
        return view ('admin_layout')->with('admin.all_product',$manager_product);
    }

    public function save_product(Request $request)
    {
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['category_id'] = $request->cate;
        $data['brand_id'] = $request->br;
        $data['product_price'] = $request->product_price;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['product_status'] = $request->product_status;

        $get_img = $request-> file('product_img');
        if($get_img){
            $get_name_img = $get_img->getClientOriginalName();
            $name_img = current(explode('.',$get_name_img));
            $new_img = $name_img.rand(0,99).'.'.$get_img->getClientOriginalExtension();
            $get_img-> move('laravel/public/uploads/product',$new_img);
            $data['product_img'] = $new_img;
            DB::table('tbl_product')-> insert($data);
            Session::put('message','Success');
            return Redirect::to('/laravel/php/add-product');
        }
        $data['product_img'] = '';
        DB::table('tbl_product')-> insert($data);
        Session::put('message','Success');
        return Redirect::to('/laravel/php/add-product');
    }

    public function active_product($product_id)
    {
        DB::table('tbl_product')->where('product_id',$product_id)-> update(['product_status'=>0]);

        return Redirect::to('/laravel/php/all-product');
    }

    public function inactive_product($product_id)
    {
        DB::table('tbl_product')->where('product_id',$product_id)-> update(['product_status'=>1]);

        return Redirect::to('/laravel/php/all-product');
    }

    public function edit_product($product_id)
    {
        $edit_product = DB::table('tbl_product')-> where('product_id',$product_id)->get();
        $manager_product = view('admin.edit_product')->with('edit_product',$edit_product);
        return view ('admin_layout')->with('admin.edit_product',$manager_product);
    }

    public function update_product(Request $request, $product_id)
    {
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_desc'] = $request->product_desc;
        DB::table('tbl_product')->where('product_id',$product_id)-> update($data);
        return Redirect::to('/laravel/php/all-product');
    }

    public function delete_product($product_id)
    {
        DB::table('tbl_product')->where('product_id',$product_id)-> delete();
        return Redirect::to('/laravel/php/all-product');
    }}
