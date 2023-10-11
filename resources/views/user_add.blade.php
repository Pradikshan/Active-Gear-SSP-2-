@extends('layouts.admin_template2')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create employee user account') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('user_add') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" placeholder="example@email.com" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- <div class="row mb-3">
                            <label for="dob" class="col-md-4 col-form-label text-md-end">{{ __('Date of birth') }}</label>

                            <div class="col-md-6">
                                <input id="dob" type="date" placeholder="eg: 19/07/2022" class="form-control" name="dob" value="{{ old('dob') }}" required autocomplete="dob" autofocus max="{{ now()->format('Y-m-d') }}">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> -->

                        <!-- <div class="row mb-3">
                            <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> -->

                        <div class="row mb-3">
                            <label for="telephone_no" class="col-md-4 col-form-label text-md-end">{{ __('Telephone number') }}</label>

                            <div class="col-md-6">
                                <input id="telephone_no" type="text" placeholder="eg: 0770998551" pattern="[0-9]+" min="1000000000" max="9999999999" class="form-control @error('telephone_no') is-invalid @enderror" name="telephone_no" value="{{ old('telephone_no') }}" required autocomplete="telephone_no" autofocus>

                                @error('telephone_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="role" class="col-md-4 col-form-label text-md-end">{{ __('Role') }}</label>
                            <div class="col-md-6">
                                <select class="form-select" aria-label="Category select" name="role" required>
                                    <option selected>Please select user role</option>
                                    <option value="Manager">Manager</option>
                                    <option value="Inventory manager">Inventory manager</option>
                                    <!-- <option value="Customer">Customer</option> -->
                                </select>
                            </div>
                        </div>



                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <div class="container mb-5">
    <h1 class="text-center text-dark">Create user account</h1>
    <form method="POST" action="{{ route('user_add') }}">
        @csrf
        <div class="my-5">
            <label for="name" class="form-label text-dark fw-bold">Name</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div class="my-5">
            <label for="email" class="form-label text-dark fw-bold">Email</label>
            <input type="text" class="form-control" name="email" required>
        </div>
        <div class="my-5">
            <label for="dob" class="form-label text-dark fw-bold">Date of birth</label>
            <input type="date" class="form-control" name="dob" max="{{ now()->format('Y-m-d') }}" required>
        </div>
        <div class="my-5">
            <label for="address" class="form-label text-dark fw-bold">Address</label>
            <input type="text" class="form-control" name="address" required>
        </div>
        <div class="my-5">
            <label for="telephone_no" class="form-label text-dark fw-bold">Telephone number</label>
            <input type="text" class="form-control" name="telephone_no" required>
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select class="form-select" aria-label="Category select" name="role" required>
                <option selected>Please select user role</option>
                <option value="Manager">Manager</option>
                <option value="Inventory manager">Inventory manager</option>
                <option value="Customer">Customer</option>
            </select>
        </div>
        <div class="d-grid col-2 mx-auto">
            <button type="submit" class="btn btn-outline-primary btn-lg mt-3">Create user account</button>
        </div>
    </form>
</div> -->

@if (session('status') == 'success')
<div class="alert alert-success" role="alert">
    New user account created successfully
</div>

@elseif (session('status') == 'error')
<div class="alert alert-alert" role="alert">
    Error
</div>
@endif

@endsection