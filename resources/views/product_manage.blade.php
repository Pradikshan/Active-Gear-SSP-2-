@extends('layouts.admin_template2')

@section('content')
<div class="container mb-5">
    <h1 class="text-center">Manage product</h1>
</div>

<div class="container">
    <div class="row">
        @foreach ($product as $product)
        <div class="col-md-4 mb-4">
            <div class="card">
            <img src="/prodImage/{{$product->image}}" style="width:inherit; height:15rem" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Product name: {{ $product->product_name }} </h5>
                    <h5 class="card-title">Product ID: {{ $product->product_id }}</h5>
                    <h5 class="card-title">Supplier ID: {{ $product->supplier_id }}</h5>
                    <h5 class="card-title">Product category: {{ $product->category }}</h5>
                    <h5 class="card-title">Brand: {{ $product->brand }}</h5>
                    <h5 class="card-title">Description: {{ $product->description }}</h5>
                    <h5 class="card-title">Location: {{ $product->location }}</h5>
                    <h5 class="card-title">Color: {{ $product->color }}</h5>
                    <h5 class="card-title">Size: {{ $product->size }}</h5>
                    <h5 class="card-title">Quantity: {{ $product->stock }}</h5>
                    <h5 class="card-title">Price (LKR): {{ $product->price }}</h5>
                
                    
               
                </div>
                <a href="/product_edit/{{ $product->product_id }}" class="btn btn-outline-primary fw-bold btn-block mb-3 mx-3">Edit</a>
                <a href="{{ route('deactivate_product', ['id' => $product->product_id]) }}" class="btn btn-primary btn-block mb-3 mx-3">Delete</a>
                        
            </div>
        </div>
        @endforeach
    </div>
</div>

@if (session('status') == 'success')
<div class="alert alert-success" role="alert">
    Product deleted successfully
</div>

@elseif (session('status') == 'updated')
<div class="alert alert-success" role="alert">
    Product details updated successfully
</div>

@elseif (session('status') == 'error')
<div class="alert alert-alert" role="alert">
    Error
</div>
@endif
@endsection