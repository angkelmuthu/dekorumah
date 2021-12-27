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
						<li class="breadcrumb-item active" aria-current="page">about us</li>
					</ol>
				</div>
				<div class="col-12 col-md-5 d-none d-md-flex align-items-md-center justify-content-md-end">
					<!-- title -->
					<strong class="title d-block text-right fontRoboto fwMedium text-capitalize text-dark">about us</strong>
				</div>
			</div>
		</div>
	</nav>
	<!-- abtIntroAsideBlock -->
	<aside class="abtIntroAsideBlock contentBlock">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-4">
					<!-- headingHead -->
					<header class="headingHead">
						<!-- blockH -->
						<h2 class="text-uppercase blockH font-weight-bold mb-0">
							<!-- hTitle -->
							<strong class="font-weight-normal hTitle d-block fontBase">About</strong>
							<span class="d-block"><?php echo $about_title ?></span>
						</h2>
					</header>
				</div>
				<div class="col-12 col-md-8">
					<?php echo $about_desk ?>
				</div>
			</div>
			<!-- featuresList -->
			<ul class="list-unstyled d-flex flex-wrap justify-content-between featuresList featuresList04 text-left">
				<li class="hasOver">
					<i class="icn icmon_01 inaccessible flex-shrink-0"><span class="sr-only">icon</span></i>
					<div class="extraWrap">
						<h3 class="fwSemiBold fontBase counter"><?php echo $about_client ?></h3>
						<h4 class="font-weight-normal fontBase">Satisfied Clients</h4>
					</div>
				</li>
				<li class="hasOver">
					<i class="icn icmon_02 inaccessible flex-shrink-0"><span class="sr-only">icon</span></i>
					<div class="extraWrap">
						<h3 class="fwSemiBold fontBase counter"><?php echo $about_cabang ?></h3>
						<h4 class="font-weight-normal fontBase">Cabang</h4>
					</div>
				</li>
				<li class="hasOver">
					<i class="icn icmon_03 inaccessible flex-shrink-0"><span class="sr-only">icon</span></i>
					<div class="extraWrap">
						<h3 class="fwSemiBold fontBase counter">1280</h3>
						<h4 class="font-weight-normal fontBase">Hours Working</h4>
					</div>
				</li>
				<li class="hasOver">
					<i class="icn icmon_04 inaccessible flex-shrink-0"><span class="sr-only">icon</span></i>
					<div class="extraWrap">
						<h3 class="fwSemiBold fontBase counter"><?php echo $about_award ?></h3>
						<h4 class="font-weight-normal fontBase">Win Award</h4>
					</div>
				</li>
			</ul>
		</div>
	</aside>
	<div class="container">
		<!-- separatorDefault -->
		<hr class="d-block separatorDefault mt-0 mb-0">
	</div>
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
								<span class="d-block"><?php echo $benefit_title ?></span>
							</h2>
							<p><?php echo $benefit_deskripsi ?></p>
						</header>
						<!-- yoeListing -->
						<ul class="list-unstyled yoeListing">
							<li class="hasOver">
								<!-- titleWrap -->
								<div class="titleWrap d-flex align-items-center">
									<i class="<?php echo $benefit_icon_1 ?> d-block icn flex-shrink-0"><span class="sr-only">icon</span></i>
									<h3><?php echo $benefit_title_1 ?></h3>
								</div>
								<p><?php echo $benefit_desk_1 ?></p>
							</li>
							<li class="hasOver">
								<!-- titleWrap -->
								<div class="titleWrap d-flex align-items-center">
									<i class="<?php echo $benefit_icon_2 ?> d-block icn flex-shrink-0"><span class="sr-only">icon</span></i>
									<h3><?php echo $benefit_title_2 ?></h3>
								</div>
								<p><?php echo $benefit_desk_2 ?></p>
							</li>
							<li class="hasOver">
								<!-- titleWrap -->
								<div class="titleWrap d-flex align-items-center">
									<i class="<?php echo $benefit_icon_3 ?> d-block icn flex-shrink-0"><span class="sr-only">icon</span></i>
									<h3><?php echo $benefit_title_3 ?></h3>
								</div>
								<p><?php echo $benefit_desk_3 ?></p>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-12 d-none d-md-block col-md-5 order-md-1">
					<!-- wcuBlockImageHolder -->
					<div class="wcuBlockImageHolder bgCover d-flex w-100 h-100 rounded" style="background-image: url(<?php echo base_url(); ?>assets/images/<?php echo $benefit_file ?>);">
						<img class="rounded" src="<?php echo base_url(); ?>assets/images/<?php echo $benefit_file ?>" alt="image description">
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- mkCallAside -->
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

	<!-- otwBlock -->
	<section class="contentBlock otwBlock text-center">
		<div class="container">
			<div class="row">
				<div class="col-12 offset-md-1 col-md-10 offset-lg-2 col-lg-8">
					<!-- headingHead -->
					<header class="headingHead">
						<!-- blockH -->
						<h2 class="text-uppercase blockH font-weight-bold">
							<!-- hTitle -->
							<strong class="font-weight-normal hTitle d-block fontBase">Our Team</strong>
							<span class="d-block">work with us</span>
						</h2>
						<p>Mengenal dengan tim kami</p>
					</header>
				</div>
			</div>
			<div class="row">
				<?php foreach ($team as $list) { ?>
					<div class="col-12 col-sm-6 col-lg-3 ">
						<!-- teamColumn -->
						<article class="teamColumn hasOver position-relative rounded">
							<!-- imgHolder -->
							<div class="aligncenter imgHolder">
								<img class="d-block w-100" src="<?php echo base_url(); ?>assets/images/<?php echo $list->foto ?>" alt="<?php echo $list->nama ?> <?php echo $list->job ?>">
							</div>
							<!-- captionWrap -->
							<div class="captionWrap">
								<h3 class="text-capitalize"><a href="#"><?php echo $list->nama ?></a></h3>
								<h4 class="fontBase font-weight-normal text-capitalize"><?php echo $list->job ?></h4>
								<!-- tcSocialNetworks -->
								<ul class="list-unstyled socialNetworks d-flex justify-content-center tcSocialNetworks mb-0">
									<li>
										<a href="javascript:void(0);" class="d-flex align-items-center justify-content-center rounded-circle">
											<i class="fab fa-facebook-f icn text-center"><span class="sr-only">icon</span></i>
										</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="d-flex align-items-center justify-content-center rounded-circle">
											<i class="fab fa-twitter icn text-center"><span class="sr-only">icon</span></i>
										</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="d-flex align-items-center justify-content-center rounded-circle">
											<i class="fab fa-pinterest icn text-center"><span class="sr-only">icon</span></i>
										</a>
									</li>
									<li>
										<a href="javascript:void(0);" class="d-flex align-items-center justify-content-center rounded-circle">
											<i class="fab fa-instagram icn text-center"><span class="sr-only">icon</span></i>
										</a>
									</li>
								</ul>
							</div>
						</article>
					</div>
				<?php } ?>
			</div>
		</div>
	</section>
</main>
<!-- pageFooterAreaWrap -->
<?php $this->load->view('footer'); ?>