<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Coupon;
use DB;
use Session;
use Mail;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use PDF;
session_start();

class OrderController extends Controller
{
    public function CheckAuth(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('/laravel/php/dashboard');
        }else{
            return Redirect::to('/laravel/php/admin')->send();
        }
    }

    // public function print_order($order_id){
    //      $order = DB::table('tbl_order')
    //     ->join('users','tbl_order.customer_id','=','users.id')
    //     ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
    //     ->select('tbl_order.*','users.name','tbl_shipping.shipping_address')
    //     ->where('tbl_order.order_id','=',$order_id)
    //     ->first();

    //     $orderDetails = DB::table('tbl_order_details')
    //         ->join('tbl_product','tbl_order_details.product_id','=','tbl_product.product_id')
    //         ->select('tbl_order_details.*','tbl_product.product_name','tbl_product.product_price')
    //         ->where('tbl_order_details.order_id','=',$order_id)
    //         ->get();

    //     $invoice = [
    //         'invoice_no' => $order->order_id,
    //         'date' => $order->created_at,
    //         'customer_name' => $order->name,
    //         'customer_address' => $order->shipping_address,
    //         'items' => $orderDetails
    //     ];

    //     $pdf = PDF::loadView('pages.invoice', compact('invoice'));
    //     return $pdf->stream();
    // }

    // public function print_order_convert($order_id)
    // {
    //     return $order_id;
    // }

     public function manage_order(){
        $this->CheckAuth();
        $all_order = DB::table('tbl_order')
        ->join('users','tbl_order.customer_id','=','users.id')
        ->select('tbl_order.*','users.name')
        ->orderby('tbl_order.order_id','desc')->paginate(10);
        $manager_order = view('admin.manage_order')->with('all_order',$all_order);

        return view('admin_layout')->with('admin.manager_order',$manager_order);
     }

     public function view_order($orderId){
        $this->CheckAuth();
        $all_order = DB::table('tbl_order')
        ->join('users','tbl_order.customer_id','=','users.id')
        ->select('tbl_order.*','users.name')
        ->orderby('tbl_order.order_id','desc')->get();
        $manager_order = view('admin.manage_order')->with('all_order',$all_order);

        $order_by_id = DB::table('tbl_order')
        ->join('users','tbl_order.customer_id','=','users.id')
        ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
        ->join('tbl_payment','tbl_order.payment_id','=','tbl_payment.payment_id')
        ->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
        ->join('tbl_product','tbl_order_details.product_id','=','tbl_product.product_id')
        ->select('tbl_order.*','users.*','tbl_shipping.*','tbl_order_details.*','tbl_product.*','tbl_payment.*')
        ->where('tbl_order.order_id','=',$orderId)
        ->first();

        $order_by_id_product = DB::table('tbl_order')
        ->join('users','tbl_order.customer_id','=','users.id')
        ->join('tbl_shipping','tbl_order.shipping_id','=','tbl_shipping.shipping_id')
        ->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
        ->join('tbl_product','tbl_order_details.product_id','=','tbl_product.product_id')
        ->select('tbl_order.*','users.*','tbl_shipping.*','tbl_order_details.*','tbl_product.*')
        ->where('tbl_order.order_id','=',$orderId)
        ->get();


        $manager_order_by_id = view('admin.view_order')->with('order_by_id',$order_by_id)->with('all_order',$all_order)->with('order_by_id_product',$order_by_id_product);

        return view('admin_layout')->with('admin.view_order',$manager_order_by_id);
     }
}
