<main id="js-page-content" role="main" class="page-content">
    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Ganti Password
                    </h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <div class="row">
                            <div class="col-sm-3 text-center">
                                <?php if (empty($images)) { ?>
                                    <img style="overflow: hidden; border-radius: 50%;" src="<?php echo base_url() ?>assets/foto_profil/default_pp.jpg" class="img-fluid img-thumbnail rounded" alt="">
                                <?php } else { ?>
                                    <img style="overflow: hidden; border-radius: 50%;" src="<?php echo base_url() ?>assets/foto_profil/<?php echo $images; ?>" class="img-fluid img-thumbnail rounded" alt="">
                                <?php } ?>
                            </div>
                            <div class="col-sm-9">
                                <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">

                                    <table class='table'>
                                        <tr>
                                            <td width='200'>Password Baru</td>
                                            <td><input type="text" class="form-control" name="password" id="password" placeholder="Password Baru" value="" /></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><input type="hidden" name="id_users" value="<?php echo $id_users; ?>" />
                                                <button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button>
                                                <a href="<?php echo site_url('user') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>