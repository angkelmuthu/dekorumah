<link rel="stylesheet" media="screen, print" href="<?php echo base_url() ?>assets/smartadmin/css/miscellaneous/lightgallery/lightgallery.bundle.css">
<main id="js-page-content" role="main" class="page-content">
    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
    <div class="row">
        <div class="col-xl-12 mb-2">
            <ul class="step d-flex flex-nowrap">
                <li class="step-item <?php if ($id_status == 1) {
                                            echo ' active';
                                        }; ?>">
                    <a href="<?php echo site_url('m_survei/update_status/' . $this->uri->segment(3) . '/1'); ?>" class="">PROSPEK</a>
                </li>
                <li class="step-item <?php if ($id_status == 2) {
                                            echo ' active';
                                        }; ?>">
                    <a href="<?php echo site_url('m_survei/update_status/' . $this->uri->segment(3) . '/2'); ?>" class="">DESIGN</a>
                </li>
                <li class="step-item <?php if ($id_status == 3) {
                                            echo ' active';
                                        }; ?>">
                    <a href="<?php echo site_url('m_survei/update_status/' . $this->uri->segment(3) . '/3'); ?>" class="">PRODUKSI</a>
                </li>
                <li class="step-item <?php if ($id_status == 4) {
                                            echo ' active';
                                        }; ?>">
                    <a href="<?php echo site_url('m_survei/update_status/' . $this->uri->segment(3) . '/4'); ?>" class="">KIRIM</a>
                </li>
                <li class="step-item <?php if ($id_status == 5) {
                                            echo ' active';
                                        }; ?>">
                    <a href="<?php echo site_url('m_survei/update_status/' . $this->uri->segment(3) . '/5'); ?>" class="">SELESAI</a>
                </li>
            </ul>
        </div>
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
                            <tr>
                                <td>Status</td>
                                <td><?php echo $status; ?></td>
                            </tr>
                            <tr>
                                <td>Sales</td>
                                <td><?php echo $nm_sales; ?></td>
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
            <div id="panel-12" class="panel">
                <div class="panel-hdr border-faded border-top-0 border-right-0 border-left-0 shadow-0">
                    <h2>Data Pesanan</h2>
                    <div class="panel-toolbar pr-3">
                        <ul class="nav nav-pills border-bottom-0" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#js_change_pill_justified-1" role="tab">Rincian Pesanan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#js_change_pill_justified-2" role="tab">Gambar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#js_change_pill_justified-3" role="tab">Pembukuan</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#js_change_pill_justified-4" role="tab">Pengeluaran</a>
                            </li> -->
                        </ul>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <div class="tab-content py-3">
                            <div class="tab-pane fade show active" id="js_change_pill_justified-1" role="tabpanel">
                                <div class="text-center">
                                    <a href="<?php echo site_url('m_survei/create_pesanan/' . $this->uri->segment(3)) ?>" class="btn btn-sm btn-success mb-2">Tambah Data Pesanan</a>
                                    <a href="<?php echo site_url('m_survei/print_spk/' . $this->uri->segment(3)) ?>" class="btn btn-sm btn-info mb-2">Cetak SPK</a>
                                </div>
                                <table id="example" class="table table-bordered table-striped">
                                    <thead class="thead-themed">
                                        <tr>
                                            <th>No.</th>
                                            <th>Item Barang & Spesifikasi</th>
                                            <th class="text-center">Ukuran</th>
                                            <th class="text-center">volume</th>
                                            <th class="text-center">Satuan</th>
                                            <th class="text-center">Harga (Rp)</th>
                                            <th class="text-center">Total (Rp)</th>
                                            <th class="text-center">Grand Total (Rp)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $this->db->select('id_barang,nm_barang');
                                        $this->db->where('id_survei', $this->uri->segment(3));
                                        $this->db->group_by('id_barang');
                                        $result = $this->db->get('v_pesanan')->result();
                                        foreach ($result as $dt) {
                                        ?>
                                            <tr>
                                                <td><?php echo $no ?></td>
                                                <td colspan="7">
                                                    <h5><?php echo $dt->nm_barang ?></h5>
                                                </td>
                                            </tr>
                                            <?php
                                            $this->db->select('id_barang_sub,nm_barang_sub,sum(total) as total');
                                            $this->db->where('id_survei', $this->uri->segment(3));
                                            $this->db->where('id_barang', $dt->id_barang);
                                            $this->db->group_by('id_barang_sub');
                                            $result = $this->db->get('v_pesanan')->result();
                                            foreach ($result as $dt2) {
                                            ?>
                                                <tr>
                                                    <td></td>
                                                    <td colspan="6"><strong><?php echo $dt2->nm_barang_sub ?></strong></td>
                                                    <td class="text-right"><strong><?php echo angka($dt2->total) ?></strong></td>
                                                </tr>
                                            <?php }
                                            $this->db->where('id_survei', $this->uri->segment(3));
                                            $this->db->where('id_barang_sub', $dt2->id_barang_sub);
                                            $result = $this->db->get('v_pesanan')->result();
                                            foreach ($result as $dt3) {
                                            ?>
                                                <tr>
                                                    <td></td>
                                                    <td>- <?php echo $dt3->nm_barang_detail ?></td>
                                                    <td class="text-center"><?php echo $dt3->ukuran ?></td>
                                                    <td class="text-center"><?php echo $dt3->volume ?></td>
                                                    <td class="text-center"><?php echo $dt3->satuan ?></td>
                                                    <td class="text-right"><?php echo angka($dt3->harga) ?></td>
                                                    <td class="text-right"><?php echo angka($dt3->total) ?></td>
                                                    <td></td>
                                                </tr>
                                            <?php }
                                            $no++;
                                        }
                                        $this->db->select('sum(total) as grand');
                                        $this->db->where('id_survei', $this->uri->segment(3));
                                        $result = $this->db->get('v_pesanan')->result();
                                        foreach ($result as $ttl) {
                                            ?>
                                            <tr>
                                                <td colspan="7" class="text-right"><strong>TOTAL</strong></td>
                                                <td class="text-right"><strong><?php echo angka($ttl->grand) ?></strong></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>

                            </div>
                            <div class="tab-pane fade show" id="js_change_pill_justified-2" role="tabpanel">
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#default-example-modal">Upload Gambar</button>

                                <div class="modal fade" id="default-example-modal" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">UPLOAD GAMBAR</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                                </button>
                                            </div>
                                            <form action="<?php echo site_url('m_survei/upload_gambar') ?>" method="post" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <input type="hidden" name="id_survei" value="<?php echo $this->uri->segment(3) ?>">
                                                    <div class="form-group">
                                                        <label class="form-label" for="example-fileinput">Default file input</label>
                                                        <input type="file" class="form-control-file" name="gambar">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label" for="example-fileinput">Note</label>
                                                        <textarea class="form-control" name="note"></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Upload</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-content mt-2">
                                    <?php
                                    $this->db->where('id_survei', $this->uri->segment(3));
                                    $query = $this->db->get('t_file');
                                    $row = $query->result();
                                    $num = $query->num_rows();
                                    if ($num > 0) {
                                        echo '<div id="js-lightgallery">';
                                        foreach ($row as $dt) { ?>
                                            <a class="" href="<?php echo base_url() ?>assets/gambar/<?php echo $dt->file ?>">
                                                <img class="img-responsive" src="<?php echo base_url() ?>assets/gambar/<?php echo $dt->file ?>" alt="<?php echo $dt->note ?>">
                                            </a>
                                        <?php }
                                        echo '</div>';
                                    } else { ?>
                                        <div class="text-center"><span class="alert alert-warning">Belum ada file yang diupload</span></div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="js_change_pill_justified-3" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#debit-modal">Tambah Pengeluaran (Debit)</button>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-block btn-warning" data-toggle="modal" data-target="#kredit-modal">Tambah Pembayaran (Kredit)</button>
                                    </div>
                                </div>

                                <div class="modal fade" id="debit-modal" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Pengeluaran (Debit)</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                                </button>
                                            </div>
                                            <form action="<?php echo site_url('m_survei/create_debit') ?>" method="post" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <input type="hidden" name="id_survei" value="<?php echo $this->uri->segment(3) ?>">
                                                    <input type="hidden" name="id_group" value="2">
                                                    <div class="form-group">
                                                        <label class="form-label" for="example-fileinput">Jenis Pembayaran</label>
                                                        <select name="id_group_sub" id="group_sub" class="select2 form-control w-100">
                                                            <option value="">Select Jenis Pembayaran</option>
                                                            <?php
                                                            $this->db->where('id_group', '2');
                                                            $result = $this->db->get('m_group_sub')->result();
                                                            foreach ($result as $row) {
                                                                echo '<option value="' . $row->id_group_sub . '">' . $row->nm_group_sub . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label" for="example-fileinput">Nominal</label>
                                                        <input type="number" class="form-control" name="total">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label" for="example-fileinput">Note</label>
                                                        <textarea class="form-control" name="note"></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="kredit-modal" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Pengeluaran (Kredit)</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                                </button>
                                            </div>
                                            <form action="<?php echo site_url('m_survei/create_kredit') ?>" method="post" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <input type="hidden" name="id_survei" value="<?php echo $this->uri->segment(3) ?>">
                                                    <input type="hidden" name="id_group" value="1">
                                                    <div class="form-group">
                                                        <label class="form-label" for="example-fileinput">Jenis Pengeluaran</label>
                                                        <select name="id_group_sub" id="group_sub" class="select2 form-control w-100">
                                                            <option value="">Select Jenis Pengeluaran</option>
                                                            <?php
                                                            $this->db->where('id_group', '1');
                                                            $result = $this->db->get('m_group_sub')->result();
                                                            foreach ($result as $row) {
                                                                echo '<option value="' . $row->id_group_sub . '">' . $row->nm_group_sub . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label" for="example-fileinput">Dekripsi Pengeluaran</label>
                                                        <input type="text" class="form-control" name="deskripsi">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label" for="example-fileinput">Qty</label>
                                                        <input type="number" class="form-control" name="qty">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label" for="example-fileinput">Satuan</label>
                                                        <input type="text" class="form-control" name="satuan">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label" for="example-fileinput">Harga Satuan</label>
                                                        <input type="number" class="form-control" name="harga">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label" for="example-fileinput">Total</label>
                                                        <input type="number" class="form-control" name="total">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label" for="example-fileinput">Note</label>
                                                        <textarea class="form-control" name="note"></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <table id="example" class="table table-bordered table-striped mt-2">
                                    <thead class="thead-themed">
                                        <tr>
                                            <th>No.</th>
                                            <th>Tanggal</th>
                                            <th class="text-center">Group</th>
                                            <th class="text-center">Deskripsi</th>
                                            <th class="text-center">Debit</th>
                                            <th class="text-center">Kredit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $this->db->where('id_survei', $this->uri->segment(3));
                                        $this->db->order_by('created_date');
                                        $result = $this->db->get('v_pembukuan')->result();
                                        foreach ($result as $dt) {
                                        ?>
                                            <tr>
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $dt->created_date ?></td>
                                                <td><?php echo $dt->nm_group_sub ?></td>
                                                <td><?php echo $dt->deskripsi ?></td>
                                                <td class="text-right"><strong><?php if (isset($dt->Debit)) {
                                                                                    echo angka($dt->Debit);
                                                                                } ?></strong></td>
                                                <td class="text-right"><strong><?php if (isset($dt->Kredit)) {
                                                                                    echo angka($dt->Kredit);
                                                                                } ?></strong></td>
                                            </tr>
                                        <?php $no++;
                                        } ?>
                                        <?php
                                        $this->db->select('sum(Debit) as xdebit,sum(Kredit) as xkredit');
                                        $this->db->where('id_survei', $this->uri->segment(3));
                                        $result = $this->db->get('v_pembukuan')->result();
                                        foreach ($result as $dt) {
                                        ?>
                                            <tr>
                                                <td colspan="4">Balance</td>
                                                <td class="text-right"><strong><?php echo angka($dt->xdebit) ?></strong></td>
                                                <td class="text-right"><strong><?php echo angka($dt->xkredit) ?></strong></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="js_change_pill_justified-4" role="tabpanel">
                            </div>
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
<script src="<?php echo base_url() ?>assets/smartadmin/js/miscellaneous/lightgallery/lightgallery.bundle.js"></script>
<script>
    $(document).ready(function() {
        var $initScope = $('#js-lightgallery');
        if ($initScope.length) {
            $initScope.justifiedGallery({
                border: -1,
                rowHeight: 150,
                margins: 8,
                waitThumbnailsLoad: true,
                randomize: false,
            }).on('jg.complete', function() {
                $initScope.lightGallery({
                    thumbnail: true,
                    animateThumb: true,
                    showThumbByDefault: true,
                });
            });
        };
        $initScope.on('onAfterOpen.lg', function(event) {
            $('body').addClass("overflow-hidden");
        });
        $initScope.on('onCloseAfter.lg', function(event) {
            $('body').removeClass("overflow-hidden");
        });
    });
</script>