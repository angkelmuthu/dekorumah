<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>INPUT DATA produk DETAIL</h2>
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
                                    <td width='200'>produk <?php echo form_error('id_produk') ?></td>
                                    <td>
                                        <select name="id_produk" id="produk" class="select2 form-control w-100">
                                            <option value="">Select produk</option>
                                            <?php
                                            foreach ($produk as $row) {
                                                echo '<option value="' . $row->id_produk . '">' . $row->nm_produk . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td width='200'>Sub produk <?php echo form_error('id_produk_sub') ?></td>
                                    <td>
                                        <div class="ajax-loader">
                                            <img id="loading-produksub" style="display:none;" src="<?php echo base_url() ?>assets/smartadmin/img/loading.gif" height="40px" class="img-responsive" />
                                        </div>
                                        <select name="id_produk_sub" class="select2 form-control w-100" id="produk_sub" required>
                                            <option value="">Select Sub produk</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td width='200'>Detail produk <?php echo form_error('nm_produk_detail') ?></td>
                                    <td><input type="text" class="form-control" name="nm_produk_detail" id="nm_produk_detail" placeholder="Nm produk Detail" value="<?php echo $nm_produk_detail; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Harga <?php echo form_error('harga') ?></td>
                                    <td><input type="number" class="form-control" name="harga" id="harga" placeholder="Harga" value="<?php echo $harga; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Aktif <?php echo form_error('aktif') ?></td>
                                    <td><?php echo cmb_dinamis('aktif', 'm_aktif', 'aktif', 'ket') ?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="hidden" name="id_produk_detail" value="<?php echo $id_produk_detail; ?>" />
                                        <button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button>
                                        <a href="<?php echo site_url('m_produk_detail') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a>
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
<script>
    $(document).ready(function() {
        $('#produk').change(function() {
            var id_produk = $('#produk').val();
            if (id_produk != '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>M_produk_detail/fetch_produk_sub",
                    method: "POST",
                    data: {
                        id_produk: id_produk
                    },
                    success: function(data) {
                        $('#produk_sub').html(data);
                    }
                });
            } else {
                $('#produk_sub').html('<option value="">Select Sub produk</option>');
            }
        });
    });
</script>