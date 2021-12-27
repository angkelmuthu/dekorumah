<?php $this->load->view('header'); ?>
<main>
	<!-- pageBdWrapNav -->
	<nav class="pageBdWrapNav bg-light" aria-label="breadcrumb">
		<div class="container">
			<div class="row align-items-md-center">
				<div class="col-12 col-md-7">
					<!-- breadcrumb -->
					<ol class="breadcrumb pageBreadcrumb m-0 p-0 text-capitalize">
						<li class="breadcrumb-item">
							<a href="<?php echo site_url('Page/home'); ?>">
								<i class="fas fa-home icn"><span class="sr-only">icon</span></i>
								Home
							</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">Services</li>
					</ol>
				</div>
				<div class="col-12 col-md-5 d-none d-md-flex align-items-md-center justify-content-md-end">
					<!-- title -->
					<strong class="title d-block text-right fontRoboto fwMedium text-capitalize text-dark">Services</strong>
				</div>
			</div>
		</div>
	</nav>
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
							<span class="d-block"><?php echo $service_title ?></span>
						</h2>
						<p><?php echo $service_desk ?></p>
					</header>
				</div>
			</div>
			<!-- svColsRow -->
			<div class="row justify-content-center svColsRow no-gutters wow fadeInUp" data-wow-delay="0.1s">
				<?php foreach ($services as $service) { ?>
					<div class="col-12 col-md-4 d-md-flex col">
						<!-- serviceColumn -->
						<article class="serviceColumn d-md-flex align-items-md-center justify-content-md-center position-relative hasOver mb-0">
							<div class="align">
								<i class="icn <?php echo $service->services_icon ?> d-block"><span class="sr-only">icon</span></i>
								<h3><?php echo $service->services_title ?></h3>
								<p><?php echo $service->services_desk ?></p>
							</div>
							<!-- columnBgCover -->
							<span class="bgCover columnBgCover d-block position-absolute" style="background-image: url(<?php echo base_url(); ?>assets/images/img02.jpg);">
								<img class="sr-only" src="<?php echo base_url(); ?>assets/images/img02.jpg" alt="image description">
							</span>
						</article>
					</div>
				<?php } ?>
			</div>
		</div>
	</section>
	<!-- reKtAsideBlock -->
	<aside class="mkCallAside position-relative text-center text-md-left text-white" data-parallax="scroll" data-image-src="<?php echo base_url(); ?>assets/images/img01.jpg">
		<div class="container mkCallAsideHolder position-relative wow fadeInUp" data-wow-delay="0.1s">
			<div class="align">
				<div class="row align-items-md-center">
					<div class="col-12 col-md-8">
						<h2 class="text-uppercase font-weight-bold">Making Beautiful Our Kitchen</h2>
						<p>Quality is what we pursue, We know what we do</p>
					</div>
					<div class="col-12 col-md-4 text-md-right">
						<a href="tel:+&#049;&#050;&#051;&#052;&#053;&#054;&#055;&#056;&#057;" class="btn btnTheme btnThemeWhiteInverse fontRoboto btnRoudedLarge" data-hover="<?php echo $tlpn ?>">
							<span class="btnText d-block">
								<i class="ei_icon_phone btnIcn"><span class="sr-only">icon</span></i>
								<span><?php echo $tlpn ?></span>
							</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</aside>
</main>
<!-- pageFooterAreaWrap -->
<?php $this->load->view('footer'); ?>