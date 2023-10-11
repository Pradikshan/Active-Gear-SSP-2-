@extends('layouts.admin_template2')

@section('content')
<div class="container mb-5">
    <h1 class="text-center">Manage rewards program</h1>
</div>

<div class="container">
    <div class="row">
        @foreach ($rewardsprograms as $rewardsprogram)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Rewards program name: {{ $rewardsprogram->reward_program_name }} </h5>
                    <h5 class="card-title">Rewards program ID: {{ $rewardsprogram->reward_program_ID }}</h5>
                    <h5 class="card-title">Description: {{ $rewardsprogram->description }}</h5>
                </div>
                <a href="/reward_edit/{{ $rewardsprogram->reward_program_ID }}" class="btn btn-outline-primary fw-bold btn-block mb-3 mx-3">Edit</a>
                <a href="{{ route('deactivate_reward', ['id' => $rewardsprogram->reward_program_ID]) }}" class="btn btn-primary btn-block mb-3 mx-3">Delete</a>
            </div>
        </div>
        @endforeach
    </div>
</div>

@if (session('status') == 'success')
<div class="alert alert-success" role="alert">
    Rewards program deleted successfully
</div>

@elseif (session('status') == 'error')
<div class="alert alert-alert" role="alert">
    Error
</div>
@endif
@endsection