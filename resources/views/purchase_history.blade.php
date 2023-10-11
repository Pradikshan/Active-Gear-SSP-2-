@extends('layouts.main_template2')

@section('content')

<div class="container-fluid mt-5 pt-5">
    <div class="mt-5">
        <div class="card">
        <div class="card-body">
            <h3 class="card-title mx-5 fw-bold">Purchase History</h3>
            <div class="">
            @foreach ($purchaseHistory as $purchase)
                <h6 class="card-subtitle mb-2 text-body-secondary mx-5 mt-4">Date and time: {{ $purchase->created_at }}</h6>
                <h6 class="card-subtitle mb-2 text-body-secondary mx-5">Product name: {{ $purchase->product_name }}</h6>
                <h6 class="card-subtitle mb-2 text-body-secondary mx-5">Quantity: {{ $purchase->quantity }}</h6>
                <h6 class="card-subtitle mb-2 text-body-secondary mx-5 mb-4">Price (LKR): {{ $purchase->price }}</h6>
            @endforeach
            </div>

        </div>
        </div>
    </div>

</div>


<h3 class="mt-5 mx-4 fw-bold">Purchase analytics</h3>
<div class="mb-3" style="width: 70%;">
  <canvas id="myChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart');

  // Use the JSON data you passed from your Laravel controller
  const dataObject = {!! $dataObjectJson !!};

  new Chart(ctx, {
    type: 'bar',
    data: dataObject,
    options: {
      scales: {
        y: {
          beginAtZero: true,
        },
      },
    },
  });
</script>

@endsection