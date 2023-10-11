@extends('layouts.admin_template2')

@section('content')
<div class="container mb-5">
    <h1 class="text-center text-dark">Edit supplier</h1>
    <form method="POST" action="/supplier_manage/{{ $supplier->supplier_id }}">
    @csrf
    @method('PUT')
        <div class="my-5">
            <label for="supplier_id" class="form-label text-dark fw-bold">Supplier ID</label>
            <input type="text" class="form-control" name="supplier_id" value="{{ $supplier->supplier_id }}" required>
        </div>
        <div class="my-5">
            <label for="company_name" class="form-label text-dark fw-bold">Company name</label>
            <input type="text" class="form-control" name="company_name" value="{{ $supplier->company_name }}" required>
        </div>
        <div class="my-5">
            <label for="company_address" class="form-label text-dark fw-bold">Company address</label>
            <input type="text" class="form-control" name="company_address" value="{{ $supplier->company_address }}" required>
        </div>
        <div class="my-5">
            <label for="email_address" class="form-label text-dark fw-bold">Email address</label>
            <input type="text" class="form-control" name="email_address" value="{{ $supplier->email_address }}" required>
        </div>
        <div class="my-5">
            <label for="telephone_no" class="form-label text-dark fw-bold">Telephone number</label>
            <input type="text" class="form-control" name="telephone_no" value="{{ $supplier->telephone_no }}" required>
        </div>
        <div class="d-grid col-3 mx-auto">
            <button type="submit" class="btn btn-outline-primary btn-lg">Save changes</button>
        </div>
    </form>
</div>

@if (session('status') == 'success')
<div class="alert alert-success" role="alert">
    Supplier details updated successfully
</div>

@elseif (session('status') == 'error')
<div class="alert alert-alert" role="alert">
    Error
</div>
@endif

@endsection