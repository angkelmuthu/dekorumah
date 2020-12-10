<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-4">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>Kostumer Read</h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <table class="table table-striped">
                            <tr>
                                <td>Nama</td>
                                <td><?php echo $nama; ?></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td><?php echo $alamat; ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><?php echo $email; ?></td>
                            </tr>
                            <tr>
                                <td>Hp</td>
                                <td><?php echo $hp; ?></td>
                            </tr>
                            <tr>
                                <td>Note</td>
                                <td><?php echo $note; ?></td>
                            </tr>
                            <tr>
                                <td>Tgl Survei</td>
                                <td><?php echo $tgl_survei; ?></td>
                            </tr>
                            <!-- <tr>
                                <td>Color</td>
                                <td><?php echo $color; ?></td>
                            </tr> -->
                            <!-- <tr>
                                <td>Created Date</td>
                                <td><?php echo $created_date; ?></td>
                            </tr>
                            <tr>
                                <td>Users</td>
                                <td><?php echo $users; ?></td>
                            </tr> -->
                        </table>
                        <div>
                            <a href="<?php echo site_url('m_survei') ?>" class="btn btn-block btn-primary waves-effect waves-themed">Kembali</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-xl-8">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>Kostumer Read</h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <div class="text-center">
                            <a href="<?php echo site_url('m_survei/create_pesanan/' . $this->uri->segment(3)) ?>" class="btn btn-primary waves-effect waves-themed">Tambah</a>
                        </div>
                        <table id="example" class="table table-striped">
                            <thead>
                                <th>No.Pesanan</th>
                                <th>Tipe</th>
                                <th>Bahan</th>
                                <th>Panjang</th>
                                <th>Lebar</th>
                                <th>Tinggi</th>
                                <th>Note</th>
                            </thead>
                            <tbody>
                                <?php foreach ($pesanan as $dt) { ?>
                                    <tr>
                                        <td><?php echo $dt->no_pesanan ?></td>
                                        <td><?php echo $dt->id_tipe_pesanan ?></td>
                                        <td><?php echo $dt->id_jenis_bahan ?></td>
                                        <td><?php echo $dt->p ?></td>
                                        <td><?php echo $dt->l ?></td>
                                        <td><?php echo $dt->t ?></td>
                                        <td><?php echo $dt->note ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>

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
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>