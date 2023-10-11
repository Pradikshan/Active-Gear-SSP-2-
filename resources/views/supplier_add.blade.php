@extends('layouts.admin_template2')

@section('content')
<div class="container mb-5">
    <h1 class="text-center text-dark">Create new supplier</h1>
    <form method="POST" action="\supplier_add">
        @csrf
        <div class="my-5">
            <label for="company_name" class="form-label text-dark fw-bold">Company name</label>
            <input type="text" class="form-control" name="company_name" required>
        </div>
        <div class="my-5">
            <label for="supplier_id" class="form-label text-dark fw-bold">Supplier ID</label>
            <input type="text" class="form-control" name="supplier_id" required>
        </div>
        <div class="my-5">
            <label for="company_address" class="form-label text-dark fw-bold">Company address</label>
            <input type="text" class="form-control" name="company_address" required>
        </div>
        <div class="my-5">
            <label for="email_address" class="form-label text-dark fw-bold">Email address</label>
            <input type="text" class="form-control" name="email_address" required>
        </div>
        <div class="my-5">
            <label for="telephone_no" class="form-label text-dark fw-bold">Telephone number</label>
            <input type="text" class="form-control" name="telephone_no" required>
        </div>
        <div class="d-grid col-2 mx-auto">
            <button type="submit" class="btn btn-outline-primary btn-lg mt-3">Add supplier</button>
        </div>
    </form>
</div>

@if (session('status') == 'success')
<div class="alert alert-success" role="alert">
    New supplier successfully
</div>

@elseif (session('status') == 'error')
<div class="alert alert-alert" role="alert">
    Error
</div>
@endif

@endsection