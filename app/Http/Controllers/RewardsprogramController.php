<?php

namespace App\Http\Controllers;

use App\Models\rewardsprogram;
use App\Http\Requests\StorerewardsprogramRequest;
use App\Http\Requests\UpdaterewardsprogramRequest;
use Illuminate\Http\Request;

class RewardsprogramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $rewardAdd = rewardsprogram::all();
        // return view('reward_manage', compact('rewardAdd'));
        
        $rewardsprograms = rewardsprogram::all();

        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Rewardsprogram details retrived successfully',
                'data' => $rewardsprograms,
            ]);
        } else {
            return view('reward_manage', compact('rewardsprograms'));
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
    public function store(StorerewardsprogramRequest $request)
    {
        $isApiRequest = $request->expectsJson();

        try {
            $rewardAdd = new rewardsprogram;

            $rewardAdd->reward_program_ID = $request->reward_program_ID;
            $rewardAdd->reward_program_name = $request->reward_program_name;
            $rewardAdd->description = $request->description;
            
            $rewardAdd->save();

            $response = [
                'message' => 'Rewardsprogram created successfully',
                'data' => $rewardAdd,
            ];

            if ($isApiRequest) {
                return response()->json($response, 201);
            } else {
                return redirect('/reward_add')->with('status', 'success');
            }

        
        } catch (Exception $e) {
            $response = [
                'message' => 'Internal error occurred',
                'data' => null,
            ];

            if ($isApiRequest) {
                return response()->json($response, 500);
            } else {
                return redirect('/reward_add')->with('status', 'error');
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(rewardsprogram $rewardsprogram)
    {
        //
    }

    public function edit(Request $request, $reward_program_ID)
    {
        $rewardsprogram = rewardsprogram::findOrFail($reward_program_ID);

        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Current details of rewardsprogram',
                'data' => $rewardsprogram,
            ]);
        } else {
            return view('reward_edit', compact('rewardsprogram'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdaterewardsprogramRequest $request, $reward_program_ID)
    {
        $isApiRequest = $request->expectsJson();

        try {
            $rewardsprogram = rewardsprogram::findOrFail($reward_program_ID);

            $validatedData = $request->validate([
                'reward_program_name' => 'required',
                'description' => 'required',
            ]);

            $rewardsprogram->reward_program_name = $request->reward_program_name;
            $rewardsprogram->description = $request->description;
            $rewardsprogram->save();

            $response = [
                'message' => 'Rewardsprogram updated successfully',
                'data' => $rewardsprogram,
            ];

            if ($isApiRequest) {
                return response()->json($resposne, 201);
            } else {
                return redirect('/reward_manage')->with('status', 'updated');
            }
        } catch(Exception $e) {
            $response = [
                'message' => 'Internal error occurred',
                'data' => null,
            ];

            if ($isApiRequest) {
                return response()->json($response, 500);
            } else {
                return redirect('/reward_manage')->with('status', 'error');
            }
        }
    }

    public function deactivateReward(Request $request, $id)
    {
        $isApiRequest = $request->expectsJson();

            try {
            $rewardsprogram = rewardsprogram::find($id);

            if ($rewardsprogram) {
                $rewardsprogram->status = 'INACTIVE';
                $rewardsprogram->save();
            }

            $response = [
                'message' => 'Rewards program deleted successfully',
                'data' => $rewardsprogram,
            ];

            if ($isApiRequest) {
                return response()->json($response, 200); 
            } else {
                return redirect('/reward_manage')->with('status', 'success'); 
            }
        } catch (Exception $e) {
            $response = [
                'message' => 'Internal error occurred',
                'data' => null,
            ];

            if ($isApiRequest) {
                return response()->json($response, 500); 
            } else {
                return redirect('/reward_manage')->with('status', 'error'); 
            }
        }
    }

    

    // public function delete(Request $request)
    // {
    //     $reward_program_ID = $request->input('reward_program_ID');
    //     $rewardsprogram = rewardsprogram::findOrFail($reward_program_ID);
    //     $rewardsprogram->delete();

    //     return redirect('/reward_manage')->with('status', 'success');
    // }
}
