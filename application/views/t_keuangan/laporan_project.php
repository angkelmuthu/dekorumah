<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>Laporan Projek</h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <table class="table table-bordered table-hover table-striped w-100" id="myTable">
                            <thead>
                                <tr>
                                    <th width="30px">No</th>
                                    <th>No Invoice</th>
                                    <th>Tgl Invoice</th>
                                    <th>Pemesan</th>
                                    <th>Penawaran</th>
                                    <th>Pembayaran</th>
                                    <th>Biaya Material</th>
                                    <th>Biaya Lain</th>
                                    <th>Laba/Rugi</th>
                                    <th>Persentase</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($laporan as $pro) {
                                    $biaya = $pro->material + $pro->biaya;
                                    $laba = $pro->payment - $biaya;
                                ?>
                                    <tr>
                                        <td width="10px"><?php echo $no++; ?></td>
                                        <td><?php echo $pro->no_invoice ?></td>
                                        <td><?php echo tanggaljam($pro->tgl_invoice) ?></td>
                                        <td><?php echo $pro->nama ?></td>
                                        <td class="text-right">
                                            <?php echo '<b>' . angka($pro->projek) . '</b>'; ?>
                                        </td>
                                        <td class="text-right">
                                            <?php echo '<b>' . angka($pro->payment) . '</b>'; ?>
                                        </td>
                                        <td class="text-right">
                                            <?php echo '<b>' . angka($pro->material) . '</b>'; ?>
                                        </td>
                                        <td class="text-right">
                                            <?php echo '<b>' . angka($pro->biaya) . '</b>'; ?>
                                        </td>
                                        <td class="text-right">
                                            <?php echo '<b>' . angka($laba) . '</b>'; ?>
                                        </td>
                                        <td class="text-right">
                                            <?php
                                            if ($laba > 0 && $biaya > 0) {
                                                echo '<b>' . angka(($laba / $biaya) * 100) . '%</b>';
                                            } else {
                                                echo '<b>-</b>';
                                            } ?>
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
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/datagrid/datatables/datatables.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/datagrid/datatables/datatables.export.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#myTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf', 'print'
            ]
        });
    });
</script>