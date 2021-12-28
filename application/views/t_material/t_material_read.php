<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>Material Read</h2>
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
                                <td>Id Invoice</td>
                                <td><?php echo $id_invoice; ?></td>
                            </tr>
                            <tr>
                                <td>Id Barang</td>
                                <td><?php echo $id_barang; ?></td>
                            </tr>
                            <tr>
                                <td>Qty</td>
                                <td><?php echo $qty; ?></td>
                            </tr>
                            <tr>
                                <td>Harga Satuan</td>
                                <td><?php echo $harga_satuan; ?></td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td><?php echo $total; ?></td>
                            </tr>
                            <tr>
                                <td>Id User</td>
                                <td><?php echo $id_user; ?></td>
                            </tr>
                            <tr>
                                <td>Create Date</td>
                                <td><?php echo $create_date; ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><a href="<?php echo site_url('t_material') ?>" class="btn btn-primary waves-effect waves-themed">Kembali</a></td>
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