<link rel="stylesheet" media="screen, print" href="<?php echo base_url() ?>assets/smartadmin/css/formplugins/summernote/summernote.css">
<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>INPUT DATA BENEFIT</h2>
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
                                    <td width='200'>Benefit Title <?php echo form_error('benefit_title') ?></td>
                                    <td><input type="text" class="form-control" name="benefit_title" id="benefit_title" placeholder="Benefit Title" value="<?php echo $benefit_title; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Benefit Deskripsi <?php echo form_error('benefit_deskripsi') ?></td>
                                    <td> <textarea class="form-control" non_pks="3" name="benefit_deskripsi" id="benefit_deskripsi" placeholder="Benefit Deskripsi"><?php echo $benefit_deskripsi; ?></textarea></td>
                                </tr>
                                <tr>
                                    <td width='200'>Benefit File <?php echo form_error('benefit_file') ?></td>
                                    <td><input type="file" class="form-control" name="benefit_file" id="benefit_file" placeholder="Benefit File" value="" />
                                        <span class="help-block">
                                            Ukuran / resolusi gambar (470x540)
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td width='200'>Benefit Icon 1 <?php echo form_error('benefit_icon_1') ?></td>
                                    <td><input type="text" class="form-control" name="benefit_icon_1" id="benefit_icon_1" placeholder="Benefit Icon 1" value="<?php echo $benefit_icon_1; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Benefit Title 1 <?php echo form_error('benefit_title_1') ?></td>
                                    <td><input type="text" class="form-control" name="benefit_title_1" id="benefit_title_1" placeholder="Benefit Title 1" value="<?php echo $benefit_title_1; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Benefit Desk 1 <?php echo form_error('benefit_desk_1') ?></td>
                                    <td> <textarea class="form-control" non_pks="3" name="benefit_desk_1" id="benefit_desk_1" placeholder="Benefit Desk 1"><?php echo $benefit_desk_1; ?></textarea></td>
                                </tr>
                                <tr>
                                    <td width='200'>Benefit Icon 2 <?php echo form_error('benefit_icon_2') ?></td>
                                    <td><input type="text" class="form-control" name="benefit_icon_2" id="benefit_icon_2" placeholder="Benefit Icon 2" value="<?php echo $benefit_icon_2; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Benefit Title 2 <?php echo form_error('benefit_title_2') ?></td>
                                    <td><input type="text" class="form-control" name="benefit_title_2" id="benefit_title_2" placeholder="Benefit Title 2" value="<?php echo $benefit_title_2; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Benefit Desk 2 <?php echo form_error('benefit_desk_2') ?></td>
                                    <td> <textarea class="form-control" non_pks="3" name="benefit_desk_2" id="benefit_desk_2" placeholder="Benefit Desk 2"><?php echo $benefit_desk_2; ?></textarea></td>
                                </tr>
                                <tr>
                                    <td width='200'>Benefit Icon 3 <?php echo form_error('benefit_icon_3') ?></td>
                                    <td><input type="text" class="form-control" name="benefit_icon_3" id="benefit_icon_3" placeholder="Benefit Icon 3" value="<?php echo $benefit_icon_3; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Benefit Title 3 <?php echo form_error('benefit_title_3') ?></td>
                                    <td><input type="text" class="form-control" name="benefit_title_3" id="benefit_title_3" placeholder="Benefit Title 3" value="<?php echo $benefit_title_3; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Benefit Desk 3 <?php echo form_error('benefit_desk_3') ?></td>
                                    <td> <textarea class="form-control" non_pks="3" name="benefit_desk_3" id="benefit_desk_3" placeholder="Benefit Desk 3"><?php echo $benefit_desk_3; ?></textarea></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="hidden" name="id" value="<?php echo $id; ?>" />
                                        <button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button>
                                        <a href="<?php echo site_url('web_benefit') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a>
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