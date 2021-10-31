<link rel="stylesheet" media="screen, print" href="<?php echo base_url() ?>assets/smartadmin/css/formplugins/summernote/summernote.css">
<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>INPUT DATA PAKET PRODUK</h2>
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


                                <tr>
                                    <td width='200'>Kategori <?php echo form_error('id_kategori') ?></td>
                                    <td><?php echo select2_update('id_kategori', 'm_produk_kategori', 'id_kategori', 'kategori', $id_kategori, 'aktif="y"', 'kategori ASC') ?></td>
                                </tr>
                                <tr>
                                    <td width='200'>Nama Paket <?php echo form_error('nm_paket') ?></td>
                                    <td><input type="text" class="form-control" name="nm_paket" id="nm_paket" placeholder="Nm Paket" value="<?php echo $nm_paket; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Deskripsi <?php echo form_error('deskripsi') ?></td>
                                    <td> <textarea class="form-control" non_pks="3" name="deskripsi" id="summernote" placeholder="Deskripsi"><?php echo $deskripsi; ?></textarea></td>
                                </tr>
                                <tr>
                                    <td width='200'>Harga <?php echo form_error('harga') ?></td>
                                    <td><input type="number" class="form-control" name="harga" id="harga" placeholder="Harga" value="<?php echo $harga; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Aktif <?php echo form_error('aktif') ?></td>
                                    <td><?php echo form_dropdown('aktif', array('y' => 'AKTIF', 'n' => 'TIDAK AKTIF'), $aktif, array('class' => 'form-control')); ?></td>
                                </tr>
                                <input type="hidden" class="form-control" name="create_by" id="create_by" placeholder="Create By" value="<?php echo $this->session->userdata('full_name') ?>" readonly /><input type="hidden" class="form-control" name="create_date" id="create_date" placeholder="Create Date" value="<?php echo date('Y-m-d H:i:s'); ?>" />
                                <tr>
                                    <td></td>
                                    <td><input type="hidden" name="id_paket" value="<?php echo $id_paket; ?>" />
                                        <button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button>
                                        <a href="<?php echo site_url('m_produk_paket') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/formplugins/select2/select2.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/formplugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/formplugins/summernote/summernote.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/kostum.js"></script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['para', ['ul', 'ol', 'paragraph']],
            ]
        });
    });
</script>