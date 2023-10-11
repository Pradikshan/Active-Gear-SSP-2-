@extends('layouts.admin_template2')

@section('content')
<div class="container mb-5">
    <h1 class="text-center">Manage employee</h1>
</div>

<div class="container">
    <div class="row">
        @foreach ($employees as $employee)
        <div class="col-md-4 mb-4">
            <div class="card">
            <!-- <img src="/prodImage/{{$employee->image}}" style="width:inherit; height:15rem" class="card-img-top" alt="..."> -->
                <div class="card-body">
                    <h5 class="card-title">Employee ID: {{ $employee->emp_id }}</h5>
                    <h5 class="card-title">Employee name: {{ $employee->emp_name }} </h5>
                    <h5 class="card-title">Employee NIC no: {{ $employee->emp_NIC_no }}</h5>
                    <h5 class="card-title">Address: {{ $employee->emp_address }}</h5>
                    <h5 class="card-title">Email address: {{ $employee->email_address }}</h5>
                    <h5 class="card-title">Telephone number: {{ $employee->telephone_no }}</h5>
                    <h5 class="card-title">Access level: {{ $employee->emp_access_level }}</h5>
                  
                    
                    
                </div>
                <a href="/employee_edit/{{ $employee->emp_id }}" class="btn btn-outline-primary fw-bold btn-block mb-3 mx-3">Edit</a>
                <a href="{{ route('deactivate_employee', ['id' => $employee->emp_id]) }}" class="btn btn-primary btn-block mb-3 mx-3">Delete</a>
            </div>
        </div>
        @endforeach
    </div>
</div>

@if (session('status') == 'success')
<div class="alert alert-success" role="alert">
    Employee deleted successfully
</div>

@elseif (session('status') == 'error')
<div class="alert alert-alert" role="alert">
    Error
</div>
@endif
@endsection