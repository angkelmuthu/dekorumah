<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>INPUT DATA MATERIAL</h2>
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
                                    <td width='200'>Id Invoice <?php echo form_error('id_invoice') ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td width='200'>Id Barang <?php echo form_error('id_barang') ?></td>
                                    <td><?php echo select2_dinamis('id_barang', 'm_barang', 'id_barang', 'barang') ?></td>
                                </tr>
                                <tr>
                                    <td width='200'>Qty <?php echo form_error('qty') ?></td>
                                    <td><input type="number" class="form-control" name="qty" id="qty" placeholder="Qty" value="<?php echo $qty; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Harga Satuan <?php echo form_error('harga_satuan') ?></td>
                                    <td><input type="number" class="form-control" name="harga_satuan" id="harga_satuan" placeholder="Harga Satuan" value="<?php echo $harga_satuan; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Total <?php echo form_error('total') ?></td>
                                    <td><input type="number" class="form-control" name="total" id="total" placeholder="Total" value="<?php echo $total; ?>" /></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="hidden" name="id_material" value="<?php echo $id_material; ?>" />
                                        <input type="hidden" name="id_invoice" value="<?php echo $this->uri->segment('3'); ?>" />
                                        <input type="hidden" name="id_user" value="<?php echo $this->session->userdata('id_users') ?>" />
                                        <input type="hidden" name="create_date" value="<?php echo date('Y-m-d H:s:i'); ?>" />
                                        <button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button>
                                        <a href="<?php echo site_url('t_material') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a>
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