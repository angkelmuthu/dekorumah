<main id="js-page-content" role="main" class="page-content">
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>INPUT DATA BARANG SUB</h2>
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


	    <tr><td width='200'>Nm Barang Sub <?php echo form_error('nm_barang_sub') ?></td><td><input type="text" class="form-control" name="nm_barang_sub" id="nm_barang_sub" placeholder="Nm Barang Sub" value="<?php echo $nm_barang_sub; ?>" /></td></tr>
	    <tr><td width='200'>Id Barang <?php echo form_error('id_barang') ?></td><td><?php echo select2_dinamis('id_barang', 'm_barang', 'id_barang', 'nm_barang') ?></td></tr>
	    <tr><td width='200'>Aktif <?php echo form_error('aktif') ?></td><td><?php echo cmb_dinamis('aktif', 'm_aktif', 'aktif', 'ket') ?></td></tr>
	    <tr><td></td><td><input type="hidden" name="id_barang_sub" value="<?php echo $id_barang_sub; ?>" /> 
	    <button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('m_barang_sub') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a></td></tr>
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