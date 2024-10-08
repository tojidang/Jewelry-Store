<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use Session;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class BrandProduct extends Controller
{
    public function CheckAuth(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('/laravel/php/dashboard');
        }else{
            return Redirect::to('/laravel/php/admin')->send();
        }
    }

    public function add_brand_product()
    {
        $this->CheckAuth();
        $category = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        return view('admin.add_brand_product')->with('category',$category);
    }
// hiển thị nút delete nếu như sản phẩm đã được thêm brand 17/8 ( chưa sửa)

/*
public function all_brand_product()
    {
        $this->CheckAuth();
        $all_brand_product = DB::table('tbl_brand')->join('tbl_category_product','tbl_category_product.category_id','=','tbl_brand.category_id')->paginate(9);
        $manager_brand_product = view('admin.all_brand_product')->with('all_brand_product',$all_brand_product);
        return view ('admin_layout')->with('admin.all_brand_product',$manager_brand_product);
    }
    */
// 17/8 end
    public function save_brand_product(Request $request)
    {
        $this->CheckAuth();
        $data = array();
        $data['brand_name'] = $request->brand_name;
        $data['category_id'] = $request->cate;
        $data['brand_desc'] = $request->brand_desc;
        $data['brand_status'] = $request->brand_status;
        DB::table('tbl_brand')-> insert($data);
        Session::put('message','Success');
        return Redirect::to('/laravel/php/add-brand-product');
    }

    public function active_brand_product($brand_id)
    {
        $this->CheckAuth();
        DB::table('tbl_brand')->where('brand_id',$brand_id)-> update(['brand_status'=>0]);

        return Redirect::to('/laravel/php/all-brand-product');
    }

    public function inactive_brand_product($brand_id)
    {
        $this->CheckAuth();
        DB::table('tbl_brand')->where('brand_id',$brand_id)-> update(['brand_status'=>1]);

        return Redirect::to('/laravel/php/all-brand-product');
    }

    public function edit_brand_product($brand_id)
    {
        $this->CheckAuth();
        $category = DB::table('tbl_category_product')->orderby('category_id','desc')->get();

        $edit_brand_product = DB::table('tbl_brand')-> where('brand_id',$brand_id)->get();
        $manager_brand_product = view('admin.edit_brand_product')->with('edit_brand_product',$edit_brand_product)->with('category',$category);
        return view ('admin_layout')->with('admin.edit_brand_product',$manager_brand_product);
    }

    public function update_brand_product(Request $request, $brand_id)
    {
        $this->CheckAuth();
        try{
            $data = array();
            $data['brand_name'] = $request->brand_name;
            $data['brand_desc'] = $request->brand_desc;
            $updated = DB::table('tbl_brand')->where('brand_id',$brand_id)-> update($data);
            if ($updated) {
                // If the update was successful
                return Redirect::to('/laravel/php/all-brand-product')->with('success', 'Brand product updated successfully.');
            } else {
                // If the update was not successful (e.g., brand ID not found)
                return Redirect::to('/laravel/php/all-brand-product')->with('error', 'Unable to update. Brand not found.');
            }
        } catch (\Exception $e) {
            // Handle any errors that occur during the update process
            return Redirect::to('/laravel/php/all-brand-product')->with('error', 'Unable to update due to an error.');
        //return Redirect::to('/laravel/php/all-brand-product');
        }

    }

    public function delete_brand_product($brand_id)
    {
        $this->CheckAuth();
        try {
            $deleted = DB::table('tbl_brand')->where('brand_id',$brand_id)-> delete();

            if ($deleted) {
                // Successfully deleted, you can redirect with a success message if needed
                return Redirect::to('/laravel/php/all-brand-product')->with('success', 'Brand product deleted successfully.');
            } else {
                // If no row was deleted
                return Redirect::to('/laravel/php/all-brand-product')->with('error', 'Unable to delete. Brand not found.');
            }
        } catch (\Exception $e) {
            // Handle any errors that occur during the deletion process
            return Redirect::to('/laravel/php/all-brand-product')->with('error', 'Unable to delete due to an error.');
        }
    }

    public function show_brand($brand_id)
    {
        $category = DB::table('tbl_category_product')->where('category_status',1)->orderby('category_id','asc')->get();
        $brand = DB::table('tbl_brand')->where('brand_status',1)->orderby('brand_id','desc')->get();

        // $manager_cate = view('pages.category.show_category')->with('category',$category)->with('brand',$brand);
        // return view ('welcome')->with('pages.category.show_category',$manager_cate);
        $brand_by_id = DB::table('tbl_product')->join('tbl_brand','tbl_product.brand_id','=','tbl_brand.brand_id')->where('tbl_product.brand_id','=',$brand_id)->get();

        $brand_by_name = DB::table('tbl_brand')->where('tbl_brand.brand_id',$brand_id)->limit(1)->get();

        return view('pages.brand.show_brand')->with('category',$category)->with('brand',$brand)->with('brand_by_id',$brand_by_id)->with('brand_by_name',$brand_by_name);
    }

    // hiển thị nút delete nếu như sản phẩm đã được thêm brand 17/8 (đã sửa)

    public function all_brand_product()
    {
        $this->CheckAuth();
        $all_brand_product = DB::table('tbl_brand')
            ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_brand.category_id')
            ->select('tbl_brand.*', 'tbl_category_product.category_name')
            ->paginate(9);

        // Thêm số lượng sản phẩm cho từng nhãn hiệu
        foreach ($all_brand_product as $brand) {
            $brand->product_count = DB::table('tbl_product')->where('brand_id', $brand->brand_id)->count();
        }

        $manager_brand_product = view('admin.all_brand_product')->with('all_brand_product', $all_brand_product);
        return view('admin_layout')->with('admin.all_brand_product', $manager_brand_product);
    }

// 17/8 end
//
}
