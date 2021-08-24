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
                                    <td width='200'>Barang <?php echo form_error('id_barang') ?></td>
                                    <td>
                                        <select name="id_barang" id="id_barang" class="select2 form-control w-100" required>
                                            <option value="">Select Barang Jenis</option>
                                            <?php
                                            $this->db->order_by('barang_jenis,barang ASC');
                                            $barang_jenis = $this->db->get('v_barang')->result();
                                            foreach ($barang_jenis as $row) {
                                                echo '<option value="' . $row->id_barang . '">' . $row->barang_jenis . ' - ' . $row->barang . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <!-- <tr>
                                    <td width='200'>Barang <?php echo form_error('id_barang') ?></td>
                                    <td>
                                        <div class="ajax-loader">
                                            <img id="loading-produksub" style="display:none;" src="<?php echo base_url() ?>assets/smartadmin/img/loading.gif" height="40px" class="img-responsive" />
                                        </div>
                                        <select name="id_barang" class="select2 form-control w-100" id="barang" required>
                                            <option value="">Select Barang</option>
                                        </select>
                                    </td>
                                </tr> -->
                                <tr>
                                    <td width='200'>Stok</td>
                                    <td><input type="number" class="form-control" name="stok" id="stok" placeholder="stok" value="" readonly /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Gudang</td>
                                    <td><input type="text" class="form-control" name="gudang" id="gudang" placeholder="gudang" value="" readonly /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Harga (satuan) <?php echo form_error('harga_satuan') ?></td>
                                    <td><input type="text" class="form-control" name="harga_satuan" id="harga_satuan" placeholder="harga_satuan" value="<?php echo $harga_satuan; ?>" readonly required /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Qty <?php echo form_error('qty') ?></td>
                                    <td><input type="number" class="form-control" name="qty" id="qty" placeholder="Qty" value="<?php echo $qty; ?>" required /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Total Harga</td>
                                    <td><input type="text" class="form-control" name="total" id="total" placeholder="total" value="<?php echo $total; ?>" readonly required /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Note <?php echo form_error('note') ?></td>
                                    <td><textarea class="form-control" name="note" id="note"><?php echo $note; ?></textarea></td>
                                </tr>
                                <!-- <tr>
                                    <td width='200'>Total <?php echo form_error('total') ?></td>
                                    <td><input type="number" class="form-control" name="total" id="total" placeholder="Total" value="<?php echo $total; ?>" /></td>
                                </tr> -->
                                <tr>
                                    <td></td>
                                    <td><input type="hidden" name="id_material" value="<?php echo $id_material; ?>" />
                                        <input type="hidden" name="id_user" value="<?php echo $this->session->userdata('full_name') ?>" />
                                        <input type="hidden" name="create_date" value="<?php echo date('Y-m-d H:s:i'); ?>" />
                                        <button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button>
                                        <a href="<?php echo site_url('t_material_tukang') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a>
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
        $('#id_barang').change(function() {
            $("#qty, #harga_satuan").keyup(function() {
                var hargax = $("#harga_satuan").val();
                var harga = parseInt(hargax.replace(/,.*|[^0-9]/g, ''), 10);
                var volume = $("#qty").val();
                var stok1 = $("#stok").val();
                var gudang1 = $("#gudang").val();
                var stokx = parseInt(stok1.replace(/,.*|[^0-9]/g, ''), 10);
                var total = parseInt(harga) * volume;
                if (gudang1 === 'IN') {
                    if (volume > stokx) {
                        if (confirm("Qty yang anda masukkan melebihi stok yang ada " + stok1)) {
                            $('#qty').val('');
                            $('#total').val('');
                        } else {
                            $('#qty').val('');
                            $('#total').val('');
                        }
                    } else {
                        fixed = total.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
                        $("#total").val(fixed);
                    }
                } else {
                    fixed = total.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
                    $("#total").val(fixed);
                }
            });
        });

        // $("#qty").keyup(function() {
        //     var qty = $("#qty").val();
        //     var stokx = $("#stok").val();
        //     if (qty > stokx) {
        //         //window.confirm("Nilai alokasi yang anda masukkan melebihi sisa anggaran.");
        //         if (confirm("Qty yang anda masukkan melebihi stok yang ada")) {
        //             $('#qty').val('');
        //         } else {
        //             $('#qty').val('');
        //         }
        //     }
        // });

        $('#barang_jenis').change(function() {
            var id_barang_jenis = $('#barang_jenis').val();
            if (id_barang_jenis != '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>t_material/fetch_barang",
                    method: "POST",
                    data: {
                        id_barang_jenis: id_barang_jenis
                    },
                    success: function(data) {
                        $('#id_barang').html(data);
                        //$('#produk_detail').html('<option value="">Select Detail produk</option>');
                    }
                });
            } else {
                $('#id_barang').html('<option value="">Select Barang</option>');
                //$('#produk_detail').html('<option value="">Select produk_detail</option>');
            }
        });

        $('#id_barang').change(function() {
            var id_barang = $('#id_barang').val();
            var id_barang_jenis = $('#barang_jenis').val();
            if (id_barang_jenis != '' && id_barang != '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>t_material_tukang/fetch_barang_harga",
                    method: "POST",
                    data: {
                        id_barang: id_barang,
                        id_barang_jenis: id_barang_jenis
                    },
                    success: function(data) {
                        var json = data,
                            obj = JSON.parse(json);
                        hargax = obj.harga.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
                        stok = obj.stok.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
                        //gudangx = parseInt(obj.gudang).toLocaleString();
                        $('#harga_satuan').val(hargax);
                        $('#stok').val(stok);
                        $('#gudang').val(obj.gudang);
                    }
                });
            } else {
                $('#harga_satuan').val('');
                $('#stok').val('');
                $('#gudang').val('');
            }
        });

    });
</script>