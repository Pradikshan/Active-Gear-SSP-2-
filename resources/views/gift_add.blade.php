@extends('layouts.admin_template2')

@section('content')
<div class="container mb-5">
    <h1 class="text-center text-dark">Create new giftcard</h1>
    <form method="POST"action="\gift_add">
        @csrf
        <div class="my-5">
            <label for="giftcard_name" class="form-label text-dark fw-bold">Giftcard name</label>
            <input type="text" class="form-control" name="giftcard_name" required>
        </div>
        <div class="my-5">
            <label for="giftcard_id" class="form-label text-dark fw-bold">Giftcard ID</label>
            <input type="text" class="form-control" name="giftcard_id" required>
        </div>
        <div class="my-5">
            <label for="amount" class="form-label text-dark fw-bold">Amount (LKR)</label>
            <input type="text" class="form-control" name="amount" required>
        </div>
        <div class="d-grid col-2 mx-auto">
            <button type="submit" class="btn btn-outline-primary btn-lg mt-3">Add giftcard</button>
        </div>
    </form>
</div>

@if (session('status') == 'success')
<div class="alert alert-success" role="alert">
    New giftcard added successfully
</div>

@elseif (session('status') == 'error')
<div class="alert alert-alert" role="alert">
    Error
</div>
@endif

@endsection