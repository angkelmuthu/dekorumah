<main id="js-page-content" role="main" class="page-content">
    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>KELOLA DATA KOSTUMER</h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped" id="example">
                                <thead class="thead-themed">
                                    <tr>
                                        <th>No</th>
                                        <!-- <th>Tgl Survei</th> -->
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Email</th>
                                        <th>Hp</th>
                                        <!-- <th>Note</th>
                                        <th>Color</th>
                                        <th>Created Date</th>
                                        <th>Users</th> -->
                                        <th>Status</th>
                                        <th>Sales</th>
                                    </tr>
                                </thead>
                                <tbody><?php
                                        $i = 1;
                                        foreach ($status as $m_survei) {
                                        ?>
                                        <tr>
                                            <td width="10px"><?php echo $i ?></td>
                                            <!-- <td><?php echo $m_survei->tgl_survei ?></td> -->
                                            <td><?php echo $m_survei->nama ?></td>
                                            <td><?php echo $m_survei->alamat ?></td>
                                            <td><?php echo $m_survei->email ?></td>
                                            <td><?php echo $m_survei->hp ?></td>
                                            <!-- <td><?php echo $m_survei->note ?></td>
                                            <td><?php echo $m_survei->color ?></td>
                                            <td><?php echo $m_survei->created_date ?></td>
                                            <td><?php echo $m_survei->users ?></td> -->
                                            <td><?php echo $m_survei->status ?></td>
                                            <td><?php echo $m_survei->nm_sales ?></td>
                                        </tr>
                                    <?php
                                            $i++;
                                        }
                                    ?>
                                </tbody>
                            </table>
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
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>