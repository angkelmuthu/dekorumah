<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>KELOLA DATA BARANG</h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <div class="text-center">
                            <?php echo anchor(site_url('m_barang/create'), '<i class="fal fa-plus-square" aria-hidden="true"></i> Tambah Data', 'class="btn btn-primary btn-sm waves-effect waves-themed"'); ?>
                        </div>
                        <table class="table table-bordered table-hover table-striped w-100" id="myTable">
                            <thead>
                                <tr>
                                    <th width="30px">No</th>
                                    <th>Barang</th>
                                    <th>Deskripsi</th>
                                    <th>Barang Jenis</th>
                                    <th>Harga Satuan</th>
                                    <th>Gudang</th>
                                    <th>Stok</th>
                                    <th>User</th>
                                    <th>Update Date</th>
                                    <th width="200px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($list as $dt) { ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $dt->barang ?></td>
                                        <td><?php echo $dt->deskripsi ?></td>
                                        <td><?php echo $dt->barang_jenis ?></td>
                                        <td><?php echo angka($dt->harga_satuan) ?></td>
                                        <td><?php echo $dt->gudang ?></td>
                                        <td><?php echo $dt->stok ?></td>
                                        <td><?php echo $dt->full_name ?></td>
                                        <td><?php echo tanggaljam($dt->update_date) ?></td>
                                        <td>
                                            <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#stok-example-modal-sm<?php echo $dt->id_barang ?>">Stok</button>
                                            <div class="modal fade" id="stok-example-modal-sm<?php echo $dt->id_barang ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-sm" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Tambah Stok</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                                            </button>
                                                        </div>
                                                        <form method="POST" action="<?php echo site_url('m_barang/update_stok'); ?>">
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <input type="hidden" name="id_barang" value="<?php echo $dt->id_barang ?>">
                                                                    <input type="hidden" name="id_user" value="<?php echo $this->session->userdata('id_users') ?>" />
                                                                    <input type="hidden" name="update_date" value="<?php echo date('Y-m-d H:s:i'); ?>" />
                                                                    <label class="form-label text-muted" for="simpleinput-disabled">Barang</label>
                                                                    <input type="text" name="brg" class="form-control" value="<?php echo $dt->barang ?>" readonly>
                                                                    <label class="form-label text-muted" for="simpleinput-disabled">Stok Saat ini</label>
                                                                    <input type="text" name="stok_ada" class="form-control" value="<?php echo $dt->stok ?>" readonly>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-label" for="simpleinput">Tambah Stok</label>
                                                                    <input type="number" name="stok_tambah" id="simpleinput" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            echo anchor(site_url('m_barang/read/' . $dt->id_barang), '<i class="fal fa-eye" aria-hidden="true"></i>', 'class="btn btn-info btn-xs"');
                                            echo '  ';
                                            echo anchor(site_url('m_barang/update/' . $dt->id_barang), '<i class="fal fa-pencil" aria-hidden="true"></i>', 'class="btn btn-warning btn-xs"');
                                            echo '  ';
                                            echo
                                            '<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#default-example-modal-sm' . $dt->id_barang . '"><i class="fal fa-trash" aria-hidden="true"></i></button>
    <div class="modal fade" id="default-example-modal-sm' . $dt->id_barang . '" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title">INFO!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda Yakin Ingin Menghapus?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <a href="m_barang/delete/' . $dt->id_barang . '" class="btn btn-primary">Ya, Hapus</a>
            </div>
        </div>
    </div>
</div>';
                                            ?>
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
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/datagrid/datatables/datatables.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/datagrid/datatables/datatables.export.js"></script>
<script>
    $(document).ready(function() {
        $('#myTable').dataTable({
            responsive: true,
            "paging": false,
            dom:
                /*	--- Layout Structure
                	--- Options
                	l	-	length changing input control
                	f	-	filtering input
                	t	-	The table!
                	i	-	Table information summary
                	p	-	pagination control
                	r	-	processing display element
                	B	-	buttons
                	R	-	ColReorder
                	S	-	Select

                	--- Markup
                	< and >				- div element
                	<"class" and >		- div with a class
                	<"#id" and >		- div with an ID
                	<"#id.class" and >	- div with an ID and a class

                	--- Further reading
                	https://datatables.net/reference/option/dom
                	--------------------------------------
                 */
                "<'row mb-3'<'col-sm-12 col-md-6 d-flex align-items-center justify-content-start'f><'col-sm-12 col-md-6 d-flex align-items-center justify-content-end'B>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            buttons: [{
                    extend: 'colvis',
                    text: 'Column Visibility',
                    titleAttr: 'Col visibility',
                    className: 'btn-outline-default'
                },
                {
                    extend: 'pdfHtml5',
                    text: 'PDF',
                    titleAttr: 'Generate PDF',
                    className: 'btn-outline-danger btn-sm mr-1'
                },
                {
                    extend: 'excelHtml5',
                    text: 'Excel',
                    titleAttr: 'Generate Excel',
                    className: 'btn-outline-success btn-sm mr-1'
                },
                {
                    extend: 'print',
                    text: 'Print',
                    titleAttr: 'Print Table',
                    className: 'btn-outline-default'
                }

            ]
        });
    });
</script>