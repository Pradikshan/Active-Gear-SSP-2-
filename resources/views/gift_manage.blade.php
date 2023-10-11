@extends('layouts.admin_template2')

@section('content')
<div class="container mb-5">
    <h1 class="text-center">Manage giftcard</h1>
</div>

<div class="container">
    <div class="row">
        @foreach ($giftcards as $giftcard)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Giftcard name: {{ $giftcard->giftcard_name }} </h5>
                    <h5 class="card-title">Giftcard ID: {{ $giftcard->giftcard_id }}</h5>
                    <h5 class="card-title">Amount (LKR): {{ $giftcard->amount }}</h5>
                </div>
                <a href="/gift_edit/{{ $giftcard->giftcard_id }}" class="btn btn-outline-primary fw-bold btn-block mb-3 mx-3">Edit</a>
                <a href="{{ route('deactivate_giftcard', ['id' => $giftcard->giftcard_id]) }}" class="btn btn-primary btn-block mb-3 mx-3">Delete</a>
            </div>
        </div>
        @endforeach
    </div>
</div>

@if (session('status') == 'success')
<div class="alert alert-success" role="alert">
    Giftcard deleted successfully
</div>

@elseif (session('status') == 'error')
<div class="alert alert-alert" role="alert">
    Error
</div>
@endif
@endsection