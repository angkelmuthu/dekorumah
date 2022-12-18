<table class='table table-striped'>
    <tr>
        <td width='200'>Barang</td>
        <td><?php echo select2_dinamis('id_permintaan', 'v_permintaan_barang', 'id_permintaan', 'barang', '', '', 'create_date ASC') ?></td>
    </tr>
    <tr>
        <td width='200'>Tgl. PO</td>
        <td><input class="form-control" id="example-date" type="date" name="tgl_po" value="<?php echo date('Y-m-d') ?>"></td>
    </tr>
</table>