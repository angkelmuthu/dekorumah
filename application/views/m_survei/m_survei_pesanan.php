<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>INPUT DATA DATA PESANAN</h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <?php
                        $id_survei = $this->uri->segment(3);
                        $this->db->from('m_survei');
                        $this->db->where('id_survei', $id_survei);
                        $dt = $this->db->get()->row();
                        $tgl = date("Ym", strtotime($dt->created_date));
                        $id_max = str_pad($id_survei, 3, '0', STR_PAD_LEFT);
                        $no = $tgl . $id_max;
                        ?>
                        <form action="<?php echo $action; ?>" method="post">
                            <table class='table table-striped'>
                                <tr>
                                    <td width='200'>No Pesanan <?php echo form_error('no_pesanan') ?></td>
                                    <td><input type="text" class="form-control" name="no_pesanan" id="no_pesanan" placeholder="No Pesanan" value="<?php echo $no; ?>" readonly /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Barang</td>
                                    <td>
                                        <select name="id_barang" id="barang" class="select2 form-control w-100">
                                            <option value="">Select Barang</option>
                                            <?php
                                            foreach ($barang as $row) {
                                                echo '<option value="' . $row->id_barang . '">' . $row->nm_barang . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td width='200'>Sub Barang <?php echo form_error('id_Barang_sub') ?></td>
                                    <td>
                                        <div class="ajax-loader">
                                            <img id="loading-barangsub" style="display:none;" src="<?php echo base_url() ?>assets/smartadmin/img/loading.gif" height="40px" class="img-responsive" />
                                        </div>
                                        <select name="id_barang_sub" class="select2 form-control w-100" id="barang_sub" required>
                                            <option value="">Select Sub Barang</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td width='200'>Barang Detail <?php echo form_error('id_barang') ?></td>
                                    <td>
                                        <div class="ajax-loader">
                                            <img id="loading-barang_detail" style="display:none;" src="<?php echo base_url() ?>assets/smartadmin/img/loading.gif" height="40px" class="img-responsive" />
                                        </div>
                                        <select name="id_barang_detail" class="select2 form-control w-100" id="barang_detail" required>
                                            <option value="">Select Barang Detail</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td width='200'>Ukuran <?php echo form_error('ukuran') ?></td>
                                    <td><input type="text" class="form-control" name="ukuran" id="ukuran" placeholder="ukuran" value="<?php echo $ukuran; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Qty/Volume <?php echo form_error('volume') ?></td>
                                    <td><input type="text" class="form-control" name="volume" id="volume" placeholder="Volume" value="<?php echo $volume; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Satuan</td>
                                    <td><input type="text" class="form-control" name="satuan" id="satuan" placeholder="satuan" value="<?php echo $satuan; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Harga (satuan/volume) <?php echo form_error('volume') ?></td>
                                    <td><input type="text" class="form-control" name="harga" id="harga" placeholder="harga" value="<?php echo $harga; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Total Harga</td>
                                    <td><input type="text" class="form-control" name="total" id="total" placeholder="total" value="<?php echo $harga; ?>" readonly /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Note <?php echo form_error('note') ?></td>
                                    <td> <textarea class="form-control" non_pks="3" name="note" id="note" placeholder="Note"><?php echo $note; ?></textarea></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <input type="hidden" name="created_date" value="<?php echo date('Y-m-d H:i:s'); ?>" />
                                        <input type="hidden" name="users" value="<?php echo $this->session->userdata('full_name') ?>" readonly />
                                        <input type="hidden" name="is_deleted" value="N" />
                                        <input type="hidden" name="id_survei" value="<?php echo $id_survei; ?>" />
                                        <input type="hidden" name="id_pesanan" value="<?php echo $id_pesanan; ?>" />
                                        <button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button>
                                        <a href="<?php echo site_url('m_survei/read/' . $this->uri->segment(3)) ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a></td>
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
        $("#volume, #harga").keyup(function() {
            var hargax = $("#harga").val();
            var harga = parseInt(hargax.replace(/,.*|[^0-9]/g, ''), 10);
            var volume = $("#volume").val();
            var total = parseInt(harga) * volume;
            fixed = total.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
            $("#total").val(fixed);
        });
        $('#barang').change(function() {
            var id_barang = $('#barang').val();
            if (id_barang != '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>m_survei/fetch_barang_sub",
                    method: "POST",
                    data: {
                        id_barang: id_barang
                    },
                    success: function(data) {
                        $('#barang_sub').html(data);
                        $('#barang_detail').html('<option value="">Select Detail Barang</option>');
                    }
                });
            } else {
                $('#barang_sub').html('<option value="">Select Sub Barang</option>');
                $('#barang_detail').html('<option value="">Select barang_detail</option>');
            }
        });

        $('#barang_sub').change(function() {
            var id_barang = $('#barang').val();
            var id_barang_sub = $('#barang_sub').val();
            if (id_barang_sub != '' && id_barang != '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>m_survei/fetch_barang_detail",
                    method: "POST",
                    data: {
                        id_barang: id_barang,
                        id_barang_sub: id_barang_sub
                    },
                    success: function(data) {
                        $('#barang_detail').html(data);
                        $('#harga').val();
                    }
                });
            } else {
                $('#barang_detail').html('<option value="">Select barang_detail</option>');
                $('#harga').val();
            }
        });
        $('#barang_detail').change(function() {
            var id_barang_detail = $('#barang_detail').val();
            if (id_barang_detail != '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>m_survei/fetch_barang_harga",
                    method: "POST",
                    data: {
                        id_barang_detail: id_barang_detail
                    },
                    success: function(data) {
                        var json = data,
                            obj = JSON.parse(json);
                        hargax = obj.harga.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
                        //hargax = parseInt(obj.harga).toLocaleString();
                        $('#harga').val(hargax);
                    }
                });
            } else {
                $('#harga').val('');
            }
        });

    });
</script>