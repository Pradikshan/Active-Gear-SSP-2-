@extends('layouts.admin_template2')

@section('content')
<div class="container mb-5">
    <h1 class="text-center">Create new customer</h1>
    <form method="POST" action="\customer_add">
        @csrf
        <div class="my-5">
            <label for="name" class="form-label text-dark fw-bold">Name</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div class="my-5">
            <label for="NIC_no" class="form-label text-dark fw-bold">NIC no.</label>
            <input type="text" class="form-control" name="NIC_no" required>
        </div>
        <div class="my-5">
            <label for="address" class="form-label text-dark fw-bold">Address</label>
            <input type="text" class="form-control" name="address" required>
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
            <label for="membership_status" class="form-label text-dark fw-bold">Membership status</label>
            <select class="form-select" aria-label="Complaint select" name="membership_status" required>
                <option selected>Please select membership type</option>
                <option value="basic">Basic membership</option>
                <option value="silver">Silver membership</option>
                <option value="gold">Gold membership</option>
                <option value="elite">Platinum membership</option>
            </select>
        </div>
        <div class="d-grid col-2 mx-auto">
            <button type="submit" class="btn btn-outline-primary btn-lg mt-3">Add customer</button>
        </div>
    </form>
</div>

@if (session('status') == 'success')
<div class="alert alert-success" role="alert">
    New customer added successfully
</div>

@elseif (session('status') == 'error')
<div class="alert alert-alert" role="alert">
    Error
</div>
@endif

@endsection