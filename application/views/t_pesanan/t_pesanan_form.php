<main id="js-page-content" role="main" class="page-content">
	<div class="row">
		<div class="col-xl-12">
			<div id="panel-1" class="panel">
				<div class="panel-hdr">
					<h2>INPUT DATA PESANAN</h2>
					<div class="panel-toolbar">
						<button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
						<button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
						<button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
					</div>
				</div>
				<div class="panel-container show">
					<div class="panel-content">

						<div class="form-group">
							<label class="form-label" for="simpleinput">Kategori Produk</label>
							<select name="id_kategori" id="kategori" class="select2 form-control w-100" required>
								<option value="">Select Kategori</option>
								<?php
								$this->db->where('aktif', 'y');
								$query = $this->db->get('m_produk_kategori')->result();
								foreach ($query as $row) {
									echo '<option value="' . $row->id_kategori . '||' . $row->kategori . '">' . $row->kategori . '</option>';
								}
								?>
							</select>
						</div>
						<div class="form-group">
							<label class="form-label" for="simpleinput">Produk</label>
							<div class="ajax-loader">
								<img id="loading-produk" style="display:none;" src="<?php echo base_url() ?>assets/smartadmin/img/loading.gif" height="40px" class="img-responsive" />
							</div>
							<select name="id_paket" class="select2 form-control w-100" id="paket" required>
								<option value=''>Select Produk</option>
							</select>
						</div>
						<div id="asal">
							<form action="<?php echo site_url('t_pesanan/create_action_sementara') ?>" method="post">
								<input type="hidden" name="id_kategorix" id="id_kategorix" required />
								<input type="hidden" name="kategorix" id="kategorix" required />
								<input type="hidden" name="created_date" value="<?php echo date('Y-m-d H:i:s'); ?>" />
								<input type="hidden" name="users" value="<?php echo $this->session->userdata('full_name') ?>" readonly />
								<input type="hidden" name="id_invoice" value="<?php echo $this->uri->segment(3); ?>" />
								<input type="hidden" name="id_pesanan" value="<?php echo $id_pesanan; ?>" />
								<button type=" submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> Simpan</button>
								<a href="<?php echo site_url('t_invoice/read/' . $this->uri->segment(3)) ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a>
							</form>
						</div>
						<div id="divinput">
							<div id="detail"></div>
							<form action="<?php echo $action; ?>" method="post" id="rdbtn">
								<table class='table table-striped'>
									<tr>
										<td width='200'>Satuan</td>
										<td>
											<select name="id_satuan" class="select2 form-control w-100" id="satuan" required>
												<option value="">Pilih Satuan</option>
												<?php
												$this->db->where('aktif', 'Y');
												$result = $this->db->get('m_satuan')->result();
												foreach ($result as $dt) {
													echo '<option value="' . $dt->id_satuan . '">' . $dt->satuan . '</option>';
												}
												?>
											</select>
										</td>
									</tr>
									<div>
										<tr id="req" style="display: none;">
											<td width='200'>Qty <?php echo form_error('qty') ?></td>
											<td><input type="text" class="form-control" name="qty" id="qty" placeholder="qty" value="<?php echo $qty; ?>" /></td>
										</tr>
									</div>
									<tr>
										<td width='200'>Ukuran <?php echo form_error('ukuran') ?></td>
										<td>
											<div class="row">
												<div class="col-md-4">
													<div class="md-form">
														<input type="text" id="panjang" name="panjang" value="<?php echo $panjang; ?>" class="form-control" required>
														<label for="panjang" class="">Panjang</label>
													</div>
												</div>
												<div class="col-md-4">
													<div class="md-form">
														<input type="text" id="lebar" name="lebar" value="<?php echo $lebar; ?>" class="form-control" required>
														<label for="lebar" class="">Lebar</label>
													</div>
												</div>
												<div class="col-md-4">
													<div class="md-form">
														<input type="text" id="tinggi" name="tinggi" value="<?php echo $tinggi; ?>" class="form-control" required>
														<label for="tinggi" class="">Tinggi</label>
													</div>
												</div>
											</div>
										</td>
									</tr>

									<tr>
										<td width='200'>Harga (satuan) <?php echo form_error('volume') ?></td>
										<td>
											<input type="hidden" name="id_kategori" id="id_kategori" value="" required />
											<input type="hidden" name="kategori" id="kategoris" value="" required />
											<input type="hidden" name="id_paket" id="id_paket" value="" required />
											<input type="hidden" name="nm_paket" id="nm_paket" value="" required />
											<input type="hidden" name="deskripsi" id="deskripsi" value="" required />
											<input type="text" class="form-control" name="harga" id="hargaxx" placeholder="harga" value="<?php echo $harga; ?>" required />
										</td>
									</tr>
									<tr>
										<td width='200'>Total Harga</td>
										<td><input type="text" class="form-control" name="total" id="total" placeholder="total" value="<?php echo $harga; ?>" readonly /></td>
									</tr>
									<tr>
										<td width='200'>Note <?php echo form_error('note') ?></td>
										<td> <textarea class="form-control" non_pks="3" name="note" id="note" placeholder="Note"><?php echo $note; ?></textarea></td>
									</tr>
									<tr>
										<td></td>
										<td>
											<?php
											// $this->db->select_max('id_pesanan', 'max');
											// $query = $this->db->get('t_pesanan');
											// if ($query->num_rows() == 0) {
											// 	$maxx = 1;
											// }
											// $max = $query->row()->max;
											// $maxx = $max + 1;
											?>
											<input type="hidden" name="created_date" value="<?php echo date('Y-m-d H:i:s'); ?>" />
											<input type="hidden" name="users" value="<?php echo $this->session->userdata('full_name') ?>" readonly />
											<input type="hidden" name="id_invoice" value="<?php echo $this->uri->segment(3); ?>" />
											<input type="hidden" name="id_pesanan" value="<?php echo $id_pesanan; ?>" />
											<button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button>
											<a href="<?php echo site_url('t_invoice/read/' . $this->uri->segment(3)) ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a>
										</td>
									</tr>
								</table>
							</form>
						</div>

					</div>
				</div>

			</div>
		</div>
	</div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin-slim/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin-slim/js/app.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/formplugins/select2/select2.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/formplugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/kostum.js"></script>
