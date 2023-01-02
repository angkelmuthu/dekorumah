<form action="<?php echo site_url('t_po/bayar') ?>" method="POST">
    <table class='table table-sm'>
        <input class="form-control" id="id_po" type="hidden" name="id_po" value="<?php echo $id_po ?>">
        <input class="form-control" id="id_pelanggan" type="hidden" name="id_pelanggan" value="<?php echo $id_pelanggan ?>">
        <tr>
            <td width='200'>Rekening</td>
            <td><?php echo cmb_dinamis_concate('id_dana', 't_sumber_dana', 'id_dana', 'nama_dana', 'norek', $id_dana, '', 'id_dana DESC') ?></td>
        </tr>
        <tr>
            <td width='200'>Jumlah</td>
            <td>
                <input class="form-control rupiah" id="total" type="text" name="total" value="<?php echo $jumlah ?>" required>
            </td>
        </tr>
        <tr>
            <td width='200'>Diskon/Potongan</td>
            <td>
                <input class="form-control rupiah" id="diskon" type="text" name="diskon" value="<?php echo $diskon ?>" required>
            </td>
        </tr>
        <tr>
            <td width='200'>Ppn</td>
            <td>
                <input class="form-control rupiah" id="ppn" type="text" name="ppn" value="<?php echo $ppn ?>" required>
            </td>
        </tr>
        <tr>
            <td width='200'>Total</td>
            <td>
                <input class="form-control rupiah" id="grand_total" type="text" name="grand_total" value="<?php echo $grand_total ?>" required>
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
        $(".rupiah").inputmask({
            prefix: '',
            radixPoint: ',',
            groupSeparator: ".",
            alias: "numeric",
            autoGroup: true,
            digits: 0
        });

        $("#total,#diskon,#ppn,#grand_total").keyup(function() {
            var total1 = $("#total").val();
            var total2 = total1.replace(".", "");
            var total3 = total2.replace(".", "");
            var total4 = total3.replace(".", "");
            var diskon1 = $("#diskon").val();
            var diskon2 = diskon1.replace(".", "");
            var diskon3 = diskon2.replace(".", "");
            var diskon4 = diskon3.replace(".", "");
            var ppn1 = $("#ppn").val();
            var ppn2 = ppn1.replace(".", "");
            var ppn3 = ppn2.replace(".", "");
            var ppn4 = ppn3.replace(".", "");
            var grand_total = parseInt(total4) - parseInt(diskon4) + parseInt(ppn4);
            //var grand_total = (totalx) + (ppn4);
            $("#grand_total").val(grand_total);
        });

    });
</script>