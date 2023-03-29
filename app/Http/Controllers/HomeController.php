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

        $all_product = DB::table('tbl_product')->where('product_status',1)->orderby('product_id','desc')-> limit(4)->get();

        return view('pages.home')->with('category',$category)->with('brand',$brand)->with('all_product',$all_product);
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

    public function sendmail(){
        $to_name = "Apple Store";
        $to_email = "ngogiaanhtuan1@gmail.com";//send to this email

        $data = array("name"=>"Mail xác nhận đăng ký tài khoản","body"=>"Bạn đã đăng ký tài khoản tại Apple Store"); //body of mail.blade.php
    
        Mail::send('pages.sendmail',$data,function($message) use ($to_name,$to_email){
            $message->to($to_email)->subject('test mail nhé');//send this mail with subject
            $message->from($to_email,$to_name);//send from this mail
        });
        return redirect('laravel/php/flogin')->with('message','');
    }

}
