<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use Mail;
session_start();

class HomeController extends Controller
{
    public function index()
    {
        $category = DB::table('tbl_category_product')->where('category_status',1)->orderby('category_id','asc')->get();
        $brand = DB::table('tbl_brand')->where('brand_status',1)->orderby('brand_id','desc')->get();

        // $all_product = DB::table('tbl_product')
        // ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        // ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        // ->orderby('tbl_product.product_id','desc')->get();

        $iphone = DB::table('tbl_product')->where('category_id',1)->orderby('product_id', 'asc')->get();
        $ipad = DB::table('tbl_product')->where('category_id',6)->orderby('product_id','asc')->get();
        $mac = DB::table('tbl_product')->where('category_id',2)->orderby('product_id','asc')->get();
        $watch = DB::table('tbl_product')->where('category_id',5)->orderby('product_id','asc')->get();

        return view('pages.home')->with('category',$category)->with('brand',$brand)->with('iphone',$iphone)->with('ipad',$ipad)->with('mac',$mac)->with('watch',$watch);
    }

    public function information(){
        $category = DB::table('tbl_category_product')->where('category_status',1)->orderby('category_id','asc')->get();
        $brand = DB::table('tbl_brand')->where('brand_status',1)->orderby('brand_id','desc')->get();

        $user = DB::table('users')->where('id', Session::get('id'))->get();
        return view('pages.user_info')->with('category',$category)->with('brand',$brand)->with('user',$user);
    }

    public function update_user(Request $request, $id)
    {
        $this->validate($request, [
        'name' => 'required',
        'email' => 'email|unique:users,email,'.$id,
        'phone' => 'required|numeric',
        'address' => 'required'
        ]);
        
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->save();
        
        return redirect()->back();
    }

    public function search(Request $request)
    {
        $key = $request->keyword;
        $category = DB::table('tbl_category_product')->where('category_status',1)->orderby('category_id','asc')->get();
        $brand = DB::table('tbl_brand')->where('brand_status',1)->orderby('brand_id','desc')->get();


        $search_product = DB::table('tbl_product')->where('product_name','like','%'.$key.'%')->get();

        return view('pages.product.search')->with('category',$category)->with('brand',$brand)->with('search_product',$search_product);
    }

    // public function order_history($customer_id)
    // {
    //     $order_by_id = DB::table('tbl_order')
    //     ->join('users','tbl_order.customer_id','=','users.id')
    //     ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
    //     ->join('tbl_payment','tbl_order.payment_id','=','tbl_payment.payment_id')
    //     ->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
    //     ->join('tbl_product','tbl_order_details.product_id','=','tbl_product.product_id')
    //     ->select('tbl_order.*','users.*','tbl_shipping.*','tbl_order_details.*','tbl_product.*','tbl_payment.*')
    //     ->where('tbl_order.order_id','=',$orderId)
    //     ->first();

    //     return view('admin_layout')->with('pages.order.order_history',$order_by_id);
    // }

}
