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
                    <h2>KELOLA DATA PESANAN</h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <div class="text-center">
                            <?php echo anchor(site_url('t_penjualan/create/' . $this->uri->segment(3)), '<i class="fal fa-plus-square" aria-hidden="true"></i> Tambah Pesanan', 'class="btn btn-primary btn-sm"'); ?>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped w-100" id="example">
                                <thead>
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
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>