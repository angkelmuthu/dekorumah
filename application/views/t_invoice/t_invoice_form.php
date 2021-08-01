<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>INPUT DATA INVOICE</h2>
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
                                <?php
                                $th = date('Y');
                                $bl = date('m');
                                if (empty($no_invoice)) {
                                    $this->db->select_max('id', 'max');
                                    $query = $this->db->get('t_invoice');
                                    $max = $query->row()->max;
                                    if ($max > 0) {
                                        $gen = 'INV/' . $th . '/' . $bl . '/' . $max;
                                    } else {
                                        $gen = 'INV/' . $th . '/' . $bl . '/1';
                                    }
                                } else {
                                    $gen = $no_invoice;
                                }

                                ?>

                                <tr>
                                    <td width='200'>No Invoice <?php echo form_error('no_invoice') ?></td>
                                    <td><input type="text" class="form-control" name="no_invoice" id="no_invoice" placeholder="No Invoice" value="<?php echo $gen; ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Tgl Invoice <?php echo form_error('tgl_invoice') ?></td>
                                    <td><input type="text" class="form-control" name="tgl_invoice" id="tgl_invoice" placeholder="Tgl Invoice" value="<?php echo date('Y-m-d'); ?>" /></td>
                                </tr>
                                <tr>
                                    <td width='200'>Pelanggan <?php echo form_error('id_pelanggan') ?></td>
                                    <td><?php echo select2_dinamis('id_pelanggan', 'm_pelanggan', 'id_pelanggan', 'nama') ?></td>
                                </tr>

                                <tr>
                                    <td width='200'>Status <?php echo form_error('status') ?></td>
                                    <td><?php echo select2_dinamis('status', 'm_status_invoice', 'id_status', 'status') ?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <input type="hidden" name="users" value="<?php echo $this->session->userdata('id_users') ?>" readonly />
                                    <input type="hidden" name="create_date" value="<?php echo date('Y-m-d H:s:i'); ?>" /></td>
                                    <td><input type="hidden" name="id" value="<?php echo $id; ?>" />
                                        <button type="submit" class="btn btn-warning waves-effect waves-themed"><i class="fal fa-save"></i> <?php echo $button ?></button>
                                        <a href="<?php echo site_url('t_invoice') ?>" class="btn btn-info waves-effect waves-themed"><i class="fal fa-sign-out"></i> Kembali</a>
                                    </td>
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