<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\CustomerInquiry;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function displayData()
    {
        $products = Product::all();
        $customerinquires = CustomerInquiry::all();
        $customers = DB::table('users')->where('role', 'Customer')->select('*')->get();
        return view('admin_main', compact('products', 'customerinquires', 'customers'));
    }


    public function displayCustomerInfo()
    {
        $customers = DB::table('users')->where('role', 'Customer')->select('*')->get();
        return view('customer_manage', compact('customers'));
    }
}
