@extends('layouts.admin_template2')

@section('content')
<div class="page-header">
    <h3 class="page-title">
    <span class="page-title-icon bg-gradient-primary text-white me-2">
        <i class="mdi mdi-home"></i>
    </span> Dashboard
    </h3>
    <!-- <nav aria-label="breadcrumb">
    <ul class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">
        <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
        </li>
    </ul>
    </nav> -->
</div>
<div class="row">
    <div class="col-md-4 stretch-card grid-margin">
    <div class="card bg-gradient-danger card-img-holder text-white">
        <div class="card-body">
        <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
        <h4 class="font-weight-normal mb-3">Weekly Sales <i class="mdi mdi-chart-line mdi-24px float-right"></i>
        </h4>
        <h2 class="mb-5">LKR 150,000</h2>
        <h6 class="card-text">Increased by 60%</h6>
        </div>
    </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
    <div class="card bg-gradient-info card-img-holder text-white">
        <div class="card-body">
        <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
        <h4 class="font-weight-normal mb-3">Weekly Orders <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
        </h4>
        <h2 class="mb-5">45,6334</h2>
        <h6 class="card-text">Decreased by 10%</h6>
        </div>
    </div>
    </div>
    <div class="col-md-4 stretch-card grid-margin">
    <div class="card bg-gradient-success card-img-holder text-white">
        <div class="card-body">
        <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
        <h4 class="font-weight-normal mb-3">Visitors Online <i class="mdi mdi-diamond mdi-24px float-right"></i>
        </h4>
        <h2 class="mb-5">95,5741</h2>
        <h6 class="card-text">Increased by 5%</h6>
        </div>
    </div>
    </div>
</div>
<div class="row">
    <div class="col-md-7 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
        <div class="clearfix">
            <h4 class="card-title float-left">Visit And Sales Statistics</h4>
            <div id="visit-sale-chart-legend" class="rounded-legend legend-horizontal legend-top-right float-right"></div>
        </div>
        <canvas id="visit-sale-chart" class="mt-4"></canvas>
        </div>
    </div>
    </div>
    <div class="col-md-5 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title">Traffic Sources</h4>
        <canvas id="traffic-chart"></canvas>
        <div id="traffic-chart-legend" class="rounded-legend legend-vertical legend-bottom-left pt-4"></div>
        </div>
    </div>
    </div>
</div>
<div class="row">
    <div class="col-12 grid-margin">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title">Recent customer feedback/inquiry</h4>
        <div class="table-responsive">
            <table class="table">
            <thead>
                <tr>
                <th> Name </th>
                <th> Email address </th>
                <th> Telephone </th>
                <th> Order No. </th>
                <th> Reason for complaint/inquiry </th>
                <th> Subject </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customerinquires as $customerinquiry)
                <tr>
                <td>
                    {{ $customerinquiry->name }}
                </td>
                <td> 
                    {{ $customerinquiry->email }}
                </td>
                <td>
                    {{ $customerinquiry->tele_no }}
                </td>
                <td>
                    {{ $customerinquiry->order_no }}
                </td>
                <td>
                    {{ $customerinquiry->reason_for_complaint }}
                </td>
                <td>
                    {{ $customerinquiry->inquiry }}
                </td>
                </tr>
                @endforeach
                
            </tbody>
            </table>
        </div>
        </div>
    </div>
    </div>
</div>

<div class="row">
    <div class="col-12 grid-margin">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title">Recently added products</h4>
        <div class="table-responsive">
            <table class="table">
            <thead>
                <tr>
                <th> Product ID </th>
                <th> Product name </th>
                <th> Brand </th>
                <th> Category </th>
                <th> Description </th>
                <th> Stock </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                    <td>
                        {{ $product->product_id }}
                    </td>
                    <td> 
                        {{ $product->product_name }}
                    </td>
                    <td>
                        {{ $product->brand }}
                    </td>
                    <td>
                        {{ $product->category }}
                    </td>
                    <td>
                        {{ $product->description }}
                    </td>
                    <td>
                        {{ $product->stock }}
                    </td>
                    </tr>
                @endforeach
                
            </tbody>
            </table>
        </div>
        </div>
    </div>
    </div>
</div>

<div class="row">
    <div class="col-12 grid-margin">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title">Recently created customer accounts</h4>
        <div class="table-responsive">
            <table class="table">
            <thead>
                <tr>
                <th> Customer name </th>
                <th> NIC no. </th>
                <th> Date of birth </th>
                <th> Email address </th>
                <th> Telephone no. </th>
                <th> Membership status </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                <tr>
                <td>
                    {{ $customer->name }}
                </td>
                <td> 
                    {{ $customer->NIC }}
                </td>
                <td>
                    {{ $customer->dob }}
                </td>
                <td>
                    {{ $customer->email }}
                </td>
                <td>
                    {{ $customer->telephone_no }}
                </td>
                <td>
                    {{ $customer->membership }}
                </td>
                </tr>
                @endforeach
                
            </tbody>
            </table>
        </div>
        </div>
    </div>
    </div>
</div>



@endsection('content')