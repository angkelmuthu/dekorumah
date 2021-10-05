<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>KELOLA DATA INVOICE</h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <div class="text-center">
                            <?php if ($this->session->userdata('id_user_level') == 1 || $this->session->userdata('id_user_level') == 5) {
                                echo anchor(site_url('t_invoice/create'), '<i class="fal fa-plus-square" aria-hidden="true"></i> Tambah Data', 'class="btn btn-primary btn-sm waves-effect waves-themed"');
                            } ?>
                            <?php echo anchor(site_url('t_invoice/excel'), '<i class="fal fa-file-excel" aria-hidden="true"></i> Export Ms Excel', 'class="btn btn-outline-success btn-sm waves-effect waves-themed"'); ?></div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped w-100" id="dt-basic-example">
                                <thead>
                                    <tr>
                                        <th width="30px">No</th>
                                        <th>No Invoice</th>
                                        <th>Tgl Invoice</th>
                                        <th>Pelanggan</th>
                                        <th>Sales</th>
                                        <th>Create Date</th>
                                        <th>Tanggal DP</th>
                                        <th>Progress</th>
                                        <th>Tanggal Lunas</th>
                                        <th>Status</th>
                                        <th width="200px">Action</th>
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
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/datagrid/datatables/datatables.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/datagrid/datatables/datatables.export.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings) {
            return {
                "iStart": oSettings._iDisplayStart,
                "iEnd": oSettings.fnDisplayEnd(),
                "iLength": oSettings._iDisplayLength,
                "iTotal": oSettings.fnRecordsTotal(),
                "iFilteredTotal": oSettings.fnRecordsDisplay(),
                "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
            };
        };

        var t = $("#dt-basic-example").dataTable({
            initComplete: function() {
                var api = this.api();
                $('#mytable_filter input')
                    .off('.DT')
                    .on('keyup.DT', function(e) {
                        if (e.keyCode == 13) {
                            api.search(this.value).draw();
                        }
                    });
            },
            oLanguage: {
                sProcessing: "loading..."
            },
            processing: true,
            serverSide: true,
            ajax: {
                "url": "t_invoice/json",
                "type": "POST"
            },
            columns: [{
                "data": "id",
                "orderable": false
            }, {
                "data": "no_invoice"
            }, {
                "data": "tgl_invoice"
            }, {
                "data": "nama"
            }, {
                "data": "nm_sales"
            }, {
                "data": "create_date"
            }, {
                "data": "tgl_dp"
            }, {
                "data": "progress"
            }, {
                "data": "tgl_lunas"
            }, {
                data: null,
                render: function(data, type, row) {
                    if (row.status === 'SELESAI') {
                        return '<button type="button" class="btn btn-xs btn-info" data-toggle="modal" data-target="#exampleModal' + row.id + '">' + row.status + '</button>' +
                            '<div class="modal fade" id="exampleModal' + row.id + '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">' +
                            '<div class="modal-dialog" role="document">' +
                            '<div class="modal-content">' +
                            '<div class="modal-header">' +
                            '<h5 class="modal-title" id="test2">Update Status Invoice</h5>' +
                            '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                            '</div><form action="<?php echo base_url(); ?>t_invoice/update_status" method="post">' +
                            '<div class="modal-body">' +
                            '<div class="form-group">' +
                            '<input type="hidden" name="id" value="' + row.id + '">' +
                            '<label class="form-label" for="example-select">Status Invoice</label>' +
                            '<select name="id_status" class="form-control">' +
                            '<option value="0">Ready</option>' +
                            '<option value="1">Selesai</option>' +
                            '<option value="2">Batal</option>' +
                            '</select>' +
                            '</div>' +
                            '</div>' +
                            '<div class="modal-footer">' +
                            '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>' +
                            '<button type="submit" class="btn btn-primary">Save changes</button>' +
                            '</div></form></div></div></div>';
                    } else if (row.status === 'BATAL') {
                        return '<button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#exampleModal' + row.id + '">' + row.status + '</button>' +
                            '<div class="modal fade" id="exampleModal' + row.id + '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">' +
                            '<div class="modal-dialog" role="document">' +
                            '<div class="modal-content">' +
                            '<div class="modal-header">' +
                            '<h5 class="modal-title" id="test2">Update Status Invoice</h5>' +
                            '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                            '</div><form action="<?php echo base_url(); ?>t_invoice/update_status" method="post">' +
                            '<div class="modal-body">' +
                            '<div class="form-group">' +
                            '<input type="hidden" name="id" value="' + row.id + '">' +
                            '<label class="form-label" for="example-select">Status Invoice</label>' +
                            '<select name="id_status" class="form-control">' +
                            '<option value="0">Ready</option>' +
                            '<option value="1">Selesai</option>' +
                            '<option value="2">Batal</option>' +
                            '</select>' +
                            '</div>' +
                            '</div>' +
                            '<div class="modal-footer">' +
                            '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>' +
                            '<button type="submit" class="btn btn-primary">Save changes</button>' +
                            '</div></form></div></div></div>';
                    } else {
                        return '<button type="button" class="btn btn-xs btn-default" data-toggle="modal" data-target="#exampleModal' + row.id + '">' + row.status + '</button>' +
                            '<div class="modal fade" id="exampleModal' + row.id + '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">' +
                            '<div class="modal-dialog" role="document">' +
                            '<div class="modal-content">' +
                            '<div class="modal-header">' +
                            '<h5 class="modal-title" id="test2">Update Status Invoice</h5>' +
                            '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                            '</div><form action="<?php echo base_url(); ?>t_invoice/update_status" method="post">' +
                            '<div class="modal-body">' +
                            '<div class="form-group">' +
                            '<input type="hidden" name="id" value="' + row.id + '">' +
                            '<label class="form-label" for="example-select">Status Invoice</label>' +
                            '<select name="id_status" class="form-control">' +
                            '<option value="0">Ready</option>' +
                            '<option value="1">Selesai</option>' +
                            '<option value="2">Batal</option>' +
                            '</select>' +
                            '</div>' +
                            '</div>' +
                            '<div class="modal-footer">' +
                            '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>' +
                            '<button type="submit" class="btn btn-primary">Save changes</button>' +
                            '</div></form></div></div></div>';
                    }
                },
                "orderable": false,
                "className": "text-center",
                "searchable": false,

            }, {
                "data": "action",
                "orderable": false,
                "className": "text-center"
            }],
            order: [
                [0, 'desc']
            ],
            rowCallback: function(row, data, iDisplayIndex) {
                var info = this.fnPagingInfo();
                var page = info.iPage;
                var length = info.iLength;
                var index = page * length + (iDisplayIndex + 1);
                $('td:eq(0)', row).html(index);
            }
        });
    });
</script>