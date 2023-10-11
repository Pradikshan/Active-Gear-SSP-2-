@extends('layouts.admin_template2')

@section('content')
<div class="container mb-5">
    <h1 class="text-center">Manage supplier</h1>
</div>

<div class="container">
    <div class="row">
        @foreach ($suppliers as $supplier)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Company name: {{ $supplier->company_name }} </h5>
                    <h5 class="card-title">Supplier ID: {{ $supplier->supplier_id }}</h5>
                    <h5 class="card-title">Address: {{ $supplier->company_address }}</h5>
                    <h5 class="card-title">Email address: {{ $supplier->email_address }}</h5>
                    <h5 class="card-title">Telephone number: {{ $supplier->telephone_no }}</h5>
                   
                    
                  
                </div>
                <a href="/supplier_edit/{{ $supplier->supplier_id }}" class="btn btn-outline-primary fw-bold btn-block mb-3 mx-3">Edit</a>
                <a href="{{ route('deactivate_supplier', ['id' => $supplier->supplier_id]) }}" class="btn btn-primary btn-block mb-3 mx-3">Delete</a>
            </div>
        </div>
        @endforeach
    </div>
</div>

@if (session('status') == 'success')
<div class="alert alert-success" role="alert">
    Supplier deleted successfully
</div>

@elseif (session('status') == 'error')
<div class="alert alert-alert" role="alert">
    Error
</div>
@endif
@endsection