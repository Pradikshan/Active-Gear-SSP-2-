<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $customers = Customer::all();
    //     return view('customer_manage', compact('customers'));
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        try {
            $customerAdd = new Customer;

            $customerAdd->name = $request->name;
            $customerAdd->NIC_no = $request->NIC_no;
            $customerAdd->address = $request->address;
            $customerAdd->email_address = $request->email_address;
            $customerAdd->telephone_no = $request->telephone_no;
            $customerAdd->membership_status = $request->membership_status;
            
            $customerAdd->save();

        return redirect('/customer_add')->with('status', 'success');
        } catch (Exception $e) {
        return redirect('/customer_add')->with('status', 'error');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($NIC_no)
    {
        $customer = Customer::findOrFail($NIC_no);
        return view('customer_edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, $NIC_no)
    {
        $customer = Customer::findOrFail($NIC_no);

        $validatedData = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'membership_status' => 'required',
        ]);

        $customer->name = $request->name;
        $customer->address = $request->address;
        $customer->membership_status = $request->membership_status;
        $customer->save();

        return redirect('customer_manage')->with('status', 'updated');
    }

    public function deactivateCustomer(Request $request, $id)
    {
        $isApiRequest = $request->expectsJson();

            try {
            $customer = Customer::find($id);

            if ($customer) {
                $customer->status = 'INACTIVE';
                $customer->save();
            }

            $response = [
                'message' => 'Customer deleted successfully',
                'data' => $customer,
            ];

            if ($isApiRequest) {
                return response()->json($response, 200); // HTTP 200 OK for API
            } else {
                return redirect('/customer_manage')->with('status', 'success'); // Redirect for web form submission
            }
        } catch (Exception $e) {
            $response = [
                'message' => 'Internal error occurred',
                'data' => null,
            ];

            if ($isApiRequest) {
                return response()->json($response, 500); // HTTP 500 Internal Server Error for API
            } else {
                return redirect('/customer_manage')->with('status', 'error'); // Redirect for web form submission
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function delete(Request $request)
    // {
    //     $NIC_no = $request->input('NIC_no');
    //     $customer = Customer::findOrFail($NIC_no);
    //     $customer->delete();

    //     return redirect('/customer_manage')->with('status', 'success');
    // }
}
