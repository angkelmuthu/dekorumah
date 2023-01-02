<style>
    body .select2-container {
        z-index: 9999 !important;
    }
</style>
<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr bg-primary-800">
                    <h2>DATA PELANGGAN</h2>
                    <div class="panel-toolbar">
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content pb-0">
                        <div class="row">
                            <div class="col-md-4">
                                <table class="table table-clean">
                                    <tr>
                                        <td>Nama</td>
                                        <td>: <?php echo $nama; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>: <?php echo $alamat; ?></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-4">
                                <table class="table table-clean">
                                    <tr>
                                        <td>Email</td>
                                        <td>: <?php echo $email; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Hp</td>
                                        <td>: <?php echo $hp; ?></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-4">
                                <table class="table table-clean">
                                    <tr>
                                        <td>Nama Projek</td>
                                        <td>: <?php echo $nama_projek; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Sales</td>
                                        <td>: <?php echo $nm_sales; ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="panel-content py-2 rounded-bottom border-faded border-left-0 border-right-0 border-bottom-0 text-muted d-flex">
                        <div class="col-md-12">
                            <div class="text-center">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#default-example-modal">Tambah PO</button>
                            </div>
                            <div class="modal fade" id="default-example-modal" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">
                                                PURCHASE ORDER
                                                <small class="m-0 text-muted">
                                                    Tambah PO
                                                </small>
                                            </h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                            </button>
                                        </div>
                                        <form action="<?php echo site_url('t_po/create_action') ?>" method="post">
                                            <div class="modal-body">
                                                <input type="hidden" name="id_pelanggan" value="<?php echo $this->uri->segment(3) ?>">
                                                <table class='table table-striped'>
                                                    <tr>
                                                        <td width='200'>Barang</td>
                                                        <td><?php echo select2_dinamis('id_distributor', 'm_distributor', 'id_distributor', 'nm_distributor', '', 'aktif="y"', 'nm_distributor ASC') ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td width='200'>Tgl. PO</td>
                                                        <td><input class="form-control" id="example-date" type="date" name="tgl_po" value="<?php echo date('Y-m-d') ?>"></td>
                                                    </tr>
                                                </table>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <?php
        $no = 1;
        foreach ($list as $row) { ?>
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>No. <?php echo $row->no_po ?>
                        </h2>
                        <div class="panel-toolbar">
                            <button type="button" class="btn btn-info btn-xs tambah" id_pelanggan="<?php echo $row->id_pelanggan ?>" id_po="<?php echo $row->id_po ?>">Pilih Barang</button>
                        </div>
                        <div class="panel-toolbar ml-2">
                            <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#edit<?php echo $row->id_po ?>">Edit PO</button>
                        </div>
                        <div class="panel-toolbar ml-2">
                            <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#hapus<?php echo $row->id_po ?>">Hapus PO</button>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="edit<?php echo $row->id_po ?>" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">
                                        PURCHASE ORDER
                                        <small class="m-0 text-muted">
                                            Edit PO
                                        </small>
                                    </h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                    </button>
                                </div>
                                <form action="<?php echo site_url('t_po/update_action') ?>" method="post">
                                    <div class="modal-body">
                                        <input type="hidden" name="id_po" value="<?php echo $row->id_po ?>">
                                        <input type="hidden" name="id_pelanggan" value="<?php echo $this->uri->segment(3) ?>">
                                        <table class='table table-striped'>
                                            <tr>
                                                <td width='200'>Barang</td>
                                                <td><?php echo select2_dinamis('id_distributor', 'm_distributor', 'id_distributor', 'nm_distributor', $row->id_distributor, 'aktif="y"', 'nm_distributor ASC') ?></td>
                                            </tr>
                                            <tr>
                                                <td width='200'>Tgl. PO</td>
                                                <td><input class="form-control" id="example-date" type="date" name="tgl_po" value="<?php echo $row->tgl_po ?>"></td>
                                            </tr>
                                        </table>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">SImpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="hapus<?php echo $row->id_po ?>" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-xs" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">
                                        PURCHASE ORDER
                                        <small class="m-0 text-muted">
                                            Hapus PO
                                        </small>
                                    </h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                    </button>
                                </div>
                                <form action="<?php echo site_url('t_po/delete/' . $row->id_po . '/' . $row->id_pelanggan) ?>" method="post">
                                    <div class="modal-body">
                                        <p>Apakah Anda yakin ingin Menghapus Data ini?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Ya</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-xl-12">
                                    <table class="table table-clean table-sm">
                                        <tr>
                                            <td>Tgl PO</td>
                                            <td>: <?php echo tanggal($row->tgl_po) ?></td>
                                        </tr>
                                        <tr>
                                            <td>Distributor</td>
                                            <td>: <?php echo $row->nm_distributor ?></td>
                                        </tr>
                                    </table>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped w-100" id="example">
                                            <thead class="thead-themed">
                                                <tr>
                                                    <th width="30px">No</th>
                                                    <th>Barang</th>
                                                    <th width="5%">Qty</th>
                                                    <th width="15%">Harga Satuan</th>
                                                    <th width="20%">Harga Total</th>
                                                    <th width="10%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                $this->db->where('id_po', $row->id_po);
                                                $result = $this->db->get('t_po_detail')->result();
                                                foreach ($result as $dt) { ?>
                                                    <tr>
                                                        <td><?= $no++; ?></td>
                                                        <td><?= $dt->nm_barang ?></td>
                                                        <td class="text-center"><?= $dt->qty ?></td>
                                                        <td class="text-right"><?= angka($dt->harga_satuan) ?></td>
                                                        <td class="text-right"><?= angka($dt->harga_total) ?></td>
                                                        <td></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <?php if ($row->status == 1) { ?>
                                        <div class="alert bg-success-500" role="alert">
                                            <strong>Verifikasi!</strong> PO sudah di setujui, silahkan diproses.
                                        </div>
                                    <?php } elseif ($row->status == 2) { ?>
                                        <div class="alert bg-info-500" role="alert">
                                            <strong>Selesai!</strong> PO sudah dibayar.
                                        </div>
                                    <?php } elseif ($row->status == 9) { ?>
                                        <div class="alert bg-danger-500" role="alert">
                                            <strong>Selesai!</strong> PO sudah Tidak disetujui.
                                        </div>
                                    <?php } else { ?>
                                        <div class="alert bg-warning-500" role="alert">
                                            <strong>Menunggu!</strong> Menunggu Verifikasi, selama belum diverifikasi PO tidak bisa diproses.
                                        </div>
                                    <?php } ?>
                                </div>
                                <?php if (!empty($row->grand_total)) { ?>
                                    <div class="col-sm-4 ml-sm-auto">
                                        <table class="table table-sm table-clean">
                                            <tbody>
                                                <tr>
                                                    <td class="text-left">
                                                        <strong>Subtotal</strong>
                                                    </td>
                                                    <td class="text-right">Rp. <?php echo angka($row->total) ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left">
                                                        <strong>Diskon</strong>
                                                    </td>
                                                    <td class="text-right">Rp. <?php echo angka($row->diskon) ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left">
                                                        <strong>Ppn</strong>
                                                    </td>
                                                    <td class="text-right">Rp. <?php echo angka($row->ppn) ?></td>
                                                </tr>
                                                <tr class="table-scale-border-top border-left-0 border-right-0 border-bottom-0">

                                                    <td class="text-left">
                                                        <strong>Total</strong>
                                                    </td>
                                                    <td class="text-right fw-700">Rp. <?php echo angka($row->grand_total) ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="panel-content py-2 rounded-bottom border-faded border-left-0 border-right-0 border-bottom-0 text-muted d-flex">
                            <div class="col-md-12">
                                <div class="text-center">
                                    <?php if ($row->status == 1) { ?>
                                        <button type="button" class="btn btn-info btn-xs bayar" id_pelanggan="<?php echo $row->id_pelanggan ?>" id_po="<?php echo $row->id_po ?>">Pembayaran</button>
                                        <button type="button" class="btn btn-info btn-xs file" id_pelanggan="<?php echo $row->id_pelanggan ?>" id_po="<?php echo $row->id_po ?>">File Bukti</button>
                                    <?php } else { ?>
                                        <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#verif<?php echo $row->id_po ?>">Verifikasi</button>
                                    <?php } ?>
                                </div>
                                <div class="modal fade" id="verif<?php echo $row->id_po ?>" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">
                                                    PURCHASE ORDER
                                                    <small class="m-0 text-muted">
                                                        Approve PO
                                                    </small>
                                                </h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <a href="<?php echo site_url('t_po/verif/' . $this->uri->segment(3) . '/' . $row->id_po . '/1') ?>" class="btn btn-block btn-info">Approve</a>
                                                <a href="<?php echo site_url('t_po/verif/' . $this->uri->segment(3) . '/' . $row->id_po . '/9') ?>" class="btn btn-block btn-danger">Don't Agree</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        PURCHASE ORDER
                        <small class="m-0 text-muted">
                            Tambah Barang
                        </small>
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="Tambah_modal">
                        <!-- Data akan di tampilkan disini-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="Bayar" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        PURCHASE ORDER
                        <small class="m-0 text-muted">
                            Pembayaran
                        </small>
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="Bayar_modal">
                        <!-- Data akan di tampilkan disini-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="File" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        PURCHASE ORDER
                        <small class="m-0 text-muted">
                            File Bukti
                        </small>
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="File_modal">
                        <!-- Data akan di tampilkan disini-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/formplugins/select2/select2.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/kostum.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.modal').on('shown.bs.modal', function(e) {
            $(this).find('.select2').select2({
                dropdownParent: $(this).find('.modal-content')
            });
        })

        $('.tambah').click(function() {
            var id_pelanggan = $(this).attr("id_pelanggan");
            var id_po = $(this).attr("id_po");
            $.ajax({
                url: '<?php echo base_url(); ?>t_po/tambah_barang',
                method: 'post',
                data: {
                    id_pelanggan: id_pelanggan,
                    id_po: id_po
                },
                success: function(data) {
                    $('#Tambah').modal("show");
                    $('#Tambah_modal').html(data);
                }
            });
        });

        $('.bayar').click(function() {
            var id_pelanggan = $(this).attr("id_pelanggan");
            var id_po = $(this).attr("id_po");
            $.ajax({
                url: '<?php echo base_url(); ?>t_po/bayar_po',
                method: 'post',
                data: {
                    id_pelanggan: id_pelanggan,
                    id_po: id_po
                },
                success: function(data) {
                    $('#Bayar').modal("show");
                    $('#Bayar_modal').html(data);
                }
            });
        });

        $('.file').click(function() {
            var id_pelanggan = $(this).attr("id_pelanggan");
            var id_po = $(this).attr("id_po");
            $.ajax({
                url: '<?php echo base_url(); ?>t_po/get_file',
                method: 'post',
                data: {
                    id_pelanggan: id_pelanggan,
                    id_po: id_po
                },
                success: function(data) {
                    $('#File').modal("show");
                    $('#File_modal').html(data);
                }
            });
        });
    });
</script>