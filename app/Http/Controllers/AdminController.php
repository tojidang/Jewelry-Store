<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class AdminController extends BaseController
{
    public function index(){
        return view('admin_login');
    }

    public function show_dashboard(){
        $this->CheckAuth();
        return view('admin.dashboard');
    }

    public function dashboard(Request $request)
    {
        $admin_email = $request->admin_email;
        $admin_password = $request->admin_password;

        $result = DB::table('tbl_admin')
            ->where('admin_email', $admin_email)
            ->where('admin_password', $admin_password)
            ->first();

        if ($result) {
            Session::put('admin_name', $result->admin_name);
            Session::put('admin_id', $result->admin_id);
            return Redirect::to('/laravel/php/dashboard');
        } else {
            Session::put('message', 'Sai tài khoản hoặc mật khẩu!');
            return Redirect::to('/laravel/php/admin');
        }
    }

    public function logout()
    {
        $this->CheckAuth();
        Session::put('admin_name', null);
        Session::put('admin_id', null);
        return Redirect::to('/laravel/php/dashboard');
    }

    public function listAdmin()
    {
        $this->CheckAuth();
        $admins = DB::table('tbl_admin')->get();
        return view('admin.list')->with('admins', $admins);
    }

    public function createAdmin()
    {
        $this->CheckAuth();
        return view('admin.create');
    }

    public function storeAdmin(Request $request)
    {
        $this->CheckAuth();

        DB::table('tbl_admin')->insert([
            'admin_name' => $request->admin_name,
            'admin_email' => $request->admin_email,
            'admin_password' => $request->admin_password,
            'admin_phone' => $request->admin_phone,
        ]);

        Session::put('message', 'Admin added successfully!');
        return Redirect::to('laravel/php/admins');
    }

    public function editAdmin($id)
    {
        $this->CheckAuth();

        $admin = DB::table('tbl_admin')->where('admin_id', $id)->first();
        if (!$admin) {
            return Redirect::to('laravel/php/admins')->with('error', 'Admin not found');
        }
        return view('admin.edit')->with('admin', $admin);
    }

    public function updateAdmin(Request $request, $id)
    {
        $this->CheckAuth();

        $admin = DB::table('tbl_admin')->where('admin_id', $id)->first();

        if ($request->admin_password) {
            $password = $request->admin_password;
        } else {
            $password = $admin->admin_password;
        }

        DB::table('tbl_admin')->where('admin_id', $id)->update([
            'admin_name' => $request->admin_name,
            'admin_email' => $request->admin_email,
            'admin_password' => $password,
            'admin_phone' => $request->admin_phone,
        ]);
Session::put('message', 'Updated admin successfully!');
        return Redirect::to('laravel/php/admins');
    }

    public function deleteAdmin($id)
    {
        $this->CheckAuth();

        DB::table('tbl_admin')->where('admin_id', $id)->delete();
        Session::put('message', 'Successfully deleted admin!');
        return Redirect::to('laravel/php/admins');
    }
}

