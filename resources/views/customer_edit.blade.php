@extends('layouts.admin_template2')

@section('content')
<div class="container mb-5">
    <h1 class="text-center">Update customer details</h1>
    <form method="POST" action="/customer_manage/{{ $customer->NIC_no }}">
        @csrf
        @method('PUT')
    <div class="my-5">
            <label for="name" class="form-label text-dark fw-bold">Name</label>
            <input type="text" class="form-control" name="name" value="{{ $customer->name }}" required>
        </div>
        <div class="my-5">
            <label for="NIC_no" class="form-label text-dark fw-bold">NIC no.</label>
            <input type="text" class="form-control" name="NIC_no" value="{{ $customer->NIC_no }}" required>
        </div>
        <div class="my-5">
            <label for="address" class="form-label text-dark fw-bold">Address</label>
            <input type="text" class="form-control" name="address" value="{{ $customer->address }}" required>
        </div>
        <div class="mb-3">
            <label for="membership_status" class="form-label">Membership status</label>
            <select class="form-select" aria-label="Complaint select" name="membership_status" required>
                <option selected value="{{ $customer->membership_status }}"></option>
                <option value="basic">Basic membership</option>
                <option value="silver">Silver membership</option>
                <option value="gold">Gold membership</option>
                <option value="elite">Elite membership</option>
            </select>
        </div>
        <div class="d-grid col-3 mx-auto">
            <button type="submit" class="btn btn-outline-primary btn-lg mt-3">Save changes</button>
        </div>
    </form>
</div>

@if (session('status') == 'success')
<div class="alert alert-success" role="alert">
    Customer details updated successfully
</div>

@elseif (session('status') == 'error')
<div class="alert alert-alert" role="alert">
    Error
</div>
@endif

@endsection