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
						<li class="breadcrumb-item active" aria-current="page">Project</li>
					</ol>
				</div>
				<div class="col-12 col-md-5 d-none d-md-flex align-items-md-center justify-content-md-end">
					<!-- title -->
					<strong class="title d-block text-right fontRoboto fwMedium text-capitalize text-dark">Project</strong>
				</div>
			</div>
		</div>
	</nav>
	<!-- contentAreaWrap -->
	<div class="contentAreaWrap contentBlock">
		<div class="container">
			<!-- content -->
			<article id="content" class="mb-3">

				<div class="row">
					<?php
					$no = $this->uri->segment('4') + 1;
					foreach ($lists as $list) {
					?>
						<div class="col-12 col-md-6 col-lg-4 col-xl-3">
							<!-- popItemColumn -->
							<article class="popItemColumn hMbSmall hasOver text-center">
								<!-- imageHolder -->
								<div class="aligncenter imageHolder rounded position-relative d-flex">
									<span class="d-flex align-items-center wrap justify-content-center w-100">
										<span class="d-block w-100">
											<img src="<?php echo base_url(); ?>assets/images/<?php echo $list->gambar ?>" alt="image description">
										</span>
									</span>
								</div>
								<h3 class="text-capitalize"><a href="<?php echo site_url('Page/projek/' . $list->id_projek) ?>"><?php echo $list->projek_name ?></a></h3>
								<h4 class="font-weight-normal"><?php echo $list->nm_produk ?></h4>
							</article>
						</div>
					<?php } ?>
				</div>
				<!-- navigation -->
				<?php
				echo $this->pagination->create_links();
				?>
			</article>
		</div>
	</div>
</main>
<!-- pageFooterAreaWrap -->
<?php $this->load->view('footer'); ?>