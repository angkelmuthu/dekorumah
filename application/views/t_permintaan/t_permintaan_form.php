<main id="js-page-content" role="main" class="page-content">
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>INPUT DATA PERMINTAAN BARANG</h2>
                <div class="panel-toolbar">
                    <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                    <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                    <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
            <form action="<?php echo $action; ?>" method="post">

<table class='table table-striped'>


	    <tr><td width='200'>Jenis Permintaan <?php echo form_error('jenis_permintaan') ?></td><td><input type="text" class="form-control" name="jenis_permintaan" id="jenis_permintaan" placeholder="Jenis Permintaan" value="<?php echo $jenis_permintaan; ?>" /></td></tr>
	    <tr><td width='200'>Id Pelanggan <?php echo form_error('id_pelanggan') ?></td><td><input type="text" class="form-control" name="id_pelanggan" id="id_pelanggan" placeholder="Id Pelanggan" value="<?php echo $id_pelanggan; ?>" /></td></tr>
	    <tr><td width='200'>Id Barang <?php echo form_error('id_barang') ?></td><td><?php echo select2_dinamis('id_barang', 'm_barang', 'id_barang', 'nm_barang') ?></td></tr>
	    <tr><td width='200'>Qty <?php echo form_error('qty') ?></td><td><input type="number" class="form-control" name="qty" id="qty" placeholder="Qty" value="<?php echo $qty; ?>" /></td></tr>
	    <tr><td width='200'>Deskripsi <?php echo form_error('deskripsi') ?></td><td><input type="text" class="form-control" name="deskripsi" id="deskripsi" placeholder="Deskripsi" value="<?php echo $deskripsi; ?>" /></td></tr>
	    <tr><td width='200'>Id Users <?php echo form_error('id_users') ?></td><td><input type="text" class="form-control" name="id_users" id="id_users" placeholder="Id Users" value="<?php echo $this->session->userdata('id_users') ?>" readonly/></td></tr>
	    <tr><td width='200'>Create By <?php echo form_error('create_by') ?></td><td><input type="text" class="form-control" name="create_by" id="create_by" placeholder="Create By" value="<?php echo $this->session->userdata('nama') ?>" readonly/></td></tr>
	    <tr><td width='200'>Create Date <?php echo form_error('create_date') ?></td><td><input type="text" class="form-control" name="create_date" id="create_date" placeholder="Create Date" value="<?php echo date('Y-m-d H:s:i'); ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="id_permintaan" value="<?php echo $id_permintaan; ?>" /> 
	    <button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('t_permintaan') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>

            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/formplugins/select2/select2.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/formplugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/kostum.js"></script>