<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Active Gear</title>
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <!-- <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css"> -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Quicksand">
    <link rel="stylesheet" href="{{ ('assets/css/style.css') }}">
    <!-- <link rel="shortcut icon" href="{{ ('assets/images/favicon.ico') }}" /> -->
  </head>
  <body style="font-family: 'Quicksand'" class="bg-dark">
    <div class="container-scroller">
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="/admin_main">Active Gear</a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <div class="search-field d-none d-md-block">
            <form class="d-flex align-items-center h-100" action="#">
              <div class="input-group">
                <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>
                </div>
                <input type="text" class="form-control bg-transparent border-0" placeholder="Search...">
              </div>
            </form>
          </div>
          <ul class="navbar-nav navbar-nav-right">
            <!-- <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                  <img src="{{url('/images/user.png')}}" alt="image">
                  <span class="availability-status online"></span>
                </div>
                <div class="nav-profile-text">
                  <p class="mb-1 text-black">User</p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="#">
                  <i class="mdi mdi-cached me-2 text-success"></i> Activity Log </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">
                  <i class="mdi mdi-logout me-2 text-primary"></i> Signout </a>
              </div>
            </li> -->
              @guest
							@if (Route::has('login'))
							<li class="nav-item">
								<a class="nav-link ms-5 text-dark" href="{{ route('login') }}">{{ __('Login') }}</a>
							</li>
							@endif

							@if (Route::has('register'))
							<li class="nav-item">
								<a class="nav-link text-dark" href="{{ route('register') }}">{{ __('Register') }}</a>
							</li>
							@endif
							@else
							<li class="nav-item dropdown">
								<a id="navbarDropdown" class="nav-link dropdown-toggle text-dark" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
									{{ Auth::user()->name }}
								</a>

								<div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
									<a class="dropdown-item text-dark" href="{{ route('logout') }}"
										onclick="event.preventDefault();
														document.getElementById('logout-form').submit();">
										{{ __('Logout') }}
									</a>

									<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
										@csrf
									</form>
								</div>
							</li>
							@endguest
            <li class="nav-item d-none d-lg-block full-screen-link">
              <a class="nav-link">
                <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
              </a>
            </li>
            

          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>

      <div class="container-fluid page-body-wrapper">
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <img src="{{url('/images/user.png')}}" alt="profile">
                  <span class="login-status online"></span>
                  
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2">{{ Auth::user()->name }}</span>
                  
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/admin_main">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                <span class="menu-title">Customer</span>
                <i class="mdi mdi-face menu-icon"></i>
              </a>
              <div class="collapse" id="collapseOne">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="/customer_add">Add customer</a></li>
                  <li class="nav-item"> <a class="nav-link" href="/customer_manage">Customer overview</a></li>
                  <!-- <li class="nav-item"> <a class="nav-link" href="/customer_edit">Edit customer</a></li> -->
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                <span class="menu-title">Employee</span>
                <i class="mdi mdi-account-circle menu-icon"></i>
              </a>
              <div class="collapse" id="collapseTwo">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="/employee_add">Add employee</a></li>
                  <li class="nav-item"> <a class="nav-link" href="/employee_manage">Manage employee</a></li>
                  <!-- <li class="nav-item"> <a class="nav-link" href="/employee_edit">Edit employee</a></li> -->
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                <span class="menu-title">Giftcard</span>
                <i class="mdi mdi-gift menu-icon"></i>
              </a>
              <div class="collapse" id="collapseThree">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="/gift_add">Add giftcard</a></li>
                  <li class="nav-item"> <a class="nav-link" href="/gift_manage">Manage giftcard</a></li>
                  <!-- <li class="nav-item"> <a class="nav-link" href="/gift_edit">Edit giftcard</a></li> -->
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                <span class="menu-title">Product</span>
                <i class="mdi mdi-cube menu-icon"></i>
              </a>
              <div class="collapse" id="collapseFour">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="/product_add">Add product</a></li>
                  <li class="nav-item"> <a class="nav-link" href="/product_manage">Manage product</a></li>
                  <!-- <li class="nav-item"> <a class="nav-link" href="/product_edit">Edit product</a></li> -->
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                <span class="menu-title">Supplier</span>
                <i class="mdi mdi-buffer menu-icon"></i>
              </a>
              <div class="collapse" id="collapseFive">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="/supplier_add">Add supplier</a></li>
                  <li class="nav-item"> <a class="nav-link" href="/supplier_manage">Manage supplier</a></li>
                  <!-- <li class="nav-item"> <a class="nav-link" href="/supplier_edit">Edit supplier</a></li> -->
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                <span class="menu-title">Rewards program</span>
                <i class="mdi mdi-ticket menu-icon"></i>
              </a>
              <div class="collapse" id="collapseSix">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="/reward_add">Add rewardsprogram</a></li>
                  <li class="nav-item"> <a class="nav-link" href="/reward_manage">Manage rewardsprogram</a></li>
                  <!-- <li class="nav-item"> <a class="nav-link" href="/reward_edit">Edit rewardsprogram</a></li> -->
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                <span class="menu-title">User account</span>
                <i class="mdi mdi-account-multiple-plus menu-icon"></i>
              </a>
              <div class="collapse" id="collapseSeven">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="/user_add">Add user account</a></li>
                  <li class="nav-item"> <a class="nav-link" href="/user_manage">Manage user account</a></li>
                  <!-- <li class="nav-item"> <a class="nav-link" href="/reward_edit">Edit rewardsprogram</a></li> -->
                </ul>
              </div>
            </li>
          </ul>
        </nav>
        <div class="main-panel">
          <div class="content-wrapper">
            @yield('content')
          </div>
        </div>
      </div>
    </div>
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/todolist.js"></script>
  </body>
</html>