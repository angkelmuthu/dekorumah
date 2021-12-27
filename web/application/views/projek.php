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
						<li class="breadcrumb-item"><a href="<?php echo site_url('Page/projeks'); ?>">project</a></li>
						<li class="breadcrumb-item active" aria-current="page">project details</li>
					</ol>
				</div>
				<div class="col-12 col-md-5 d-none d-md-flex align-items-md-center justify-content-md-end">
					<!-- title -->
					<strong class="title d-block text-right fontRoboto fwMedium text-capitalize text-dark">Project Details</strong>
				</div>
			</div>
		</div>
	</nav>
	<!-- prjctDetailsBlock -->
	<section class="contentBlock prjctDetailsBlock position-relative pb-0">
		<div class="container">
			<div class="row mb-3">

				<div class="col-12 col-sm-10 col-xl-11">
					<!-- prjctDetaiIImageSlider -->
					<div class="prjctDetaiIImageSlider slickSlider">
						<?php foreach ($projeks as $list) { ?>
							<div>
								<!-- pdisImage -->
								<div class="pdisImage bgCover" style="background-image: url(<?php echo base_url(); ?>assets/images/<?php echo $list->gambar ?>);">
									<img class="sr-only" src="<?php echo base_url(); ?>assets/images/<?php echo $list->gambar ?>" alt="image description">
								</div>
							</div>
						<?php } ?>
					</div>
				</div>

				<div class="col-12 col-sm-2 col-xl-1">
					<!-- pdssvSliderWrap -->
					<div class="pdssvSliderWrap">
						<!-- prjctDtSliderSwitcher -->
						<div class="prjctDtSliderSwitcher slickSlider">
							<?php foreach ($projeks as $list) { ?>
								<div>
									<!-- pdssImage -->
									<div class="pdssImage hasOver">
										<img class="d-block w-100" src="<?php echo base_url(); ?>assets/images/<?php echo $list->gambar ?>" alt="image description">
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-md-7 mb-3 mb-md-0">
					<h3 class="position-relative">About the project</h3>
					<?php echo $projek->projek_desk ?>
				</div>
				<div class="col-12 col-md-5 offset-xl-1 col-xl-4">
					<h3 class="text-capitalize position-relative mb-0">Project Details</h3>
					<!-- pdDescrTable -->
					<table class="table pdDescrTable">
						<!-- tbody -->
						<tbody>
							<tr>
								<td>
									<!-- tdWrap -->
									<div class="tdWrap">
										Lokasi:
									</div>
								</td>
								<td>
									<!-- tdWrap -->
									<div class="tdWrap">
										<?php echo $projek->projek_lokasi ?>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<!-- tdWrap -->
									<div class="tdWrap">
										Tgl Pesan:
									</div>
								</td>
								<td>
									<!-- tdWrap -->
									<div class="tdWrap">
										<time datetime="<?php echo $projek->projek_start ?>"><?php echo $projek->projek_start ?></time>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<!-- tdWrap -->
									<div class="tdWrap">
										Tgl Selesai:
									</div>
								</td>
								<td>
									<!-- tdWrap -->
									<div class="tdWrap">
										<time datetime="<?php echo $projek->projek_end ?>"><?php echo $projek->projek_end ?></time>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<!-- tdWrap -->
									<div class="tdWrap">
										Klient:
									</div>
								</td>
								<td>
									<!-- tdWrap -->
									<div class="tdWrap">
										<?php echo $projek->projek_name ?>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
	<!-- prejectsListingBlock -->
</main>
<!-- pageFooterAreaWrap -->
<?php $this->load->view('footer'); ?>