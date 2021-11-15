<link rel="stylesheet" media="screen, print" href="<?php echo base_url() ?>assets/smartadmin/css/formplugins/summernote/summernote.css">
<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>INPUT DATA KANTOR</h2>
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
                                    <td width='200'>Tlp <?php echo form_error('tlp') ?></td>
                                    <td><input type="text" class="form-control" name="tlp" id="tlp" placeholder="Tlp" value="<?php echo $tlp; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Wa <?php echo form_error('wa') ?></td>
                                    <td><input type="text" class="form-control" name="wa" id="wa" placeholder="Wa" value="<?php echo $wa; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Facebook <?php echo form_error('facebook') ?></td>
                                    <td><input type="text" class="form-control" name="facebook" id="facebook" placeholder="Facebook" value="<?php echo $facebook; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Instagram <?php echo form_error('instagram') ?></td>
                                    <td><input type="text" class="form-control" name="instagram" id="instagram" placeholder="Instagram" value="<?php echo $instagram; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Alamat <?php echo form_error('alamat') ?></td>
                                    <td><input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Note Pembayaran <?php echo form_error('note_bayar') ?></td>
                                    <td><textarea id="summernote" name="note_bayar" class="summernote"><?php echo $note_bayar; ?></textarea></td>
                                </tr>
                                <tr>
                                    <td width='200'>Note Pesanan Final <?php echo form_error('note_final') ?></td>
                                    <td><textarea id="summernote" name="note_final" class="summernote"><?php echo $note_final; ?></textarea></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="hidden" name="id" value="<?php echo $id; ?>" />
                                        <button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button>
                                        <a href="<?php echo site_url('m_desk') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a>
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
<script src="<?php echo base_url() ?>assets/smartadmin/js/kostum.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/formplugins/summernote/summernote.js"></script>
<script>
    $(document).ready(function() {
        $('.summernote').summernote({
            toolbar: [
                //[groupname, [button list]]

                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['view', ['codeview']],
            ]
        });
    });
</script>