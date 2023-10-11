@extends('layouts.admin_template2')

@section('content')
<div class="container mb-5">
    <h1 class="text-center text-dark">Edit employee details</h1>
    <form method="POST" action="/employee_manage/{{ $employee->emp_id }}">
        @csrf
        @method('PUT')
        <div class="my-5">
            <label for="emp_name" class="form-label text-dark fw-bold">Employee name</label>
            <input type="text" class="form-control" name="emp_name" value="{{ $employee->emp_name }}" required>
        </div>
        <!-- <div class="my-5">
            <label for="image" class="form-label text-dark fw-bold">Employee image</label>
            <input type="file" class="form-control" name="image" required>
        </div> -->
        <div class="my-5">
            <label for="emp_id" class="form-label text-dark fw-bold">Employee ID</label>
            <input type="text" class="form-control" name="emp_id" value="{{ $employee->emp_id }}" required>
        </div>
        <div class="my-5">
            <label for="emp_NIC_no" class="form-label text-dark fw-bold">Employee NIC no.</label>
            <input type="text" class="form-control" name="emp_NIC_no" value="{{ $employee->emp_NIC_no }}" required>
        </div>
        <div class="my-5">
            <label for="emp_address" class="form-label text-dark fw-bold">Employee address</label>
            <input type="text" class="form-control" name="emp_address" value="{{ $employee->emp_address }}" required>
        </div>
        <div class="my-5">
            <label for="email_address" class="form-label text-dark fw-bold">Email address</label>
            <input type="text" class="form-control" name="email_address" value="{{ $employee->email_address }}" required>
        </div>
        <div class="my-5">
            <label for="telephone_no" class="form-label text-dark fw-bold">Telephone number</label>
            <input type="text" class="form-control" name="telephone_no" value="{{ $employee->telephone_no }}" required>
        </div>
        <div class="mb-3">
            <label for="emp_access_level" class="form-label">Employee access level</label>
            <select class="form-select" aria-label="Complaint select" name="emp_access_level" required>
                <option selected value="{{ $employee->emp_access_level }}"></option>
                <option value="Low-level access">Low-level access</option>
                <option value="Restricted access">Restricted access</option>
                <option value="Full access">Full access</option>
            </select>
        </div>
        <div class="d-grid col-3 mx-auto">
            <button type="submit" class="btn btn-outline-primary btn-lg mt-3">Save changes</button>
        </div>
    </form>
</div>

@if (session('status') == 'success')
<div class="alert alert-success" role="alert">
    Employee details updated successfully
</div>

@elseif (session('status') == 'error')
<div class="alert alert-alert" role="alert">
    Error
</div>
@endif
@endsection