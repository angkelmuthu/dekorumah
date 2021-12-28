<link rel="stylesheet" media="screen, print" href="<?php echo base_url() ?>assets/smartadmin/css/formplugins/summernote/summernote.css">
<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>INPUT DATA TESTIMONI</h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">

                            <table class='table table-striped'>


                                <tr>
                                    <td width='200'>Client Name <?php echo form_error('client_name') ?></td>
                                    <td><input type="text" class="form-control" name="client_name" id="client_name" placeholder="Client Name" value="<?php echo $client_name; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Client Desk <?php echo form_error('client_desk') ?></td>
                                    <td> <textarea class="form-control" non_pks="3" name="client_desk" id="client_desk" placeholder="Client Desk"><?php echo $client_desk; ?></textarea></td>
                                </tr>
                                <tr>
                                    <td width='200'>Client Testi <?php echo form_error('client_testi') ?></td>
                                    <td> <textarea class="form-control" non_pks="3" name="client_testi" id="summernote" placeholder="Client Testi"><?php echo $client_testi; ?></textarea></td>
                                </tr>
                                <tr>
                                    <td width='200'>Client Rate <?php echo form_error('client_rate') ?></td>
                                    <td><input type="number" class="form-control" name="client_rate" id="client_rate" placeholder="Client Rate" value="<?php echo $client_rate; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Aktif <?php echo form_error('aktif') ?></td>
                                    <td>
                                        <?php echo form_dropdown('aktif', array('y' => 'AKTIF', 'n' => 'TIDAK AKTIF'), $aktif, array('class' => 'form-control')); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width='200'>Client Foto <?php echo form_error('client_foto') ?></td>
                                    <td><input type="file" class="form-control" name="client_foto" id="client_foto" placeholder="Client Foto" value="<?php echo $client_foto; ?>" />
                                        <span class="help-block">Ukuran / resolusi gambar (55X55)</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="hidden" name="id" value="<?php echo $id; ?>" />
                                        <button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button>
                                        <a href="<?php echo site_url('web_testimoni') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a>
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