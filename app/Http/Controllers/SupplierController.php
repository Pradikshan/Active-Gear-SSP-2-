<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Http\Requests\StoreSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $suppliers = Supplier::all();

        if($request->expectsJson()) {
            return response()->json([
                'message' => 'Supplier details retrieved successfully',
                'data' => $suppliers,
            ]);
        } else {
            return view('supplier_manage', compact('suppliers'));
        } 
    }

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
    // public function store(StoreSupplierRequest $request)
    // {
    //     try {
    //         $supplierAdd = new Supplier;

    //         $supplierAdd->supplier_id = $request->supplier_id;
    //         $supplierAdd->company_name = $request->company_name;
    //         $supplierAdd->company_address = $request->company_address;
    //         $supplierAdd->email_address = $request->email_address;
    //         $supplierAdd->telephone_no = $request->telephone_no;

    //         $supplierAdd->save();

    //         return redirect('/supplier_add')->with('status', 'success');
    //     } catch (Exception $e) {
    //         return redirect('/supplier_add')->with('status', 'error');
    //     }
    // }

    public function store(StoreSupplierRequest $request)
    {
        $isApiRequest = $request->expectsJson(); // Check if it's an API request

        try {
            $supplierAdd = new Supplier;

            // Populate supplier fields from the request
            $supplierAdd->supplier_id = $request->supplier_id;
            $supplierAdd->company_name = $request->company_name;
            $supplierAdd->company_address = $request->company_address;
            $supplierAdd->email_address = $request->email_address;
            $supplierAdd->telephone_no = $request->telephone_no;

            // Save the supplier to the database
            $supplierAdd->save();

            $response = [
                'message' => 'Supplier created successfully',
                'data' => $supplierAdd,
            ];

            if ($isApiRequest) {
                return response()->json($response, 201); // HTTP 201 Created for API
            } else {
                return redirect('/supplier_add')->with('status', 'success'); // Redirect for web form submission
            }
        } catch (Exception $e) {
            $response = [
                'message' => 'Internal error occurred',
                'data' => null,
            ];

            if ($isApiRequest) {
                return response()->json($response, 500); // HTTP 500 Internal Server Error for API
            } else {
                return redirect('/supplier_add')->with('status', 'error'); // Redirect for web form submission
            }
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $supplier_id)
    {
        $supplier = Supplier::findOrFail($supplier_id);

        if($request->expectsJson()) {
            return response()->json([
                'message' => 'Current details of supplier',
                'data' => $supplier,
            ]);
        } else {
            return view('supplier_edit', compact('supplier'));
        }  
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSupplierRequest $request, $supplier_id)
    {
        $isApiRequest = $request->expectsJson();

        try{
            $supplier = Supplier::findOrFail($supplier_id);

            $validatedData = $request->validate([
                'company_name' => 'required',
                'company_address' => 'required',
                'email_address' => 'required',
                'telephone_no' => 'required',
            ]);
    
            $supplier->company_name = $request->company_name;
            $supplier->company_address = $request->company_address;
            $supplier->email_address = $request->email_address;
            $supplier->telephone_no = $request->telephone_no;
            $supplier->save();

            $response = [
                'message' => 'Supplier details updated successfully',
                'data' => $supplier,
            ];

            if ($isApiRequest) {
                return response()->json($response, 200);
            } else {
                return redirect('/supplier_manage')->with('status', 'updated');
            }
        } catch (Exception $e) {
            $response = [
                'message' => 'Internal error occurred',
                'data' => null,
            ];

            if ($isApiRequest) {
                return response()->json($response, 500);
            } else {
                return redirect('/supplier_manage')->with('status', 'error');
            }

        }


        // return redirect('/supplier_edit/'.$supplier_id)->with('status', 'success');

    }

    /**
     * Remove the specified resource from storage.
     */
    // public function delete(Request $request)
    // {
    //     $supplier_id = $request->input('supplier_id');
    //     $supplier = Supplier::findOrFail($supplier_id);
    //     $supplier->delete();

    //     return redirect('/supplier_manage')->with('status', 'success');
    // }

    public function deactivateSupplier(Request $request, $id)
    {
        $isApiRequest = $request->expectsJson();

            try {
            $supplier = Supplier::find($id);

            if ($supplier) {
                $supplier->status = 'INACTIVE';
                $supplier->save();
            }

            $response = [
                'message' => 'Supplier deleted successfully',
                'data' => $supplier,
            ];

            if ($isApiRequest) {
                return response()->json($response, 200); // HTTP 200 OK for API
            } else {
                return redirect('/supplier_manage')->with('status', 'success'); // Redirect for web form submission
            }
        } catch (Exception $e) {
            $response = [
                'message' => 'Internal error occurred',
                'data' => null,
            ];

            if ($isApiRequest) {
                return response()->json($response, 500); // HTTP 500 Internal Server Error for API
            } else {
                return redirect('/supplier_manage')->with('status', 'error'); // Redirect for web form submission
            }
        }
    }
}
