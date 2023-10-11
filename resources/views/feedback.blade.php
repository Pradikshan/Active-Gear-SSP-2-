@extends('layouts.main_template2')

@section('content')


<div class="container mb-5">
    <div class="mt-5 fw-bold">
        <p>
            At Active Gear, we are committed to providing the best possible service to our customers. We value your feedback and inquiries, and we strive to respond to them in a timely and professional manner.
            <br>
            <br>
            Your input helps us improve our products and services, and we appreciate your support. Please don't hesitate to contact us with any questions or feedback you may have.
        </p>
    </div>
    <h2 class="text-left fw-bold mt-5">Customer inquiry/feedback</h2>
    <form method="POST" action="\feedback" class="mt-3">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email adddress</label>
            <input type="email" class="form-control" aria-describedby="emailHelp" name="email" required>
        </div>
        <div class="mb-3">
            <label for="tele_no" class="form-label">Telephone no.</label>
            <input type="text" class="form-control" name="tele_no" pattern="[0-9]+" min="1000000000" max="9999999999" placeholder="0770889441" required>
            <div class="invalid-feedback">
                Please enter a valid number.
            </div>
        </div>
        <div class="mb-3">
            <label for="order_no" class="form-label">Order no.</label>
            <input type="text" class="form-control" name="order_no">
        </div>
        <div class="mb-3">
            <label for="reason_for_complaint" class="form-label">Reason for complaint</label>
            <select class="form-select" aria-label="Complaint select" name="reason_for_complaint" required>
                <option selected>Please select issue category</option>
                <option value="Delivery issues">Delivery issues</option>
                <option value="Website issues">Website issues</option>
                <option value="Product issues">Product issues</option>
                <option value="Service-related issues">Service-related issues</option>
                <option value="Payment issues">Payment issues</option>
                <option value="Help ticket">Help ticket</option>
                <option value="Feedback">Feedback</option>
            </select>
        </div>
        <div class="form-floating mb-3">
            <textarea class="form-control" placeholder="Type your inquiry here..." name="inquiry" required></textarea>
            <label for="inquiry">Type your inquiry here...</label>
        </div>

        <div class="d-grid gap-2 col-1 mx-auto">
            <button type="submit" class="btn btn-outline-primary btn-md">Submit</button>
        </div>
    </form>
</div>

@if (session('status') == 'success')
<div class="alert alert-success" role="alert">
    Inquiry submitted successfully
</div>

@elseif (session('status') == 'error')
<div class="alert alert-alert" role="alert">
    Error
</div>
@endif

@endsection