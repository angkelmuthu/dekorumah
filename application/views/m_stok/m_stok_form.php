<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>INPUT DATA STOK BARANG</h2>
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
                                    <td width='200'>Id Barang <?php echo form_error('id_barang') ?></td>
                                    <td><?php echo select2_dinamis('id_barang', 'm_barang', 'id_barang', 'barang') ?></td>
                                </tr>
                                <tr>
                                    <td width='200'>Harga Satuan <?php echo form_error('harga_satuan') ?></td>
                                    <td><input type="number" class="form-control" name="harga_satuan" id="harga_satuan" placeholder="Harga Satuan" value="<?php echo $harga_satuan; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Stok <?php echo form_error('stok') ?></td>
                                    <td><input type="number" class="form-control" name="stok" id="stok" placeholder="Stok" value="<?php echo $stok; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Id User <?php echo form_error('id_user') ?></td>
                                    <td><input type="text" class="form-control" name="id_user" id="id_user" placeholder="Id User" value="<?php echo $this->session->userdata('id_users') ?>" readonly /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Update Date <?php echo form_error('update_date') ?></td>
                                    <td><input type="text" class="form-control" name="update_date" id="update_date" placeholder="Update Date" value="<?php echo date('Y-m-d H:s:i'); ?>" /></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="hidden" name="id_stok" value="<?php echo $id_stok; ?>" />
                                        <button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button>
                                        <a href="<?php echo site_url('m_stok') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a>
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