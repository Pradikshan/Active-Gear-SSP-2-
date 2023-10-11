@extends('layouts.admin_template2')

@section('content')
<div class="container mb-5">
    <h1 class="text-center text-dark">Create new rewards program</h1>
    <form method="POST" action="\reward_add">
        @csrf
        <div class="my-5">
            <label for="reward_program_name" class="form-label text-dark fw-bold">Rewards program name</label>
            <input type="text" class="form-control" name="reward_program_name" required>
        </div>
        <div class="my-5">
            <label for="reward_program_ID" class="form-label text-dark fw-bold">Rewards program ID</label>
            <input type="text" class="form-control" name="reward_program_ID" required>
        </div>
        <div class="my-5">
            <label for="description" class="form-label text-dark fw-bold">Description</label>
            <input type="text" class="form-control" name="description" required>
        </div>
        <div class="d-grid col-2 mx-auto">
            <button type="submit" class="btn btn-outline-primary btn-lg mt-3">Add rewards program</button>
        </div>
    </form>
</div>

@if (session('status') == 'success')
<div class="alert alert-success" role="alert">
    New rewards program added successfully
</div>

@elseif (session('status') == 'error')
<div class="alert alert-alert" role="alert">
    Error
</div>
@endif


@endsection