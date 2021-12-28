<link rel="stylesheet" media="screen, print" href="<?php echo base_url() ?>assets/smartadmin/css/formplugins/summernote/summernote.css">
<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>INPUT DATA PROJEK</h2>
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
                                    <td width='200'>Id Produk <?php echo form_error('id_produk') ?></td>
                                    <td><?php echo select2_dinamis('id_produk', 'm_produk', 'id_produk', 'nm_produk') ?></td>
                                </tr>
                                <tr>
                                    <td width='200'>Projek Name <?php echo form_error('projek_name') ?></td>
                                    <td><input type="text" class="form-control" name="projek_name" id="projek_name" placeholder="Projek Name" value="<?php echo $projek_name; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Projek Lokasi <?php echo form_error('projek_lokasi') ?></td>
                                    <td><input type="text" class="form-control" name="projek_lokasi" id="projek_lokasi" placeholder="Projek Lokasi" value="<?php echo $projek_lokasi; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Projek Start <?php echo form_error('projek_start') ?></td>
                                    <td><input type="date" class="form-control" id="example-date" name="projek_start" id="datepicker-1" placeholder="Projek Start" value="<?php echo $projek_start; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Projek End <?php echo form_error('projek_end') ?></td>
                                    <td><input type="date" class="form-control" id="example-date" name="projek_end" id="datepicker-1" placeholder="Projek End" value="<?php echo $projek_end; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Projek Desk <?php echo form_error('projek_desk') ?></td>
                                    <td> <textarea class="form-control" non_pks="3" name="projek_desk" id="summernote" placeholder="Projek Desk"><?php echo $projek_desk; ?></textarea></td>
                                </tr>
                                <tr>
                                    <td width='200'>Aktif <?php echo form_error('aktif') ?></td>
                                    <td>
                                        <?php echo form_dropdown('aktif', array('y' => 'AKTIF', 'n' => 'TIDAK AKTIF'), $aktif, array('class' => 'form-control')); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="hidden" name="id_projek" value="<?php echo $id_projek; ?>" />
                                        <button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button>
                                        <a href="<?php echo site_url('web_projek') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a>
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
<script src="<?php echo base_url() ?>assets/smartadmin-slim/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin-slim/js/app.bundle.js"></script>
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