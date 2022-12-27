<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>KELOLA DATA COSTUMER</h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <div class="text-center">
                            <?php if ($this->session->userdata('id_user_level') == 1 || $this->session->userdata('id_user_level') == 5) { ?>
                                <?php echo anchor(site_url('m_pelanggan/create'), '<i class="fal fa-plus-square" aria-hidden="true"></i> Tambah Data', 'class="btn btn-primary btn-sm waves-effect waves-themed"'); ?>
                                <?php echo anchor(site_url('m_pelanggan/excel'), '<i class="fal fa-file-excel" aria-hidden="true"></i> Export Ms Excel', 'class="btn btn-outline-success btn-sm waves-effect waves-themed"'); ?>
                            <?php } ?>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped w-100" id="example">
                                <thead>
                                    <tr>
                                        <th width="30px">No</th>
                                        <th>Nama</th>
                                        <!-- <th>Alamat</th> -->
                                        <th>Email</th>
                                        <th>Hp</th>
                                        <th>Nama Projek</th>
                                        <th>Sales</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin-slim/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin-slim/js/app.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/datagrid/datatables/datatables.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/datagrid/datatables/datatables.export.js"></script>
<script type="text/javascript">
    var table;

    $(document).ready(function() {
        //datatables
        table = $('#example').DataTable({

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            "pageLength": 10,
            "lengthMenu": [
                [10, 20, -1],
                [10, 20, 'semua']
            ],

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('m_pelanggan/ajax_list'); ?>",
                "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [{
                "targets": [0], //first column / numbering column
                "orderable": false, //set not orderable
            }, ],

        });
    });
</script>