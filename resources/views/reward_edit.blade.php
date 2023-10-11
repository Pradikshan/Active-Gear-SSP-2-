@extends('layouts.admin_template2')

@section('content')
<div class="container mb-5">
    <h1 class="text-center text-dark">Edit rewards program details</h1>
    <form method="POST" action="/reward_manage/{{ $rewardsprogram->reward_program_ID }}">
        @csrf
        @method('PUT')
        
        <div class="my-5">
            <label for="reward_program_name" class="form-label text-dark fw-bold">Rewards program name</label>
            <input type="text" class="form-control" name="reward_program_name" value="{{ $rewardsprogram->reward_program_name }}" required>
        </div>
        <div class="my-5">
            <label for="reward_program_ID" class="form-label text-dark fw-bold">Rewards program ID</label>
            <input type="text" class="form-control" name="reward_program_ID" value="{{ $rewardsprogram->reward_program_ID }}" required>
        </div>
        <div class="my-5">
            <label for="description" class="form-label text-dark fw-bold">Description</label>
            <input type="text" class="form-control" name="description" value="{{ $rewardsprogram->description }}" required>
        </div>
        <div class="d-grid col-3 mx-auto">
            <button type="submit" class="btn btn-outline-primary btn-lg mt-3">Save changes</button>
        </div>
    </form>
</div>

@if (session('status') == 'success')
<div class="alert alert-success" role="alert">
    Rewards program updated successfully
</div>

@elseif (session('status') == 'error')
<div class="alert alert-alert" role="alert">
    Error
</div>
@endif

@endsection