<script>
	$(document).ready(function() {
		document.getElementById('divinput').style.display = 'none';
		$('#kategori').change(function() {
			var kategorix = $('#kategori').val();
			var kategori = kategorix.split('||');
			if (id_kategori != '') {
				$.ajax({
					url: "<?php echo base_url(); ?>t_pesanan/fetch_paket",
					method: "POST",
					data: {
						id_kategori: kategori[0],
					},
					beforeSend: function() {
						$("#loading-paket").show();
					},
					success: function(data) {
						$('#paket').html(data);
						$('#id_kategorix').val(kategori[0]);
						$('#kategorix').val(kategori[1]);
					},
					complete: function() {
						$('#loading-paket').hide();
					}
				});
			} else {
				$('#paket').html('<option value="">Select Paket</option>');
			}
		});
		$('#paket').change(function() {
			var id_paket = $('#paket').val();
			if (id_paket != '') {
				$.ajax({
					url: "<?php echo base_url(); ?>t_pesanan/fetch_paket_harga",
					method: "POST",
					data: {
						id_paket: id_paket,
					},
					beforeSend: function() {
						$("#loading-program").show();
					},
					success: function(data) {
						document.getElementById('asal').style.display = 'none';
						document.getElementById('divinput').style.display = 'block';
						var json = data,
							obj = JSON.parse(json);
						$('#id_kategori').val(obj.id_kategori);
						$('#kategoris').val(obj.kategori);
						$('#id_paket').val(obj.id_paket);
						$('#nm_paket').val(obj.nm_paket);
						$('#deskripsi').val(obj.deskripsi);
						$('#hargaxx').val(obj.harga);
						html = '<div class="card mb-5">' +
							'<div class="card-body">' +
							'<h5 class="card-title">' + obj.nm_paket + '</h5>' + obj.deskripsi + '</div>' +
							'<div class="card-footer">' +
							'<h3>Rp. ' + parseInt(obj.harga).toLocaleString() + '</h3>' +
							'</div>' +
							'</div>';
						$("#detail").html(html);
					},
					complete: function() {
						$('#loading-program').hide();
					}
				});
			} else {
				$('#program').html('<option value="">Select Program</option>');
			}
		});

		// $('#id_kategori').change(function(e) {
		// 	var kategori = $('#id_kategori').val();
		// 	if (kategori != '') {
		// 		$.ajax({
		// 			url: "<?php echo base_url(); ?>t_pesanan/fetch_paket",
		// 			cache: false,
		// 			method: "POST",
		// 			data: {
		// 				id_kategori: kategori
		// 			},
		// 			success: function(data) {
		// 				let html = "";
		// 				document.getElementById('divinput').style.display = 'block';
		// 				var json = data;
		// 				obj = JSON.parse(json);
		// 				$.each(obj, function(i, item) {
		// 					html += '<div class="custom-control custom-radio custom-control-inline">' +
		// 						'<input type="radio" class="batch custom-control-input" id="batch' + item.id_paket + '" name="id_paket" value="' + item.id_paket + '" required>' +
		// 						'<label class="custom-control-label" for="batch' + item.id_paket + '">' +
		// 						'<div class="card">' +
		// 						'<ul class="list-group list-group-flush">' +
		// 						'<li class="list-group-item">' + item.nm_paket + '</li>' +
		// 						'<li class="list-group-item">' + item.deskripsi + '</li>' +
		// 						'<li class="list-group-item"><h3><span class="badge badge-primary float-right ml-3">Rp. ' + parseInt(item.harga).toLocaleString() + '</span></h3></li>' +
		// 						'</ul>' +
		// 						'</div>' +
		// 						'</label>' +
		// 						'</div>';
		// 				})
		// 				$("#detail").html(html);
		// 			},
		// 		});
		// 	}
		// });

		$('#rdbtn').change(function() {
			paket = $("input[name='id_paket']:checked").val();
			if (paket != '') {
				$.ajax({
					url: "<?php echo base_url(); ?>t_pesanan/fetch_paket_harga",
					method: "POST",
					data: {
						id_paket: paket
					},
					success: function(data) {
						var json = data,
							obj = JSON.parse(json);
						$('#id_kategorixx').val(obj.id_kategori);
						$('#hargaxx').val(obj.harga);
					}
				});
			}
		});

		$('#satuan').change(function() {
			var id_satuan = $('#satuan').val();
			if (id_satuan == 1) {
				$("#req").hide();
				$("#panjang, #hargaxx").keyup(function() {
					var hargax = $("#hargaxx").val();
					var harga = parseInt(hargax.replace(/,.*|[^0-9]/g, ''), 10);
					var panjang = $("#panjang").val();
					var totalx = parseInt(harga) * panjang;
					var total = Math.round(totalx / 1000) * 1000
					fixed = total.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
					$("#total").val(fixed);
				});
			} else if (id_satuan == 2) {
				$("#req").hide();
				$("#panjang,#tinggi, #hargaxx").keyup(function() {
					var hargax = $("#hargaxx").val();
					var harga = parseInt(hargax.replace(/,.*|[^0-9]/g, ''), 10);
					var panjang = $("#panjang").val();
					var tinggi = $("#tinggi").val();
					var volume = panjang * tinggi;
					var totalx = parseInt(harga) * volume;
					var total = Math.round(totalx / 1000) * 1000
					fixed = total.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
					$("#total").val(fixed);
				});
			} else if (id_satuan == 3) {
				$("#req").hide();
				$("#panjang,#lebar,#tinggi, #hargaxx").keyup(function() {
					var hargax = $("#hargaxx").val();
					var harga = parseInt(hargax.replace(/,.*|[^0-9]/g, ''), 10);
					var panjang = $("#panjang").val();
					var lebar = $("#lebar").val();
					var tinggi = $("#tinggi").val();
					var volume = panjang * lebar * tinggi;
					var totalx = parseInt(harga) * volume;
					var total = Math.round(totalx / 1000) * 1000
					fixed = total.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
					$("#total").val(fixed);
				});
			} else {
				$("#req").show();
				$("#qty, #hargaxx").keyup(function() {
					var hargax = $("#hargaxx").val();
					var harga = parseInt(hargax.replace(/,.*|[^0-9]/g, ''), 10);
					var volume = $("#qty").val();
					var totalx = parseInt(harga) * volume;
					var total = Math.round(totalx / 1000) * 1000
					fixed = total.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
					$("#total").val(fixed);
				});
			}
		});

	});
</script>