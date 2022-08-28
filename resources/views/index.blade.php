<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>In Safe Hands ( Centre de soins pour les personnes agées )</title>

	<!--meta tags -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="Medically Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
      Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); }
	</script>
	<!--//meta tags ends here--> 

	<!---->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- Mobile Metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <!-- Site Metas -->
   <!-- site icon -->
   <link rel="logo" href="{{ asset ('images/logo/logo_o.png')}}" type="image/png" />
	<!--booststrap-->
	<link href="{{ asset ('css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all">

	<!--//booststrap end-->

	<!-- font-awesome icons -->
	<link href="{{ asset ('css/font-awesome.css')}}" rel="stylesheet">
	<!-- //font-awesome icons -->
	<link rel="stylesheet" href="{{ asset ('css/chocolat.css')}}" type="text/css" media="screen" />
	<!-- gallery-->
	<link rel="stylesheet" href="{{ asset ('css/owl.carousel.css')}}" type="text/css" media="all">
	<!-- clients-->

	<link rel="stylesheet" href="{{ asset ('css/flexslider.css')}}" type="text/css" media="screen" />
	<!-- banner text slider-->
	<!--stylesheets-->
	<link href="{{ asset ('css/style.css')}}" rel='stylesheet' type='text/css' media="all">
	<!-- banner text slider-->

	<link href="//fonts.googleapis.com/css?family=Barlow+Condensed:300,400,500,600" rel="stylesheet">
	<!--//style sheet end here-->

</head>

<body>
	<div class="banner-w3" id="home">
		<div class="w3-agile-logo">
			<div class=" head-wl">
			    <div class="agileinfo-social-grids">
					<ul>
						<li><a href="#"><span class="fa fa-facebook"></span></a></li>
						<li><a href="#"><span class="fa fa-twitter"></span></a></li>
						<li><a href="#"><span class="fa fa-rss"></span></a></li>
						<li><a href="{{ route('login') }}"><span class="fa fa-sign-in"></span></a></li>
					</ul>
				</div>
				
				<div class="w3-header-top-right">
					<div class="email-right">
						<p><span class="fa fa-envelope" aria-hidden="true"></span> <a href="insafe.hands@gmail.com" class="info"> insafe.hands@gmail.com</a></p> 

					</div>
					<div class="w3-header-top-right-text">

						<p><span  class="fa fa-phone" aria-hidden="true"></span> <a href="0556089097" class="info">0556089097</a></p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="header-w3layouts">

			<!-- Navigation -->
			<nav class="navbar navbar-default navbar-fixed-top">
				<div class="navbar-header page-scroll">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
					<h1><a class="navbar-brand " href="">In Safe Hands</a></h1>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav navbar-right">
						<!-- Hidden li included to remove active class from about link when scrolled up past about section -->
						<li class="hidden"><a class="page-scroll" href="#page-top"></a> </li>
						<li><a class="page-scroll" href="#home">Home</a></li>
						<li><a class="page-scroll scroll" href="#about">About</a></li>
						<li><a class="page-scroll scroll" href="#services">Services</a></li>
						<li><a class="page-scroll scroll" href="#specialistes">Spécialistes</a></li>
						<li><a class="page-scroll scroll" href="#contact">Contact</a></li>
						<li><a href="{{ route('login') }}"><span class="fa fa-sign-in"></span> Login</a></li>
					    {{-- <li><a class="page-scroll scroll" href="#" class="login-button ml-lg-5 mt-lg-0 mt-4 mb-lg-0 mb-3" data-toggle="modal" data-target="#exampleModalCenter1">
							<i class="fa fa-sign-in"></i>Login</a></li> --}}
					</ul>

				</div>
				<!-- /.navbar-collapse -->
			</nav>
		</div>

 <!-- modal -->
