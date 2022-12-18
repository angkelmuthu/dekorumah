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

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>DATA PERMINTAAN BARANG</h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <div class="text-center">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#default-example-modal">Tambah Barang</button>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="default-example-modal" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">
                                            PERMINTAAN BARANG
                                            <small class="m-0 text-muted">
                                                Tambah Barang
                                            </small>
                                        </h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                        </button>
                                    </div>
                                    <form action="<?php echo site_url('t_permintaan/create_action') ?>" method="post">
                                        <div class="modal-body">
                                            <input type="hidden" name="jenis_permintaan" value="Projek">
                                            <input type="hidden" name="id_pelanggan" value="<?php echo $this->uri->segment(3) ?>">
                                            <table class='table table-striped'>
                                                <tr>
                                                    <td width='200'>Barang</td>
                                                    <td><?php echo select2_dinamis('id_barang', 'm_barang', 'id_barang', 'barang', '', '', '', 'barang ASC') ?></td>
                                                </tr>
                                                <tr>
                                                    <td width='200'>Qty</td>
                                                    <td><input type="number" class="form-control" name="qty" id="qty" placeholder="Qty" value="" /></td>
                                                </tr>
                                                <tr>
                                                    <td width='200'>Deskripsi</td>
                                                    <td><textarea class="form-control" name="deskripsi" id="deskripsi" placeholder="Deskripsi"></textarea></td>
                                                </tr>
                                            </table>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped w-100" id="example">
                                <thead>
                                    <tr>
                                        <th width="30px">No</th>
                                        <th>No. Request</th>
                                        <th>Barang</th>
                                        <th>Qty</th>
                                        <th>Create By</th>
                                        <th>Create Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($list as $row) { ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row->no_ro ?></td>
                                            <td><?php echo $row->barang ?></td>
                                            <td><?php echo $row->qty ?></td>
                                            <td><?php echo $row->create_by ?></td>
                                            <td><?php echo tanggaljam($row->create_date) ?></td>
                                            <td>
                                                <a href="<?php echo site_url('t_permintaan/delete/' . $row->id_permintaan . '/' . $row->id_pelanggan); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Are You Sure ?');"><i class="fal fa-trash" aria-hidden="true"></i></a>
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
<script src="<?php echo base_url() ?>assets/smartadmin/js/formplugins/select2/select2.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/kostum.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#id_barang').select2({
            dropdownParent: $('#default-example-modal .modal-content')
        });
    });
</script>