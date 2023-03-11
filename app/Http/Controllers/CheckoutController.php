<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class CheckoutController extends Controller
{
    public function login_checkout(){

        return view('pages.checkout.login_checkout');
    }
     public function registor_checkout(){

        return view('pages.checkout.registor_checkout');
    }

    public function add_customer(Request $request){
        $data = array();
        $data['customer_name'] = $request->name;
        $data['customer_email'] = $request->email;
        $data['customer_password'] = $request->password;
        $data['customer_phone'] = $request->phone;

        $cus_id = DB::table('tbl_customers')->insertGetId($data);

        Session::put('customr_id',$cus_id);
        Session::put('customr_name',$request->name);

        return Redirect('laravel/php/checkout');
    }

    public function checkout(){
        $category = DB::table('tbl_category_product')->where('category_status',1)->orderby('category_id','asc')->get();
        $brand = DB::table('tbl_brand')->where('brand_status',1)->orderby('brand_id','desc')->get();
        return view('pages.checkout.fcheckout')->with('category',$category)->with('brand',$brand);
    }

     public function save_checkout(Request $request){
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_address'] = $request->shipping_address;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shipping_note'] = $request->shipping_note;

        $ship_id = DB::table('tbl_shipping')->insertGetId($data);

        Session::put('shipping_id',$ship_id);

        return Redirect('laravel/php/payment');
     }

     public function payment(){

     }

     public function logout(){
        $category = DB::table('tbl_category_product')->where('category_status',1)->orderby('category_id','asc')->get();
        $brand = DB::table('tbl_brand')->where('brand_status',1)->orderby('brand_id','desc')->get();
         $all_product = DB::table('tbl_product')->where('product_status',1)->orderby('product_id','desc')-> limit(4)->get();
        Session::put('customer_id',NULL);
        return view('pages.home')->with('category',$category)->with('brand',$brand)->with('all_product',$all_product);
     }
}
