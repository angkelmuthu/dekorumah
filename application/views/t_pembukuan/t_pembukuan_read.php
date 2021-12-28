<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>Laporan Keuangan Read</h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <table class="table table-striped">
                            <tr>
                                <td>Id Survei</td>
                                <td><?php echo $id_survei; ?></td>
                            </tr>
                            <tr>
                                <td>Id Group</td>
                                <td><?php echo $id_group; ?></td>
                            </tr>
                            <tr>
                                <td>Id Group Sub</td>
                                <td><?php echo $id_group_sub; ?></td>
                            </tr>
                            <tr>
                                <td>Deskripsi</td>
                                <td><?php echo $deskripsi; ?></td>
                            </tr>
                            <tr>
                                <td>Qty</td>
                                <td><?php echo $qty; ?></td>
                            </tr>
                            <tr>
                                <td>Satuan</td>
                                <td><?php echo $satuan; ?></td>
                            </tr>
                            <tr>
                                <td>Harga</td>
                                <td><?php echo $harga; ?></td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td><?php echo $total; ?></td>
                            </tr>
                            <tr>
                                <td>Note</td>
                                <td><?php echo $note; ?></td>
                            </tr>
                            <tr>
                                <td>Created Date</td>
                                <td><?php echo $created_date; ?></td>
                            </tr>
                            <tr>
                                <td>Created By</td>
                                <td><?php echo $created_by; ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><a href="<?php echo site_url('t_pembukuan') ?>" class="btn btn-primary waves-effect waves-themed">Kembali</a></td>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin-slim/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin-slim/js/app.bundle.js"></script>