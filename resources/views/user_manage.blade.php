@extends('layouts.admin_template2')

@section('content')
<div class="container mb-5">
    <h1 class="text-center">Manage employee user accounts</h1>
</div>

<div class="container">
    <div class="row">
        @foreach ($users as $user)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Employee name: {{ $user->name }} </h5>
                    <h5 class="card-title">Role: {{ $user->role }}</h5>
                    <h5 class="card-title">Email address: {{ $user->email }}</h5>
                    <!-- <h5 class="card-title">Address: {{ $user->address }}</h5>                    -->
                    <h5 class="card-title">Telephone number: {{ $user->telephone_no }}</h5>
                </div>

                <a href="/user_edit/{{ $user->id }}" class="btn btn-outline-primary fw-bold btn-block mb-3 mx-3">Edit</a>
                <a href="{{ route('deactivate_user', ['id' => $user->id]) }}" class="btn btn-primary btn-block mb-3 mx-3">Delete</a> 
            </div>
        </div>
        @endforeach
    </div>
</div>


@endsection