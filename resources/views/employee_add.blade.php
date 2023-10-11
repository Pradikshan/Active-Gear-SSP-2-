@extends('layouts.admin_template2')

@section('content')
<div class="container mb-5">
    <h1 class="text-center text-dark">Create new employee</h1>
    <form method="POST" action="\employee_add" enctype="multipart/form-data">
        @csrf
        <!-- <div class="my-5">
            <label for="image" class="form-label text-dark fw-bold">Employee image</label>
            <input type="file" class="form-control" name="image" required>
        </div> -->
        <div class="my-5">
            <label for="emp_name" class="form-label text-dark fw-bold">Employee name</label>
            <input type="text" class="form-control" name="emp_name" required>
        </div>
        <div class="my-5">
            <label for="emp_id" class="form-label text-dark fw-bold">Employee ID</label>
            <input type="text" class="form-control" name="emp_id" required>
        </div>
        <!-- <div class="my-5">
            <label for="image" class="form-label text-dark fw-bold">Employee image</label>
            <input type="file" class="form-control" name="image" required>
        </div> -->
        <div class="my-5">
            <label for="emp_NIC_no" class="form-label text-dark fw-bold">Employee NIC no.</label>
            <input type="text" class="form-control" name="emp_NIC_no" required>
        </div>
        <div class="my-5">
            <label for="emp_address" class="form-label text-dark fw-bold">Employee address</label>
            <input type="text" class="form-control" name="emp_address" required>
        </div>
        <div class="my-5">
            <label for="email_address" class="form-label text-dark fw-bold">Email address</label>
            <input type="text" class="form-control" name="email_address" required>
        </div>
        <div class="my-5">
            <label for="telephone_no" class="form-label text-dark fw-bold">Telephone number</label>
            <input type="text" class="form-control" name="telephone_no" required>
        </div>
        <div class="mb-3">
            <label for="emp_access_level" class="form-label text-dark fw-bold">Employee access level</label>
            <select class="form-select" aria-label="Complaint select" name="emp_access_level" required>
                <option selected>Please select access level</option>
                <option value="Low-level access">Low-level access</option>
                <option value="Restricted access">Restricted access</option>
                <option value="Full access">Full access</option>
            </select>
        </div>
        <div class="d-grid col-2 mx-auto">
            <button type="submit" class="btn btn-outline-primary btn-lg mt-3">Add employee</button>
        </div>
    </form>
</div>

@if (session('status') == 'success')
<div class="alert alert-success" role="alert">
    New employee added successfully
</div>

@elseif (session('status') == 'error')
<div class="alert alert-alert" role="alert">
    Error
</div>
@endif

@endsection