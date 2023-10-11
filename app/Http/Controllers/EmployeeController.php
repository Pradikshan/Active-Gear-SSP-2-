<?php

namespace App\Http\Controllers;

use App\Models\employee;
use App\Http\Requests\StoreemployeeRequest;
use App\Http\Requests\UpdateemployeeRequest;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $employees = employee::all();

        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Employee details retrieved successfully',
                'data' => $employees,
            ]);
        } else {
            return view('employee_manage', compact('employees'));
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
    public function store(StoreemployeeRequest $request)
    {
        $isApiRequest = $request->expectsJson();

        try {
            $empAdd = new employee;

            $empAdd->emp_id = $request->emp_id;
            $empAdd->emp_name = $request->emp_name;
            $empAdd->emp_NIC_no = $request->emp_NIC_no;
            $empAdd->emp_address = $request->emp_address;
            $empAdd->email_address = $request->email_address;
            $empAdd->telephone_no = $request->telephone_no;
            $empAdd->emp_access_level = $request->emp_access_level;

            $empAdd->save();

            $response = [
                'message' => 'Employee created successfully',
                'data' => $empAdd,
            ];

            if ($isApiRequest) {
                return response()->json($response, 201);
            } else {
                return redirect('/employee_add')->with('status', 'success');
            }
        } catch (Exception $e) {
            $response = [
                'message' => 'internal error occurred',
                'data' => null,
            ];


            if ($isApiRequest) {
                return response()->json($response, 500);
            } else {
                return redirect('/employee_add')->with('status', 'error');
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $emp_id)
    {
        $employee = employee::findOrFail($emp_id);

        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Current details of employee',
                'data' => $employee,
            ]);
        } else {
            return view('employee_edit', compact('employee'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateemployeeRequest $request, $emp_id)
    {
        $isApiRequest = $request->expectsJson();

        try {

            $employee = employee::findOrFail($emp_id);

            $validatedData = $request->validate([
                'emp_name' => 'required',
                //'image' => 'required',
                'emp_NIC_no' => 'required',
                'emp_address' => 'required',
                'email_address' => 'required',
                'telephone_no' => 'required',
                'emp_access_level' => 'required',
            ]);

            $employee->emp_name = $request->emp_name;
            $employee->emp_NIC_no = $request->emp_NIC_no;
            $employee->emp_address = $request->emp_address;
            $employee->email_address = $request->email_address;
            $employee->telephone_no = $request->telephone_no;
            $employee->emp_access_level = $request->emp_access_level;
            $employee->save();

            $response = [
                'message' => 'Employee details updated successfully',
                'data' => $employee,
            ];

            if ($isApiRequest) {
                return response()->json($response, 200);
            } else {
                return redirect('/employee_manage')->with('status', 'updated');
            }
        } catch (Exception $e) {
            $response = [
                'message' => 'Internal error occurred',
                'data' => null,
            ];

            if ($isApiRequest) {
                return response()->json($response, 500);
            } else {
                return redirect('/employee_manage')->with('status', 'error');
            }   
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function delete(Request $request)
    // {
    //     $emp_id = $request->input('emp_id');
    //     $employee = employee::findOrFail($emp_id);
    //     $employee->delete();

    //     return redirect('/employee_manage')->with('status', 'success');
    // }

    public function deactivateEmployee(Request $request, $id)
    {
        $isApiRequest = $request->expectsJson();

            try {
            $employee = employee::find($id);

            if ($employee) {
                $employee->status = 'INACTIVE';
                $employee->save();
            }

            $response = [
                'message' => 'Employee deleted successfully',
                'data' => $employee,
            ];

            if ($isApiRequest) {
                return response()->json($response, 200); // HTTP 200 OK for API
            } else {
                return redirect('/employee_manage')->with('status', 'success'); // Redirect for web form submission
            }
        } catch (Exception $e) {
            $response = [
                'message' => 'Internal error occurred',
                'data' => null,
            ];

            if ($isApiRequest) {
                return response()->json($response, 500); // HTTP 500 Internal Server Error for API
            } else {
                return redirect('/employee_manage')->with('status', 'error'); // Redirect for web form submission
            }
        }
    }
}
