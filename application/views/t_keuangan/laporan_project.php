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
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped w-100" id="myTable">
                                <thead>
                                    <tr>
                                        <th width="30px">No</th>
                                        <th>No Invoice</th>
                                        <th>Tgl Invoice</th>
                                        <th>Pemesan</th>
                                        <th>Penawaran</th>
                                        <th>Pembayaran</th>
                                        <th>Tgl DP</th>
                                        <th>Tgl Lunas</th>
                                        <th>Biaya Material</th>
                                        <th>Biaya Lain</th>
                                        <th>Laba/Rugi</th>
                                        <th>Persentase</th>
                                        <th>Status</th>
                                        <th></th>
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
                                            <td><?php echo $pro->tgl_dp ?></td>
                                            <td><?php echo $pro->tgl_lunas ?></td>
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
                                                if ($pro->payment > 0 && $biaya > 0) {
                                                    echo '<b>' . angka($laba / $pro->payment * 100) . '%</b>';
                                                } else {
                                                    echo '<b>-</b>';
                                                } ?>
                                            </td>
                                            <td><?php echo $pro->status ?></td>
                                            <td><a class="btn btn-xs btn-primary" href="<?php echo site_url('t_invoice/read/' . $pro->id) ?>"><i class="fal fa-eye"></i></a> </td>
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
            lengthMenu: [10, 20, 50, 100, 200, 500],
            //responsive: true,
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
                "<'row mb-3'<'col-sm-12 col-md-6 d-flex align-items-center justify-content-start'f><'col-sm-12 col-md-6 d-flex align-items-center justify-content-end'lB>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            buttons: [
                /*{
                	extend:    'colvis',
                	text:      'Column Visibility',
                	titleAttr: 'Col visibility',
                	className: 'mr-sm-3'
                },*/
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
                    className: 'btn-outline-primary btn-sm'
                }
            ]
        });
    });
</script>