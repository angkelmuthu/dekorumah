<form action="<?php echo site_url('m_survei/upload_gambar') ?>" method="post" enctype="multipart/form-data">
    <input class="form-control" type="hidden" name="id_bayar" value="<?php echo $id_bayar ?>">
    <table class='table table-striped'>
        <tr>
            <td width='200'>No. Pembayaran</td>
            <td colspan="2"><input class="form-control" type="text" name="no_bayar" value="<?php echo $bayar->no_bayar ?>" readonly></td>
        </tr>
        <tr>
            <td width='200'>Nama Projek</td>
            <td colspan="2"><input class="form-control" type="text" name="nama_projek" value="<?php echo $bayar->nama_projek ?>" readonly></td>
        </tr>
        <tr>
            <td width='200'>Perihal</td>
            <td colspan="2"><input class="form-control" type="text" name="title" value="<?php echo $bayar->title ?>" required></td>
        </tr>
        <tr>
            <td width='200'>Nominal</td>
            <td colspan="2"><input class="form-control rupiah" type="text" name="total" value="<?php echo $bayar->total ?>" required></td>
        </tr>
        <tr>
            <td width='200'>Keterangan</td>
            <td colspan="2"><textarea class="form-control" type="text" name="keterangan"><?php echo $bayar->keterangan ?></textarea></td>
        </tr>
        <tr>
            <td width='200'>File</td>
            <td><input type="file" class="form-control-file" name="gambar"></td>
            <td><a href="<?php echo base_url() . 'assets/gambar/' . $bayar->file ?>" target="_blank" class="btn btn-sm btn-primary">Lihat</a></td>
        </tr>
        <tr>
            <td colspan="3">
                <button type="submit" class="btn btn-block btn-warning">Simpan</button>
                <button type="button" class="btn btn-block btn-secondary" data-dismiss="modal">Batal</button>
            </td>
        </tr>
    </table>
</form>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/formplugins/inputmask/inputmask.bundle.js"></script>
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
    });
</script>