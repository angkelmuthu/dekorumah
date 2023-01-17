<form action="<?php echo site_url('t_keuangan_new/update_action') ?>" method="post" enctype="multipart/form-data">
    <input class="form-control" type="hidden" name="id" value="<?php echo $idx ?>">
    <table class='table table-striped'>
        <tr>
            <td width='200'>Jenis Biaya</td>
            <td>
                <div class="frame-wrap">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="defaultInline1Radio" name="jenis" value="debit" <?php echo ($bayar->debit > 0) ?  "checked" : "";  ?>>
                        <label class="custom-control-label" for="defaultInline1Radio">Debit</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="defaultInline2Radio" name="jenis" value="kredit" <?php echo ($bayar->kredit > 0) ?  "checked" : "";  ?>>
                        <label class="custom-control-label" for="defaultInline2Radio">Kredit</label>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td width='200'>Rekening</td>
            <td><?php echo cmb_dinamis_concate('id_dana', 't_sumber_dana', 'id_dana', 'nama_dana', 'norek', $bayar->id_dana, '', 'id_dana DESC') ?></td>
        </tr>
        <tr>
            <td width='200'>No. Referensi</td>
            <td><input class="form-control" type="text" name="noref" value="<?php echo $bayar->noref ?>" required></td>
        </tr>
        <tr>
            <td width='200'>Perihal</td>
            <td><input class="form-control" type="text" name="perihal" value="<?php echo $bayar->perihal ?>" required></td>
        </tr>
        <tr>
            <td width='200'>Nominal</td>
            <td><input class="form-control rupiah" type="text" name="total" value="<?php if ($bayar->debit == 0) {
                                                                                        echo $bayar->kredit;
                                                                                    } else {
                                                                                        echo $bayar->debit;
                                                                                    } ?>" required></td>
        </tr>
        <tr>
            <td width='200'>Keterangan</td>
            <td><textarea class="form-control" type="text" name="keterangan"><?php echo $bayar->keterangan ?></textarea></td>
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
<script src="<?php echo base_url() ?>assets/smartadmin-slim/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin-slim/js/app.bundle.js"></script>
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