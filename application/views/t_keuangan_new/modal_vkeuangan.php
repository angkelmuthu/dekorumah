    <table class='table table-striped'>
        <tr>
            <td width='200'>Jenis Biaya</td>
            <td>
                <div class="frame-wrap">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="defaultInline1Radio<?php echo $idx ?>" name="jenis" value="debit" <?php echo ($bayar->debit > 0) ?  "checked" : "";  ?>>
                        <label class="custom-control-label" for="defaultInline1Radio">Debit</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="defaultInline2Radio<?php echo $idx ?>" name="jenis" value="kredit" <?php echo ($bayar->kredit > 0) ?  "checked" : "";  ?>>
                        <label class="custom-control-label" for="defaultInline2Radio">Kredit</label>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td width='200'>Rekening</td>
            <td><?php echo $bayar->rek ?></td>
        </tr>
        <tr>
            <td width='200'>No. Referensi</td>
            <td><?php echo $bayar->noref ?></td>
        </tr>
        <tr>
            <td width='200'>Perihal</td>
            <td><?php echo $bayar->perihal ?></td>
        </tr>
        <tr>
            <td width='200'>Nominal</td>
            <td>
                <?php if ($bayar->debit == 0) {
                    echo formatRP0($bayar->kredit);
                } else {
                    echo formatRP0($bayar->debit);
                } ?>
            </td>
        </tr>
        <tr>
            <td width='200'>Keterangan</td>
            <td><?php echo $bayar->keterangan ?></td>
        </tr>
        <tr>
            <td width='200'>File</td>

            <td><a href="<?php echo base_url() . 'assets/gambar/' . $bayar->file ?>" target="_blank" class="btn btn-sm btn-primary">Lihat</a></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="3">
                <button type="submit" class="btn btn-block btn-warning">Simpan</button>
                <button type="button" class="btn btn-block btn-secondary" data-dismiss="modal">Batal</button>
            </td>
        </tr>
    </table>
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