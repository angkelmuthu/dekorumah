<form action="<?php echo site_url('t_po/input_barang') ?>" method="POST">
    <table class='table table-sm'>
        <input class="form-control" id="id_po" type="hidden" name="id_po" value="<?php echo $id_po ?>">
        <input class="form-control" id="id_pelanggan" type="hidden" name="id_pelanggan" value="<?php echo $id_pelanggan ?>">
        <tr>
            <td width='200'>Barang</td>
            <td><?php echo select2_dinamis('id_permintaan', 'v_permintaan_barang', 'id_permintaan', 'barang', '', '', 'create_date ASC') ?></td>
        </tr>
        <tr>
            <td width='200'>No. RO <img id="loading-barang" style="display:none;" src="<?php echo base_url() ?>assets/loading-kecil.gif" height="25" class="img-responsive" /></td>
            <td>
                <input class="form-control" id="no_ro" type="text" name="no_ro" value="" readonly>
                <input class="form-control" id="id_barang" type="hidden" name="id_barang" value="" readonly>
                <input class="form-control" id="nm_barang" type="hidden" name="nm_barang" value="" readonly>
            </td>
        </tr>
        <tr>
            <td width='200'>Qty <img id="loading-barang" style="display:none;" src="<?php echo base_url() ?>assets/loading-kecil.gif" height="25" class="img-responsive" /></td>
            <td>
                <input class="form-control" id="qty" type="number" name="qty" value="" required>
            </td>
        </tr>
        <tr>
            <td width='200'>Harga Satuan</td>
            <td>
                <input class="form-control" id="harga_satuan" type="text" name="harga_satuan" value="" required>
            </td>
        </tr>
        <tr>
            <td width='200'>Total</td>
            <td>
                <input class="form-control" id="harga_total" type="text" name="harga_total" value="" required>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <button type="submit" class="btn btn-block btn-warning">Simpan</button>
                <button type="button" class="btn btn-block btn-secondary" data-dismiss="modal">Batal</button>
            </td>
        </tr>
    </table>
</form>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/formplugins/inputmask/inputmask.bundle.js"></script>
<!-- <script src="<?php echo base_url() ?>assets/smartadmin/js/formplugins/select2/select2.bundle.js"></script> -->
<script type="text/javascript">
    $(document).ready(function() {
        $("#harga_satuan").inputmask({
            prefix: '',
            radixPoint: ',',
            groupSeparator: ".",
            alias: "numeric",
            autoGroup: true,
            digits: 0
        });
        $("#harga_total").inputmask({
            prefix: '',
            radixPoint: ',',
            groupSeparator: ".",
            alias: "numeric",
            autoGroup: true,
            digits: 0
        });
        $("#qty,#harga_satuan").keyup(function() {
            var qty = $("#qty").val();
            var harga_satuan1 = $("#harga_satuan").val();
            var harga_satuan2 = harga_satuan1.replace(".", "");
            var harga_satuan3 = harga_satuan2.replace(".", "");
            var harga_satuan4 = harga_satuan3.replace(".", "");
            var total = harga_satuan4 * qty;
            $("#harga_total").val(total);
        });

        $('#id_permintaan').on('change', function() {
            var id_permintaan = $(this).val();
            if (id_permintaan != '') {
                $.ajax({
                    url: "<?php echo base_url(); ?>t_po/fetch_barang",
                    method: "POST",
                    data: {
                        id_permintaan: id_permintaan
                    },
                    beforeSend: function() {
                        $("#loading-barang").show();
                    },
                    success: function(data) {
                        var row = JSON.parse(data);
                        $('#qty').val(row.qty);
                        $('#no_ro').val(row.no_ro);
                        $('#id_barang').val(row.id_barang);
                        $('#nm_barang').val(row.barang);
                    },
                    complete: function() {
                        $('#loading-barang').hide();
                    }
                });
            } else {
                $('#qty').val();
                $('#no_ro').val();
                $('#id_barang').val();
                $('#nm_barang').val();
            }
        });
    });
</script>