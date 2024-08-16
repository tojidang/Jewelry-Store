<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class CustomerController extends BaseController
{
    public function listCustomer()
    {
        $this->CheckAuth();
        $customers = DB::table('users')->get();
        return view('customer.list')->with('customers', $customers);
    }

    public function deleteCustomer($id)
    {
        $this->CheckAuth();
        DB::table('users')->where('id', $id)->delete();
        Session::put('message', 'Successfully deleted customer!');
        return Redirect::to('laravel/php/customers');
    }
}
