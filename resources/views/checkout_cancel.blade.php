@extends('layouts.cart_template')

@section('content')

<div class="container-fluid">
    <div class="d-flex justify-content-center my-4">
        <img src="{{ asset('images/cancel.png') }}" style="width:20% ; height:auto ;">
        
    </div>
    <h1 class="text-center my-4">Payment unsuccessful! Try again later</h1>
</div>

@endsection