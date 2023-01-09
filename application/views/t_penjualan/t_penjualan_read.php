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

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>DATA PENJUALAN</h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <div class="text-center mb-2">
                            <?php echo anchor(site_url('t_penjualan/create/' . $this->uri->segment(3)), '<i class="fal fa-plus-square" aria-hidden="true"></i> Tambah Pesanan', 'class="btn btn-primary btn-sm"'); ?>
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#rab">RAB</button>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="rab" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">
                                            Rencana Anggaran Biaya
                                            <small class="m-0 text-muted">
                                                File RAB
                                            </small>
                                        </h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        <form action="<?php echo site_url('t_penjualan/create_rab') ?>" method="post" enctype="multipart/form-data">
                                            <input class="form-control" type="hidden" name="id_pelanggan" value="<?php echo $this->uri->segment(3) ?>">
                                            <table class='table table-striped'>
                                                <tr>
                                                    <td width='200'>Keterangan</td>
                                                    <td><textarea class="form-control" type="text" name="keterangan" value="" required></textarea></td>
                                                </tr>
                                                <tr>
                                                    <td width='200'>File</td>
                                                    <td><input type="file" class="form-control-file" name="gambar" required></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <button type="submit" class="btn btn-block btn-warning">Simpan</button>
                                                    </td>
                                                </tr>
                                            </table>
                                            <hr>
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-hover table-striped w-100">
                                                    <thead class="thead-themed">
                                                        <tr>
                                                            <th width="30px">No</th>
                                                            <th>Keterangan</th>
                                                            <th>File</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 1;
                                                        $this->db->where('id_pelanggan', $this->uri->segment(3));
                                                        $this->db->order_by('id', 'ASC');
                                                        $sql = $this->db->get('t_rab')->result();
                                                        foreach ($sql as $row) { ?>
                                                            <tr>
                                                                <td><?php echo $no++; ?></td>
                                                                <td><?php echo $row->keterangan ?></td>
                                                                <td><a href="<?php echo site_url('assets/rab/' . $row->file) ?>" target="_blank" class="btn btn-xs btn-success">Lihat</a></td>
                                                                <td>
                                                                    <a href="<?php echo site_url('T_penjualan/delete_rab/' . $row->id . '/' . $row->id_pelanggan); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Are You Sure ?');"><i class="fal fa-trash" aria-hidden="true"></i></a>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped w-100" id="example">
                                <thead class="thead-themed">
                                    <tr>
                                        <th width="30px">No</th>
                                        <th>Produk</th>
                                        <th>Satuan</th>
                                        <th>Harga Satuan</th>
                                        <th>Qty</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($list as $row) { ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row->nm_produk ?></td>
                                            <td><?php echo $row->satuan ?></td>
                                            <td><?php echo angka($row->harga_satuan) ?></td>
                                            <td><?php echo $row->qty ?></td>
                                            <td><?php echo angka($row->harga_total) ?></td>
                                            <td>
                                                <a href="<?php echo site_url('T_penjualan/delete/' . $row->id_order . '/' . $row->id_pelanggan); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Are You Sure ?');"><i class="fal fa-trash" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <a href="<?php echo site_url('t_penjualan') ?>" class="btn btn-block btn-sm btn-secondary">Kembali</a>
        </div>

    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>