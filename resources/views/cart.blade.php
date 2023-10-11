@extends('layouts.main_template2')

@section('content')

<h2 class="text-center mt-5 pt-5">Checkout cart</h2>

<div class="card mx-3 my-5">
  <div class="card-header">
    Products in cart
  </div>
  <div class="card-body">
    @foreach($cartItems as $cartItem)
    <h5 class="card-title">{{ $cartItem->product_name }}</h5>
    <p class="card-text fw-bold">Price: LKR.{{ $cartItem->price }}</p>
    <p class="card-text fw-bold">Quantity: {{ $cart[$cartItem->product_id] }} x LKR.{{ $cartItem->price }}</p>
    
    <a href="{{ route('cart.remove', $cartItem->product_id) }}" class="btn btn-danger">Remove from cart</a>
    @endforeach
    <h3 class="mt-5">Total: LKR {{ $total }}</h3>
    <form action="{{ route('checkout') }}" method="POST">
        @csrf
        <button class="btn btn-success">Checkout</button>
    </form>
  </div>

  
</div>





@endsection