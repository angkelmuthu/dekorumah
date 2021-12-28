<main id="js-page-content" role="main" class="page-content">
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fal fa-chart-area'></i> Akutansi <span class='fw-300'>Keuangan</span>
        </h1>
        <?php
        $this->db->select('sum(debit) as debit,sum(kredit) as kredit');
        $this->db->from('v_keuangan');
        $ttl = $this->db->get()->row(); ?>
        <div class="d-flex mr-4">
            <div>
                <label class="fs-sm mb-0 mt-2 mt-md-0">Debit</label>
                <h4 class="text-right font-weight-bold mb-0">Rp. <?php echo angka($ttl->debit) ?></h4>
            </div>
        </div>
        <div class="d-flex mr-4">
            <div>
                <label class="fs-sm mb-0 mt-2 mt-md-0">Kredit</label>
                <h4 class="text-right font-weight-bold mb-0">Rp. <?php echo angka($ttl->kredit) ?></h4>
            </div>
        </div>
        <div class="d-flex mr-0">
            <div>
                <label class="fs-sm mb-0 mt-2 mt-md-0">LABA / RUGI</label>
                <h4 class="text-right font-weight-bold mb-0">Rp. <?php echo angka($ttl->kredit - $ttl->debit) ?></h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>KELOLA DATA T_INVOICE</h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <div class="text-center">
                            <?php echo anchor(site_url('t_keuangan/create'), '<i class="fal fa-plus-square" aria-hidden="true"></i> Tambah Data', 'class="btn btn-primary btn-sm waves-effect waves-themed"'); ?>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped w-100" id="myTable">
                                <thead>
                                    <tr>
                                        <th width="30px">No</th>
                                        <th>Tanggal</th>
                                        <th>Deskripsi</th>
                                        <th>Note</th>
                                        <th>Debit</th>
                                        <th>Kredit</th>
                                        <th>Created By</th>
                                        <th width="200px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($list as $t_keuangan) {
                                    ?>
                                        <tr>
                                            <td width="10px"><?php echo $no++; ?></td>
                                            <td><?php echo tanggaljam($t_keuangan->created_date) ?></td>
                                            <td><?php echo $t_keuangan->deskripsi ?></td>
                                            <td><?php echo $t_keuangan->note ?></td>
                                            <td class="text-right">
                                                <?php if (!empty($t_keuangan->debit)) {
                                                    echo '<b>' . angka($t_keuangan->debit) . '</b>';
                                                } ?>
                                            </td>
                                            <td class="text-right">
                                                <?php if (!empty($t_keuangan->kredit)) {
                                                    echo '<b>' . angka($t_keuangan->kredit) . '</b>';
                                                } ?>
                                            </td>
                                            <td><?php echo $t_keuangan->created_by ?></td>
                                            <td style="text-align:center" width="200px">
                                                <?php
                                                echo anchor(site_url('t_keuangan/read/' . $t_keuangan->id_buku), '<i class="fal fa-eye" aria-hidden="true"></i>', 'class="btn btn-info btn-xs waves-effect waves-themed"');
                                                echo '  ';
                                                echo anchor(site_url('t_keuangan/update/' . $t_keuangan->id_buku), '<i class="fal fa-pencil" aria-hidden="true"></i>', 'class="btn btn-warning btn-xs waves-effect waves-themed"');
                                                echo '  ';
                                                echo
                                                '<button type="button" class="btn btn-danger btn-xs waves-effect waves-themed" data-toggle="modal" data-target="#default-example-modal-sm' . $t_keuangan->id_buku . '"><i class="fal fa-trash" aria-hidden="true"></i></button>
    <div class="modal fade" id="default-example-modal-sm' . $t_keuangan->id_buku . '" tabindex="-1" role="dialog" aria-hidden="true">
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
                <a href="t_keuangan/delete/' . $t_keuangan->id_buku . '" class="btn btn-primary">Ya, Hapus</a>
            </div>
        </div>
    </div>
</div>';
                                                ?>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin-slim/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin-slim/js/app.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/datagrid/datatables/datatables.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/datagrid/datatables/datatables.export.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#myTable').DataTable({
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5]
                    }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5]
                    }
                },
                'colvis'
            ]
        });
    });
</script>