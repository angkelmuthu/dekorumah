<!DOCTYPE html>
<html lang="en">

<head>
	<!-- set the encoding of your site -->
	<meta charset="utf-8">
	<!-- set the viewport width and initial-scale on mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- set the HandheldFriendly -->
	<meta name="HandheldFriendly" content="True">
	<!-- set the description -->
	<meta name="description" content="Kitzen | Modern Kitchen HTML Template">
	<!-- set the Keyword -->
	<meta name="keywords" content="">
	<meta name="author" content="Kitzen | Modern Kitchen HTML Template">
	<!-- include poppins google font cdn link -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,400i,500,500i,600,600i,700,700i%7CRoboto:400,400i,500,500i,700,700i" rel="stylesheet">
	<!-- set the page title -->
	<title>Kitzen | Modern Kitchen HTML Template</title>
	<!-- include the site bootstrap stylesheet -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
	<!-- include the site Fontsicon stylesheet -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fontsicon.css">
	<!-- include the site Plugins stylesheet -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plugins.css">
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/style.css">
	<!-- include theme color setting stylesheet -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/colors.css">
	<!-- include the site responsive stylesheet -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/responsive.css">
</head>

<body>
	<!-- pageWrapper -->
	<div id="pageWrapper">
		<!-- pageHeader -->
		<header id="pageHeader">
			<!-- pageHeaderTopBar -->
			<div class="pageHeaderTopBar bg-light">
				<div class="container clearfix position-relative">
					<div class="row">
						<div class="col-3 col-lg-6">
							<!-- topBarContactList -->
							<ul class="list-unstyled topBarContactList align-items-center mb-0 d-none d-md-flex">
								<li>
									<a href="tel:&#049;&#050;&#051;&#052;&#053;&#054;&#055;&#056;&#057;&#049;&#048;">
										<i class="fas fa-phone fa-flip-horizontal icn"><span class="sr-only">icon</span></i>
										<span class="d-none d-lg-inline">+12 345-678-910</span>
									</a>
								</li>
								<li>
									<a href="mailto:&#073;&#110;&#102;&#111;&#046;&#100;&#101;&#101;&#114;&#099;&#114;&#101;&#097;&#116;&#105;&#118;&#101;&#064;&#103;&#109;&#097;&#105;&#108;&#046;&#099;&#111;&#109;">
										<i class="fas fa-envelope icn"><span class="sr-only">icon</span></i>
										<span class="d-none d-lg-inline">Info.deercreative@gmail.com</span>
									</a>
								</li>
							</ul>
						</div>
						<div class="col-9 col-lg-6 d-flex justify-content-end position-static">
							<!-- topBarSearchForm -->
							<form action="#" class="topBarSearchForm">
								<!-- searhFormCollpase -->
								<div class="form-group collapse mb-0" id="searhFormCollpase">
									<input type="text" class="form-control d-block" placeholder="Search&hellip;">
									<button type="button" class="ei_icon_search buttonReset"><span class="sr-only">search</span></button>
								</div>
							</form>
							<!-- loginLinksList -->
							<ul class="list-unstyled loginLinksList text-uppercase d-flex mb-0">
								<li class="hasIcon">
									<a href="#">
										<i class="ei_icon_lock icn"><span class="sr-only">icon</span></i>
										<span class="d-none d-md-block">Login</span>
									</a>
								</li>
								<li class="d-none d-md-block">
									<a href="#">Register</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="headerFixer">
				<div class="bg-white">
					<!-- pageHeaderHolder -->
					<div class="container clearfix pageHeaderHolder">
						<!-- logo -->
						<div class="logo alignleft">
							<a href="home.html">
								<img src="images/logo.png" alt="kitzen">
							</a>
						</div>
						<!-- pageNavHolder -->
						<div class="pageNavHolder alignright d-flex justify-content-end align-items-md-start">
							<!-- topBarSearchFormOpener -->
							<a class="topBarSearchFormOpener d-flex d-md-none align-items-center justify-content-center flex-shrink-0" data-toggle="collapse" href="#searhFormCollpase" role="button" aria-expanded="false" aria-controls="searhFormCollpase">
								<i class="fas fa-search"><span class="sr-only">icon</span></i>
							</a>
							<!-- pageNavBtnCart -->
							<a href="#" class="pageNavBtnCart text-center d-flex d-lg-inline align-items-center justify-content-center flex-shrink-0 position-relative order-lg-2">
								<i class="ei_icon_cart"><span class="sr-only">icon</span></i>
							</a>
							<!-- pageNav navbar -->
							<nav id="pageNav" class="navbar navbar-expand-lg order-lg-1">
								<!-- pageMainNavOpener -->
								<button class="navbar-toggler pageMainNavOpener" type="button" data-toggle="collapse" data-target="#pageMainNavCollapse" aria-controls="pageMainNavCollapse" aria-expanded="false" aria-label="Toggle navigation">
									<span class="navbar-toggler-icon"></span>
								</button>
								<!-- mainNavCollapse navbar collapse -->
								<div class="collapse navbar-collapse mainNavCollapse" id="pageMainNavCollapse">
									<!-- pageMainNavigation navbar nav -->
									<ul class="navbar-nav pageMainNavigation justify-content-md-end">
										<li class="nav-item active dropdown">
											<a class="nav-link fwMedium text-uppercase dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Home <span class="sr-only">(current)</span></a>
											<!-- mainNavDropdown dropdown menu -->
											<div class="dropdown-menu mainNavDropdown text-uppercase">
												<!-- navDropdownList -->
												<ul class="list-unstyled navDropdownList">
													<li>
														<a class="dropdown-item" href="home.html">Homepage 1</a>
													</li>
													<li>
														<a class="dropdown-item" href="home2.html">Homepage 2</a>
													</li>
												</ul>
											</div>
										</li>
										<li class="nav-item dropdown">
											<a class="nav-link fwMedium text-uppercase dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Project</a>
											<!-- mainNavDropdown dropdown menu -->
											<div class="dropdown-menu mainNavDropdown text-uppercase">
												<!-- navDropdownList -->
												<ul class="list-unstyled navDropdownList">
													<li>
														<a class="dropdown-item" href="project.html">Project 01</a>
													</li>
													<li>
														<a class="dropdown-item" href="project-details.html">Project Details 01</a>
													</li>
												</ul>
											</div>
										</li>
										<li class="nav-item dropdown">
											<a class="nav-link fwMedium text-uppercase dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Page</a>
											<!-- mainNavDropdown dropdown menu -->
											<div class="dropdown-menu mainNavDropdown text-uppercase">
												<!-- navDropdownList -->
												<ul class="list-unstyled navDropdownList">
													<li>
														<a class="dropdown-item" href="aboutus.html">About Us</a>
													</li>
													<!-- dropdown submenu -->
													<li class="dropdown-submenu">
														<a class="dropdown-item dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Gallery</a>
														<!-- mainNavDropdown dropdown menu -->
														<div class="dropdown-menu mainNavDropdown text-uppercase">
															<!-- navDropdownList -->
															<ul class="list-unstyled navDropdownList">
																<li>
																	<a class="dropdown-item" href="gallery.html">Gallery 1</a>
																</li>
															</ul>
														</div>
													</li>
													<li class="dropdown-submenu">
														<a class="dropdown-item dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Our Services</a>
														<!-- mainNavDropdown dropdown menu -->
														<div class="dropdown-menu mainNavDropdown text-uppercase">
															<!-- navDropdownList -->
															<ul class="list-unstyled navDropdownList">
																<li>
																	<a class="dropdown-item" href="services.html">Service 1</a>
																</li>
															</ul>
														</div>
													</li>
													<li>
														<a class="dropdown-item" href="booking.html">Book Design</a>
													</li>
													<li>
														<a class="dropdown-item" href="404page.html">404 Page</a>
													</li>
													<li>
														<a class="dropdown-item" href="comingsoon.html">Coming Soon</a>
													</li>
												</ul>
											</div>
										</li>
										<li class="nav-item dropdown">
											<a class="nav-link fwMedium text-uppercase dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												Shop
											</a>
											<!-- mainNavDropdown dropdown menu -->
											<div class="dropdown-menu mainNavDropdown text-uppercase">
												<!-- navDropdownList -->
												<ul class="list-unstyled navDropdownList">
													<li>
														<a class="dropdown-item" href="shopsidebar-list.html">Shop List Sidebar</a>
													</li>
													<li>
														<a class="dropdown-item" href="shopsidebar-listfull.html">Shop List Fullwidth</a>
													</li>
													<li>
														<a class="dropdown-item" href="shopsidebar-grid.html">Shop Grid Sidebar</a>
													</li>
													<li>
														<a class="dropdown-item" href="shopsidebar-gridfull.html">Shop Grid Fullwidth</a>
													</li>
													<li>
														<a class="dropdown-item" href="shop-details.html">Shop Details</a>
													</li>
													<li>
														<a class="dropdown-item" href="shoping-cart.html">Shoping Cart</a>
													</li>
													<li>
														<a class="dropdown-item" href="checkout.html">Check Out</a>
													</li>
												</ul>
											</div>
										</li>
										<li class="nav-item dropdown">
											<a class="nav-link fwMedium text-uppercase dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Blog</a>
											<div class="dropdown-menu mainNavDropdown text-uppercase">
												<ul class="list-unstyled navDropdownList">
													<li>
														<a class="dropdown-item" href="blog.html">Blog 01</a>
													</li>
													<li>
														<a class="dropdown-item" href="blog-detail.html">Blog Details</a>
													</li>
												</ul>
											</div>
										</li>
										<li class="nav-item dropdown">
											<a class="nav-link fwMedium text-uppercase dropdown-toggle" href="contact2.html" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Contact</a>
											<div class="dropdown-menu mainNavDropdown text-uppercase">
												<ul class="list-unstyled navDropdownList">
													<li>
														<a class="dropdown-item" href="contact.html">Contact 01</a>
													</li>
												</ul>
											</div>
										</li>
									</ul>
								</div>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</header>
		<main>
			<!-- bannerSliderBlock -->
			<section class="bannerSliderBlock bannerSlider w-100 slickSlider text-center text-white">
				<!-- bannerSliderSlide -->
				<div class="bannerSliderSlide">
					<!-- bannerSlideHolder -->
					<div class="container bannerSlideHolder position-relative">
						<div class="align">
							<!-- bannerSlideHeader -->
							<header class="bannerSlideHeader">
								<h1 class="text-uppercase fwSemiBold fontBase">Build Up Your Beautiful Kitchen</h1>
								<p>Lorem ipsum dolor sit amet sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
							</header>
							<!-- btnHolder -->
							<footer class="btnHolder d-flex flex-wrap justify-content-center">
								<a href="javascript:void(0);" class="btn btnThemeOutine text-uppercase" data-hover="Learn More">
									<span class="d-block btnText">Learn More</span>
								</a>
								<a href="contact2.html" class="btn btnTheme text-uppercase" data-hover="Contact Us">
									<span class="d-block btnText">Contact Us</span>
								</a>
							</footer>
						</div>
					</div>
					<!-- bannerBlockSlideBg -->
					<span class="bgCover bannerBlockSlideBg d-block position-absolute" style="background-image: url(http://placehold.it/1920x870);">
						<img class="sr-only" src="http://placehold.it/1920x870" alt="image description">
					</span>
				</div>
				<!-- bannerSliderSlide -->
				<div class="bannerSliderSlide">
					<!-- bannerSlideHolder -->
					<div class="container bannerSlideHolder position-relative">
						<div class="align">
							<!-- bannerSlideHeader -->
							<header class="bannerSlideHeader">
								<h1 class="text-uppercase fwSemiBold fontBase">Build Up Beautiful Kitchen</h1>
								<p>Lorem ipsum dolor sit amet sed do</p>
							</header>
							<!-- btnHolder -->
							<footer class="btnHolder d-flex flex-wrap justify-content-center">
								<a href="javascript:void(0);" class="btn btnThemeOutine text-uppercase" data-hover="Learn More">
									<span class="d-block btnText">Learn More</span>
								</a>
							</footer>
						</div>
					</div>
					<!-- bannerBlockSlideBg -->
					<span class="bgCover bannerBlockSlideBg d-block position-absolute" style="background-image: url(http://placehold.it/1920x870);">
						<img class="sr-only" src="http://placehold.it/1920x870" alt="image description">
					</span>
				</div>
				<!-- bannerSliderSlide -->
				<div class="bannerSliderSlide">
					<!-- bannerSlideHolder -->
					<div class="container bannerSlideHolder position-relative">
						<div class="align">
							<!-- bannerSlideHeader -->
							<header class="bannerSlideHeader">
								<h1 class="text-uppercase fwSemiBold fontBase">Build Up Your Beautiful Kitchen</h1>
								<p>Lorem ipsum dolor sit amet sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
							</header>
							<!-- btnHolder -->
							<footer class="btnHolder d-flex flex-wrap justify-content-center">
								<a href="javascript:void(0);" class="btn btnThemeOutine text-uppercase" data-hover="Learn More">
									<span class="d-block btnText">Learn More</span>
								</a>
								<a href="contact2.html" class="btn btnTheme text-uppercase" data-hover="Contact Us">
									<span class="d-block btnText">Contact Us</span>
								</a>
							</footer>
						</div>
					</div>
					<!-- bannerBlockSlideBg -->
					<span class="bgCover bannerBlockSlideBg d-block position-absolute" style="background-image: url(http://placehold.it/1920x870);">
						<img class="sr-only" src="http://placehold.it/1920x870" alt="image description">
					</span>
				</div>
			</section>
			<!-- aboutIntroBlock -->
			<section class="aboutIntroBlock pb-0 text-center text-lg-left position-relative">
				<div class="container">
					<div class="row">
						<div class="col-12 col-lg-8">
							<div class="pr-xl-5">
								<!-- headingHead -->
								<header class="headingHead wow fadeInUp" data-wow-delay="0.1s">
									<!-- blockH -->
									<h2 class="text-uppercase blockH font-weight-bold">
										<!-- hTitle -->
										<strong class="font-weight-normal hTitle d-block fontBase">About</strong>
										<span class="d-block">Who We Are?</span>
									</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
									<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu eu fugiat nulla pariatur.</p>
								</header>
								<!-- featuresList -->
								<ul class="list-unstyled d-flex flex-wrap featuresList text-left wow fadeInUp" data-wow-delay="0.1s">
									<li>
										<div class="wrap w-100 hasOver bgWhite hasShadow rounded position-relative">
											<i class="icn icmon_01 inaccessible"><span class="sr-only">icon</span></i>
											<h3 class="fwSemiBold fontBase counter">18</h3>
											<h4 class="font-weight-normal fontBase">Year Experience</h4>
										</div>
									</li>
									<li>
										<div class="wrap w-100 hasOver bgWhite hasShadow rounded position-relative">
											<i class="icn icmon_02 inaccessible"><span class="sr-only">icon</span></i>
											<h3 class="fwSemiBold fontBase counter">190</h3>
											<h4 class="font-weight-normal fontBase">Project Done</h4>
										</div>
									</li>
									<li>
										<div class="wrap w-100 hasOver bgWhite hasShadow rounded position-relative">
											<i class="icn icmon_03 inaccessible"><span class="sr-only">icon</span></i>
											<h3 class="fwSemiBold fontBase counter">80</h3>
											<h4 class="font-weight-normal fontBase">Hours Working</h4>
										</div>
									</li>
									<li>
										<div class="wrap w-100 hasOver bgWhite hasShadow rounded position-relative">
											<i class="icn icmon_04 inaccessible"><span class="sr-only">icon</span></i>
											<h3 class="fwSemiBold fontBase counter">260</h3>
											<h4 class="font-weight-normal fontBase">Win Award</h4>
										</div>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-12 col-lg-4 position-static">
							<!-- widgetQuoteFormCollapse -->
							<div class="collapse widgetQuoteFormCollapse" id="collapseQuoteForm">
								<!-- widgetForm -->
								<aside class="widget widgetForm bg-white hasShadow rounded text-left mb-0">
									<form action="#">
										<!-- widgetFormtHead -->
										<header class="widgetFormtHead d-flex position-relative">
											<i class="icn ti-headphone-alt d-flex align-items-center justify-content-center flex-shrink-0"><span class="sr-only">icon</span></i>
											<div class="wrap">
												<strong class="textTitle d-block font-weight-normal">Lorem ipsum dolor sit amet</strong>
												<h3 class="font-weight-bold">Request A Quote</h3>
											</div>
										</header>
										<!-- form group -->
										<div class="form-group">
											<input type="text" class="form-control d-block w-100" placeholder="Your Name">
										</div>
										<!-- form group -->
										<div class="form-group">
											<input type="tel" class="form-control d-block w-100" placeholder="Phone:">
										</div>
										<!-- form group -->
										<div class="form-group">
											<select class="custom-select">
												<option>Choose Subject</option>
												<option>2</option>
												<option>3</option>
												<option>4</option>
												<option>5</option>
											</select>
										</div>
										<!-- form group -->
										<div class="form-group">
											<textarea class="form-control d-block w-100" placeholder="Message"></textarea>
										</div>
										<!-- button -->
										<button type="submit" class="btn btnTheme text-uppercase d-block w-100" data-hover="submit now">
											<span class="d-block btnText">Submit Now</span>
										</button>
									</form>
								</aside>
							</div>
						</div>
					</div>
				</div>
				<!-- quoteFormOpener -->
				<a class="btn btnTheme quoteFormOpener ti-angle-left d-lg-none" data-toggle="collapse" href="#collapseQuoteForm" role="button" aria-expanded="false" aria-controls="collapseQuoteForm"><span class="sr-only">open</span></a>
			</section>
			<!-- servicesBlock -->
			<section class="contentBlock servicesBlock text-center">
				<div class="container">
					<div class="row">
						<div class="col-12 offset-md-1 col-md-10 offset-lg-2 col-lg-8 offset-xl-3 col-xl-6">
							<!-- headingHead -->
							<header class="headingHead wow fadeInUp" data-wow-delay="0.1s">
								<!-- blockH -->
								<h2 class="text-uppercase blockH font-weight-bold">
									<!-- hTitle -->
									<strong class="font-weight-normal hTitle d-block fontBase">Services</strong>
									<span class="d-block">What We Do</span>
								</h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
							</header>
						</div>
					</div>
					<!-- svColsRow -->
					<div class="row justify-content-center svColsRow no-gutters wow fadeInUp" data-wow-delay="0.1s">
						<div class="col-12 col-md-4 d-md-flex col">
							<!-- serviceColumn -->
							<article class="serviceColumn d-md-flex align-items-md-center justify-content-md-center position-relative hasOver mb-0">
								<div class="align">
									<i class="icn ti-ruler-pencil d-block"><span class="sr-only">icon</span></i>
									<h3>Design &amp; Drawings</h3>
									<p>Nam orci neque, tincidunt in vel vehicula vel lectus fusce libero neque</p>
								</div>
								<!-- columnBgCover -->
								<span class="bgCover columnBgCover d-block position-absolute" style="background-image: url(http://placehold.it/395x260);">
									<img class="sr-only" src="http://placehold.it/395x260" alt="image description">
								</span>
							</article>
						</div>
						<div class="col-12 col-md-4 d-md-flex col">
							<!-- serviceColumn -->
							<article class="serviceColumn d-md-flex align-items-md-center justify-content-md-center position-relative hasOver mb-0">
								<div class="align">
									<i class="icn ti-reload d-block"><span class="sr-only">icon</span></i>
									<h3>Rebuild Design</h3>
									<p>Nam orci neque, tincidunt in vel vehicula vel lectus fusce libero neque</p>
								</div>
								<!-- columnBgCover -->
								<span class="bgCover columnBgCover d-block position-absolute" style="background-image: url(http://placehold.it/395x260);">
									<img class="sr-only" src="http://placehold.it/395x260" alt="image description">
								</span>
							</article>
						</div>
						<div class="col-12 col-md-4 d-md-flex col">
							<!-- serviceColumn -->
							<article class="serviceColumn d-md-flex align-items-md-center justify-content-md-center position-relative hasOver mb-0">
								<div class="align">
									<i class="icn ti-paint-roller d-block"><span class="sr-only">icon</span></i>
									<h3>Custom Design</h3>
									<p>Nam orci neque, tincidunt in vel vehicula vel lectus fusce libero neque</p>
								</div>
								<!-- columnBgCover -->
								<span class="bgCover columnBgCover d-block position-absolute" style="background-image: url(http://placehold.it/395x260);">
									<img class="sr-only" src="http://placehold.it/395x260" alt="image description">
								</span>
							</article>
						</div>
						<div class="col-12 col-md-4 d-md-flex col">
							<!-- serviceColumn -->
							<article class="serviceColumn d-md-flex align-items-md-center justify-content-md-center position-relative hasOver mb-0">
								<div class="align">
									<i class="icn ti-paint-bucket d-block"><span class="sr-only">icon</span></i>
									<h3>Kitchen Design</h3>
									<p>Nam orci neque, tincidunt in vel vehicula vel lectus fusce libero neque</p>
								</div>
								<!-- columnBgCover -->
								<span class="bgCover columnBgCover d-block position-absolute" style="background-image: url(http://placehold.it/395x260);">
									<img class="sr-only" src="http://placehold.it/395x260" alt="image description">
								</span>
							</article>
						</div>
						<div class="col-12 col-md-4 d-md-flex col">
							<!-- serviceColumn -->
							<article class="serviceColumn d-md-flex align-items-md-center justify-content-md-center position-relative hasOver mb-0">
								<div class="align">
									<i class="icn ti-settings d-block"><span class="sr-only">icon</span></i>
									<h3>Installation</h3>
									<p>Nam orci neque, tincidunt in vel vehicula vel lectus fusce libero neque</p>
								</div>
								<!-- columnBgCover -->
								<span class="bgCover columnBgCover d-block position-absolute" style="background-image: url(http://placehold.it/395x260);">
									<img class="sr-only" src="http://placehold.it/395x260" alt="image description">
								</span>
							</article>
						</div>
						<div class="col-12 col-md-4 d-md-flex col">
							<!-- serviceColumn -->
							<article class="serviceColumn d-md-flex align-items-md-center justify-content-md-center position-relative hasOver mb-0">
								<div class="align">
									<i class="icn ti-package d-block"><span class="sr-only">icon</span></i>
									<h3>Fast Delivery</h3>
									<p>Nam orci neque, tincidunt in vel vehicula vel lectus fusce libero neque</p>
								</div>
								<!-- columnBgCover -->
								<span class="bgCover columnBgCover d-block position-absolute" style="background-image: url(http://placehold.it/395x260);">
									<img class="sr-only" src="http://placehold.it/395x260" alt="image description">
								</span>
							</article>
						</div>
					</div>
				</div>
			</section>
			<!-- stepsDescrBlock -->
			<section class="bg-light stepsDescrBlock text-center contentBlock">
				<div class="container">
					<div class="row">
						<div class="col-12 offset-md-1 col-md-10 offset-lg-2 col-lg-8 offset-xl-3 col-xl-6">
							<!-- headingHead -->
							<header class="headingHead wow fadeInUp" data-wow-delay="0.1s">
								<!-- blockH -->
								<h2 class="text-uppercase blockH font-weight-bold">
									<!-- hTitle -->
									<strong class="font-weight-normal hTitle d-block fontBase">Step</strong>
									<span class="d-block">How We Work</span>
								</h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
							</header>
						</div>
					</div>
					<!-- stepsGuideList -->
					<ul class="list-unstyled position-relative stepsGuideList d-md-flex justify-content-md-center wow fadeInUp" data-wow-delay="0.1s">
						<li class="hasOver">
							<i class="icn rounded-circle mx-auto text-dark bg-white ti-search d-flex align-items-center justify-content-center"><span class="sr-only">icon</span></i>
							<h3>Search Design</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</p>
						</li>
						<li class="hasOver">
							<i class="icn rounded-circle mx-auto text-dark bg-white ti-calendar d-flex align-items-center justify-content-center"><span class="sr-only">icon</span></i>
							<h3>Book Cover Design</h3>
							<p>Sed ut perspiciatis unde omnis iste natus error voluptatem accusantium.</p>
						</li>
						<li class="hasOver">
							<i class="icn rounded-circle mx-auto text-dark bg-white ti-pencil-alt d-flex align-items-center justify-content-center"><span class="sr-only">icon</span></i>
							<h3>Make Your Design</h3>
							<p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto enim ipsam.</p>
						</li>
					</ul>
				</div>
			</section>
			<!-- prejectsListingBlock -->
			<section class="contentBlock prejectsListingBlock">
				<div class="container">
					<!-- filterRowWrap -->
					<div class="row align-items-md-end filterRowWrap wow fadeInUp" data-wow-delay="0.1s">
						<div class="col-12 col-md-4">
							<!-- headingHead -->
							<header class="headingHead">
								<!-- blockH -->
								<h2 class="text-uppercase blockH font-weight-bold mb-0">
									<!-- hTitle -->
									<strong class="font-weight-normal hTitle d-block fontBase">Project</strong>
									<span class="d-block">Our Work</span>
								</h2>
							</header>
						</div>
						<div class="col-12 col-md-8">
							<!-- filterList -->
							<ul class="list-unstyled filterList d-md-flex justify-content-md-end position-relative isoFiltersList text-capitalize">
								<li class="active"><a href="#">View All</a></li>
								<li><a href="javascript:void(0);" data-filter=".vintage">Vintage</a></li>
								<li><a href="javascript:void(0);" data-filter=".morden">Morden</a></li>
								<li><a href="javascript:void(0);" data-filter=".minimal">Minimal</a></li>
								<li><a href="javascript:void(0);" data-filter=".coastal">Coastal</a></li>
							</ul>
						</div>
					</div>
					<!-- isoContentHolder -->
					<div class="isoContentHolder row">
						<div class="row justify-content-center wow fadeInUp" data-wow-delay="0.1s">
							<div class="col-12 col-md-6 col-lg-4 isoCol vintage">
								<!-- prPostColumn -->
								<article class="prPostColumn hasOver position-relative">
									<!-- prColumnBgCover -->
									<span class="bgCover prColumnBgCover d-block" style="background-image: url(http://placehold.it/370x250);">
										<img class="sr-only" src="http://placehold.it/370x250" alt="image description">
									</span>
									<!-- prPostCaption -->
									<div class="prPostCaption bg-white rounded">
										<h3>
											<!-- hTitle -->
											<strong class="font-weight-normal hTitle d-block fontBase">Coastal</strong>
											<span class="d-block"><a href="project-details2.html">Kitchen furniture for you.</a></span>
										</h3>
									</div>
								</article>
							</div>
							<div class="col-12 col-md-6 col-lg-4 isoCol minimal">
								<!-- prPostColumn -->
								<article class="prPostColumn hasOver position-relative">
									<!-- prColumnBgCover -->
									<span class="bgCover prColumnBgCover d-block" style="background-image: url(http://placehold.it/370x250);">
										<img class="sr-only" src="http://placehold.it/370x250" alt="image description">
									</span>
									<!-- prPostCaption -->
									<div class="prPostCaption bg-white rounded">
										<h3>
											<!-- hTitle -->
											<strong class="font-weight-normal hTitle d-block fontBase">Vintage</strong>
											<span class="d-block"><a href="project-details2.html">Kitchen furniture for you.</a></span>
										</h3>
									</div>
								</article>
							</div>
							<div class="col-12 col-md-6 col-lg-4 isoCol vintage">
								<!-- prPostColumn -->
								<article class="prPostColumn hasOver position-relative">
									<!-- prColumnBgCover -->
									<span class="bgCover prColumnBgCover d-block" style="background-image: url(http://placehold.it/370x250);">
										<img class="sr-only" src="http://placehold.it/370x250" alt="image description">
									</span>
									<!-- prPostCaption -->
									<div class="prPostCaption bg-white rounded">
										<h3>
											<!-- hTitle -->
											<strong class="font-weight-normal hTitle d-block fontBase">Vintage</strong>
											<span class="d-block"><a href="project-details2.html">Kitchen furniture for you.</a></span>
										</h3>
									</div>
								</article>
							</div>
							<div class="col-12 col-md-6 col-lg-4 isoCol coastal">
								<!-- prPostColumn -->
								<article class="prPostColumn hasOver position-relative">
									<!-- prColumnBgCover -->
									<span class="bgCover prColumnBgCover d-block" style="background-image: url(http://placehold.it/370x250);">
										<img class="sr-only" src="http://placehold.it/370x250" alt="image description">
									</span>
									<!-- prPostCaption -->
									<div class="prPostCaption bg-white rounded">
										<h3>
											<!-- hTitle -->
											<strong class="font-weight-normal hTitle d-block fontBase">Minimal</strong>
											<span class="d-block"><a href="project-details2.html">Kitchen furniture for you.</a></span>
										</h3>
									</div>
								</article>
							</div>
							<div class="col-12 col-md-6 col-lg-4 isoCol vintage">
								<!-- prPostColumn -->
								<article class="prPostColumn hasOver position-relative">
									<!-- prColumnBgCover -->
									<span class="bgCover prColumnBgCover d-block" style="background-image: url(http://placehold.it/370x250);">
										<img class="sr-only" src="http://placehold.it/370x250" alt="image description">
									</span>
									<!-- prPostCaption -->
									<div class="prPostCaption bg-white rounded">
										<h3>
											<!-- hTitle -->
											<strong class="font-weight-normal hTitle d-block fontBase">Vintage</strong>
											<span class="d-block"><a href="project-details2.html">Kitchen furniture for you.</a></span>
										</h3>
									</div>
								</article>
							</div>
							<div class="col-12 col-md-6 col-lg-4 isoCol morden">
								<!-- prPostColumn -->
								<article class="prPostColumn hasOver position-relative">
									<!-- prColumnBgCover -->
									<span class="bgCover prColumnBgCover d-block" style="background-image: url(http://placehold.it/370x250);">
										<img class="sr-only" src="http://placehold.it/370x250" alt="image description">
									</span>
									<!-- prPostCaption -->
									<div class="prPostCaption bg-white rounded">
										<h3>
											<!-- hTitle -->
											<strong class="font-weight-normal hTitle d-block fontBase">Morden</strong>
											<span class="d-block"><a href="project-details2.html">Kitchen furniture for you.</a></span>
										</h3>
									</div>
								</article>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- clientsTestimonialBlock -->
			<section class="bg-light clientsTestimonialBlock text-center text-md-left position-relative contentBlock">
				<div class="container">
					<div class="row no-gutters wow fadeInUp" data-wow-delay="0.1s">
						<div class="col-12 offset-md-6 col-md-6">
							<!-- clientsTestimonialBlockHolder -->
							<div class="clientsTestimonialBlockHolder">
								<!-- headingHead -->
								<header class="headingHead">
									<!-- blockH -->
									<h2 class="text-uppercase blockH font-weight-bold mb-0">
										<!-- hTitle -->
										<strong class="font-weight-normal hTitle d-block fontBase">Testimonials</strong>
										<span class="d-block">Happy Clients</span>
									</h2>
								</header>
								<!-- testimonialSingleSlider -->
								<div class="testimonialSingleSlider slickSlider">
									<div>
										<!-- clientQuote -->
										<blockquote class="clientQuote mb-0">
											<q class="d-block">
												<!-- quoteTitle -->
												<strong class="font-weight-normal d-block quoteTitle text-dark">In today's world, its important to harness technology to.</strong>
												<span class="d-block">My order arrived today, as per your e-mail. Thanks to you and everyone at Utility Design for such great service, prices and choice. Good luck with your business.</span>
											</q>
											<div class="d-flex align-items-start justify-content-between align-items-center">
												<!-- cite -->
												<cite class="wrap d-block text-left">
													<strong class="h3 d-block text-capitalize"><a href="javascript:void(0);">John Martin</a></strong>
													<em class="h5 d-block font-weight-normal">Deercreative</em>
												</cite>
												<!-- ratingStarList -->
												<ul class="list-unstyled ratingStarList d-flex mb-1 ml-2 flex-shrink-0">
													<li class="active"><i class="fas fa-star"></i></li>
													<li class="active"><i class="fas fa-star"></i></li>
													<li class="active"><i class="fas fa-star"></i></li>
													<li class="active"><i class="fas fa-star"></i></li>
													<li><i class="fas fa-star"></i></li>
												</ul>
											</div>
										</blockquote>
									</div>
									<div>
										<!-- clientQuote -->
										<blockquote class="clientQuote mb-0">
											<q class="d-block">
												<!-- quoteTitle -->
												<strong class="font-weight-normal d-block quoteTitle text-dark">In today's world, its important to harness technology to.</strong>
												<span class="d-block">My order arrived today, as per your e-mail. Thanks to you and everyone at Utility Design for such great service, prices and choice</span>
											</q>
											<div class="d-flex align-items-start justify-content-between align-items-center">
												<!-- cite -->
												<cite class="wrap d-block text-left">
													<strong class="h3 d-block text-capitalize"><a href="javascript:void(0);">Martin</a></strong>
													<em class="h5 d-block font-weight-normal">Ceo-Deercreative</em>
												</cite>
												<!-- ratingStarList -->
												<ul class="list-unstyled ratingStarList d-flex mb-1 ml-2 flex-shrink-0">
													<li class="active"><i class="fas fa-star"></i></li>
													<li class="active"><i class="fas fa-star"></i></li>
													<li class="active"><i class="fas fa-star"></i></li>
													<li class="active"><i class="fas fa-star"></i></li>
													<li><i class="fas fa-star"></i></li>
												</ul>
											</div>
										</blockquote>
									</div>
									<div>
										<!-- clientQuote -->
										<blockquote class="clientQuote mb-0">
											<q class="d-block">
												<!-- quoteTitle -->
												<strong class="font-weight-normal d-block quoteTitle text-dark">In today's world, its important to harness technology to.</strong>
												<span class="d-block">Thanks to you and everyone at Utility Design for such great service, prices and choice. Good luck with your business. Design for such great service, prices and choice</span>
											</q>
											<div class="d-flex align-items-start justify-content-between align-items-center">
												<!-- cite -->
												<cite class="wrap d-block text-left">
													<strong class="h3 d-block text-capitalize"><a href="javascript:void(0);">John</a></strong>
													<em class="h5 d-block font-weight-normal">Ceo</em>
												</cite>
												<!-- ratingStarList -->
												<ul class="list-unstyled ratingStarList d-flex mb-1 ml-2 flex-shrink-0">
													<li class="active"><i class="fas fa-star"></i></li>
													<li class="active"><i class="fas fa-star"></i></li>
													<li class="active"><i class="fas fa-star"></i></li>
													<li class="active"><i class="fas fa-star"></i></li>
													<li><i class="fas fa-star"></i></li>
												</ul>
											</div>
										</blockquote>
									</div>
								</div>
								<!-- separator -->
								<hr class="separator">
								<!-- testimonialSwitcherSlider -->
								<div class="testimonialSwitcherSlider slickSlider">
									<div>
										<!-- testimonialSwitcherPicWrap -->
										<div class="rounded-circle testimonialSwitcherPicWrap position-relative">
											<img class="w-100 h-100 d-block rounded-circle" src="http://placehold.it/55x55" alt="John Martin Ceo-Deercreative">
										</div>
									</div>
									<div>
										<!-- testimonialSwitcherPicWrap -->
										<div class="rounded-circle testimonialSwitcherPicWrap position-relative">
											<img class="w-100 h-100 d-block rounded-circle" src="http://placehold.it/55x55" alt="John Martin Ceo-Deercreative">
										</div>
									</div>
									<div>
										<!-- testimonialSwitcherPicWrap -->
										<div class="rounded-circle testimonialSwitcherPicWrap position-relative">
											<img class="w-100 h-100 d-block rounded-circle" src="http://placehold.it/55x55" alt="John Martin Ceo-Deercreative">
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- videoBlockWrap -->
						<a data-fancybox="true" href="https://www.youtube.com/watch?v=_sI_Ps7JSEk" class="videoBlockWrap hasOver lightbox hasOverlay d-none d-md-block">
							<!-- btnPlay -->
							<span class="btnPlay position-absolute rounded-circle d-flex align-items-center justify-content-center">
								<span class="sr-only">play</span>
							</span>
							<!-- videoBlockBgCover -->
							<span class="bgCover videoBlockBgCover d-block position-absolute" style="background-image: url(http://placehold.it/960x600);">
								<img class="sr-only" src="http://placehold.it/960x600" alt="image description">
							</span>
						</a>
					</div>
				</div>
			</section>
			<!-- ltPostsBlock -->
			<section class="contentBlock ltPostsBlock">
				<div class="container">
					<div class="row">
						<div class="col-12 offset-md-1 col-md-10 offset-lg-2 col-lg-8 text-center">
							<!-- headingHead -->
							<header class="headingHead wow fadeInUp" data-wow-delay="0.1s">
								<!-- blockH -->
								<h2 class="text-uppercase blockH font-weight-bold">
									<!-- hTitle -->
									<strong class="font-weight-normal hTitle d-block fontBase">Blog</strong>
									<span class="d-block">Latest Post</span>
								</h2>
								<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
							</header>
						</div>
					</div>
					<div class="row wow fadeInUp" data-wow-delay="0.1s">
						<div class="col-12 col-md-6 col-lg-4">
							<!-- ltPostColumn -->
							<article class="ltPostColumn hasOver">
								<!-- aligncenter -->
								<div class="aligncenter position-relative">
									<img src="http://placehold.it/370x240" alt="image description">
								</div>
								<!-- descriptionWrap -->
								<div class="descriptionWrap d-md-flex align-items-md-start">
									<time datetime="2011-01-12" class="d-inline-block d-md-block time flex-shrink-0 rounded text-white text-center">
										<strong class="fwSemiBold d-md-block textLarge">18</strong>
										<span class="d-md-block">June</span>
									</time>
									<div class="wrap">
										<h3><a href="blog-detail.html">17 Stunning Ways Upgrade Kitchen</a></h3>
										<p>White kitchens are classic. They're bright, clean</p>
										<a href="blog-detail.html" class="btnMore d-inline-block">Details <i class="icn ei_arrow_right"><span class="sr-only">icon</span></i></a>
									</div>
								</div>
							</article>
						</div>
						<div class="col-12 col-md-6 col-lg-4">
							<!-- ltPostColumn -->
							<article class="ltPostColumn hasOver">
								<!-- aligncenter -->
								<div class="aligncenter position-relative">
									<img src="http://placehold.it/370x240" alt="image description">
								</div>
								<!-- descriptionWrap -->
								<div class="descriptionWrap d-md-flex align-items-md-start">
									<time datetime="2011-01-12" class="d-inline-block d-md-block time flex-shrink-0 rounded text-white text-center">
										<strong class="fwSemiBold d-md-block textLarge">27</strong>
										<span class="d-md-block">June</span>
									</time>
									<div class="wrap">
										<h3><a href="blog-detail.html">10 Totally Unique Ways To Tile Your Kitchen</a></h3>
										<p>You might be focusing on men acksplashes cabinetry </p>
										<a href="blog-detail.html" class="btnMore d-inline-block">Details <i class="icn ei_arrow_right"><span class="sr-only">icon</span></i></a>
									</div>
								</div>
							</article>
						</div>
						<div class="col-12 col-md-6 col-lg-4">
							<!-- ltPostColumn -->
							<article class="ltPostColumn hasOver">
								<!-- aligncenter -->
								<div class="aligncenter position-relative">
									<img src="http://placehold.it/370x240" alt="image description">
								</div>
								<!-- descriptionWrap -->
								<div class="descriptionWrap d-md-flex align-items-md-start">
									<time datetime="2011-01-12" class="d-inline-block d-md-block time flex-shrink-0 rounded text-white text-center">
										<strong class="fwSemiBold d-md-block textLarge">5</strong>
										<span class="d-md-block">July</span>
									</time>
									<div class="wrap">
										<h3><a href="blog-detail.html">Rich Blue-Greens and Stone Surfaces</a></h3>
										<p>White kitchens can get basic, fast de-blandify your kitch</p>
										<a href="blog-detail.html" class="btnMore d-inline-block">Details <i class="icn ei_arrow_right"><span class="sr-only">icon</span></i></a>
									</div>
								</div>
							</article>
						</div>
					</div>
				</div>
			</section>
		</main>
		<!-- pageFooterAreaWrap -->
		<div class="pageFooterAreaWrap position-relative text-center text-sm-left" data-parallax="scroll" data-image-src="http://placehold.it/1920x870">
			<!-- pageFooterWrapHolder -->
			<div class="container position-relative pageFooterWrapHolder">
				<!-- subscribeAsideBlock -->
				<aside class="subscribeAsideBlock">
					<form action="javascript:void(0);">
						<div class="row">
							<div class="col-12 col-md-7">
								<h3 class="text-white text-uppercase">Sign up for our newsletter:</h3>
								<p>Join over 5,000 people who get free</p>
							</div>
							<div class="col-12 col-md-5">
								<!-- input group -->
								<div class="input-group">
									<input type="email" class="form-control" placeholder="Your Email">
									<div class="input-group-append">
										<!-- button -->
										<button class="btn btnTheme text-uppercase" type="submit" data-hover="Send">
											<span class="d-block btnText">Subscribe</span>
										</button>
									</div>
								</div>
							</div>
						</div>
					</form>
				</aside>
				<!-- separator -->
				<hr class="separator">
				<!-- pageFooter -->
				<footer id="pageFooter" class="position-relative">
					<div class="row">
						<div class="col col-12 col-md-9 col-lg-6 order-lg-2">
							<!-- ftLinksNav -->
							<nav class="ftLinksNav">
								<div class="row">
									<div class="col-12 col-sm-6">
										<h3 class="text-white">Information</h3>
										<ul class="list-unstyled">
											<li><a href="javascript:void(0);">Term &amp; Condition</a></li>
											<li><a href="javascript:void(0);">Privacy policy</a></li>
											<li><a href="javascript:void(0);">Customer Service</a></li>
											<li><a href="javascript:void(0);">FAQs</a></li>
										</ul>
									</div>
									<div class="col-12 col-sm-6">
										<h3 class="text-white">Quick Link</h3>
										<ul class="list-unstyled">
											<li><a href="javascript:void(0);">Latest News</a></li>
											<li><a href="javascript:void(0);">Products</a></li>
											<li><a href="javascript:void(0);">Best Design</a></li>
											<li><a href="javascript:void(0);">Customs Services</a></li>
										</ul>
									</div>
								</div>
							</nav>
						</div>
						<div class="col col-12 col-md-3 col-lg-2 order-lg-3 text-center text-md-left">
							<h3 class="text-white">Social</h3>
							<!-- ftSocialLinks -->
							<ul class="list-unstyled socialNetworks ftSocialLinks">
								<li>
									<a href="javascript:void(0);">
										<i class="fab fa-facebook-f icn text-center"><span class="sr-only">icon</span></i>
										<strong class="text font-weight-normal">Facebook</strong>
									</a>
								</li>
								<li>
									<a href="javascript:void(0);">
										<i class="fab fa-twitter icn text-center"><span class="sr-only">icon</span></i>
										<strong class="text font-weight-normal">Twitter</strong>
									</a>
								</li>
								<li>
									<a href="javascript:void(0);">
										<i class="fab fa-pinterest icn text-center"><span class="sr-only">icon</span></i>
										<strong class="text font-weight-normal">Pinterest</strong>
									</a>
								</li>
								<li>
									<a href="javascript:void(0);">
										<i class="fab fa-instagram icn text-center"><span class="sr-only">icon</span></i>
										<strong class="text font-weight-normal">instagram</strong>
									</a>
								</li>
							</ul>
						</div>
						<div class="col col-12 col-lg-4 order-lg-1 text-center text-lg-left position-static">
							<!-- logo -->
							<div class="logo">
								<a href="home.html">
									<img src="images/logo.png" alt="kitzen">
								</a>
							</div>
							<!-- ftAddress -->
							<address class="d-block ftAddress">
								<!-- adrList -->
								<ul class="list-unstyled adrList mb-0">
									<li>
										<i class="fas fa-map-marker-alt flex-shrink-0 icn"><span class="sr-only">icon</span></i>
										<strong class="font-weight-normal text d-block">198 Collins St, Melbourne, NY</strong>
									</li>
									<li>
										<i class="fas fa-phone fa-flip-horizontal flex-shrink-0 icn"><span class="sr-only">icon</span></i>
										<strong class="font-weight-normal text d-block"><a href="tel:&#049;&#050;&#051;&#052;&#053;&#054;&#055;&#056;&#057;&#049;&#048;">(12) 345 678 910</a></strong>
									</li>
									<li>
										<i class="fas fa-envelope flex-shrink-0 icn"><span class="sr-only">icon</span></i>
										<strong class="font-weight-normal text d-block"><a href="mailto:&#068;&#101;&#101;&#114;&#067;&#114;&#101;&#097;&#116;&#105;&#118;&#101;&#064;&#103;&#109;&#097;&#105;&#108;&#046;&#099;&#111;&#109;">&#068;&#101;&#101;&#114;&#067;&#114;&#101;&#097;&#116;&#105;&#118;&#101;&#064;&#103;&#109;&#097;&#105;&#108;&#046;&#099;&#111;&#109;</a></strong>
									</li>
								</ul>
							</address>
							<!-- copyrightWrap -->
							<div class="copyrightWrap">
								<p>Copyright &copy; 2019 <a href="home.html">Kitzen Inc</a>.</p>
							</div>
						</div>
					</div>
				</footer>
			</div>
		</div>
		<span id="back-top" class="text-center rounded-circle fa fa-angle-up"></span>
		<div id="loader" class="loader-holder">
			<div class="block">
				<div class="dot white"></div>
				<div class="dot"></div>
				<div class="dot"></div>
				<div class="dot"></div>
				<div class="dot"></div>
			</div>
		</div>
	</div>
	<!-- include jQuery library -->
	<script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>
	<!-- include Plugins JavaScript -->
	<script src="<?php echo base_url(); ?>assets/js/plugins.js"></script>
	<!-- include custom JavaScript -->
	<script src="<?php echo base_url(); ?>assets/js/jquery.main.js"></script>
</body>

</html>