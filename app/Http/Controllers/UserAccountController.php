<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Customer;
use App\Http\Controllers\Controller;

class UserAccountController extends Controller
{
    public function createUser(Request $request)
    {
        $isApiRequest = $request->expectsJson();

        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users|max:255',
                'password' => 'required|string|min:8',
                //'address' => 'required|string|max:255',
                'telephone_no' => 'required|digits_between:10,10',
                //'dob' => 'required|date|before_or_equal:today',
                'role' => 'required|in:Manager,Inventory manager',
            ]);
    
            $user = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => bcrypt($validatedData['password']),
                //'address' => $validatedData['address'],
                'telephone_no' => $validatedData['telephone_no'],
                //'dob' => $validatedData['dob'],
                'role' => $validatedData['role'],
            ]);
            
            $user->save();

            $response = [
                'message' => 'Employee user account ceated successfully',
                'data' => $user,
            ];

            if ($isApiRequest) {
                return response()->json($resposne, 201);
            } else {
                return redirect()->route('user_add')->with('status', 'success');
            }
        } catch (Exception $e) {
            $response = [
                'message' => 'Internal error ocurred',
                'data' => null,
            ];

            if ($isApiRequest) {
                return response()->json($resposne, 500);
            } else {
                return redirect()->route('user_add')->with('status', 'error');
            }
        }
    }

    public function retrieveAccountInfo(Request $request)
    {
        $users = User::where('role', 'Customer')
        ->get();

        $customers = Customer::all();

        $data = [
            'users' => $users,
            'customers' => $customers,
        ];

        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Customer information retrieved successfully',
                'data' => $data,
            ]);
        } else {
            return view('customer_manage', compact('users', 'customers'));
        }
    }


    public function retrieveEmployeeAccountInfo(Request $request)
    {
        $rolesToSelect = ['Manager', 'Inventory Manager'];

        $users = User::whereIn('role', $rolesToSelect)->where('status', 'ACTIVE')
            ->get();

        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Employee account information retrieved successfully',
                'data' => $users,
            ]);
        } else {
            return view('user_manage', compact('users'));
        }
    }

    public function edit(User $user, $id)
    {
        $user = User::findOrFail($id);
        return view('user_edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $isApiRequest = $request->expectsJson(); // Check if it's an API request
    
        try {
            $user = User::findOrFail($id);
    
            $validatedData = $request->validate([
                'name' => 'required',
                'role' => 'required',
                'email' => 'required',
                'address' => 'required',
                'telephone_no' => 'required',
            ]);
    
            $user->name = $request->name;
            $user->role = $request->role;
            $user->email = $request->email;
            $user->address = $request->address;
            $user->telephone_no = $request->telephone_no;
            
            $user->save();
    
            $response = [
                'message' => 'Employee user account updated successfully',
                'data' => $user,
            ];
    
            if ($isApiRequest) {
                return response()->json($response, 200); // HTTP 200 OK for API
            } else {
                return redirect('/user_manage')->with('status', 'updated'); // Redirect for web form submission
            }
        } catch (Exception $e) {
            $response = [
                'message' => 'Internal error occurred',
                'data' => null,
            ];
    
            if ($isApiRequest) {
                return response()->json($response, 500); // HTTP 500 Internal Server Error for API
            } else {
                return redirect('/user_manage')->with('status', 'error'); // Redirect for web form submission
            }
        }
    }

    public function deactivateEmployeeUserAccount(Request $request, $id)
    {
        $isApiRequest = $request->expectsJson();

            try {
            $user = User::find($id);

            if ($user) {
                $user->status = 'INACTIVE';
                $user->save();
            }

            $response = [
                'message' => 'Product deactivated successfully',
                'data' => $user,
            ];

            if ($isApiRequest) {
                return response()->json($response, 200); // HTTP 200 OK for API
            } else {
                return redirect('/user_manage')->with('status', 'success'); // Redirect for web form submission
            }
        } catch (Exception $e) {
            $response = [
                'message' => 'Internal error occurred',
                'data' => null,
            ];

            if ($isApiRequest) {
                return response()->json($response, 500); // HTTP 500 Internal Server Error for API
            } else {
                return redirect('/user_manage')->with('status', 'error'); // Redirect for web form submission
            }
        }
    }



}
