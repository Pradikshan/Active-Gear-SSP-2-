<?php

namespace App\Http\Controllers;

use App\Models\giftcard;
use App\Http\Requests\StoregiftcardRequest;
use App\Http\Requests\UpdategiftcardRequest;
use Illuminate\Http\Request;

class GiftcardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $giftcards = giftcard::all();

        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Giftcard details retrieved successfully',
                'data' => $giftcards,
            ]);
        } else {
            return view('gift_manage', compact('giftcards'));
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
    public function store(StoregiftcardRequest $request)
    {
        $isApiRequest = $request->expectsJson();

        try {
            $giftAdd = new giftcard;

            $giftAdd->giftcard_id = $request->giftcard_id;
            $giftAdd->giftcard_name = $request->giftcard_name;
            $giftAdd->amount = $request->amount;
            
            $giftAdd->save();

            $response = [
                'message' => 'Giftcard created successfully',
                'data' => $giftAdd,
            ];

            if ($isApiRequest) {
                return response()->json($response, 201);
            } else{
                return redirect('/gift_add')->with('status', 'success');
            } 
        } catch (Exception $e) {
            $response = [
                'message' => 'Internal error occurred',
                'data' => null,
            ];

            if ($isApiRequest) {
                return response()->json($response, 201);
            } else{
                return redirect('/gift_add')->with('status', 'error');
            } 
            
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(giftcard $giftcard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $giftcard_id)
    {
        $giftcard = giftcard::findOrFail($giftcard_id);

        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Current details of giftcard',
                'data' => $giftcard,
            ]);
        } else {
            return view('gift_edit', compact('giftcard'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdategiftcardRequest $request, $giftcard_id)
    {
        $isApiRequest = $resquest->expectsJson();
        try {

            $giftcard = giftcard::findOrFail($giftcard_id);

            $validatedData = $request->validate([
                'giftcard_name' => 'required',
                'amount' => 'required',
            ]);
    
            $giftcard->giftcard_name = $request->giftcard_name;
            $giftcard->amount = $request->amount;
            $giftcard->save();

            $response = [
                'message' => 'Giftcard details updated successfully',
                'data' => $giftcard,
            ];

            if ($isApiRequest) {
                return response()->json($response, 200);
            } else {
                return redirect('/gift_manage')->with('status', 'updated');
            }
        } catch (Exception $e) {
            $response =[
                'message' => 'Internal erro occurred',
                'data' => null,
            ];

            if ($isApiRequest) {
                return response()->json($response, 500);
            } else {
                return redirect('/gift_manage')->with('status', 'error');
            }
        }
        // return redirect('/gift_edit/'.$giftcard_id)->with('status', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function delete(Request $request)
    // {
    //     $giftcard_id = $request->input('giftcard_id');
    //     $giftcard = giftcard::findOrFail($giftcard_id);
    //     $giftcard->delete();

    //     return redirect('/gift_manage')->with('status', 'success');
    // }

    public function deactivateGiftCard(Request $request, $id)
    {
        $isApiRequest = $request->expectsJson();

            try {
            $giftcard = giftcard::find($id);

            if ($giftcard) {
                $giftcard->status = 'INACTIVE';
                $giftcard->save();
            }

            $response = [
                'message' => 'Giftcard deleted successfully',
                'data' => $giftcard,
            ];

            if ($isApiRequest) {
                return response()->json($response, 200); // HTTP 200 OK for API
            } else {
                return redirect('/gift_manage')->with('status', 'success'); // Redirect for web form submission
            }
        } catch (Exception $e) {
            $response = [
                'message' => 'Internal error occurred',
                'data' => null,
            ];

            if ($isApiRequest) {
                return response()->json($response, 500); // HTTP 500 Internal Server Error for API
            } else {
                return redirect('/gift_manage')->with('status', 'error'); // Redirect for web form submission
            }
        }
    }
}
