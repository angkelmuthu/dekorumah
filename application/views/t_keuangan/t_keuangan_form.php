<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>INPUT DATA LAPORAN AKUNTANSI</h2>
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
                                    <td width='200'>Jenis Transaksi <?php echo form_error('id_group') ?></td>
                                    <td><?php echo radiobtn_dinamis('id_group', 'm_group', 'id_group', 'nm_group') ?></td>
                                </tr>
                                <tr>
                                    <td width='200'>Deskripsi <?php echo form_error('deskripsi') ?></td>
                                    <td><input type="text" class="form-control" name="deskripsi" id="deskripsi" placeholder="Deskripsi" value="<?php echo $deskripsi; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Total <?php echo form_error('total') ?></td>
                                    <td><input type="text" class="form-control" name="total" id="tanpa-rupiah" placeholder="Total" value="<?php echo $total; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Note <?php echo form_error('note') ?></td>
                                    <td><input type="text" class="form-control" name="note" id="note" placeholder="Note" value="<?php echo $note; ?>" /></td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td>
                                        <input type="hidden" name="created_date" value="<?php echo date('Y-m-d H:s:i'); ?>" />
                                        <input type="hidden" name="created_by" value="<?php echo $this->session->userdata('id_users') ?>" />
                                        <input type="hidden" name="id_buku" value="<?php echo $id_buku; ?>" />
                                        <button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button>
                                        <a href="<?php echo site_url('t_keuangan') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a>
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
    /* Tanpa Rupiah */
    var tanpa_rupiah = document.getElementById('tanpa-rupiah');
    tanpa_rupiah.addEventListener('keyup', function(e) {
        tanpa_rupiah.value = formatRupiah(this.value);
    });

    var tanpa_rupiah_material = document.getElementById('tanpa-rupiah-material');
    tanpa_rupiah_material.addEventListener('keyup', function(e) {
        tanpa_rupiah_material.value = formatRupiah(this.value);
    });

    /* Fungsi */
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>