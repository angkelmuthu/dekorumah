<form action="<?php echo site_url('t_po/bayar') ?>" method="POST">
    <table class='table table-sm'>
        <input class="form-control" id="id_po" type="hidden" name="id_po" value="<?php echo $id_po ?>">
        <input class="form-control" id="id_pelanggan" type="hidden" name="id_pelanggan" value="<?php echo $id_pelanggan ?>">
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