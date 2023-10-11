@extends('layouts.admin_template2')

@section('content')
<div class="container mb-5">
    <h1 class="text-center text-dark">Create new product</h1>
    <form method="POST" action="\product_add" enctype="multipart/form-data">
        @csrf
        <div class="my-5">
            <label for="product_id" class="form-label text-dark fw-bold">Product ID</label>
            <input type="text" class="form-control" name="product_id" required>
        </div>
        <div class="my-5">
            <label for="product_name" class="form-label text-dark fw-bold">Product name</label>
            <input type="text" class="form-control" name="product_name" required>
        </div>
        <div class="my-5">
            <label for="supplier_id" class="form-label text-dark fw-bold">Supplier ID</label>
            <input type="text" class="form-control" name="supplier_id" required>
        </div>
        <div class="my-5">
            <label for="image" class="form-label text-dark fw-bold">Product image</label>
            <input type="file" class="form-control" name="image" required>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" aria-label="Category select" name="category" required>
                <option selected>Please select product category</option>
                <option value="Active wear">Active wear</option>
                <option value="Gym accessories">Gym accessories</option>
                <option value="Gym equipment">Gym equipment</option>
                <option value="Sports equipment">Sports equipment</option>
            </select>
        </div>
        <div class="my-5">
            <label for="brand" class="form-label text-dark fw-bold">Brand</label>
            <input type="text" class="form-control" name="brand" required>
        </div>
        <div class="my-5">
            <label for="description" class="form-label text-dark fw-bold">Description</label>
            <input type="text" class="form-control" name="description" required>
        </div>
        <div class="my-5">
            <label for="region" class="form-label text-dark fw-bold">Region</label>
            <input type="text" class="form-control" name="region" required>
        </div>
        <div class="my-5">
            <label for="location" class="form-label text-dark fw-bold">Location</label>
            <input type="text" class="form-control" name="location" required>
        </div>
        <div class="my-5">
            <label for="size" class="form-label text-dark fw-bold">Size</label>
            <input type="text" class="form-control" name="size" required>
        </div>
        <div class="my-5">
            <label for="color" class="form-label text-dark fw-bold">Color</label>
            <input type="text" class="form-control" name="color" required>
        </div>
        
        <div class="my-5">
            <label for="stock" class="form-label text-dark fw-bold">Quantity</label>
            <input type="number" class="form-control" name="stock" min="1" oninput="validity.valid||(value='');" required>
        </div>
        <div class="my-5">
            <label for="price" class="form-label text-dark fw-bold">Price (LKR)</label>
            <input type="number" class="form-control" name="price" min="1" oninput="validity.valid||(value='');" required>
        </div>
        

        <div class="d-grid col-2 mx-auto">
            <button type="submit" class="btn btn-outline-primary btn-lg mt-3">Add product</button>
        </div>
    </form>
</div>

@if (session('status') == 'success')
<div class="alert alert-success" role="alert">
    New product added successfully
</div>

@elseif (session('status') == 'error')
<div class="alert alert-alert" role="alert">
    Error
</div>
@endif

@endsection