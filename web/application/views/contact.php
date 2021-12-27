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
							<a href="home.html">
								<i class="fas fa-home icn"><span class="sr-only">icon</span></i>
								Home
							</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">contact</li>
					</ol>
				</div>
				<div class="col-12 col-md-5 d-none d-md-flex align-items-md-center justify-content-md-end">
					<!-- title -->
					<strong class="title d-block text-right fontRoboto fwMedium text-capitalize text-dark">contact</strong>
				</div>
			</div>
		</div>
	</nav>
	<!-- contactAreaBlock -->
	<section class="contactAreaBlock contentBlock">
		<div class="container">
			<?php foreach ($contact as $cabang) { ?>
				<div class="row mb-5 align-items-center">
					<div class="col-12 col-md-5">
						<h2 class="text-uppercase"><?php echo $cabang->cabang_kota ?></h2>
						<p><span class="fontRoboto"><?php echo $cabang->cabang_alamat ?></span></p>
						<!-- ctAddress -->
						<address class="ctAddress text-dark">
							<ul class="list-unstyled">
								<!-- <li class="d-flex align-items-center">
									<i class="ei_icon_pin_alt icn text-center flex-shrink-0"><span class="sr-only">icon</span></i>
									<strong class="text font-weight-normal"><?php echo $cabang->cabang_alamat ?></strong>
								</li>
								<li class="d-flex align-items-center">
									<i class="ei_icon_mail_alt text-center icn flex-shrink-0"><span class="sr-only">icon</span></i>
									<strong class="text font-weight-normal"><a href="mailto:&#105;&#110;&#102;&#111;&#046;&#100;&#101;&#101;&#114;&#099;&#114;&#101;&#097;&#116;&#105;&#118;&#101;&#064;&#103;&#109;&#097;&#105;&#108;&#046;&#099;&#111;&#109;">info.deercreative@gmail.com</a></strong>
								</li> -->
								<li class="d-flex align-items-center">
									<i class="ei_icon_mobile icn text-center flex-shrink-0"><span class="sr-only">icon</span></i>
									<strong class="text font-weight-normal"><a href="tel:+&#049;&#050;&#051;&#052;&#053;&#054;&#055;&#056;&#057;&#049;&#049;&#050;&#048;"><?php echo $cabang->cabang_tlpn ?></a></strong>
								</li>
							</ul>
						</address>
					</div>
					<div class="col-12 col-md-6 offset-xl-1 col-xl-6">
						<!-- widgetCtForm -->
						<?php echo $cabang->cabang_map ?>
					</div>
				</div>
			<?php } ?>
		</div>
	</section>
</main>
<!-- pageFooterAreaWrap -->
<?php $this->load->view('footer'); ?>