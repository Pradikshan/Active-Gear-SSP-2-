<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\Location;
use App\Models\PurchaseHistory;
// use App\Models\CustomerInquiry;
// use App\Models\User;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \Validator;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $product = DB::table('products')
        ->join('product_locations', 'products.product_id', '=', 'product_locations.product_id')
        ->join('locations', 'product_locations.location_id', '=', 'locations.id')
        ->select('products.*', 'locations.location')
        ->where('products.status', 'ACTIVE') 
        ->get();

        if ($request->expectsJson()) {
            // If it's an API request, return JSON response
            return response()->json([
                'message' => 'Product details retrieved successfully',
                'data' => $product,
            ]);
        } else {
            // If it's a web request, return a view
            return view('product_manage', compact('product'));
        }
    }



    public function mainview(Request $request)
    {
        $products = DB::table('products')
            ->join('product_locations', 'products.product_id', '=', 'product_locations.product_id')
            ->join('locations', 'product_locations.location_id', '=', 'locations.id')
            ->select('products.*', 'locations.location')
            ->where('products.status', 'ACTIVE')
            ->take(10)
            ->get();

        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Products retrieved successfully',
                'data' => $products,
            ]);
        } else {
            return view('main', compact('products'));
        }
    }


    public function productActiveWear(Request $request)
    {
        $products = Product::where('category', 'Active wear')
            ->where('status', 'ACTIVE')
            ->with('locations') // Eager load the locations relationship
            ->get();
    
        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Active wear products retrieved successfully',
                'data' => $products,
            ]);
        } else {
            return view('product_category_activewear', compact('products'));
        }
    }
    

    public function productGymAccessories(Request $request)
    {
        $products = Product::where('category', 'Gym accessories')
            ->where('status', 'ACTIVE')
            ->with('locations') // Eager load the locations relationship
            ->get();
    
        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Gym accessories retrieved successfully',
                'data' => $products,
            ]);
        } else {
            return view('product_category_gymacc', compact('products'));
        }
    }

    public function productGymEquipment(Request $request)
    {
        $products = Product::where('category', 'Gym equipment')
            ->where('status', 'ACTIVE')
            ->with('locations') // Eager load the locations relationship
            ->get();
    
        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Gym equipment products retrieved successfully',
                'data' => $products,
            ]);
        } else {
            return view('product_category_gymeq', compact('products'));
        }
    }
    

    public function productSportsEquipment(Request $request)
    {
        $products = Product::where('category', 'Sports equipment')
            ->where('status', 'ACTIVE')
            ->with('locations') // Eager load the locations relationship
            ->get();
    
        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Sports equipments retrieved successfully',
                'data' => $products,
            ]);
        } else {
            return view('product_category_sportseq', compact('products'));
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

     public function store(StoreProductRequest $request)
    {
        $isApiRequest = $request->expectsJson(); // Check if it's an API request

        try {
            $location = new Location();
            $location->region = $request->region;
            $location->location = $request->location;
            $location->save();

            $productAdd = new Product;
            $image = $request->image;
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('prodImage', $imagename);

            $productAdd->product_id = $request->product_id;
            $productAdd->supplier_id = $request->supplier_id;
            $productAdd->product_name = $request->product_name;
            $productAdd->image = $imagename;
            $productAdd->category = $request->category;
            $productAdd->brand = $request->brand;
            $productAdd->description = $request->description;
            $productAdd->size = $request->size;
            $productAdd->color = $request->color;
           
            $productAdd->stock = $request->stock;
            //$productAdd->quantity = $request->quantity;
            $productAdd->price = $request->price;

            $productAdd->save();

            // $productAdd->locations()->attach($location->id);
            $productAdd->locations()->attach($location->id, ['stock' => $request->stock]);

            // $location = $request->input('location'); // Assuming you have a 'locations' input field in your form
            // $productAdd->locations()->sync($location);

            $response = [
                'message' => 'Product created successfully',
                'data' => $productAdd,
            ];

            if ($isApiRequest) {
                return response()->json($response, 201); // HTTP 201 Created for API
            } else {
                return redirect('/product_add')->with('status', 'success'); // Redirect for web form submission
            }
        } catch (Exception $e) {
            $response = [
                'message' => 'Internal error occurred',
                'data' => null,
            ];

            if ($isApiRequest) {
                return response()->json($response, 500); // HTTP 500 Internal Server Error for API
            } else {
                return redirect('/product_add')->with('status', 'error'); // Redirect for web form submission
            }
        }
    }




    

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $product_id)
    {
        $product = Product::findOrFail($product_id);

        if($request->expectsJson()) {
            return response()->json([
                'message' => 'Current details of product',
                'data' => $product,
            ]);
        } else {
            return view('product_edit', compact('product'));
        }  
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, $product_id)
    {
        $isApiRequest = $request->expectsJson(); // Check if it's an API request
    
        try {
            $product = Product::findOrFail($product_id);
    
            $validatedData = $request->validate([
                'supplier_id' => 'required',
                'product_name' => 'required',
                'image' => 'required',
                'category' => 'required',
                'brand' => 'required',
                'description' => 'required',
                'size' => 'required',
                'color' => 'required',
                'price' => 'required',
            ]);
    
            $product->supplier_id = $request->supplier_id;
            $product->product_name = $request->product_name;
            $product->image = $request->image;
            $product->category = $request->category;
            $product->brand = $request->brand;
            $product->description = $request->description;
            $product->size = $request->size;
            $product->color = $request->color;
            $product->price = $request->price;
            // $product->location = $request->location;
            // $product->quantity = $request->quantity;
            $product->save();
    
            $response = [
                'message' => 'Product details updated successfully',
                'data' => $product,
            ];
    
            if ($isApiRequest) {
                return response()->json($response, 200); // HTTP 200 OK for API
            } else {
                return redirect('/product_manage')->with('status', 'updated'); // Redirect for web form submission
            }
        } catch (Exception $e) {
            $response = [
                'message' => 'Internal error occurred',
                'data' => null,
            ];
    
            if ($isApiRequest) {
                return response()->json($response, 500); // HTTP 500 Internal Server Error for API
            } else {
                return redirect('/product_manage')->with('status', 'error'); // Redirect for web form submission
            }
        }
    }
    

    public function deactivateProduct(Request $request, $id)
    {
        $isApiRequest = $request->expectsJson();

            try {
            $product = Product::find($id);

            if ($product) {
                $product->status = 'INACTIVE';
                $product->save();
            }

            $response = [
                'message' => 'Product deactivated successfully',
                'data' => $product,
            ];

            if ($isApiRequest) {
                return response()->json($response, 200); // HTTP 200 OK for API
            } else {
                return redirect('/product_manage')->with('status', 'success'); // Redirect for web form submission
            }
        } catch (Exception $e) {
            $response = [
                'message' => 'Internal error occurred',
                'data' => null,
            ];

            if ($isApiRequest) {
                return response()->json($response, 500); // HTTP 500 Internal Server Error for API
            } else {
                return redirect('/product_manage')->with('status', 'error'); // Redirect for web form submission
            }
        }
    }

    // public function checkout(Request $request)
    // {

    //     $cart = $request->session()->get('cart', []);

    // // Retrieve the products based on the product IDs in the cart
    //     $products = Product::whereIn('product_id', array_keys($cart))->get();

    //     \Stripe\Stripe::setApiKey('sk_test_51Nri2XSHPxEQXe1IuY2ZZMCVJDtQ6VqN11toY60CHv5srfxFPZgsTc6VRg4KdbSUgrwAeTIYMoOK8LaUrWJzFOEJ00MLt2FJXt');

    //     $lineItems = [];
    //     $totalPrice = 0;

    //     foreach ($products as $product) {
    //         $totalPrice += $product->price;
    //         $lineItems[] = [
    //             'price_data' => [
    //                 'currency' => 'inr',
    //                 'product_data' => [
    //                   'name' => $product->product_name,
    //                 ],
    //                 'unit_amount' => $product->price * 100,
    //               ],
    //               'quantity' => 1,
    //             ];

            
    //     }

    //     $session = \Stripe\Checkout\Session::create([
    //         'line_items' => $lineItems,
    //         'mode' => 'payment',
    //         'success_url' => route('success', [], true),
    //         'cancel_url' => route('cancel', [], true),
    //       ]);

    //       $order = new Order();
    //       $order->status = 'paid';
    //       $order->total_price = $totalPrice;
    //       $order->session_id = $session->id;
    //       $order->save();

    //       foreach ($products as $product) {
    //         $purchaseHistory = new PurchaseHistory();
    //         $purchaseHistory->user_id = auth()->id(); 
    //         $purchaseHistory->product_name = $product->product_name;
    //         $purchaseHistory->quantity = 1; 
    //         $purchaseHistory->price = $product->price;
    //         $purchaseHistory->save();
    //     }
    // return redirect($session->url);

        
    // }

    public function checkout(Request $request)
    {
        try {
            $cart = $request->session()->get('cart', []);

            // Retrieve the products based on the product IDs in the cart
            $products = Product::whereIn('product_id', array_keys($cart))->get();

            \Stripe\Stripe::setApiKey('sk_test_51Nri2XSHPxEQXe1IuY2ZZMCVJDtQ6VqN11toY60CHv5srfxFPZgsTc6VRg4KdbSUgrwAeTIYMoOK8LaUrWJzFOEJ00MLt2FJXt');

            $lineItems = [];
            $totalPrice = 0;

            foreach ($products as $product) {
                $totalPrice += $product->price;
                $lineItems[] = [
                    'price_data' => [
                        'currency' => 'inr',
                        'product_data' => [
                            'name' => $product->product_name,
                        ],
                        'unit_amount' => $product->price * 100,
                    ],
                    'quantity' => 1,
                ];
            }

            $session = \Stripe\Checkout\Session::create([
                'line_items' => $lineItems,
                'mode' => 'payment',
                'success_url' => route('success', [], true),
                'cancel_url' => route('cancel', [], true),
            ]);

            // $order = new Order();
            // $order->status = 'paid';
            // $order->total_price = $totalPrice;
            // $order->session_id = $session->id;
            // $order->user_id = auth()->id();
            // $order->save();

            $productNames = [];
            // Record purchase history for each product in the cart
            foreach ($products as $product) {
                $purchaseHistory = new PurchaseHistory();
                $purchaseHistory->user_id = auth()->id();
                $purchaseHistory->product_name = $product->product_name;
                $purchaseHistory->quantity = 1;
                $purchaseHistory->price = $product->price;
                $purchaseHistory->created_at = now(); 
                $purchaseHistory->save();

                $productNames[] = $product->product_name;
            }

            $order = new Order();
            $order->status = 'paid';
            $order->total_price = $totalPrice;
            $order->session_id = $session->id;
            $order->user_id = auth()->id();
            $order->product_names = json_encode($productNames);
            $order->save();

            if ($request->expectsJson()) {
                $response = [
                    'message' => 'Checkout completed successfully',
                    'data' => [
                        'order_id' => $order->id,
                        'session_id' => $session->id,
                    ],
                ];

                return response()->json($response, 200); 
            } else {
                return redirect($session->url); 
            }
        } catch (Exception $e) {
            if ($request->expectsJson()) {
                $response = [
                    'message' => 'Internal error occurred',
                    'data' => null,
                ];

                return response()->json($response, 500); 
            } else {
                return redirect()->route('cancel')->with('error', 'An error occurred during checkout'); 
            }
        }
    }

    public function success()
    {
        return view('checkout_success');
    }

    public function cancel()
    {
        return view('checkout_cancel');
    }

    
    
}