@extends('layouts.main_template2')

@section('content')

<div class="my-5 pt-3">
        <h1 class="my-5 fw-bold text-center">Gym accessories</h1>
    </div>

<div class="container-fluid row">

    
    @foreach ($products as $product)
    <div class="card my-5 mx-5" style="width: 18rem; height:auto;">
    <img src="/prodImage/{{$product->image}}" class="card-img-top" alt="productImage" >
    <div class="card-body">
        <h5 class="card-title">{{ $product->product_name }}</h5>
        <p class="card-text">LKR. {{ $product->price }}</p>
        <p class="card-text">Available at: 
            @foreach ($product->locations as $location)
                {{ $location->location }} 
            @endforeach
        </p>
        <form method="POST" action="{{ route('cart.add', $product->product_id) }}">
            @csrf
            <button type="submit btn-primary">Add to Cart</button>
        </form>
    </div>
    </div>
    @endforeach

</div>
@endsection