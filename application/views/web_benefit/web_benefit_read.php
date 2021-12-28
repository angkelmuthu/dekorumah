<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>Benefit Read</h2>
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
                                <td>Benefit Title</td>
                                <td><?php echo $benefit_title; ?></td>
                            </tr>
                            <tr>
                                <td>Benefit Deskripsi</td>
                                <td><?php echo $benefit_deskripsi; ?></td>
                            </tr>
                            <tr>
                                <td>Benefit File</td>
                                <td><?php echo $benefit_file; ?></td>
                            </tr>
                            <tr>
                                <td>Benefit Icon 1</td>
                                <td><?php echo $benefit_icon_1; ?></td>
                            </tr>
                            <tr>
                                <td>Benefit Title 1</td>
                                <td><?php echo $benefit_title_1; ?></td>
                            </tr>
                            <tr>
                                <td>Benefit Desk 1</td>
                                <td><?php echo $benefit_desk_1; ?></td>
                            </tr>
                            <tr>
                                <td>Benefit Icon 2</td>
                                <td><?php echo $benefit_icon_2; ?></td>
                            </tr>
                            <tr>
                                <td>Benefit Title 2</td>
                                <td><?php echo $benefit_title_2; ?></td>
                            </tr>
                            <tr>
                                <td>Benefit Desk 2</td>
                                <td><?php echo $benefit_desk_2; ?></td>
                            </tr>
                            <tr>
                                <td>Benefit Icon 3</td>
                                <td><?php echo $benefit_icon_3; ?></td>
                            </tr>
                            <tr>
                                <td>Benefit Title 3</td>
                                <td><?php echo $benefit_title_3; ?></td>
                            </tr>
                            <tr>
                                <td>Benefit Desk 3</td>
                                <td><?php echo $benefit_desk_3; ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><a href="<?php echo site_url('web_benefit') ?>" class="btn btn-primary waves-effect waves-themed">Kembali</a></td>
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