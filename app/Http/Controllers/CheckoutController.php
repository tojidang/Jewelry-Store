<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Coupon;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class CheckoutController extends Controller
{
    public function CheckAuth(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('/laravel/php/dashboard');
        }else{
            return Redirect::to('/laravel/php/admin')->send();
        }
    }

    public function checkout(){
        $category = DB::table('tbl_category_product')->where('category_status',1)->orderby('category_id','asc')->get();
        $brand = DB::table('tbl_brand')->where('brand_status',1)->orderby('brand_id','desc')->get();

        return view('pages.checkout.fcheckout')->with('category',$category)->with('brand',$brand);
    }

     public function payment(){

     }

     public function order_place(Request $request){
        // $content = Cart::content();
        // echo $content;

        $category = DB::table('tbl_category_product')->where('category_status',1)->orderby('category_id','asc')->get();
        $brand = DB::table('tbl_brand')->where('brand_status',1)->orderby('brand_id','desc')->get();

        //insert shipping info
        $ship = array();
        $ship['shipping_name'] = $request->shipping_name;
        $ship['shipping_email'] = $request->shipping_email;
        $ship['shipping_address'] = $request->shipping_address;
        $ship['shipping_phone'] = $request->shipping_phone;
        $ship['shipping_note'] = $request->shipping_note;
        $ship_id = DB::table('tbl_shipping')->insertGetId($ship);
        Session::put('shipping_id',$ship_id);

        //insert payment method
        $data = array();
        $data['payment_method'] = $request->payment_option;
        $data['payment_status'] = 'Pending';
        $payment_id = DB::table('tbl_payment')->insertGetId($data);

        //insert order
        $order_data = array();
        $order_data['customer_id'] = Session::get('id');
        $order_data['shipping_id'] = Session::get('shipping_id');
        $order_data['payment_id'] = $payment_id;
        $order_data['order_total'] = Cart::priceTotal();
        $order_data['order_status'] = 'Pending';
        $order_id = DB::table('tbl_order')->insertGetId($order_data);

        //insert order_details
        $content = Cart::content();
        foreach($content as $value){
            $order_d_data = array();
            $order_d_data['order_id'] = $order_id;
            $order_d_data['product_id'] = $value->id;
            $order_d_data['product_name'] = $value->name;
            $order_d_data['product_price'] = $value->price;
            $order_d_data['order_details_quantity'] = $value->qty;
            $order_d_data['product_color'] = $value->options->color;
            $order_d_data['product_storage'] = $value->options->storage;
            $result = DB::table('tbl_order_details')->insertGetId($order_d_data);
        }

        $order_info = [
        'shipping_name' => $request->shipping_name,
        '' => $request->shipping_address,
        '' => $request->shipping_phone,
        '' => $request->shipping_note, 
        'order_total' => Cart::priceTotal(),
        // Thêm các thông tin khác tùy ý
        ];
        Session::put('order_info', $order_info);

        if($data['payment_method']==1){
            echo 'Momo';
        }else{
            Cart::destroy();
            return view('pages.checkout.cash')->with('order_info',$order_info)->with('category',$category)->with('brand',$brand);
        }

     }

     public function manage_order(){
        $this->CheckAuth();
        $all_order = DB::table('tbl_order')
        ->join('users','tbl_order.customer_id','=','users.id')
        ->select('tbl_order.*','users.name')
        ->orderby('tbl_order.order_id','desc')->get();
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
        ->join('tbl_order_details','tbl_order.order_id','=','tbl_order_details.order_id')
        ->join('tbl_product','tbl_order_details.product_id','=','tbl_product.product_id')
        ->select('tbl_order.*','users.*','tbl_shipping.*','tbl_order_details.*','tbl_product.*')
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

     public function check_coupon(Request $request)
    {
        $data -> $request->all();
        $coupon = Coupon::where('coupon_code',$data['coupon'])->first();
        if($coupon){
            $count_coupon = $coupon->count();
            if($count_coupon>0){
                $coupon_session = Session::get('coupon');
                if($coupon_session == true){
                    $is_avaiable = 0;
                    if($is_avaiable == 0){
                        $cou[] = array(
                            'coupon_code' => $coupon -> coupon_code,
                            'coupon_type' => $coupon -> coupon_type,
                            'coupon_value' => $coupon -> coupon_value,
                        );
                        Session::put('coupon',$cou);
                    }
                }
                else{
                    $cou[] = array(
                    'coupon_code' => $coupon -> coupon_code,
                    'coupon_type' => $coupon -> coupon_type,
                    'coupon_value' => $coupon -> coupon_value,
                    );
                    Session::put('coupon',$cou);
                }
                Session::save();
                return redirect()->back();
            }
        }else{
            return redirect()->back();
        }
    }
}
