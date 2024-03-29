<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>Projek Read</h2>
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
                                <td>Id Produk</td>
                                <td><?php echo $id_produk; ?></td>
                            </tr>
                            <tr>
                                <td>Projek Name</td>
                                <td><?php echo $projek_name; ?></td>
                            </tr>
                            <tr>
                                <td>Projek Lokasi</td>
                                <td><?php echo $projek_lokasi; ?></td>
                            </tr>
                            <tr>
                                <td>Projek Start</td>
                                <td><?php echo $projek_start; ?></td>
                            </tr>
                            <tr>
                                <td>Projek End</td>
                                <td><?php echo $projek_end; ?></td>
                            </tr>
                            <tr>
                                <td>Projek Desk</td>
                                <td><?php echo $projek_desk; ?></td>
                            </tr>
                            <tr>
                                <td>Aktif</td>
                                <td><?php echo $aktif; ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><a href="<?php echo site_url('web_projek') ?>" class="btn btn-primary waves-effect waves-themed">Kembali</a></td>
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