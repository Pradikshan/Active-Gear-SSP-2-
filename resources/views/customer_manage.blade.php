@extends('layouts.admin_template2')

@section('content')
<div class="container mb-5">
    <h1 class="text-center">Customer overview</h1>
</div>

<div class="container">
    <div class="row">
        <h2>Customers with user accounts</h2>
        @foreach ($users as $user)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Customer name: {{ $user->name }} </h5>
                    <h5 class="card-title">NIC no: {{ $user->NIC }}</h5>
                    <h5 class="card-title">Address: {{ $user->address }}</h5>
                    <h5 class="card-title">Email address: {{ $user->email }}</h5>
                    <h5 class="card-title">Telephone number: {{ $user->telephone_no }}</h5>
                    <h5 class="card-title">Membership type: {{ $user->membership }}</h5>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="row">
        <h2>Customers without user accounts</h2>
        @foreach ($customers as $customer)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Customer name: {{ $customer->name }} </h5>
                    <h5 class="card-title">NIC no: {{ $customer->NIC_no }}</h5>
                    <h5 class="card-title">Address: {{ $customer->address }}</h5>
                    <h5 class="card-title">Email address: {{ $customer->email_address }}</h5>
                    <h5 class="card-title">Telephone number: {{ $customer->telephone_no }}</h5>
                    <h5 class="card-title">Membership type: {{ $customer->membership_status }}</h5>
                </div>
                <a href="/customer_edit/{{ $customer->NIC_no }}" class="btn btn-outline-primary fw-bold btn-block mb-3 mx-3">Edit</a>
                <a href="{{ route('deactivate_customer', ['id' => $customer->NIC_no]) }}" class="btn btn-primary btn-block mb-3 mx-3">Delete</a>
            </div>
        </div>
        @endforeach
    </div>
</div>


@endsection