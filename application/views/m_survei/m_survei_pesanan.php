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
                        // $id_survei = $this->uri->segment(3);
                        // $this->db->from('m_survei');
                        // $this->db->where('id_survei', $id_survei);
                        // $dt = $this->db->get()->row();
                        // $tgl = date("Ym", strtotime($dt->created_date));
                        // $id_max = str_pad($id_survei, 3, '0', STR_PAD_LEFT);
                        // $no = $tgl . $id_max;
                        ?>
                        <form action="<?php echo $action; ?>" method="post">
                            <table class='table table-striped'>
                                <!-- <tr>
                                    <td width='200'>No Pesanan <?php echo form_error('no_pesanan') ?></td>
                                    <td><input type="text" class="form-control" name="no_pesanan" id="no_pesanan" placeholder="No Pesanan" value="<?php echo $no; ?>" readonly /></td>
                                </tr> -->
                                <tr>
                                    <td width='200'>produk</td>
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
                                    <td width='200'>produk Detail <?php echo form_error('id_produk') ?></td>
                                    <td>
                                        <div class="ajax-loader">
                                            <img id="loading-produk_detail" style="display:none;" src="<?php echo base_url() ?>assets/smartadmin/img/loading.gif" height="40px" class="img-responsive" />
                                        </div>
                                        <select name="id_produk_detail" class="select2 form-control w-100" id="produk_detail" required>
                                            <option value="">Select produk Detail</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td width='200'>Satuan</td>
                                    <td>
                                        <select name="id_satuan" class="select2 form-control w-100" id="satuan" required>
                                            <option value="">Pilih Satuan</option>
                                            <?php
                                            $this->db->where('aktif', 'Y');
                                            $result = $this->db->get('m_satuan')->result();
                                            foreach ($result as $dt) {
                                                echo '<option value="' . $dt->id_satuan . '">' . $dt->satuan . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <div>
                                    <tr id="req" style="display: none;">
                                        <td width='200'>Qty <?php echo form_error('qty') ?></td>
                                        <td><input type="text" class="form-control" name="qty" id="qty" placeholder="qty" value="<?php echo $qty; ?>" /></td>
                                    </tr>
                                </div>
                                <tr>
                                    <td width='200'>Ukuran <?php echo form_error('ukuran') ?></td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="md-form">
                                                    <input type="text" id="panjang" name="panjang" value="<?php echo $panjang; ?>" class="form-control" required>
                                                    <label for="panjang" class="">Panjang</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="md-form">
                                                    <input type="text" id="lebar" name="lebar" value="<?php echo $lebar; ?>" class="form-control" required>
                                                    <label for="lebar" class="">Lebar</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="md-form">
                                                    <input type="text" id="tinggi" name="tinggi" value="<?php echo $tinggi; ?>" class="form-control" required>
                                                    <label for="tinggi" class="">Tinggi</label>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td width='200'>Harga (satuan) <?php echo form_error('volume') ?></td>
                                    <td><input type="text" class="form-control" name="harga" id="harga" placeholder="harga" value="<?php echo $harga; ?>" required /></td>
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
                                        <input type="hidden" name="id_survei" value="<?php echo $this->uri->segment(3); ?>" />
                                        <input type="hidden" name="id_pesanan" value="<?php echo $id_pesanan; ?>" />
                                        <button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button>
                                        <a href="<?php echo site_url('m_survei/read/' . $this->uri->segment(3)) ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a>
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
<script>
    $(document).ready(function() {
        $('#satuan').change(function() {
            var id_satuan = $('#satuan').val();
            if (id_satuan == 1) {
                $("#req").hide();
                $("#panjang, #harga").keyup(function() {
                    var hargax = $("#harga").val();
                    var harga = parseInt(hargax.replace(/,.*|[^0-9]/g, ''), 10);
                    var panjang = $("#panjang").val();
                    var total = parseInt(harga) * panjang;
                    fixed = total.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
                    $("#total").val(fixed);
                });
            } else if (id_satuan == 2) {
                $("#req").hide();
                $("#panjang,#tinggi, #harga").keyup(function() {
                    var hargax = $("#harga").val();
                    var harga = parseInt(hargax.replace(/,.*|[^0-9]/g, ''), 10);
                    var panjang = $("#panjang").val();
                    var tinggi = $("#tinggi").val();
                    var volume = panjang * tinggi;
                    var total = parseInt(harga) * volume;
                    fixed = total.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
                    $("#total").val(fixed);
                });
            } else if (id_satuan == 3) {
                $("#req").hide();
                $("#panjang,#lebar,#tinggi, #harga").keyup(function() {
                    var hargax = $("#harga").val();
                    var harga = parseInt(hargax.replace(/,.*|[^0-9]/g, ''), 10);
                    var panjang = $("#panjang").val();
                    var lebar = $("#lebar").val();
                    var tinggi = $("#tinggi").val();
                    var volume = panjang * lebar * tinggi;
                    var total = parseInt(harga) * volume;
                    fixed = total.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
                    $("#total").val(fixed);
                });
            } else {
                $("#req").show();
                $("#qty, #harga").keyup(function() {
                    var hargax = $("#harga").val();
                    var harga = parseInt(hargax.replace(/,.*|[^0-9]/g, ''), 10);
                    var volume = $("#qty").val();
                    var total = parseInt(harga) * volume;
                    fixed = total.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
                    $("#total").val(fixed);
                });
            }
        });


        $('#produk').change(function() {
            var id_produk = $('#produk').val();
            if (id_produk != '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>m_survei/fetch_produk_sub",
                    method: "POST",
                    data: {
                        id_produk: id_produk
                    },
                    success: function(data) {
                        $('#produk_sub').html(data);
                        $('#produk_detail').html('<option value="">Select Detail produk</option>');
                    }
                });
            } else {
                $('#produk_sub').html('<option value="">Select Sub produk</option>');
                $('#produk_detail').html('<option value="">Select produk_detail</option>');
            }
        });

        $('#produk_sub').change(function() {
            var id_produk = $('#produk').val();
            var id_produk_sub = $('#produk_sub').val();
            if (id_produk_sub != '' && id_produk != '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>m_survei/fetch_produk_detail",
                    method: "POST",
                    data: {
                        id_produk: id_produk,
                        id_produk_sub: id_produk_sub
                    },
                    success: function(data) {
                        $('#produk_detail').html(data);
                        $('#harga').val();
                    }
                });
            } else {
                $('#produk_detail').html('<option value="">Select produk_detail</option>');
                $('#harga').val();
            }
        });
        $('#produk_detail').change(function() {
            var id_produk_detail = $('#produk_detail').val();
            if (id_produk_detail != '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>m_survei/fetch_produk_harga",
                    method: "POST",
                    data: {
                        id_produk_detail: id_produk_detail
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