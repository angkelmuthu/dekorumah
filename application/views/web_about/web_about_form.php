<link rel="stylesheet" media="screen, print" href="<?php echo base_url() ?>assets/smartadmin/css/formplugins/summernote/summernote.css">
<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>INPUT DATA ABOUT US</h2>
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
                                    <td width='200'>About Title <?php echo form_error('about_title') ?></td>
                                    <td><input type="text" class="form-control" name="about_title" id="about_title" placeholder="About Title" value="<?php echo $about_title; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>About Desk <?php echo form_error('about_desk') ?></td>
                                    <td> <textarea class="form-control" non_pks="3" name="about_desk" id="summernote" placeholder="About Desk"><?php echo $about_desk; ?></textarea></td>
                                </tr>
                                <tr>
                                    <td width='200'>About Client <?php echo form_error('about_client') ?></td>
                                    <td><input type="text" class="form-control" name="about_client" id="about_client" placeholder="About Client" value="<?php echo $about_client; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>About Cabang <?php echo form_error('about_cabang') ?></td>
                                    <td><input type="text" class="form-control" name="about_cabang" id="about_cabang" placeholder="About Cabang" value="<?php echo $about_cabang; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>About Award <?php echo form_error('about_award') ?></td>
                                    <td><input type="text" class="form-control" name="about_award" id="about_award" placeholder="About Award" value="<?php echo $about_award; ?>" /></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="hidden" name="id" value="<?php echo $id; ?>" />
                                        <button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button>
                                        <a href="<?php echo site_url('web_about') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a>
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