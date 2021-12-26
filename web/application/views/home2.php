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
		<header id="pageHeader" class="pageHeader02">
			<div class="container relativeSm">
				<!-- pageHeaderTopBar -->
				<div class="pageHeaderTopBar">
					<div class="row">
						<div class="col-3 col-lg-6">
							<!-- topBarContactList -->
							<ul class="list-unstyled topBarContactList topBarContactList02 align-items-center mb-0 d-none d-md-flex">
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
							<form action="javascript:void(0);" class="topBarSearchForm topBarSearchForm02 d-md-none">
								<!-- searhFormCollpase -->
								<div class="form-group collapse mb-0" id="searhFormCollpase">
									<input type="text" class="form-control d-block" placeholder="Search&hellip;">
									<button type="button" class="ei_icon_search buttonReset"><span class="sr-only">search</span></button>
								</div>
							</form>
							<!-- loginLinksList -->
							<ul class="list-unstyled loginLinksList loginLinksList02 text-capitalize d-flex mb-0">
								<li class="hasIcon">
									<a href="javascript:void(0);">
										<i class="ei_icon_lock icn"><span class="sr-only">icon</span></i>
										<span class="d-none d-md-block">Login</span>
									</a>
								</li>
								<li class="d-none d-md-block">
									<a href="javascript:void(0);">Register</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="headerFixer">
				<div class="container relativeSm">
					<!-- pageHeaderHolder -->
					<div class="pageHeaderHolder pageHeaderHolder02 rounded text-white clearfix relativeSm relativeMd">
						<!-- logo -->
						<div class="logo alignleft">
							<a href="home.html">
								<img src="images/logoWhite.png" alt="kitzen">
							</a>
						</div>
						<!-- pageNavHolder -->
						<div class="pageNavHolder alignright d-flex justify-content-end align-items-md-start">
							<!-- topBarSearchFormOpener -->
							<a class="topBarSearchFormOpener topBarSearchFormOpener02 d-flex d-md-none align-items-center justify-content-center flex-shrink-0" data-toggle="collapse" href="#searhFormCollpase" role="button" aria-expanded="false" aria-controls="searhFormCollpase">
								<i class="fas fa-search"><span class="sr-only">icon</span></i>
							</a>
							<!-- pageNavBtnCart -->
							<a href="javascript:void(0);" class="pageNavBtnCart pageNavBtnCart02 text-center d-flex d-lg-inline align-items-center justify-content-center flex-shrink-0 position-relative order-lg-2">
								<i class="ei_icon_cart"><span class="sr-only">icon</span></i>
							</a>
							<!-- pageNav navbar -->
							<nav id="pageNav" class="navbar navbar-expand-lg order-lg-1">
								<!-- pageMainNavOpener -->
								<button class="navbar-toggler pageMainNavOpener pageMainNavOpener02" type="button" data-toggle="collapse" data-target="#pageMainNavCollapse" aria-controls="pageMainNavCollapse" aria-expanded="false" aria-label="Toggle navigation">
									<span class="navbar-toggler-icon"></span>
								</button>
								<!-- mainNavCollapse navbar collapse -->
								<div class="collapse navbar-collapse mainNavCollapse mainNavCollapse02" id="pageMainNavCollapse">
									<!-- pageMainNavigation navbar nav -->
									<ul class="navbar-nav pageMainNavigation pageMainNavigation02 justify-content-md-end">
										<li class="nav-item active dropdown">
											<a class="nav-link fwMedium text-uppercase dropdown-toggle" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Home <span class="sr-only">(current)</span></a>
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
											<a class="nav-link fwMedium text-uppercase dropdown-toggle" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Project</a>
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
											<a class="nav-link fwMedium text-uppercase dropdown-toggle" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Page</a>
											<!-- mainNavDropdown dropdown menu -->
											<div class="dropdown-menu mainNavDropdown text-uppercase">
												<!-- navDropdownList -->
												<ul class="list-unstyled navDropdownList">
													<li>
														<a class="dropdown-item" href="aboutus.html">About Us</a>
													</li>
													<!-- dropdown submenu -->
													<li class="dropdown-submenu">
														<a class="dropdown-item dropdown-toggle" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Gallery</a>
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
														<a class="dropdown-item dropdown-toggle" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Our Services</a>
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
											<a class="nav-link fwMedium text-uppercase dropdown-toggle" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
											<a class="nav-link fwMedium text-uppercase dropdown-toggle" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Blog</a>
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
											<a class="nav-link fwMedium text-uppercase dropdown-toggle" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Contact</a>
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
			<section class="bannerSliderBlock bsbOffsetTop bannerSliderBlock02 bannerSlider w-100 slickSlider text-center text-white">
				<!-- bannerSliderSlide -->
				<div class="bannerSliderSlide">
					<!-- bannerSlideHolder -->
					<div class="container bannerSlideHolder bannerSlideHolder02 position-relative">
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
					<div class="container bannerSlideHolder bannerSlideHolder02 position-relative">
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
					<div class="container bannerSlideHolder bannerSlideHolder02 position-relative">
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
			<!-- wcuBlock -->
			<section class="wcuBlock contentBlock">
				<div class="container">
					<div class="row wow fadeInUp" data-wow-delay="0.1s">
						<div class="col-12 col-md-7 order-md-2">
							<div class="extraWrap pl-xl-5">
								<!-- headingHead -->
								<header class="headingHead">
									<!-- blockH -->
									<h2 class="text-uppercase blockH font-weight-bold">
										<!-- hTitle -->
										<strong class="font-weight-normal hTitle d-block fontBase">Benefit</strong>
										<span class="d-block">Why Choose Us</span>
									</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temp incididunt ut labore et dolore magna aliqua.</p>
								</header>
								<!-- yoeListing -->
								<ul class="list-unstyled yoeListing">
									<li class="hasOver">
										<!-- titleWrap -->
										<div class="titleWrap d-flex align-items-center">
											<i class="ti-ruler-pencil d-block icn flex-shrink-0"><span class="sr-only">icon</span></i>
											<h3>Year Of Experience</h3>
										</div>
										<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat.</p>
									</li>
									<li class="hasOver">
										<!-- titleWrap -->
										<div class="titleWrap d-flex align-items-center">
											<i class="ti-alarm-clock d-block icn flex-shrink-0"><span class="sr-only">icon</span></i>
											<h3>Optimized For Leads</h3>
										</div>
										<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit.</p>
									</li>
									<li class="hasOver">
										<!-- titleWrap -->
										<div class="titleWrap d-flex align-items-center">
											<i class="ti-reload d-block icn flex-shrink-0"><span class="sr-only">icon</span></i>
											<h3>Easy to Update</h3>
										</div>
										<p>Nemo enim ipsam voluptatem quia voluptas sit pernatur aut odit aut fugit.</p>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-12 d-none d-md-block col-md-5 order-md-1">
							<!-- wcuBlockImageHolder -->
							<div class="wcuBlockImageHolder bgCover d-flex w-100 h-100 rounded" style="background-image: url(http://placehold.it/470x540);">
								<img class="rounded" src="http://placehold.it/470x540" alt="image description">
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- mkCallAside -->
			<aside class="mkCallAside position-relative text-center text-md-left text-white" data-parallax="scroll" data-image-src="http://placehold.it/1920x870">
				<div class="container mkCallAsideHolder position-relative wow fadeInUp" data-wow-delay="0.1s">
					<div class="align">
						<div class="row align-items-md-center">
							<div class="col-12 col-md-8">
								<h2 class="text-uppercase font-weight-bold">Making Beautiful Our Kitchen</h2>
								<p>Quality is what we pursue, We know what we do</p>
							</div>
							<div class="col-12 col-md-4 text-md-right">
								<a href="tel:+&#049;&#050;&#051;&#052;&#053;&#054;&#055;&#056;&#057;" class="btn btnTheme btnThemeWhiteInverse fontRoboto btnRoudedLarge" data-hover="+123.456.789">
									<span class="btnText d-block">
										<i class="ei_icon_phone btnIcn"><span class="sr-only">icon</span></i>
										<span>+123.456.789</span>
									</span>
								</a>
							</div>
						</div>
					</div>
				</div>
			</aside>
			<!-- servicesBlock -->
			<section class="contentBlock servicesBlock">
				<div class="container">
					<div class="row">
						<div class="col-12 offset-md-1 col-md-10 offset-lg-2 col-lg-8 offset-xl-3 col-xl-6">
							<!-- headingHead -->
							<header class="headingHead text-center wow fadeInUp" data-wow-delay="0.1s">
								<!-- blockH -->
								<h2 class="text-uppercase blockH font-weight-bold">
									<!-- hTitle -->
									<strong class="font-weight-normal hTitle d-block fontBase">Services</strong>
									<span class="d-block">What We Do</span>
								</h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eius tempor incididunt ut labore et dolore. </p>
							</header>
						</div>
					</div>
					<!-- wwdTabsetAreaWrap -->
					<div class="wwdTabsetAreaWrap position-relative">
						<!-- mdTabsToAccordion -->
						<div class="mdTabsToAccordion wow fadeInUp" data-wow-delay="0.1s">
							<!-- wwdTabsetList -->
							<ul class="nav nav-tabs d-none d-lg-flex wwdTabsetList text-center" role="tablist">
								<li class="nav-item d-flex">
									<a class="nav-link d-flex align-items-center justify-content-center" id="ddt-tab" data-toggle="tab" href="#ddt" role="tab" aria-controls="ddt" aria-selected="true">Design &amp; Drawings</a>
								</li>
								<li class="nav-item d-flex">
									<a class="nav-link d-flex align-items-center justify-content-center active" id="rdt-tab" data-toggle="tab" href="#rdt" role="tab" aria-controls="rdt" aria-selected="false">Rebuild Design</a>
								</li>
								<li class="nav-item d-flex">
									<a class="nav-link d-flex align-items-center justify-content-center" id="cdt-tab" data-toggle="tab" href="#cdt" role="tab" aria-controls="cdt" aria-selected="false">Custom Design</a>
								</li>
								<li class="nav-item d-flex">
									<a class="nav-link d-flex align-items-center justify-content-center" id="kdt-tab" data-toggle="tab" href="#kdt" role="tab" aria-controls="kdt" aria-selected="false">Kitchen Design</a>
								</li>
								<li class="nav-item d-flex">
									<a class="nav-link d-flex align-items-center justify-content-center" id="it-tab" data-toggle="tab" href="#it" role="tab" aria-controls="it" aria-selected="false">Installation</a>
								</li>
								<li class="nav-item d-flex">
									<a class="nav-link d-flex align-items-center justify-content-center" id="fdt-tab" data-toggle="tab" href="#fdt" role="tab" aria-controls="fdt" aria-selected="false">Fast Delivery</a>
								</li>
							</ul>
							<!-- tab content accordion -->
							<div class="tab-content accordion" id="accordion01">
								<!-- ddt tab -->
								<div class="tab-pane fade" id="ddt" role="tabpanel" aria-labelledby="ddt-tab">
									<!-- tabHolderWrap -->
									<div class="tabHolderWrap">
										<!-- accOpener -->
										<button class="accOpener text-left w-100 d-block position-relative d-lg-none" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">Design &amp; Drawings</button>
										<!-- collapseOne -->
										<div id="collapseOne" class="collapse tabsToAccordionSlide" data-parent="#accordion01">
											<!-- accSlideHolder -->
											<div class="accSlideHolder">
												<div class="row">
													<div class="col-12 col-lg-6 order-lg-1 pt-lg-2 mb-5 mb-lg-0">
														<h3>Rebuild Design</h3>
														<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore.</p>
														<a href="javascript:void(0);" class="btnMore d-inline-block">Details <i class="icn ei_arrow_right"><span class="sr-only">icon</span></i></a>
													</div>
													<div class="col-12 col-lg-6 order-lg-2">
														<!-- imageWrap -->
														<div class="alignright imageWrap rounded text-center">
															<img class="rounded" src="http://placehold.it/440x300" alt="image description">
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- rdt tab -->
								<div class="tab-pane fade show active" id="rdt" role="tabpanel" aria-labelledby="rdt-tab">
									<!-- tabHolderWrap -->
									<div class="tabHolderWrap">
										<!-- accOpener -->
										<button class="accOpener text-left w-100 d-block position-relative d-lg-none" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="ture" aria-controls="collapseTwo">Rebuild Design</button>
										<!-- collapseTwo -->
										<div id="collapseTwo" class="collapse show tabsToAccordionSlide" data-parent="#accordion01">
											<!-- accSlideHolder -->
											<div class="accSlideHolder">
												<div class="row">
													<div class="col-12 col-lg-6 order-lg-1 pt-lg-2 mb-5 mb-lg-0">
														<h3>Rebuild Design</h3>
														<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
														<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore.</p>
														<a href="javascript:void(0);" class="btnMore d-inline-block">Details <i class="icn ei_arrow_right"><span class="sr-only">icon</span></i></a>
													</div>
													<div class="col-12 col-lg-6 order-lg-2">
														<!-- imageWrap -->
														<div class="alignright imageWrap rounded text-center">
															<img class="rounded" src="http://placehold.it/440x300" alt="image description">
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- cdt tab -->
								<div class="tab-pane fade" id="cdt" role="tabpanel" aria-labelledby="cdt-tab">
									<!-- tabHolderWrap -->
									<div class="tabHolderWrap">
										<!-- accOpener -->
										<button class="accOpener text-left w-100 d-block position-relative d-lg-none" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Custom Design</button>
										<!-- collapseThree -->
										<div id="collapseThree" class="collapse tabsToAccordionSlide" data-parent="#accordion01">
											<!-- accSlideHolder -->
											<div class="accSlideHolder">
												<div class="row">
													<div class="col-12 col-lg-6 order-lg-1 pt-lg-2 mb-5 mb-lg-0">
														<h3>Rebuild Design</h3>
														<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore.</p>
														<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.</p>
														<a href="javascript:void(0);" class="btnMore d-inline-block">Details <i class="icn ei_arrow_right"><span class="sr-only">icon</span></i></a>
													</div>
													<div class="col-12 col-lg-6 order-lg-2">
														<!-- imageWrap -->
														<div class="alignright imageWrap rounded text-center">
															<img class="rounded" src="http://placehold.it/440x300" alt="image description">
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- kdt tab -->
								<div class="tab-pane fade" id="kdt" role="tabpanel" aria-labelledby="kdt-tab">
									<!-- tabHolderWrap -->
									<div class="tabHolderWrap">
										<!-- accOpener -->
										<button class="accOpener text-left w-100 d-block position-relative d-lg-none" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">Kitchen Design</button>
										<!-- collapseFour -->
										<div id="collapseFour" class="collapse tabsToAccordionSlide" data-parent="#accordion01">
											<!-- accSlideHolder -->
											<div class="accSlideHolder">
												<div class="row">
													<div class="col-12">
														<h3>Rebuild Design</h3>
														<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore.</p>
														<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore.</p>
														<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore.</p>
														<a href="javascript:void(0);" class="btnMore d-inline-block">Details <i class="icn ei_arrow_right"><span class="sr-only">icon</span></i></a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- it tab -->
								<div class="tab-pane fade" id="it" role="tabpanel" aria-labelledby="it-tab">
									<!-- tabHolderWrap -->
									<div class="tabHolderWrap">
										<!-- accOpener -->
										<button class="accOpener text-left w-100 d-block position-relative d-lg-none" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">Installation</button>
										<!-- collapseFive -->
										<div id="collapseFive" class="collapse tabsToAccordionSlide" data-parent="#accordion01">
											<!-- accSlideHolder -->
											<div class="accSlideHolder">
												<div class="row">
													<div class="col-12 col-lg-6 order-lg-1 pt-lg-2 mb-5 mb-lg-0">
														<h3>Rebuild Design</h3>
														<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore.</p>
														<p>Totam rem aperiam, eaque ipsa quae ab illo inventore.</p>
														<a href="javascript:void(0);" class="btnMore d-inline-block">Details <i class="icn ei_arrow_right"><span class="sr-only">icon</span></i></a>
													</div>
													<div class="col-12 col-lg-6 order-lg-2">
														<!-- imageWrap -->
														<div class="alignright imageWrap rounded text-center">
															<img class="rounded" src="http://placehold.it/440x300" alt="image description">
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- fdt tab -->
								<div class="tab-pane fade" id="fdt" role="tabpanel" aria-labelledby="fdt-tab">
									<!-- tabHolderWrap -->
									<div class="tabHolderWrap">
										<!-- accOpener -->
										<button class="accOpener text-left w-100 d-block position-relative d-lg-none" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">Fast Delivery</button>
										<!-- collapseSix -->
										<div id="collapseSix" class="collapse tabsToAccordionSlide" data-parent="#accordion01">
											<!-- accSlideHolder -->
											<div class="accSlideHolder">
												<div class="row">
													<div class="col-12 col-lg-6 order-lg-1 pt-lg-2 mb-5 mb-lg-0">
														<h3>Rebuild Design</h3>
														<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore.</p>
														<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem, totam rem aperiam, eaque ipsa quae ab illo inventore.</p>
														<a href="javascript:void(0);" class="btnMore d-inline-block">Details <i class="icn ei_arrow_right"><span class="sr-only">icon</span></i></a>
													</div>
													<div class="col-12 col-lg-6 order-lg-2">
														<!-- imageWrap -->
														<div class="alignright imageWrap rounded text-center">
															<img class="rounded" src="http://placehold.it/440x300" alt="image description">
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- videoAside -->
			<aside class="videoAside position-relative hasOver overlayThemeColor" data-parallax="scroll" data-image-src="http://placehold.it/1920x460">
				<!-- videoBlockWrap -->
				<a data-fancybox="true" href="https://www.youtube.com/watch?v=_sI_Ps7JSEk" class="videoBlockWrap lightbox overlayThemeColor w-100">
					<!-- btnPlay -->
					<span class="btnPlay btnPlay02 fas fa-play-circle text-white position-absolute rounded-circle d-flex align-items-center justify-content-center">
						<span class="sr-only">play</span>
					</span>
				</a>
			</aside>
			<!-- clientsTestimonialBlock -->
			<section class="clientsTestimonialBlock text-center position-relative contentBlock">
				<div class="container">
					<div class="row wow fadeInUp" data-wow-delay="0.1s">
						<div class="col-12 offset-lg-2 col-lg-8">
							<!-- headingHead -->
							<header class="headingHead">
								<!-- blockH -->
								<h2 class="text-uppercase blockH font-weight-bold mb-0">
									<!-- hTitle -->
									<strong class="font-weight-normal hTitle d-block fontBase">Testimonials</strong>
									<span class="d-block">Happy Clients</span>
								</h2>
							</header>
							<!-- testimonialSingleSlider02 -->
							<div class="testimonialSingleSlider02 slickSlider">
								<div>
									<!-- clientQuote -->
									<blockquote class="clientQuote clientQuote02 mb-0">
										<q class="d-block">My order arrived today, as per your e-mail. Thanks to you and everyone at Utility Design for such great service, prices and choice. Good luck with your business.</q>
										<!-- cite -->
										<cite class="wrap d-block">
											<strong class="h3 d-block text-capitalize"><a href="javascript:void(0);">John Martin</a></strong>
											<em class="h5 d-block font-weight-normal">Ceo-Deercreative</em>
										</cite>
									</blockquote>
								</div>
								<div>
									<!-- clientQuote -->
									<blockquote class="clientQuote clientQuote02 mb-0">
										<q class="d-block">My order arrived today, as per your e-mail. Thanks to you and everyone at Utility Design for such great service, prices and choice. Good luck with your business.</q>
										<!-- cite -->
										<cite class="wrap d-block">
											<strong class="h3 d-block text-capitalize"><a href="javascript:void(0);">John Martin</a></strong>
											<em class="h5 d-block font-weight-normal">Deercreative</em>
										</cite>
									</blockquote>
								</div>
								<div>
									<!-- clientQuote -->
									<blockquote class="clientQuote clientQuote02 mb-0">
										<q class="d-block">My order arrived today, as per your e-mail. Thanks to you and everyone at Utility Design for such great service, prices and choice. Good luck with your business.</q>
										<!-- cite -->
										<cite class="wrap d-block">
											<strong class="h3 d-block text-capitalize"><a href="javascript:void(0);">John</a></strong>
											<em class="h5 d-block font-weight-normal">Ceo</em>
										</cite>
									</blockquote>
								</div>
								<div>
									<!-- clientQuote -->
									<blockquote class="clientQuote clientQuote02 mb-0">
										<q class="d-block">My order arrived today, as per your e-mail. Thanks to you and everyone at Utility Design for such great service, prices and choice</q>
										<!-- cite -->
										<cite class="wrap d-block">
											<strong class="h3 d-block text-capitalize"><a href="javascript:void(0);">Dig</a></strong>
											<em class="h5 d-block font-weight-normal">Ceo</em>
										</cite>
									</blockquote>
								</div>
							</div>
							<!-- testimonialSwitcherSlider02 -->
							<div class="testimonialSwitcherSlider02 slickSlider mx-auto">
								<div>
									<!-- testimonialSwitcherPicWrap -->
									<div class="rounded-circle testimonialSwitcherPicWrap testimonialSwitcherPicWrap02 position-relative">
										<img class="w-100 h-100 d-block rounded-circle" src="http://placehold.it/55x55" alt="John Martin Ceo-Deercreative">
									</div>
								</div>
								<div>
									<!-- testimonialSwitcherPicWrap -->
									<div class="rounded-circle testimonialSwitcherPicWrap testimonialSwitcherPicWrap02 position-relative">
										<img class="w-100 h-100 d-block rounded-circle" src="http://placehold.it/55x55" alt="John Martin Ceo-Deercreative">
									</div>
								</div>
								<div>
									<!-- testimonialSwitcherPicWrap -->
									<div class="rounded-circle testimonialSwitcherPicWrap testimonialSwitcherPicWrap02 position-relative">
										<img class="w-100 h-100 d-block rounded-circle" src="http://placehold.it/55x55" alt="John Martin Ceo-Deercreative">
									</div>
								</div>
								<div>
									<!-- testimonialSwitcherPicWrap -->
									<div class="rounded-circle testimonialSwitcherPicWrap testimonialSwitcherPicWrap02 position-relative">
										<img class="w-100 h-100 d-block rounded-circle" src="http://placehold.it/55x55" alt="John Martin Ceo-Deercreative">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- prejectsListingBlock -->
			<section class="contentBlock prejectsListingBlock prejectsListingBlock02 position-relative pb-0">
				<div class="container">
					<div class="row">
						<div class="col-12 wow fadeInUp" data-wow-delay="0.1s">
							<!-- headingHead -->
							<header class="headingHead text-center">
								<!-- blockH -->
								<h2 class="text-uppercase blockH font-weight-bold mb-0">
									<!-- hTitle -->
									<strong class="font-weight-normal hTitle d-block fontBase">Project</strong>
									<span class="d-block">Our Work</span>
								</h2>
							</header>
							<!-- filtersNavTabs -->
							<ul class="nav nav-tabs filtersNavTabs justify-content-md-center text-capitalize" id="filtersTab" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="all-tab" data-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="true">View All</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="vintage-tab" data-toggle="tab" href="#vintage" role="tab" aria-controls="vintage" aria-selected="false">Vintage</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="morden-tab" data-toggle="tab" href="#morden" role="tab" aria-controls="morden" aria-selected="false">Morden</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="minimal-tab" data-toggle="tab" href="#minimal" role="tab" aria-controls="minimal" aria-selected="false">Minimal</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="coastal-tab" data-toggle="tab" href="#coastal" role="tab" aria-controls="coastal" aria-selected="false">Coastal</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- filtersTabContentWrap -->
				<div class="tab-content filtersTabContentWrap position-relative wow fadeInUp" data-wow-delay="0.1s" id="filtersTabContent">
					<!-- all tab -->
					<div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
						<div class="row d-block">
							<!-- prPostsSlider -->
							<div class="prPostsSlider prPostsSlider02 slickSlider">
								<div>
									<div class="col-12">
										<!-- prPostColumn -->
										<article class="prPostColumn prPostColumn02 hasOver position-relative">
											<!-- prColumnBgCover -->
											<span class="bgCover prColumnBgCover d-block" style="background-image: url(http://placehold.it/360x500);">
												<img class="sr-only" src="http://placehold.it/360x500" alt="image description">
											</span>
											<!-- prPostCaption -->
											<div class="prPostCaption bg-white rounded">
												<h3>
													<!-- hTitle -->
													<strong class="font-weight-normal hTitle d-block fontBase">Coastal</strong>
													<span class="d-block"><a href="project-details.html">Kitchen furniture for you.</a></span>
												</h3>
											</div>
										</article>
									</div>
								</div>
								<div>
									<div class="col-12">
										<!-- prPostColumn -->
										<article class="prPostColumn prPostColumn02 hasOver position-relative">
											<!-- prColumnBgCover -->
											<span class="bgCover prColumnBgCover d-block" style="background-image: url(http://placehold.it/360x500);">
												<img class="sr-only" src="http://placehold.it/360x500" alt="image description">
											</span>
											<!-- prPostCaption -->
											<div class="prPostCaption bg-white rounded">
												<h3>
													<!-- hTitle -->
													<strong class="font-weight-normal hTitle d-block fontBase">Vintage</strong>
													<span class="d-block"><a href="project-details.html">Kitchen furniture for you.</a></span>
												</h3>
											</div>
										</article>
									</div>
								</div>
								<div>
									<div class="col-12">
										<!-- prPostColumn -->
										<article class="prPostColumn prPostColumn02 hasOver position-relative">
											<!-- prColumnBgCover -->
											<span class="bgCover prColumnBgCover d-block" style="background-image: url(http://placehold.it/360x500);">
												<img class="sr-only" src="http://placehold.it/360x500" alt="image description">
											</span>
											<!-- prPostCaption -->
											<div class="prPostCaption bg-white rounded">
												<h3>
													<!-- hTitle -->
													<strong class="font-weight-normal hTitle d-block fontBase">Vintage</strong>
													<span class="d-block"><a href="project-details.html">Kitchen furniture for you.</a></span>
												</h3>
											</div>
										</article>
									</div>
								</div>
								<div>
									<div class="col-12">
										<!-- prPostColumn -->
										<article class="prPostColumn prPostColumn02 hasOver position-relative">
											<!-- prColumnBgCover -->
											<span class="bgCover prColumnBgCover d-block" style="background-image: url(http://placehold.it/360x500);">
												<img class="sr-only" src="http://placehold.it/360x500" alt="image description">
											</span>
											<!-- prPostCaption -->
											<div class="prPostCaption bg-white rounded">
												<h3>
													<!-- hTitle -->
													<strong class="font-weight-normal hTitle d-block fontBase">Minimal</strong>
													<span class="d-block"><a href="project-details.html">Kitchen furniture for you.</a></span>
												</h3>
											</div>
										</article>
									</div>
								</div>
								<div>
									<div class="col-12">
										<!-- prPostColumn -->
										<article class="prPostColumn prPostColumn02 hasOver position-relative">
											<!-- prColumnBgCover -->
											<span class="bgCover prColumnBgCover d-block" style="background-image: url(http://placehold.it/360x500);">
												<img class="sr-only" src="http://placehold.it/360x500" alt="image description">
											</span>
											<!-- prPostCaption -->
											<div class="prPostCaption bg-white rounded">
												<h3>
													<!-- hTitle -->
													<strong class="font-weight-normal hTitle d-block fontBase">Morden</strong>
													<span class="d-block"><a href="project-details.html">Kitchen furniture for you.</a></span>
												</h3>
											</div>
										</article>
									</div>
								</div>
								<div>
									<div class="col-12">
										<!-- prPostColumn -->
										<article class="prPostColumn prPostColumn02 hasOver position-relative">
											<!-- prColumnBgCover -->
											<span class="bgCover prColumnBgCover d-block" style="background-image: url(http://placehold.it/360x500);">
												<img class="sr-only" src="http://placehold.it/360x500" alt="image description">
											</span>
											<!-- prPostCaption -->
											<div class="prPostCaption bg-white rounded">
												<h3>
													<!-- hTitle -->
													<strong class="font-weight-normal hTitle d-block fontBase">Morden</strong>
													<span class="d-block"><a href="project-details.html">Kitchen furniture for you.</a></span>
												</h3>
											</div>
										</article>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- vintage tab -->
					<div class="tab-pane fade" id="vintage" role="tabpanel" aria-labelledby="vintage-tab">
						<div class="row d-block">
							<!-- prPostsSlider -->
							<div class="prPostsSlider prPostsSlider02 slickSlider">
								<div>
									<div class="col-12">
										<!-- prPostColumn -->
										<article class="prPostColumn prPostColumn02 hasOver position-relative">
											<!-- prColumnBgCover -->
											<span class="bgCover prColumnBgCover d-block" style="background-image: url(http://placehold.it/360x500);">
												<img class="sr-only" src="http://placehold.it/360x500" alt="image description">
											</span>
											<!-- prPostCaption -->
											<div class="prPostCaption bg-white rounded">
												<h3>
													<!-- hTitle -->
													<strong class="font-weight-normal hTitle d-block fontBase">Minimal</strong>
													<span class="d-block"><a href="project-details.html">Kitchen furniture for you.</a></span>
												</h3>
											</div>
										</article>
									</div>
								</div>
								<div>
									<div class="col-12">
										<!-- prPostColumn -->
										<article class="prPostColumn prPostColumn02 hasOver position-relative">
											<!-- prColumnBgCover -->
											<span class="bgCover prColumnBgCover d-block" style="background-image: url(http://placehold.it/360x500);">
												<img class="sr-only" src="http://placehold.it/360x500" alt="image description">
											</span>
											<!-- prPostCaption -->
											<div class="prPostCaption bg-white rounded">
												<h3>
													<!-- hTitle -->
													<strong class="font-weight-normal hTitle d-block fontBase">Morden</strong>
													<span class="d-block"><a href="project-details.html">Kitchen furniture for you.</a></span>
												</h3>
											</div>
										</article>
									</div>
								</div>
								<div>
									<div class="col-12">
										<!-- prPostColumn -->
										<article class="prPostColumn prPostColumn02 hasOver position-relative">
											<!-- prColumnBgCover -->
											<span class="bgCover prColumnBgCover d-block" style="background-image: url(http://placehold.it/360x500);">
												<img class="sr-only" src="http://placehold.it/360x500" alt="image description">
											</span>
											<!-- prPostCaption -->
											<div class="prPostCaption bg-white rounded">
												<h3>
													<!-- hTitle -->
													<strong class="font-weight-normal hTitle d-block fontBase">Morden</strong>
													<span class="d-block"><a href="project-details.html">Kitchen furniture for you.</a></span>
												</h3>
											</div>
										</article>
									</div>
								</div>
								<div>
									<div class="col-12">
										<!-- prPostColumn -->
										<article class="prPostColumn prPostColumn02 hasOver position-relative">
											<!-- prColumnBgCover -->
											<span class="bgCover prColumnBgCover d-block" style="background-image: url(http://placehold.it/360x500);">
												<img class="sr-only" src="http://placehold.it/360x500" alt="image description">
											</span>
											<!-- prPostCaption -->
											<div class="prPostCaption bg-white rounded">
												<h3>
													<!-- hTitle -->
													<strong class="font-weight-normal hTitle d-block fontBase">Coastal</strong>
													<span class="d-block"><a href="project-details.html">Kitchen furniture for you.</a></span>
												</h3>
											</div>
										</article>
									</div>
								</div>
								<div>
									<div class="col-12">
										<!-- prPostColumn -->
										<article class="prPostColumn prPostColumn02 hasOver position-relative">
											<!-- prColumnBgCover -->
											<span class="bgCover prColumnBgCover d-block" style="background-image: url(http://placehold.it/360x500);">
												<img class="sr-only" src="http://placehold.it/360x500" alt="image description">
											</span>
											<!-- prPostCaption -->
											<div class="prPostCaption bg-white rounded">
												<h3>
													<!-- hTitle -->
													<strong class="font-weight-normal hTitle d-block fontBase">Vintage</strong>
													<span class="d-block"><a href="project-details.html">Kitchen furniture for you.</a></span>
												</h3>
											</div>
										</article>
									</div>
								</div>
								<div>
									<div class="col-12">
										<!-- prPostColumn -->
										<article class="prPostColumn prPostColumn02 hasOver position-relative">
											<!-- prColumnBgCover -->
											<span class="bgCover prColumnBgCover d-block" style="background-image: url(http://placehold.it/360x500);">
												<img class="sr-only" src="http://placehold.it/360x500" alt="image description">
											</span>
											<!-- prPostCaption -->
											<div class="prPostCaption bg-white rounded">
												<h3>
													<!-- hTitle -->
													<strong class="font-weight-normal hTitle d-block fontBase">Vintage</strong>
													<span class="d-block"><a href="project-details.html">Kitchen furniture for you.</a></span>
												</h3>
											</div>
										</article>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- morden tab -->
					<div class="tab-pane fade" id="morden" role="tabpanel" aria-labelledby="morden-tab">
						<div class="row d-block">
							<!-- prPostsSlider -->
							<div class="prPostsSlider prPostsSlider02 slickSlider">
								<div>
									<div class="col-12">
										<!-- prPostColumn -->
										<article class="prPostColumn prPostColumn02 hasOver position-relative">
											<!-- prColumnBgCover -->
											<span class="bgCover prColumnBgCover d-block" style="background-image: url(http://placehold.it/360x500);">
												<img class="sr-only" src="http://placehold.it/360x500" alt="image description">
											</span>
											<!-- prPostCaption -->
											<div class="prPostCaption bg-white rounded">
												<h3>
													<!-- hTitle -->
													<strong class="font-weight-normal hTitle d-block fontBase">Vintage</strong>
													<span class="d-block"><a href="project-details.html">Kitchen furniture for you.</a></span>
												</h3>
											</div>
										</article>
									</div>
								</div>
								<div>
									<div class="col-12">
										<!-- prPostColumn -->
										<article class="prPostColumn prPostColumn02 hasOver position-relative">
											<!-- prColumnBgCover -->
											<span class="bgCover prColumnBgCover d-block" style="background-image: url(http://placehold.it/360x500);">
												<img class="sr-only" src="http://placehold.it/360x500" alt="image description">
											</span>
											<!-- prPostCaption -->
											<div class="prPostCaption bg-white rounded">
												<h3>
													<!-- hTitle -->
													<strong class="font-weight-normal hTitle d-block fontBase">Vintage</strong>
													<span class="d-block"><a href="project-details.html">Kitchen furniture for you.</a></span>
												</h3>
											</div>
										</article>
									</div>
								</div>
								<div>
									<div class="col-12">
										<!-- prPostColumn -->
										<article class="prPostColumn prPostColumn02 hasOver position-relative">
											<!-- prColumnBgCover -->
											<span class="bgCover prColumnBgCover d-block" style="background-image: url(http://placehold.it/360x500);">
												<img class="sr-only" src="http://placehold.it/360x500" alt="image description">
											</span>
											<!-- prPostCaption -->
											<div class="prPostCaption bg-white rounded">
												<h3>
													<!-- hTitle -->
													<strong class="font-weight-normal hTitle d-block fontBase">Minimal</strong>
													<span class="d-block"><a href="project-details.html">Kitchen furniture for you.</a></span>
												</h3>
											</div>
										</article>
									</div>
								</div>
								<div>
									<div class="col-12">
										<!-- prPostColumn -->
										<article class="prPostColumn prPostColumn02 hasOver position-relative">
											<!-- prColumnBgCover -->
											<span class="bgCover prColumnBgCover d-block" style="background-image: url(http://placehold.it/360x500);">
												<img class="sr-only" src="http://placehold.it/360x500" alt="image description">
											</span>
											<!-- prPostCaption -->
											<div class="prPostCaption bg-white rounded">
												<h3>
													<!-- hTitle -->
													<strong class="font-weight-normal hTitle d-block fontBase">Coastal</strong>
													<span class="d-block"><a href="project-details.html">Kitchen furniture for you.</a></span>
												</h3>
											</div>
										</article>
									</div>
								</div>
								<div>
									<div class="col-12">
										<!-- prPostColumn -->
										<article class="prPostColumn prPostColumn02 hasOver position-relative">
											<!-- prColumnBgCover -->
											<span class="bgCover prColumnBgCover d-block" style="background-image: url(http://placehold.it/360x500);">
												<img class="sr-only" src="http://placehold.it/360x500" alt="image description">
											</span>
											<!-- prPostCaption -->
											<div class="prPostCaption bg-white rounded">
												<h3>
													<!-- hTitle -->
													<strong class="font-weight-normal hTitle d-block fontBase">Morden</strong>
													<span class="d-block"><a href="project-details.html">Kitchen furniture for you.</a></span>
												</h3>
											</div>
										</article>
									</div>
								</div>
								<div>
									<div class="col-12">
										<!-- prPostColumn -->
										<article class="prPostColumn prPostColumn02 hasOver position-relative">
											<!-- prColumnBgCover -->
											<span class="bgCover prColumnBgCover d-block" style="background-image: url(http://placehold.it/360x500);">
												<img class="sr-only" src="http://placehold.it/360x500" alt="image description">
											</span>
											<!-- prPostCaption -->
											<div class="prPostCaption bg-white rounded">
												<h3>
													<!-- hTitle -->
													<strong class="font-weight-normal hTitle d-block fontBase">Morden</strong>
													<span class="d-block"><a href="project-details.html">Kitchen furniture for you.</a></span>
												</h3>
											</div>
										</article>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- minimal tab -->
					<div class="tab-pane fade" id="minimal" role="tabpanel" aria-labelledby="minimal-tab">
						<div class="row d-block">
							<!-- prPostsSlider -->
							<div class="prPostsSlider prPostsSlider02 slickSlider">
								<div>
									<div class="col-12">
										<!-- prPostColumn -->
										<article class="prPostColumn prPostColumn02 hasOver position-relative">
											<!-- prColumnBgCover -->
											<span class="bgCover prColumnBgCover d-block" style="background-image: url(http://placehold.it/360x500);">
												<img class="sr-only" src="http://placehold.it/360x500" alt="image description">
											</span>
											<!-- prPostCaption -->
											<div class="prPostCaption bg-white rounded">
												<h3>
													<!-- hTitle -->
													<strong class="font-weight-normal hTitle d-block fontBase">Minimal</strong>
													<span class="d-block"><a href="project-details.html">Kitchen furniture for you.</a></span>
												</h3>
											</div>
										</article>
									</div>
								</div>
								<div>
									<div class="col-12">
										<!-- prPostColumn -->
										<article class="prPostColumn prPostColumn02 hasOver position-relative">
											<!-- prColumnBgCover -->
											<span class="bgCover prColumnBgCover d-block" style="background-image: url(http://placehold.it/360x500);">
												<img class="sr-only" src="http://placehold.it/360x500" alt="image description">
											</span>
											<!-- prPostCaption -->
											<div class="prPostCaption bg-white rounded">
												<h3>
													<!-- hTitle -->
													<strong class="font-weight-normal hTitle d-block fontBase">Morden</strong>
													<span class="d-block"><a href="project-details.html">Kitchen furniture for you.</a></span>
												</h3>
											</div>
										</article>
									</div>
								</div>
								<div>
									<div class="col-12">
										<!-- prPostColumn -->
										<article class="prPostColumn prPostColumn02 hasOver position-relative">
											<!-- prColumnBgCover -->
											<span class="bgCover prColumnBgCover d-block" style="background-image: url(http://placehold.it/360x500);">
												<img class="sr-only" src="http://placehold.it/360x500" alt="image description">
											</span>
											<!-- prPostCaption -->
											<div class="prPostCaption bg-white rounded">
												<h3>
													<!-- hTitle -->
													<strong class="font-weight-normal hTitle d-block fontBase">Vintage</strong>
													<span class="d-block"><a href="project-details.html">Kitchen furniture for you.</a></span>
												</h3>
											</div>
										</article>
									</div>
								</div>
								<div>
									<div class="col-12">
										<!-- prPostColumn -->
										<article class="prPostColumn prPostColumn02 hasOver position-relative">
											<!-- prColumnBgCover -->
											<span class="bgCover prColumnBgCover d-block" style="background-image: url(http://placehold.it/360x500);">
												<img class="sr-only" src="http://placehold.it/360x500" alt="image description">
											</span>
											<!-- prPostCaption -->
											<div class="prPostCaption bg-white rounded">
												<h3>
													<!-- hTitle -->
													<strong class="font-weight-normal hTitle d-block fontBase">Morden</strong>
													<span class="d-block"><a href="project-details.html">Kitchen furniture for you.</a></span>
												</h3>
											</div>
										</article>
									</div>
								</div>
								<div>
									<div class="col-12">
										<!-- prPostColumn -->
										<article class="prPostColumn prPostColumn02 hasOver position-relative">
											<!-- prColumnBgCover -->
											<span class="bgCover prColumnBgCover d-block" style="background-image: url(http://placehold.it/360x500);">
												<img class="sr-only" src="http://placehold.it/360x500" alt="image description">
											</span>
											<!-- prPostCaption -->
											<div class="prPostCaption bg-white rounded">
												<h3>
													<!-- hTitle -->
													<strong class="font-weight-normal hTitle d-block fontBase">Coastal</strong>
													<span class="d-block"><a href="project-details.html">Kitchen furniture for you.</a></span>
												</h3>
											</div>
										</article>
									</div>
								</div>
								<div>
									<div class="col-12">
										<!-- prPostColumn -->
										<article class="prPostColumn prPostColumn02 hasOver position-relative">
											<!-- prColumnBgCover -->
											<span class="bgCover prColumnBgCover d-block" style="background-image: url(http://placehold.it/360x500);">
												<img class="sr-only" src="http://placehold.it/360x500" alt="image description">
											</span>
											<!-- prPostCaption -->
											<div class="prPostCaption bg-white rounded">
												<h3>
													<!-- hTitle -->
													<strong class="font-weight-normal hTitle d-block fontBase">Vintage</strong>
													<span class="d-block"><a href="project-details.html">Kitchen furniture for you.</a></span>
												</h3>
											</div>
										</article>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- coastal tab -->
					<div class="tab-pane fade" id="coastal" role="tabpanel" aria-labelledby="coastal-tab">
						<div class="row d-block">
							<!-- prPostsSlider -->
							<div class="prPostsSlider prPostsSlider02 slickSlider">
								<div>
									<div class="col-12">
										<!-- prPostColumn -->
										<article class="prPostColumn prPostColumn02 hasOver position-relative">
											<!-- prColumnBgCover -->
											<span class="bgCover prColumnBgCover d-block" style="background-image: url(http://placehold.it/360x500);">
												<img class="sr-only" src="http://placehold.it/360x500" alt="image description">
											</span>
											<!-- prPostCaption -->
											<div class="prPostCaption bg-white rounded">
												<h3>
													<!-- hTitle -->
													<strong class="font-weight-normal hTitle d-block fontBase">Vintage</strong>
													<span class="d-block"><a href="project-details.html">Kitchen furniture for you.</a></span>
												</h3>
											</div>
										</article>
									</div>
								</div>
								<div>
									<div class="col-12">
										<!-- prPostColumn -->
										<article class="prPostColumn prPostColumn02 hasOver position-relative">
											<!-- prColumnBgCover -->
											<span class="bgCover prColumnBgCover d-block" style="background-image: url(http://placehold.it/360x500);">
												<img class="sr-only" src="http://placehold.it/360x500" alt="image description">
											</span>
											<!-- prPostCaption -->
											<div class="prPostCaption bg-white rounded">
												<h3>
													<!-- hTitle -->
													<strong class="font-weight-normal hTitle d-block fontBase">Coastal</strong>
													<span class="d-block"><a href="project-details.html">Kitchen furniture for you.</a></span>
												</h3>
											</div>
										</article>
									</div>
								</div>
								<div>
									<div class="col-12">
										<!-- prPostColumn -->
										<article class="prPostColumn prPostColumn02 hasOver position-relative">
											<!-- prColumnBgCover -->
											<span class="bgCover prColumnBgCover d-block" style="background-image: url(http://placehold.it/360x500);">
												<img class="sr-only" src="http://placehold.it/360x500" alt="image description">
											</span>
											<!-- prPostCaption -->
											<div class="prPostCaption bg-white rounded">
												<h3>
													<!-- hTitle -->
													<strong class="font-weight-normal hTitle d-block fontBase">Vintage</strong>
													<span class="d-block"><a href="project-details.html">Kitchen furniture for you.</a></span>
												</h3>
											</div>
										</article>
									</div>
								</div>
								<div>
									<div class="col-12">
										<!-- prPostColumn -->
										<article class="prPostColumn prPostColumn02 hasOver position-relative">
											<!-- prColumnBgCover -->
											<span class="bgCover prColumnBgCover d-block" style="background-image: url(http://placehold.it/360x500);">
												<img class="sr-only" src="http://placehold.it/360x500" alt="image description">
											</span>
											<!-- prPostCaption -->
											<div class="prPostCaption bg-white rounded">
												<h3>
													<!-- hTitle -->
													<strong class="font-weight-normal hTitle d-block fontBase">Morden</strong>
													<span class="d-block"><a href="project-details.html">Kitchen furniture for you.</a></span>
												</h3>
											</div>
										</article>
									</div>
								</div>
								<div>
									<div class="col-12">
										<!-- prPostColumn -->
										<article class="prPostColumn prPostColumn02 hasOver position-relative">
											<!-- prColumnBgCover -->
											<span class="bgCover prColumnBgCover d-block" style="background-image: url(http://placehold.it/360x500);">
												<img class="sr-only" src="http://placehold.it/360x500" alt="image description">
											</span>
											<!-- prPostCaption -->
											<div class="prPostCaption bg-white rounded">
												<h3>
													<!-- hTitle -->
													<strong class="font-weight-normal hTitle d-block fontBase">Minimal</strong>
													<span class="d-block"><a href="project-details.html">Kitchen furniture for you.</a></span>
												</h3>
											</div>
										</article>
									</div>
								</div>
								<div>
									<div class="col-12">
										<!-- prPostColumn -->
										<article class="prPostColumn prPostColumn02 hasOver position-relative">
											<!-- prColumnBgCover -->
											<span class="bgCover prColumnBgCover d-block" style="background-image: url(http://placehold.it/360x500);">
												<img class="sr-only" src="http://placehold.it/360x500" alt="image description">
											</span>
											<!-- prPostCaption -->
											<div class="prPostCaption bg-white rounded">
												<h3>
													<!-- hTitle -->
													<strong class="font-weight-normal hTitle d-block fontBase">Morden</strong>
													<span class="d-block"><a href="project-details.html">Kitchen furniture for you.</a></span>
												</h3>
											</div>
										</article>
									</div>
								</div>
							</div>
						</div>
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
							<article class="ltPostColumn ltPostColumn02 hasOver">
								<!-- aligncenter -->
								<div class="aligncenter position-relative rounded">
									<img class="rounded" src="http://placehold.it/370x230" alt="image description">
								</div>
								<!-- posterTagline -->
								<em class="posterTagline d-block fwMedium pt-1">
									<span class="d-inline-block">By <a href="javascript:void(0);">admin</a></span>
									<span class="sep d-inline-block">|</span>
									<time datetime="2011-01-12" class="d-inline-block"><a href="javascript:void(0);">Dec 24, 2018</a></time>
								</em>
								<h3><a href="blog-detail.html">How to project manage your tension renovation</a></h3>
								<a href="blog-detail.html" class="btnMore d-inline-block">Details <i class="icn ei_arrow_right"><span class="sr-only">icon</span></i></a>
							</article>
						</div>
						<div class="col-12 col-md-6 col-lg-4">
							<!-- ltPostColumn -->
							<article class="ltPostColumn ltPostColumn02 hasOver">
								<!-- aligncenter -->
								<div class="aligncenter position-relative rounded">
									<img class="rounded" src="http://placehold.it/370x230" alt="image description">
								</div>
								<!-- posterTagline -->
								<em class="posterTagline d-block fwMedium pt-1">
									<span class="d-inline-block">By <a href="javascript:void(0);">admin</a></span>
									<span class="sep d-inline-block">|</span>
									<time datetime="2011-01-12" class="d-inline-block"><a href="javascript:void(0);">Dec 24, 2018</a></time>
								</em>
								<h3><a href="blog-detail.html">Dualit's Kit Miles collab is a mono chrome delight</a></h3>
								<a href="blog-detail.html" class="btnMore d-inline-block">Details <i class="icn ei_arrow_right"><span class="sr-only">icon</span></i></a>
							</article>
						</div>
						<div class="col-12 col-md-6 col-lg-4">
							<!-- ltPostColumn -->
							<article class="ltPostColumn ltPostColumn02 hasOver">
								<!-- aligncenter -->
								<div class="aligncenter position-relative rounded">
									<img class="rounded" src="http://placehold.it/370x230" alt="image description">
								</div>
								<!-- posterTagline -->
								<em class="posterTagline d-block fwMedium pt-1">
									<span class="d-inline-block">By <a href="javascript:void(0);">admin</a></span>
									<span class="sep d-inline-block">|</span>
									<time datetime="2011-01-12" class="d-inline-block"><a href="javascript:void(0);">Dec 24, 2018</a></time>
								</em>
								<h3><a href="blog-detail.html">Imagine if you had this sofa in your living room&hellip;</a></h3>
								<a href="blog-detail.html" class="btnMore d-inline-block">Details <i class="icn ei_arrow_right"><span class="sr-only">icon</span></i></a>
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