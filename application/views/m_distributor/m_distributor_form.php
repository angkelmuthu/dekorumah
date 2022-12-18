<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>INPUT DATA M_DISTRIBUTOR</h2>
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
                                    <td width='200'>Nm Distributor <?php echo form_error('nm_distributor') ?></td>
                                    <td><input type="text" class="form-control" name="nm_distributor" id="nm_distributor" placeholder="Nm Distributor" value="<?php echo $nm_distributor; ?>" required /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Alamat <?php echo form_error('alamat') ?></td>
                                    <td><input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Tlp1 <?php echo form_error('tlp1') ?></td>
                                    <td><input type="number" class="form-control" name="tlp1" id="tlp1" placeholder="Tlp1" value="<?php echo $tlp1; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Tlp2 <?php echo form_error('tlp2') ?></td>
                                    <td><input type="number" class="form-control" name="tlp2" id="tlp2" placeholder="Tlp2" value="<?php echo $tlp2; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Keterangan <?php echo form_error('keterangan') ?></td>
                                    <td><input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?php echo $keterangan; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Aktif <?php echo form_error('aktif') ?></td>
                                    <td><?php echo form_dropdown('aktif', array('y' => 'AKTIF', 'n' => 'TIDAK AKTIF'), $aktif, array('class' => 'form-control')); ?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="hidden" name="id_distributor" value="<?php echo $id_distributor; ?>" />
                                        <button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button>
                                        <a href="<?php echo site_url('m_distributor') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a>
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