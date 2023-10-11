@extends('layouts.admin_template2')

@section('content')
<div class="container mb-5">
    <h1 class="text-center text-dark">Edit employee user account</h1>
    <form method="POST" action="/user_manage/{{ $user->id }}">
    @csrf
    @method('PUT')
    <div class="my-5">
        <label for="name" class="form-label text-dark fw-bold">Name</label>
        <input type="text" class="form-control" name="name" value="{{ $user->name }}" required>
    </div>
    <div class="mb-3">
        <label for="role" class="form-label">Role</label>
        <select class="form-select" aria-label="Category select" name="role" required>
            <option selected value="{{ $user->role }}"></option>
            <option value="Manager">Manager</option>
            <option value="Inventory manager">Inventory manager</option>
        </select>
    </div>
    <div class="my-5">
        <label for="email" class="form-label text-dark fw-bold">Email address</label>
        <input type="text" class="form-control" name="email" value="{{ $user->email }}" required>
    </div>
    <div class="my-5">
        <label for="address" class="form-label text-dark fw-bold">Address</label>
        <input type="text" class="form-control" name="address" value="{{ $user->address }}" required>
    </div>
    <div class="my-5">
        <label for="telephone_no" class="form-label text-dark fw-bold">Telephone number</label>
        <input type="text" class="form-control" name="telephone_no" value="{{ $user->telephone_no }}" required>
    </div>
    
    <div class="d-grid col-3 mx-auto">
        <button type="submit" class="btn btn-outline-primary btn-lg mt-3">Save changes</button>
    </div>
    </form>
</div>

@if (session('status') == 'success')
<div class="alert alert-success" role="alert">
    User account details updated successfully
</div>

@elseif (session('status') == 'error')
<div class="alert alert-alert" role="alert">
    Error
</div>
@endif

@endsection