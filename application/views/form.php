<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        CONTOH HELPER TAMBAHAN
                    </h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">

                        <table class="table">
                            <tr>
                                <td width="150">Autocomplate</td>
                                <td><input type="text" id="name_user" name="product" class="form-control ui-autocomplete-input" placeholder="Masukan Nama user ..."></td>
                            </tr>
                            <tr>
                                <td>Select2</td>
                                <td><?php echo select2_dinamis('test', 'tbl_user', 'full_name', 'Masukan keyword ...') ?></td>
                            </tr>
                            <tr>
                                <td>Datalist</td>
                                <td><?php echo datalist_dinamis('test', 'tbl_user', 'full_name') ?></td>
                            </tr>
                            <tr>
                                <td>Combobox</td>
                                <td><?php echo cmb_dinamis('test', 'tbl_user', 'full_name', 'id_users') ?></td>
                            </tr>
                        </table>

                    </div>

                </div>
            </div>
        </div>
</main>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-1.9.1.min.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/datagrid/datatables/datatables.bundle.js"></script>

<script type="text/javascript">
    $(function() {
        //autocomplete
        $("#name_user").autocomplete({
            source: "<?php echo base_url() ?>/index.php/welcome/autocomplate",
            minLength: 1
        });
    });
</script>