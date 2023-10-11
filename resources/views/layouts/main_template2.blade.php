<!DOCTYPE html>
<html lang="en">
<head>
	<title>Active Gear</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<!-- <link rel="icon" type="image/png" href="images/icons/favicon.png"/>  -->
<!--===============================================================================================-->
	<!-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}">	 -->
	
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('fonts/iconic/css/material-design-iconic-font.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('fonts/linearicons-v1.0.0/icon-font.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate/animate.css') }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/animsition/css/animsition.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/daterangepicker/daterangepicker.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/slick/slick.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/MagnificPopup/magnific-popup.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
<!--===============================================================================================-->
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> -->
</head>
<body class="animsition">
	
	
	<header>
		<div class="container-menu-desktop">
			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop container">
						
					<a href="#" class="logo">
						<img src="{{url('images/logo2.png')}}" alt="IMG-LOGO" class="mx-2">
						ACTIVE GEAR
					</a>

					<div class="menu-desktop">
						<ul class="main-menu">
							<li>
								<a href="/main">Home</a>
							</li>

							<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								Shop
							</a>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" href="/product_category_activewear">Active wear</a></li>
								<li><a class="dropdown-item" href="/product_category_gymacc">Gym accessories</a></li>
								<li><a class="dropdown-item" href="/product_category_gymeq">Gym equipment</a></li>
								<li><a class="dropdown-item" href="/product_category_sportseq">Sports equipment</a></li>
							</ul>
							</li>
							

							<li>
								<a href="#">About</a>
							</li>

							<li>
								<a href="/feedback">Contact us</a>
							</li>

							@guest
								@if (Route::has('login'))
								<li class="nav-item">
									<a class="nav-link ms-5" href="{{ route('login') }}">{{ __('Login') }}</a>
								</li>
								@endif

								@if (Route::has('register'))
								<li class="nav-item">
									<a class="nav-link" href="{{ route('customer_user_add') }}">{{ __('Register') }}</a>
								</li>
								@endif
								@else
								<li class="nav-item dropdown">
									<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
										{{ Auth::user()->name }}
									</a>

									<div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
										<a class="dropdown-item" href="{{ route('logout') }}"
											onclick="event.preventDefault();
															document.getElementById('logout-form').submit();">
											{{ __('Logout') }}
										</a>

										<a class="dropdown-item" href="/purchase_history"
											>
											{{ __('Purchase history') }}
										</a>

										<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
											@csrf
										</form>
									</div>
								</li>
								@endguest


							<li>
								<a href="/cart">Cart</a>
							</li>

							
						</ul>
					</div>	

					
				</nav>
			</div>	
		</div>

		


		

		
	</header>

		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="images/icons/icon-close2.png" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15">
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="search" placeholder="Search...">
				</form>
			</div>
		</div>

	

		

	
	@yield('content')


	<!-- Footer -->
	<footer class="bg3 p-t-75 p-b-32">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Categories
					</h4>

					<ul>
						<li class="p-b-10">
							<a href="/product_category_activewear" class="stext-107 cl7 hov-cl1 trans-04">
								Women's Gym Wear
							</a>
						</li>

						<li class="p-b-10">
							<a href="/product_category_activewear" class="stext-107 cl7 hov-cl1 trans-04">
								Men's Gym Wear
							</a>
						</li>

						<li class="p-b-10">
							<a href="/product_category_gymeq" class="stext-107 cl7 hov-cl1 trans-04">
								Gym Equipment
							</a>
						</li>

						<li class="p-b-10">
							<a href="/product_category_sportseq" class="stext-107 cl7 hov-cl1 trans-04">
								Sports Equipment
							</a>
						</li>
					</ul>
				</div>


				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Help
					</h4>

					<ul>
						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Track Order
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Returns 
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								FAQs
							</a>
						</li>

						<li class="p-b-10">
							<a href="/feedback" class="stext-107 cl7 hov-cl1 trans-04">
								Feedback
							</a>
						</li>
					</ul>
				</div>


				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						GET IN TOUCH
					</h4>

					<p class="stext-107 cl7 size-201">
						Any questions, complains or feedback? Click on the feedback button and let us know! 
					</p>

					<div class="p-t-27">
						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-instagram"></i>
						</a>

						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-pinterest-p"></i>
						</a>
					</div>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Newsletter
					</h4>

					<form>
						<div class="wrap-input1 w-full p-b-4">
							<input class="input1 bg-none plh1 stext-107 cl7" type="text" name="email" placeholder="email@example.com">
							<div class="focus-input1 trans-04"></div>
						</div>

						<div class="p-t-18">
							<button class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
								Subscribe
							</button>
						</div>
					</form>
				</div>
			</div>

			<div class="p-t-40">
				<div class="flex-c-m flex-w p-b-18">
					<a href="#" class="m-all-1">
						<img src="{{ url('images/icons/icon-pay-01.png') }}" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="{{ url('images/icons/icon-pay-02.png') }}" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="{{ url('images/icons/icon-pay-03.png') }}" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="{{ url('images/icons/icon-pay-04.png') }}" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="{{ url('images/icons/icon-pay-05.png') }}" alt="ICON-PAY">
					</a>
				</div>

				
			</div>
		</div>
	</footer>


	
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

	

<!--===============================================================================================-->	
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/slick/slick.min.js"></script>
	<script src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script src="vendor/parallax100/parallax100.js"></script>
	<script>
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function() { 
			$(this).magnificPopup({
		        delegate: 'a', 
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/sweetalert/sweetalert.min.js"></script>
	<script>
		$('.js-addwish-b2').on('click', function(e){
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function(){
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});
	
	</script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

	


</body>
</html>