<style>
    body .select2-container {
        z-index: 9999 !important;
    }
</style>
<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>PEMBAYARAN</h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <div class="text-center">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#default-example-modal">Tambah Pembayaran</button>
                        </div>
                        <div class="modal fade" id="default-example-modal" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">
                                            PEMBAYARAN
                                            <small class="m-0 text-muted">
                                                Tambah Pembayaran
                                            </small>
                                        </h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                        </button>
                                    </div>
                                    <form action="<?php echo site_url('t_pembayaran/create_action') ?>" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <table class='table table-striped'>
                                                <tr>
                                                    <td width='200'>Nama Projek</td>
                                                    <td><?php echo select2_dinamis('id_pelanggan', 'm_pelanggan', 'id_pelanggan', 'nama_projek', '', '', 'id_pelanggan DESC') ?></td>
                                                </tr>
                                                <tr>
                                                    <td width='200'>Perihal</td>
                                                    <td><input class="form-control" type="text" name="title" value="" required></td>
                                                </tr>
                                                <tr>
                                                    <td width='200'>Nominal</td>
                                                    <td><input class="form-control rupiah" type="text" name="total" value="" required></td>
                                                </tr>
                                                <tr>
                                                    <td width='200'>Keterangan</td>
                                                    <td><textarea class="form-control" type="text" name="keterangan"></textarea></td>
                                                </tr>
                                                <tr>
                                                    <td width='200'>File</td>
                                                    <td><input type="file" class="form-control-file" name="gambar"></td>
                                                </tr>

                                            </table>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <table class="table table-bordered table-hover table-striped w-100" id="example">
                            <thead class="thead-themed">
                                <tr>
                                    <th width="5%">No</th>
                                    <th width="13%">Tanggal</th>
                                    <th width="7%">No. Bayar</th>
                                    <th width="10%">Nama Projek</th>
                                    <th width="15%">Perihal</th>
                                    <th width="10%" class="text-right">Nominal</th>
                                    <th width="25%">Keterangan</th>
                                    <th width="15%">Action</th>
                                </tr>
                            </thead>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="VBayar" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        PEMBAYARAN
                        <small class="m-0 text-muted">
                            Edit Pembayaran
                        </small>
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="VBayar_modal">
                        <!-- Data akan di tampilkan disini-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/datagrid/datatables/datatables.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/datagrid/datatables/datatables.export.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/formplugins/inputmask/inputmask.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/formplugins/select2/select2.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/kostum.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.modal').on('shown.bs.modal', function(e) {
            $(this).find('.select2').select2({
                dropdownParent: $(this).find('.modal-content')
            });
        });

        $(".rupiah").inputmask({
            prefix: '',
            radixPoint: ',',
            groupSeparator: ".",
            alias: "numeric",
            autoGroup: true,
            digits: 0
        });


        $(document).on('click', '.view_bayar', function() {
            var id_bayar = $(this).attr("id_bayar");
            $.ajax({
                url: '<?php echo base_url(); ?>t_pembayaran/vbayar',
                method: 'post',
                data: {
                    id_bayar: id_bayar
                },
                success: function(data) {
                    $('#VBayar').modal("show");
                    $('#VBayar_modal').html(data);
                }
            });
        });
    });
</script>
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
                "url": "<?php echo site_url('t_pembayaran/ajax_list'); ?>",
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