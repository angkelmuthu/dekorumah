<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>INPUT DATA CABANG</h2>
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
                                    <td width='200'>Cabang Kota <?php echo form_error('cabang_kota') ?></td>
                                    <td><input type="text" class="form-control" name="cabang_kota" id="cabang_kota" placeholder="Cabang Kota" value="<?php echo $cabang_kota; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Cabang Alamat <?php echo form_error('cabang_alamat') ?></td>
                                    <td><input type="text" class="form-control" name="cabang_alamat" id="cabang_alamat" placeholder="Cabang Alamat" value="<?php echo $cabang_alamat; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Cabang Tlpn <?php echo form_error('cabang_tlpn') ?></td>
                                    <td><input type="text" class="form-control" name="cabang_tlpn" id="cabang_tlpn" placeholder="Cabang Tlpn" value="<?php echo $cabang_tlpn; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Cabang Map <?php echo form_error('cabang_map') ?></td>
                                    <td> <textarea class="form-control" non_pks="3" name="cabang_map" id="cabang_map" placeholder="Cabang Map"><?php echo $cabang_map; ?></textarea></td>
                                </tr>
                                <tr>
                                    <td width='200'>Aktif <?php echo form_error('aktif') ?></td>
                                    <td>
                                        <?php echo form_dropdown('aktif', array('y' => 'AKTIF', 'n' => 'TIDAK AKTIF'), $aktif, array('class' => 'form-control')); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="hidden" name="id" value="<?php echo $id; ?>" />
                                        <button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button>
                                        <a href="<?php echo site_url('web_cabang') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a>
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
<script src="<?php echo base_url() ?>assets/smartadmin/js/kostum.js"></script>