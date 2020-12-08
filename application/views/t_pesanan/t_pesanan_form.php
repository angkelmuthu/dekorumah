<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>INPUT DATA DATA PESANAN</h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <?php
                        //generate nomr
                        $this->db->select('max(no_pesanan) as max_id');
                        $this->db->from('t_pesanan');
                        $dt = $this->db->get()->row();
                        if (is_null($dt->max_id)) {
                            $id_max = date('ym') . '000001';
                        } else {
                            $nomr_hash = $dt->max_id + 1;
                            $id_max = str_pad($nomr_hash, 6, '0', STR_PAD_LEFT);
                        }
                        ?>
                        <form action="<?php echo $action; ?>" method="post">
                            <table class='table table-striped'>
                                <tr>
                                    <td width='200'>No Pesanan <?php echo form_error('no_pesanan') ?></td>
                                    <td><input type="text" class="form-control" name="no_pesanan" id="no_pesanan" placeholder="No Pesanan" value="<?php echo $id_max; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Id Survei <?php echo form_error('id_survei') ?></td>
                                    <td><input type="text" class="form-control" name="id_survei" id="id_survei" placeholder="Id Survei" value="<?php echo $_GET['id']; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Id Tipe Pesanan <?php echo form_error('id_tipe_pesanan') ?></td>
                                    <td><?php echo select2_dinamis('id_tipe_pesanan', 'm_tipe_pesanan', 'id_tipe_pesanan', 'nm_tipe_pesanan') ?></td>
                                </tr>
                                <tr>
                                    <td width='200'>Id Jenis Bahan <?php echo form_error('id_jenis_bahan') ?></td>
                                    <td><?php echo select2_dinamis('id_jenis_bahan', 'm_jenis_bahan', 'id_jenis_bahan', 'nm_jenis_bahan') ?></td>
                                </tr>
                                <tr>
                                    <td width='200'>P <?php echo form_error('p') ?></td>
                                    <td><input type="text" class="form-control" name="p" id="p" placeholder="P" value="<?php echo $p; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>L <?php echo form_error('l') ?></td>
                                    <td><input type="text" class="form-control" name="l" id="l" placeholder="L" value="<?php echo $l; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>T <?php echo form_error('t') ?></td>
                                    <td><input type="text" class="form-control" name="t" id="t" placeholder="T" value="<?php echo $t; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Note <?php echo form_error('note') ?></td>
                                    <td> <textarea class="form-control" non_pks="3" name="note" id="note" placeholder="Note"><?php echo $note; ?></textarea></td>
                                </tr>
                                <tr>
                                    <td width='200'>Id Status <?php echo form_error('id_status') ?></td>
                                    <td><input type="text" class="form-control" name="id_status" id="id_status" placeholder="Id Status" value="<?php echo $id_status; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Created Date <?php echo form_error('created_date') ?></td>
                                    <td><input type="text" class="form-control" name="created_date" id="created_date" placeholder="Created Date" value="<?php echo date('Y-m-d H:s:i'); ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Users <?php echo form_error('users') ?></td>
                                    <td><input type="text" class="form-control" name="users" id="users" placeholder="Users" value="<?php echo $this->session->userdata('full_name') ?>" readonly /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Is Deleted <?php echo form_error('is_deleted') ?></td>
                                    <td><input type="text" class="form-control" name="is_deleted" id="is_deleted" placeholder="Is Deleted" value="<?php echo $is_deleted; ?>" /></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="hidden" name="id_pesanan" value="<?php echo $id_pesanan; ?>" />
                                        <button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button>
                                        <a href="<?php echo site_url('t_pesanan') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a></td>
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