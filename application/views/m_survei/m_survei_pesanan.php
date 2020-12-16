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
                        $id_survei = $this->uri->segment(3);
                        $this->db->from('m_survei');
                        $this->db->where('id_survei', $id_survei);
                        $dt = $this->db->get()->row();
                        $tgl = date("Ym", strtotime($dt->created_date));
                        $id_max = str_pad($id_survei, 3, '0', STR_PAD_LEFT);
                        $no = $tgl . $id_max;
                        ?>
                        <form action="<?php echo $action; ?>" method="post">
                            <table class='table table-striped'>
                                <tr>
                                    <td width='200'>No Pesanan <?php echo form_error('no_pesanan') ?></td>
                                    <td><input type="text" class="form-control" name="no_pesanan" id="no_pesanan" placeholder="No Pesanan" value="<?php echo $no; ?>" /></td>
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
                                    <td width='200'>Panjang <?php echo form_error('p') ?></td>
                                    <td><input type="text" class="form-control" name="p" id="p" placeholder="P" value="<?php echo $p; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Lebar <?php echo form_error('l') ?></td>
                                    <td><input type="text" class="form-control" name="l" id="l" placeholder="L" value="<?php echo $l; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Tinggi <?php echo form_error('t') ?></td>
                                    <td><input type="text" class="form-control" name="t" id="t" placeholder="T" value="<?php echo $t; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Note <?php echo form_error('note') ?></td>
                                    <td> <textarea class="form-control" non_pks="3" name="note" id="note" placeholder="Note"><?php echo $note; ?></textarea></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <input type="hidden" name="created_date" value="<?php echo date('Y-m-d H:i:s'); ?>" />
                                        <input type="hidden" name="users" value="<?php echo $this->session->userdata('full_name') ?>" readonly />
                                        <input type="hidden" name="is_deleted" value="N" />
                                        <input type="hidden" name="id_survei" value="<?php echo $id_survei; ?>" />
                                        <input type="hidden" name="id_pesanan" value="<?php echo $id_pesanan; ?>" />
                                        <button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button>
                                        <a href="<?php echo site_url('m_survei/read/' . $this->uri->segment(3)) ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a></td>
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