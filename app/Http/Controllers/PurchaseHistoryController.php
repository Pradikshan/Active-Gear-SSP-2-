<?php

namespace App\Http\Controllers;

use App\Models\PurchaseHistory;
use App\Http\Requests\StorePurchaseHistoryRequest;
use App\Http\Requests\UpdatePurchaseHistoryRequest;
use Illuminate\Http\Request;

class PurchaseHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $purchaseHistory = PurchaseHistory::where('user_id', auth()->id())->get();
        $purchaseHistories = PurchaseHistory::selectRaw("DATE(created_at) AS created_at, SUM(price) AS total_spending")
        ->where('created_at', '>=', now()->subDays(30)) 
        ->groupBy('created_at')
        ->orderBy('created_at')
        ->get();

        
        $labels = $purchaseHistories->pluck('created_at'); // Array of dates
        $data = $purchaseHistories->pluck('total_spending'); // Array of total spending

        // Populate the data object
        $dataObject = [
        'labels' => $labels,
        'datasets' => [
            [
                'label' => 'Total Spending',
                'data' => $data,
                'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                'borderColor' => 'rgba(75, 192, 192, 1)',
                'borderWidth' => 1,
            ],
        ],
        ];

        // Convert the data object to JSON and make it available in the Blade view
        $dataObjectJson = json_encode($dataObject);

       

        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Customer purchase history retrived successfully',
                'data' => $purchaseHistory,
            ]);
        } else {
            return view('purchase_history', compact('purchaseHistory', 'dataObjectJson'));
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
    public function store(StorePurchaseHistoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PurchaseHistory $purchaseHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PurchaseHistory $purchaseHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePurchaseHistoryRequest $request, PurchaseHistory $purchaseHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PurchaseHistory $purchaseHistory)
    {
        //
    }
}
