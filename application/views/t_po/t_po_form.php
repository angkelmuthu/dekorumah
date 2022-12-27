<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>INPUT DATA PURCHASE ORDER</h2>
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
                                    <td width='200'>No Po <?php echo form_error('no_po') ?></td>
                                    <td><input type="text" class="form-control" name="no_po" id="no_po" placeholder="No Po" value="<?php echo $no_po; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Id Distributor <?php echo form_error('id_distributor') ?></td>
                                    <td><?php echo select2_dinamis('id_distributor', 'm_desk', 'id_distributor', 'nm_distributor') ?></td>
                                </tr>
                                <tr>
                                    <td width='200'>Id Permintaan <?php echo form_error('id_permintaan') ?></td>
                                    <td><input type="text" class="form-control" name="id_permintaan" id="id_permintaan" placeholder="Id Permintaan" value="<?php echo $id_permintaan; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Total <?php echo form_error('total') ?></td>
                                    <td><input type="text" class="form-control" name="total" id="total" placeholder="Total" value="<?php echo $total; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Diskon <?php echo form_error('diskon') ?></td>
                                    <td><input type="text" class="form-control" name="diskon" id="diskon" placeholder="Diskon" value="<?php echo $diskon; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Ppn <?php echo form_error('ppn') ?></td>
                                    <td><input type="text" class="form-control" name="ppn" id="ppn" placeholder="Ppn" value="<?php echo $ppn; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Biaya Lain <?php echo form_error('biaya_lain') ?></td>
                                    <td><input type="text" class="form-control" name="biaya_lain" id="biaya_lain" placeholder="Biaya Lain" value="<?php echo $biaya_lain; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Grand Total <?php echo form_error('grand_total') ?></td>
                                    <td><input type="text" class="form-control" name="grand_total" id="grand_total" placeholder="Grand Total" value="<?php echo $grand_total; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Id Users <?php echo form_error('id_users') ?></td>
                                    <td><input type="text" class="form-control" name="id_users" id="id_users" placeholder="Id Users" value="<?php echo $id_users; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Create By <?php echo form_error('create_by') ?></td>
                                    <td><input type="text" class="form-control" name="create_by" id="create_by" placeholder="Create By" value="<?php echo $create_by; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Create Date <?php echo form_error('create_date') ?></td>
                                    <td><input type="text" class="form-control" name="create_date" id="create_date" placeholder="Create Date" value="<?php echo $create_date; ?>" /></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="hidden" name="id_po" value="<?php echo $id_po; ?>" />
                                        <button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button>
                                        <a href="<?php echo site_url('t_po') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a>
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