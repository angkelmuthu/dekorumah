<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>INPUT DATA DATA SALES</h2>
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
                                    <td width='200'>Nm Sales <?php echo form_error('nm_sales') ?></td>
                                    <td><input type="text" class="form-control" name="nm_sales" id="nm_sales" placeholder="Nm Sales" value="<?php echo $nm_sales; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Status Aktif <?php echo form_error('group') ?></td>
                                    <td>
                                        <?php echo form_dropdown('group', array('SALES' => 'SALES', 'TUKANG' => 'TUKANG'), $group, array('class' => 'form-control')); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width='200'>Aktif <?php echo form_error('aktif') ?></td>
                                    <td><?php echo form_dropdown('aktif', array('Y' => 'AKTIF', 'N' => 'TIDAK AKTIF'), $aktif, array('class' => 'form-control')); ?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="hidden" name="id_sales" value="<?php echo $id_sales; ?>" />
                                        <button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button>
                                        <a href="<?php echo site_url('m_sales') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a>
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