<main id="js-page-content" role="main" class="page-content">
    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>KELOLA DATA LAPORAN KEUANGAN</h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <h2>Saldo saat ini :
                                    <span class="badge badge-success">Rp.
                                        <?php foreach ($saldo as $saldox) {
                                            echo angka($saldox->laba);
                                        } ?>
                                    </span>
                                </h2>
                            </div>
                            <hr>
                            <div class="col-md-6">
                                <?php echo anchor(site_url('t_pembukuan/create'), '<i class="fal fa-plus-square" aria-hidden="true"></i> Tambah Data', 'class="btn btn-primary btn-sm waves-effect waves-themed"'); ?>
                                <?php echo anchor(site_url('t_pembukuan/excel'), '<i class="fal fa-file-excel" aria-hidden="true"></i> Export Ms Excel', 'class="btn btn-outline-success btn-sm waves-effect waves-themed"'); ?></div>
                        </div>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered table-hover table-striped">
                                <thead class="thead-themed">
                                    <tr>
                                        <th>No.</th>
                                        <th>Tanggal</th>
                                        <th class="text-center">Nama Transaksi</th>
                                        <th class="text-center">Note</th>
                                        <th class="text-center">Debit</th>
                                        <th class="text-center">Kredit</th>

                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>Totals</td>
                                        <td></td>
                                        <td></td>

                                    </tr>
                                </tfoot>
                                <tbody><?php
                                        $start = 1;
                                        foreach ($buku as $t_pembukuan) {
                                        ?>
                                        <tr>
                                            <td width="10px"><?php echo ++$start ?></td>
                                            <td><?php echo $t_pembukuan->created_date ?></td>
                                            <td><?php echo $t_pembukuan->deskripsi; ?></td>
                                            <td><?php echo $t_pembukuan->note ?></td>
                                            <td class="text-right"><strong><?php if (isset($t_pembukuan->Debit)) {
                                                                                echo $t_pembukuan->Debit;
                                                                            } ?></strong></td>
                                            <td class="text-right"><strong><?php if (isset($t_pembukuan->Kredit)) {
                                                                                echo $t_pembukuan->Kredit;
                                                                            } ?></strong></td>

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
</main>
<script src="<?php echo base_url() ?>assets/smartadmin-slim/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin-slim/js/app.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/datagrid/datatables/datatables.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/datagrid/datatables/datatables.export.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // DataTable initialisation
        $('#example').DataTable({
            "paging": false,
            "autoWidth": true,
            "footerCallback": function(row, data, start, end, display) {
                var api = this.api();
                nb_cols = api.columns().nodes().length;
                var j = 4;
                while (j < nb_cols) {
                    var pageTotal = api
                        .column(j, {
                            page: 'current'
                        })
                        .data()
                        .reduce(function(a, b) {
                            return Number(a) + Number(b);
                        }, 0);
                    // Update footer
                    $(api.column(j).footer()).html(pageTotal);
                    j++;
                }
            }
        });
    });
</script>