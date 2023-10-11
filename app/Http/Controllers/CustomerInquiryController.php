<?php

namespace App\Http\Controllers;

use App\Models\CustomerInquiry;
use App\Http\Requests\StoreCustomerInquiryRequest;
use App\Http\Requests\UpdateCustomerInquiryRequest;

class CustomerInquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $customer_inquires = CustomerInquiry::all();
        // return view('admin_main', compact('customer_inquires'));
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
    public function store(StoreCustomerInquiryRequest $request)
    {
        // $data = $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email',
        //     'tele_no' => 'required',
        //     'reason_for_complaint' => 'required',
        //     'inquiry' => 'required',
        // ]);

        // CustomerInquiry::create($data);

        // return redirect('/main')->with('success', 'Thank you for your feedback!');

        try {
            $customerInquiry = new CustomerInquiry;

            $customerInquiry->name = $request->name;
            $customerInquiry->email = $request->email;
            $customerInquiry->tele_no = $request->tele_no;
            $customerInquiry->reason_for_complaint = $request->reason_for_complaint;
            $customerInquiry->inquiry = $request->inquiry;
            $customerInquiry->save();

            return redirect('/feedback')->with('status', 'success');
        } catch (Exception $e) {
            return redirect('/feedback')->with('status', 'error');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CustomerInquiry $customerInquiry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CustomerInquiry $customerInquiry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerInquiryRequest $request, CustomerInquiry $customerInquiry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CustomerInquiry $customerInquiry)
    {
        //
    }

    //Customer method
    // public function store(Request $request)
    // {
    //     $data = $request->validate([
    //         'name' => 'required',
    //         'email' => 'required|email',
    //         'tele_no' => 'required',
    //         'reason_for_complaint' => 'required',
    //         'inquiry' => 'required',
    //     ]);

    //     Contact::create($data);

    //     return redirect('/contact')->with('success', 'Thank you for your message!');
    // }

}