<!-- login -->
		<div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header text-center">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="login px-4 mx-auto mw-100">
							
						<h5 class="text-center mb-4">Login Now</h5>
							<form action="#" method="post">
								<div class="form-group">
									<label>Email Address</label>
									<input type="email" class="form-control" name="email" placeholder="" required="">
								</div>
								<div class="form-group">
									<label class="mb-2">Password</label>
									<input type="password" class="form-control" name="password" placeholder="" required="">
								</div>
								<button type="submit" class="btn submit mb-4">Login</button>
								<p class="forgot-w3ls text-center pb-4">
									<a href="#" class="text-white">Forgot your password?</a>
								</p>
								<p class="account-w3ls text-center pb-4">
									Don't have an account?
									<a href="#" data-toggle="modal" data-target="#exampleModalCenter2">Create one now</a>
								</p>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- //login -->

		<!-- register -->
		<div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content modal-content-2">
					<div class="modal-header text-center">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="login px-4 mx-auto mw-100">
							<h5 class="text-center mb-4">Register Now</h5>
							<form action="#" method="post">
								<div class="form-group">
									<label>Your Name</label>
									<input type="text" class="form-control" name="name" placeholder="" required="">
								</div>
								<div class="form-group">
									<label>Email</label>
									<input type="email" class="form-control" name="email" placeholder="" required="">
								</div>
								<div class="form-group">
									<label class="mb-2">Password</label>
									<input type="password" class="form-control" name="password" id="password1" placeholder="" required="">
								</div>
								<div class="form-group">
									<label>Confirm Password</label>
									<input type="password" class="form-control" name="password" id="password2" placeholder="" required="">
								</div>
								<button type="submit" class="btn btn-primary submit mb-4">Register</button>
								<p class="text-center pb-2">
									<a href="#" class="text-white">By clicking Register, I agree to your terms</a>
								</p>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- //register -->
		<!-- //modal -->



		<div class="container">

			<!-- header -->
			<header>

				<div class="flexslider-info">
					<section class="slider">
						<div class="flexslider">
							<ul class="slides">
								<li>
									<div class=" w3l-info">
										<div class="col-md-8  info-lleft-side">
											<h4>Wellcome To Our Centre In Safe Hands!</h4>
											<p>In Safe Hands : Centre de soins pour les personnes agées offre des différents
												services pour nos chers grands mères et pères.</p>
										</div>
										<div class=" col-md-4 w3layouts_more-buttn">
											<a href="#" data-toggle="modal" data-target="#myModal">Read More</a>
										</div>
									</div>

								</li>
								<li>
									<div class=" w3l-info">
										<div class="col-md-8 info-lleft-side">
											<h4>Better Health Care For Our Grand Mathers and Fathers</h4>
											<p> Chez Notre Centre de soins " In Safe Hands " votre père et mère sont entre les bonnes mains.</p>
										</div>
										<div class=" col-md-4 w3layouts_more-buttn">
											<a href="#" data-toggle="modal" data-target="#myModal">Read More</a>
										</div>
									</div>
								</li>
								<li>
									<div class=" w3l-info">
										<div class="col-md-8 info-lleft-side">
											<h4>Bienvenu Chez notre Centre de soins pour les personnes agées!</h4>
											<p> Soyez les bienvenus chez notre centre de soins "In Safe Hands" Pour les personnes agées.</p>
										</div>
										<div class=" col-md-4 w3layouts_more-buttn">
											<a href="#" data-toggle="modal" data-target="#myModal">Read More</a>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</section>
				</div>
			</header>
		</div>
		<div class="clearfix"> </div>
	</div>
	<!-- //header -->
		<!-- modal -->
		<div class="modal about-modal fade" id="myModal" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                       <h4 class="modal-title">In Safe Hands</h4>
                       <p>Centre de soins pours les personnes Agées</p>
					   
				</div>
				<div class="modal-body">
					<div class="out-info"> 
						<img src="{{ asset('images/b1.jpg')}}" alt="" />
						<p>Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae,
							eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellu</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- //modal -->

	<!--about -->

	<div class="about" id="about">
		<div class="container">
			<div class="imgg-info-w3">
				<div class="col-md-6 left-about-img">

					<img src="{{asset('images/news-image2.jpg')}}" class="img-responsive s1" alt="s1">
				</div>
				<div class="col-md-6 welcome-left wel">
					<div class="welcome-left-top">
						<h4>Who are we </h4>
						<p>le centre de soins In safe Hands est un centre de soins pour les personnes agées qui offre des differents services ! </p>
						<div class="agileits_w3layouts_more">
							<a href="#" data-toggle="modal" data-target="#myModal">Read More</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--//about -->
	<!--services -->

	<!--//services -->
	<!--gallery-->
	<div class="gallery titl-bottom" id="services">

		<h2 class="title">Our Services </h2> 
		<div class="gallery-info">
			<div class="col-md-6 col-sm-6 gallery-grids glry-grid1 ">
				<div class="gallery-grids-top w3_agile_gallery_grid ">
					<a class="b-link-stripe" href="images/g4.jpg" data-lightbox="example-set" data-title="Making your life easier. ">
							<img src="{{asset('images/g4.jpg')}}" class="img-responsive" alt="">
							<div class="b-wrapper">			
							</div>
						</a>
				</div>
				<div class="gallery-grids-top">
					<div class="col-md-6 col-sm-6 bottom-grids w3_agile_gallery_grid">
						<a class="b-link-stripe" href="images/g1.jpg" data-lightbox="example-set" data-title="Making your life easier.">
								<img src="{{asset('images/g1.jpg')}}" class="img-responsive" alt="">
								<div class="b-wrapper">			
								</div>
							</a>
					</div>
					<div class="col-md-6 col-sm-6 bottom-grids w3_agile_gallery_grid">
						<a class="b-link-stripe" href="images/g2.jpg" data-lightbox="example-set" data-title="Making your life easier.">
								<img src="{{asset('images/g2.jpg')}}" class="img-responsive" alt="">
								<div class="b-wrapper">				
								</div>
							</a>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="col-md-3 col-sm-3 gallery-grids w3_agile_gallery_grid glry-grid2">
				<a class="b-link-stripe " href="images/g3.jpg" data-lightbox="example-set">
						<img src="{{asset('images/g3.jpg')}}" class="img-responsive" alt="">
						<div class="b-wrapper">			
						</div>
					</a>
			</div>
			<div class="col-md-3 col-sm-3 gallery-grids w3_agile_gallery_grid glry-grid3">
				<a class="b-link-stripe" href="images/g6.jpg" data-lightbox="example-set">
						<img src="{{asset('images/g6.jpg')}}" class="img-responsive" alt="">
						<div class="b-wrapper">				
						</div>
					</a>
				<a class="b-link-stripe" href="images/g5.jpg" data-lightbox="example-set">
						<img src="{{asset('images/g5.jpg')}}" class="img-responsive" alt="">
						<div class="b-wrapper">			
						</div>
					</a>
			</div>
			<div class="clearfix"></div>

		</div>

	</div>
	<!--//gallery-->
	<!-- team-->
	<div class="team agileits" id="specialistes">
		<div class="team-info">
			<div class="container">
				<h3 class="title ">Our specialists</h3>
				<div class="team-row">
					<div class="col-md-4 col-sm-6">
						<div class="team-agile-img">
							<a href="#"><img src="{{asset('images/layout_img/doctor_03.jpg')}}" alt="img"></a>

							<div class="view-caption">
								<div class="t-info">
									<h5>Director Général du Centre</h5>
									<p>John willky</p>
								</div>
								<ul>
									<li><a href="#"><span class="fa fa-facebook"></span></a></li>
									<li><a href="#"><span class="fa fa-twitter"></span></a></li>
									<li><a href="#"><span class="fa fa-google-plus"></span></a></li>
								</ul>
							</div>

						</div>

					</div>
					<div class="col-md-4 col-sm-6">
						<div class="team-agile-img">
							<a href="#"><img src="{{asset('images/layout_img/doctor_02.jpg')}}" alt="img"></a>
							<div class="view-caption">
								<div class="t-info">
									<h5>Médecin spécialiste Gériatrie</h5>
									<p>Lara kent</p>
								</div>
								<ul>
									<li><a href="#"><span class="fa fa-facebook"></span></a></li>
									<li><a href="#"><span class="fa fa-twitter"></span></a></li>
									<li><a href="#"><span class="fa fa-google-plus"></span></a></li>
								</ul>
							</div>
						</div>
					</div>


					<div class="col-md-4 col-sm-6"> 
						<div class="team-agile-img">
							<a href="#"><img src="{{asset('images/layout_img/doctor_01.jpg')}}" alt="img"></a>
							<div class="view-caption">
								<div class="t-info">
									<h5>Psyhologist</h5>
									<p>Jack will</p>
								</div>
								<ul>
									<li><a href="#"><span class="fa fa-facebook"></span></a></li>
									<li><a href="#"><span class="fa fa-twitter"></span></a></li>
									<li><a href="#"><span class="fa fa-google-plus"></span></a></li>
								</ul>
							</div>
						</div>

					</div>

				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //team -->

	<!--contact-->
	<div class="contact" id="contact">
		<div class="container">
			<h3 class="title">CONTACT US</h3>

			<div class=" col-md-7 contact-address">
				<h4>Contact Address</h4>
				<div class="para-left">
					<p> In Safe Hands centre de soins pour les personnes agées,
				       situé à Tlemcen-Rue Des Frères Kara Terki.
                       Pour plus d'information, contactez-nous !.
					</p>
				</div>
				<div class="contact-left">
					<div class="address-contact-left ">
						<h5>Address:</h5>
						<p><span class="fa fa-home"></span> Tlemcen-Rue Des Frères Kara Terki </p>
					</div>
					<div class="address-contact-left ">
						<h5>Phones:</h5>
						<p><span class="fa fa-phone"></span> +213556089097</p>
						<p><span class="fa fa-phone"></span> +213556089097</p>
					</div>
					<div class="address-contact-left ">
						<h5>Email:</h5>
						<p><span class="fa fa-envelope"></span> <a href="insafe.hands@gmail.com">insafe.hands@gmail.com</a></p>
					</div>
				</div>
			</div>
			<div class=" col-md-5 contact-top">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3273.1611044266024!2d-1.3064161999999997!3d34.8773006!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd78c9ead239d4b7%3A0xd174c012015dde7f!2sRue%20Des%20Fr%C3%A8res%20Kara%20Terki%2C%20Tlemcen!5e0!3m2!1sfr!2sdz!4v1657842150015!5m2!1sfr!2sdz"
				 allowfullscreen=""></iframe>
			</div>

			<div class="clearfix"> </div>
			<div class="contact-form">
				
				<!-- email-template  -->
                 <x-email/>
                <!-- end email-template -->
		
			</div>

		</div>
	</div>
	<!--//contact-->

	<!--footer-->

	<div class="footer">
		<nav>
			<ul class="nav-buttom">
				<li><a class="page-scroll scroll" href="#home">Home</a></li>
				<li><a class="page-scroll scroll" href="#about">About</a></li>
				<li><a class="page-scroll scroll" href="#service">Facilities</a></li>
				<li><a class="page-scroll scroll" href="#gallery">Laboratory</a></li>
				<li><a class="page-scroll scroll" href="#contact">Contact</a></li>
			</ul>
		</nav>
		<div class="container">
		<div class="colr-row col-md-6  ">
			<div class="col-md-6 col-sm-6 col-xs-6  bottom-head bottm-grid">
				<h2><a href="index.html">In Safe Hands</a></h2>
				<span class="cap">Centre de soins pours les personnes agées</span>
				<div class="clearfix"> </div>
			</div>
			
			<div class="col-md-6 col-sm-6 col-xs-6 copyright bottm-grid">
				<h3>Follow us</h3>
				<div class="icons">
					<ul>
						<li><a href="#"><span class="fa fa-facebook"></span></a></li>
						<li><a href="#"><span class="fa fa-twitter"></span></a></li>
						<li><a href="#"><span class="fa fa-rss"></span></a></li>
						<li><a href=""><span class="fa fa-sign-in"></span></a></li>
					</ul>

				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="clearfix"> </div>
			</div>
			<div class="colr-row  col-md-6">
			<div class="col-md-6 col-sm-6 col-xs-6 one bottm-grid">
				<h3>About us</h3>
				<p> In Safe Hands Centre de soins pour les personnes agées </p>
				<div class="clearfix"></div>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-6 three bottm-grid">
				<h3>Contact</h3>
				<div class="addres up-out">
					<p><span class="fa fa-map-marker icons-left" aria-hidden="true"></span> Tlemcen-Rue Des Frères Kara Terki</p>

					<p><span class="fa fa-phone icons-left" aria-hidden="true"></span>Call us : +213556089097</p>

				</div>
				<div class="clearfix"> </div>
			</div>
			<!-- //Copyright -->
			<div class="clearfix"> </div>
		</div>
		</div>
	</div>

	<!--menu script-->
	<script type='text/javascript' src='js/jquery-2.2.3.min.js'></script>
	<script src="{{ asset ('js/bootstrap.js')}}"></script>
	<!--//menu script-->
	<!--FlexSlider banner-->

	<script defer src="{{ asset ('js/jquery.flexslider.js')}}"></script>
	<script type="text/javascript">
		$(window).load(function () {
			$('.flexslider').flexslider({
				animation: "slide",
				start: function (slider) {
					$('body').removeClass('loading');
				}
			});
		});
	</script>
	<!--End-slider-script-->
	<!-- OnScroll-Number-Increase-JavaScript -->
	<script src="{{ asset ('js/jquery.waypoints.min.js')}}"></script>
	<script src="{{ asset ('js/jquery.countup.js')}}"></script>
	<script>
		$('.counter').countUp();
	</script>
	<!-- //OnScroll-Number-Increase-JavaScript -->
	<script src="{{ asset ('js/jquery.chocolat.js')}}"></script>

	<!--light-box-files -->
	<script type="text/javascript">
		$(function () {
			$('.w3_agile_gallery_grid a').Chocolat();
		});
	</script>
	<!-- //gallery -->
	<!--client carousel -->
	<script src="{{ asset ('js/owl.carousel.js')}}"></script>
	<script>
		$(document).ready(function () {
			$("#owl-demo").owlCarousel({
				items: 1,
				itemsDesktop: [768, 1],
				itemsDesktopSmall: [414, 1],
				lazyLoad: true,
				autoPlay: true,
				navigation: true,

				navigationText: false,
				pagination: true,

			});

		});
	</script> 
	<!-- start-smoth-scrolling -->
	<script type="text/javascript" src="{{ asset ('js/move-top.js')}}"></script>
	<script type="text/javascript" src="{{ asset ('js/easing.js')}}"></script>
	<script type="text/javascript">
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();
				$('html,body').animate({ scrollTop: $(this.hash).offset().top }, 1000);
			});
		});
	</script>
	<!-- start-smoth-scrolling -->

	<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function () {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/

			$().UItoTop({ easingType: 'easeOutQuart' });

		});
	</script>
	<!-- //here ends scrolling icon -->

</body>

</html>