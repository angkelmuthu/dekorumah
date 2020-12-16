<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>INPUT DATA KOSTUMER</h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <form action="<?php echo $action; ?>" method="post">
                            <table class='table table-striped'>
                                <tr>
                                    <td width='200'>Tgl Survei <?php echo form_error('tgl_survei') ?></td>
                                    <td>
                                        <input class="form-control" name="tgl_survei" id="tgl_survei" type="date">
                                    </td>
                                </tr>
                                <tr>
                                    <td width='200'>Nama <?php echo form_error('nama') ?></td>
                                    <td><input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Alamat <?php echo form_error('alamat') ?></td>
                                    <td> <textarea class="form-control" non_pks="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea></td>
                                </tr>
                                <tr>
                                    <td width='200'>Email <?php echo form_error('email') ?></td>
                                    <td><input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Hp <?php echo form_error('hp') ?></td>
                                    <td><input type="number" class="form-control" name="hp" id="hp" placeholder="Hp" value="<?php echo $hp; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Note <?php echo form_error('note') ?></td>
                                    <td> <textarea class="form-control" non_pks="3" name="note" id="note" placeholder="Note"><?php echo $note; ?></textarea></td>
                                </tr>
                                <tr>
                                    <td width='200'>Color <?php echo form_error('color') ?></td>
                                    <td><select name="color" class="form-control">
                                            <option value="">Choose</option>
                                            <option style="color:#886ab5;" value="primary">Dark Blue</option>
                                            <option style="color:#868e96;" value="secondary">Gray</option>
                                            <option style="color:#1dc9b7;" value="success">Green</option>
                                            <option style="color:#2196F3;" value="info">Blue</option>
                                            <option style="color:#ffc241;" value="warning">Orange</option>
                                            <option style="color:#fd3995;" value="danger">Red</option>
                                            <option style="color:#505050;" value="dark">Dark</option>
                                            <option style="color:#fff;" value="light">Light</option>
                                        </select></td>
                                </tr>
                                <tr>
                                    <td width='200'>Sales <?php echo form_error('sales') ?></td>
                                    <td><?php echo select2_dinamis('id_sales', 'm_sales', 'id_sales', 'nm_sales') ?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <input type="text" name="users" value="<?php echo $this->session->userdata('full_name') ?>" />
                                        <input type="text" name="created_date" value="<?php echo date('Y-m-d H:i:s'); ?>" />
                                        <input type="hidden" name="id_status" value="1" />
                                        <input type="hidden" name="id_survei" value="<?php echo $id_survei; ?>" />
                                        <button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button>
                                        <a href="<?php echo site_url('m_survei') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/formplugins/select2/select2.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/formplugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/kostum.js"></script>