<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>INPUT DATA PESANAN</h2>
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
                                <!-- <tr>
                                    <td width='200'>Nama Projek <?php echo form_error('id_pelanggan') ?></td>
                                    <td><?php echo select2_dinamis('id_pelanggan', 'm_pelanggan', 'id_pelanggan', 'nama_projek') ?></td>
                                </tr> -->
                                <tr>
                                    <td width='200'>Produk <?php echo form_error('id_produk') ?></td>
                                    <td><?php echo select2_dinamis('id_produk', 'm_produk', 'id_produk', 'nm_produk', $id_produk, '', 'id_produk ASC') ?></td>
                                </tr>
                                <tr>
                                    <td width='200'>Satuan <?php echo form_error('id_satuan') ?></td>
                                    <td><?php echo select2_dinamis('id_satuan', 'm_satuan', 'id_satuan', 'satuan', $id_satuan, '', 'id_satuan DESC') ?></td>
                                </tr>
                                <tr>
                                    <td width='200'>Harga Satuan <?php echo form_error('harga_satuan') ?></td>
                                    <td><input type="number" class="form-control" name="harga_satuan" id="harga_satuan" placeholder="Harga Satuan" value="<?php echo $harga_satuan; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Qty <?php echo form_error('qty') ?></td>
                                    <td><input type="number" class="form-control" name="qty" id="qty" placeholder="Qty" value="<?php echo $qty; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Harga Total <?php echo form_error('harga_total') ?></td>
                                    <td><input type="number" class="form-control" name="harga_total" id="harga_total" placeholder="Harga Total" value="<?php echo $harga_total; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Deskripsi <?php echo form_error('deskripsi') ?></td>
                                    <td><input type="text" class="form-control" name="deskripsi" id="deskripsi" placeholder="Deskripsi" value="<?php echo $deskripsi; ?>" /></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="hidden" name="id_order" value="<?php echo $id_order ?>" />
                                        <input type="hidden" name="id_pelanggan" value="<?php echo $this->uri->segment(3) ?>" />
                                        <button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button>
                                        <a href="<?php echo site_url('t_penjualan') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a>
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