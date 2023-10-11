<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request, Product $product)
    {
        $cart = $request->session()->get('cart', []);

        // Check if the product is in stock
        if ($product->stock > 0) {
            // Add the product to the cart
            $cart[$product->product_id] = $cart[$product->product_id] ?? 0;
            $cart[$product->product_id]++;

            // Decrease the product quantity in the products table
            $product->decrement('stock');

            $request->session()->put('cart', $cart);

            return redirect()->route('cart.show')->with('success', 'Product added to cart.');
        } else {
            return redirect()->route('cart.show')->with('error', 'Product is out of stock.');
        }
    }

    public function showCart(Request $request)
    {
        $cart = $request->session()->get('cart', []);

        // Retrieve product details based on the product IDs in the cart
        $cartItems = Product::whereIn('product_id', array_keys($cart))->get();

        $total = 0;

        foreach ($cartItems as $cartItem) {
            $total += $cart[$cartItem->product_id] * $cartItem->price;
        }


        return view('cart', compact('cartItems', 'cart', 'total'));
    }

    // public function removeFromCart(Request $request, $productId)
    // {
    //     $cart = $request->session()->get('cart', []);

    //     // Check if the product is in the cart
    //     if (isset($cart[$productId])) {
    //         // Remove the product from the cart
    //         unset($cart[$productId]);

    //         // Increment the product quantity in the products table (you need to fetch the product details here)

    //         $request->session()->put('cart', $cart);

    //         return redirect()->route('cart.show')->with('success', 'Product removed from cart.');
    //     } else {
    //         return redirect()->route('cart.show')->with('error', 'Product not found in cart.');
    //     }
    // }

    public function removeFromCart(Request $request, $productId)
    {
        $cart = $request->session()->get('cart', []);

        // Check if the product is in the cart
        if (isset($cart[$productId])) {
            // Fetch the product details from the database
            $product = Product::find($productId);

            // Check if the product exists
            if ($product) {
                // Increment the product quantity in the products table
                $product->increment('stock', $cart[$productId]);
            }

            // Remove the product from the cart
            unset($cart[$productId]);

            // Update the cart session
            $request->session()->put('cart', $cart);

            return redirect()->route('cart.show')->with('success', 'Product removed from cart.');
        } else {
            return redirect()->route('cart.show')->with('error', 'Product not found in cart.');
        }
    }

}
