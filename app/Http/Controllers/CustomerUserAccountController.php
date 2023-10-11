<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CustomerUserAccountController extends Controller
{
    public function createCustomerUser(Request $request)
    {
        $isApiRequest = $request->expectsJson();

        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'NIC' => 'required|string|max:255',
                'email' => 'required|email|unique:users|max:255',
                'password' => 'required|string|min:8',
                'address' => 'required|string|max:255',
                'telephone_no' => 'required|digits_between:10,10',
                'dob' => 'required|date|before_or_equal:today',
                'membership' => 'required|in:basic,silver,gold,elite',
            ]);
    
            $user = User::create([
                'name' => $validatedData['name'],
                'NIC' => $validatedData['NIC'],
                'email' => $validatedData['email'],
                'password' => bcrypt($validatedData['password']),
                'address' => $validatedData['address'],
                'telephone_no' => $validatedData['telephone_no'],
                'dob' => $validatedData['dob'],
                'membership' => $validatedData['membership'],
                'role' => 'Customer',
            ]);

            $user->save();

            $response = [
                'message' => 'New customer account created successfully',
                'data' => $user,
            ];

            if ($isApiRequest) {
                return response($response, 201);
            } else {
                return redirect()->route('customer_user_add')->with('status', 'success');
            }
        } catch (Exception $e) {
            $response = [
                'message' => 'Interanl error occurred',
                'data' => null,
            ];

            if ($isApiRequest) {
                return response($response, 500);
            } else {
                return redirect()->route('customer_user_add')->with('status', 'error');
            }
        }
    }


    // public function displayCustomerInfo()
    // {
    //     // $customers = DB::table('users')->where('role', 'Customer');

    //     // return view('admin_main', compact('customers'));
    // }
}
