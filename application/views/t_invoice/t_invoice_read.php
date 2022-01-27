<link rel="stylesheet" media="screen, print" href="<?php echo base_url() ?>assets/smartadmin/css/miscellaneous/lightgallery/lightgallery.bundle.css">
<main id="js-page-content" role="main" class="page-content">
    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>INVOICE</h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <table class="table table-bordered">
                            <tr>
                                <td>No Invoice</td>
                                <td><b><?php echo $no_invoice; ?></b></td>
                                <td>Tgl Invoice</td>
                                <td><b><?php echo $tgl_invoice; ?></b></td>
                                <td>Progress</td>
                                <td><b><?php echo $progress; ?></b></td>
                            </tr>
                            <tr>
                                <td>Pelanggan</td>
                                <td><b><?php echo $nama; ?></b></td>
                                <td>Email</td>
                                <td><b><?php echo $email; ?></b></td>
                                <td>No. HP</td>
                                <td><b>+62<?php echo $hp; ?></b></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td colspan="3"><b><?php echo $alamat; ?></b></td>
                                <td>Sales</td>
                                <td><b><?php echo $nm_sales; ?></b></td>
                            </tr>
                        </table>
                        <div class="text-center mt-2">
                            <!-- <a href="<?php echo site_url('m_survei/print_spk/' . $this->uri->segment(3)) ?>" class="btn btn-sm btn-info mb-2">Surat Penawaran</a> -->
                            <?php
                            if ($this->session->userdata('id_user_level') == 1 || $this->session->userdata('id_user_level') == 5) {
                                $this->db->where('id_survei', $this->uri->segment(3));
                                $this->db->where('id_group', '2');
                                $this->db->where('id_group_sub', '3');
                                $query = $this->db->get('t_pembukuan');
                                $num = $query->num_rows();
                                if ($num > 0) {
                            ?>
                                    <!-- <a href="<?php echo site_url('t_invoice/print_invoice/' . $this->uri->segment(3)) ?>" class="btn btn-sm btn-success mb-2">Print Invoice</a> -->
                                <?php } else { ?>
                                    <!-- <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#default-example-modal">Print Invoice</button> -->

                                    <div class="modal fade" id="default-example-modal" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Perhatian !!</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Pelunasan pembayaran belum diinput</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php }
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if ($this->session->userdata('id_user_level') != 3) { ?>
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr text-success">
                        <h2>
                            Pesanan <span class="fw-300"><i>Detail</i></span>
                        </h2>
                    </div>
                    <div class="panel-container">
                        <div class="panel-content">
                            <div class="text-center">
                                <?php if ($this->session->userdata('id_user_level') == 1 || $this->session->userdata('id_user_level') == 5) { ?>
                                    <a href="<?php echo site_url('t_pesanan/create/' . $this->uri->segment(3)) ?>" class="btn btn-sm btn-success mb-2">Tambah Data Pesanan</a>
                                <?php } ?>
                                <?php if ($this->session->userdata('id_user_level') != 3) { ?>
                                    <a href="<?php echo site_url('m_survei/print_spk/' . $this->uri->segment(3)) ?>" class="btn btn-sm btn-info mb-2">Print Surat Penawaran (Final)</a>
                                    <a href="<?php echo site_url('m_survei/print_spk/' . $this->uri->segment(3)) ?>" class="btn btn-sm btn-warning mb-2" data-toggle="modal" data-target="#spk-modal">Kirim Surat Penawaran (Final)</a>
                                    <div class="modal fade" id="spk-modal" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">SURAT PENAWARAN (FINAL)</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                                    </button>
                                                </div>
                                                <form action="<?php echo site_url('m_survei/kirim_spk/' . $this->uri->segment(3)) ?>" method="post">
                                                    <div class="modal-body">
                                                        <div class="card m-auto border">
                                                            <div class="card-header py-2">
                                                                <div class="card-title">
                                                                    Notifikasi Email & WhatsApp
                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                                <table class="table table-clean table-sm">
                                                                    <tr>
                                                                        <td>Email</td>
                                                                        <td><input type="email" class="form-control" name="email" value="<?php echo $email ?>"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Hp</td>
                                                                        <td><input type=" number" class="form-control" name="hp" value="<?php echo '62' . $hp ?>"></td>
                                                                    </tr>
                                                                </table>
                                                            </div>
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
                                <?php } ?>
                            </div>
                            <table id="example" class="table table-sm table-bordered table-striped">
                                <thead class="thead-themed">
                                    <tr>
                                        <th rowspan="2">No.</th>
                                        <th rowspan="2">Item Barang & Spesifikasi</th>
                                        <th colspan="5" class="text-center">Ukuran</th>
                                        <th rowspan="2" class="text-center">Harga</th>
                                        <th rowspan="2" class="text-center">Jumlah</th>
                                        <th rowspan="2"></th>
                                    </tr>
                                    <tr>
                                        <th class="text-center">Panjang</th>
                                        <th class="text-center">Lebar</th>
                                        <th class="text-center">Tinggi</th>
                                        <th class="text-center">Sum</th>
                                        <th class="text-center">Unit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $this->db->select('id_kategori,kategori');
                                    $this->db->where('id_invoice', $this->uri->segment(3));
                                    $this->db->group_by('id_kategori');
                                    $result = $this->db->get('v_pesanan')->result();
                                    foreach ($result as $dt) {
                                    ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td colspan="9">
                                                <h5><?php echo $dt->kategori ?></h5>
                                            </td>
                                        </tr>
                                        <?php
                                        $no2 = 1;
                                        //$this->db->select('id_produk_sub,nm_produk_sub,sum(total) as total');
                                        $this->db->where('id_invoice', $this->uri->segment(3));
                                        $this->db->where('id_kategori', $dt->id_kategori);
                                        //$this->db->group_by('id_produk_sub');
                                        $result = $this->db->get('v_pesanan')->result();
                                        foreach ($result as $dt2) {
                                            if ($dt2->id_satuan == 1) {
                                                $qty = $dt2->panjang;
                                            } elseif ($dt2->id_satuan == 2) {
                                                $qty = $dt2->panjang * $dt2->tinggi;
                                            } elseif ($dt2->id_satuan == 3) {
                                                $qty = $dt2->panjang * $dt2->lebar * $dt2->tinggi;
                                            } else {
                                                $qty = $dt2->qty;
                                            }
                                        ?>
                                            <tr>
                                                <td></td>
                                                <td><strong><?php echo $no2++ . '. '; ?><?php echo $dt2->nm_paket ?></strong><?php echo $dt2->deskripsi ?><br><?php echo $dt2->note ?></td>
                                                <td class="text-center"><?php echo $qty ?></td>
                                                <td class="text-center"><?php echo $dt2->lebar ?></td>
                                                <td class="text-center"><?php echo $dt2->tinggi ?></td>
                                                <td class="text-center"><?php echo $qty ?></td>
                                                <td class="text-center"><?php echo $dt2->satuan ?></td>
                                                <td class="text-right"><?php echo angka($dt2->harga) ?></td>
                                                <td class="text-right"><?php echo angka($dt2->total) ?></td>
                                                <td>
                                                    <!-- <a href="<?php echo site_url('t_pesanan/update/' . $dt2->id_invoice . '/' . $dt2->id_pesanan) ?>" class=" btn btn-warning btn-xs"><i class="fal fa-pencil" aria-hidden="true"></i></a> -->
                                                    <a href="<?php echo site_url('m_survei/delete_pesanan/' . $dt2->id_invoice . '/' . $dt2->id_pesanan) ?>" class=" btn btn-danger btn-xs"><i class="fal fa-trash" aria-hidden="true"></i></a>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        // $this->db->select('kategori,sum(total) as ttl_produk');
                                        // $this->db->where('id_invoice', $this->uri->segment(3));
                                        // $this->db->where('id_kategori', $dt->id_kategori);
                                        // $result = $this->db->get('v_pesanan')->result();
                                        // foreach ($result as $dtx) {
                                        ?>
                                        <!-- <tr>
                                            <td></td>
                                            <td colspan="6"></td>
                                            <td class="text-right"><strong>Total <?php echo $dtx->kategori ?></strong></td>
                                            <td class="text-right"><strong><?php echo angka($dtx->ttl_produk) ?></strong></td>
                                            <td></td>
                                        </tr> -->
                                    <?php
                                        //}
                                    }
                                    $this->db->select('sum(total) as grand');
                                    $this->db->where('id_invoice', $this->uri->segment(3));
                                    $result = $this->db->get('v_pesanan')->row();
                                    $ttl_pesanan = $result->grand;
                                    ?>
                                    <tr>
                                        <td colspan="8" class="text-right"><strong>TOTAL</strong></td>
                                        <td class="text-right"><strong><?php echo angka($ttl_pesanan) ?></strong></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php if ($this->session->userdata('id_user_level') == 1 || $this->session->userdata('id_user_level') == 5) { ?>
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr text-success">
                        <h2>
                            Pembayaran <span class="fw-300"><i>Debit</i></span>
                        </h2>
                    </div>
                    <div class="panel-container">
                        <div class="panel-content">
                            <button type="button" class="btn btn-block btn-info" data-toggle="modal" data-target="#debit-modal">Tambah Pembayaran (Debit)</button>

                            <table id="example" class="table table-bordered table-striped mt-2">
                                <thead class="thead-themed">
                                    <tr>
                                        <th>No.</th>
                                        <th>Tanggal</th>
                                        <th>Kwitansi</th>
                                        <th class="text-center">Group</th>
                                        <!-- <th class="text-center">Deskripsi</th> -->
                                        <th class="text-center">Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php


                                    $no = 1;
                                    $this->db->where('id_survei', $this->uri->segment(3));
                                    $this->db->where('id_group', '2');
                                    $this->db->order_by('created_date');
                                    $result = $this->db->get('v_pembukuan_new')->result();
                                    foreach ($result as $dt) {
                                        $break = urlencode("\n");
                                        $wa1 = '*Terima Kasih*';
                                        $wa2 = 'Pembayaran ' . $dt->nm_group_sub . ' untuk pesanan *' . $no_invoice . '* atas nama *' . strtoupper($nama) . '* dengan nominal *Rp. ' . angka($dt->total) . '* sudah kami terima.';
                                        $wa3 = 'Hormat kami';
                                        $wa4 = 'gallery dekoruma';
                                        $pesan = $wa1 . $break . $wa2 . $break . $wa3 . $break . $wa4;
                                    ?>
                                        <tr>
                                            <td><?php echo $no ?></td>

                                            <td><?php echo $dt->created_date ?></td>
                                            <td><?php echo $no_invoice . '-' . $dt->id_buku ?></td>
                                            <td><?php echo $dt->nm_group_sub ?></td>
                                            <!-- <td><?php echo $dt->deskripsi ?></td> -->
                                            <td class="text-right"><strong> <?php echo angka($dt->total); ?></strong></td>
                                            <td>
                                                <!-- <a href="<?php echo site_url('m_survei/sendMail/' . $dt->id_survei . '/' . $dt->id_buku . '/' . $dt->id_group_sub) ?>" class=" btn btn-danger btn-xs">mail</a> -->
                                                <a href="<?php echo site_url('t_pembukuan/delete/' . $dt->id_survei . '/' . $dt->id_buku) ?>" class=" btn btn-danger btn-xs"><i class="fal fa-trash" aria-hidden="true"></i></a>
                                                <!-- <a href="https://api.whatsapp.com/send?phone=62<?php echo $hp ?>&text=<?php echo $pesan ?>" target="_blank" class=" btn btn-success btn-xs"><i class="fal fa-paper-plane" aria-hidden="true"></i> WA</a> -->
                                                <!-- <a href="<?php echo site_url('t_invoice/kwitansi/' . $dt->id_survei . '/' . $dt->id_buku) ?>" class=" btn btn-info btn-xs">Print</a> -->
                                                <a href="<?php echo site_url('m_survei/printmail/' . $dt->id_survei . '/' . $dt->id_group_sub . '/' . $dt->total) ?>" class=" btn btn-info btn-xs" target="_blank">Print</a>
                                            </td>
                                        </tr>

                                    <?php $no++;
                                    }
                                    $this->db->select('sum(total) as xdebit');
                                    $this->db->where('id_survei', $this->uri->segment(3));
                                    $this->db->where('id_group', '2');
                                    $result = $this->db->get('v_pembukuan_new')->row();
                                    $ttl_payment = $result->xdebit;
                                    ?>
                                    <tr>
                                        <td colspan="3" class="text-right"><strong>TOTAL</strong></td>
                                        <td class="text-right"><strong><?php echo angka($ttl_payment) ?></strong></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="modal fade" id="debit-modal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
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
                                                    <!-- <input type="text" data-inputmask="'mask': '$ 999.999.999'" class=" form-control uang" name="total"> -->
                                                    <input type="text" id="tanpa-rupiah" class="form-control" name="total">
                                                </div>
                                                <!-- <div class="form-group">
                                                    <label class="form-label" for="example-fileinput">Note</label>
                                                    <textarea class="form-control" name="note"><?php echo $no_invoice . ' a/n ' . $nama ?></textarea>
                                                </div> -->
                                                <input type="hidden" name="note" value="<?php echo $no_invoice . ' a/n ' . $nama ?>">
                                                <div class="card m-auto border">
                                                    <div class="card-header py-2">
                                                        <div class="card-title">
                                                            Notifikasi Email & WhatsApp
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <table class="table table-clean table-sm">
                                                            <tr>
                                                                <td>Email</td>
                                                                <td><input type="email" class="form-control" name="email" value="<?php echo $email ?>"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Hp</td>
                                                                <td><input type=" number" class="form-control" name="hp" value="<?php echo '62' . $hp ?>"></td>
                                                            </tr>
                                                        </table>
                                                    </div>
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

                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr text-success">
                    <h2>
                        Desain <span class="fw-300"><i>Gambar</i></span>
                    </h2>
                </div>
                <div class="panel-container">
                    <div class="panel-content">
                        <?php if ($this->session->userdata('id_user_level') == 1 || $this->session->userdata('id_user_level') == 5) { ?>
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
                        <?php } ?>
                        <table id="example" class="table table-bordered table-striped mt-2">
                            <thead class="thead-themed">
                                <tr>
                                    <th>Tanggal</th>
                                    <th>File</th>
                                    <th>Note</th>
                                    <th>Create by</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $this->db->where('id_survei', $this->uri->segment(3));
                                $this->db->order_by('created_date', 'ASC');
                                $query = $this->db->get('t_file');
                                $row = $query->result();
                                foreach ($row as $dt) {
                                ?>
                                    <tr>
                                        <td><?php echo $dt->created_date ?></td>
                                        <td><?php echo $dt->file ?></td>
                                        <td><?php echo $dt->note ?></td>
                                        <td><?php echo $dt->created_by; ?></td>
                                        <td>
                                            <a href="<?php echo base_url() . 'assets/gambar/' . $dt->file ?>" class=" btn btn-primary btn-xs" target="_blank"><i class="fal fa-eye" aria-hidden="true"></i></a>
                                            <a href="<?php echo site_url('m_survei/delete_gambar/' . $dt->id_survei . '/' . $dt->id_file) ?>" class=" btn btn-danger btn-xs"><i class="fal fa-trash" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>

                        <?php
                        $this->db->where('id_survei', $this->uri->segment(3));
                        $query = $this->db->get('t_file');
                        $row = $query->result();
                        $num = $query->num_rows();
                        if ($num > 0) {
                            echo '<div id="js-lightgallery">';
                            foreach ($row as $dt) { ?>
                                <!-- <a class="" href="<?php echo base_url() ?>assets/gambar/<?php echo $dt->file ?>">
                                        <img class="img-responsive" src="<?php echo base_url() ?>assets/gambar/<?php echo $dt->file ?>" alt="<?php echo $dt->note ?>">
                                    </a> -->
                                <a class="" href="<?php echo base_url() ?>assets/gambar/<?php echo $dt->file ?>" data-sub-html="<?php echo $dt->note ?>">
                                    <img class="img-responsive" src="<?php echo base_url() ?>assets/gambar/<?php echo $dt->file ?>" alt="image">
                                </a>
                            <?php }
                            echo '</div>';
                        } else { ?>
                            <div class="text-center"><span class="alert alert-warning">Belum ada file yang diupload</span></div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <?php if ($this->session->userdata('id_user_level') == 1 || $this->session->userdata('id_user_level') == 3) { ?>
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr text-success">
                        <h2>
                            Bahan <span class="fw-300"><i>Material</i></span>
                        </h2>
                    </div>
                    <div class="panel-container">
                        <div class="panel-content">
                            <div class="text-center">
                                <a href="<?php echo site_url('t_material/create/' . $this->uri->segment(3)) ?>" class="btn btn-sm btn-success mb-2">Tambah Data Bahan Material</a>
                            </div>
                            <table id="example" class="table table-bordered table-striped">
                                <thead class="thead-themed">
                                    <tr>
                                        <th>No.</th>
                                        <th class="text-center">Gudang</th>
                                        <th>Barang Material</th>
                                        <th>Tukang</th>
                                        <th>Note</th>
                                        <th class="text-center">Qty</th>
                                        <th class="text-center">Harga (Rp)</th>
                                        <th class="text-center">Total (Rp)</th>
                                        <th>Create By</th>
                                        <th>Create Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $this->db->where('id_invoice', $this->uri->segment(3));
                                    $result = $this->db->get('v_material')->result();
                                    foreach ($result as $dt) {
                                    ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td class="text-center"><?php echo $dt->gudang ?></td>
                                            <td><?php echo $dt->barang ?></td>
                                            <td><?php echo $dt->nm_tukang ?></td>
                                            <td><?php echo $dt->note ?></td>
                                            <td><?php echo $dt->qty ?></td>
                                            <td><?php echo angka($dt->harga_satuan) ?></td>
                                            <td><?php echo angka($dt->total) ?></td>
                                            <td><?php echo $dt->id_user ?></td>
                                            <td><?php echo $dt->create_date ?></td>
                                            <td>
                                                <?php if ($this->session->userdata('id_user_level') != 3) { ?>
                                                    <a href="<?php echo site_url('t_material/delete/' . $dt->id_invoice . '/' . $dt->id_material . '/' . $dt->id_barang) ?>" class=" btn btn-danger btn-xs"><i class="fal fa-trash" aria-hidden="true"></i></a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php }
                                    $this->db->select('sum(total) as grand');
                                    $this->db->where('id_invoice', $this->uri->segment(3));
                                    $result = $this->db->get('t_material')->row();
                                    $ttl_material = $result->grand;
                                    ?>
                                    <tr>
                                        <td colspan="6" class="text-right"><strong>TOTAL</strong></td>
                                        <td class="text-right"><strong><?php echo angka($ttl_material) ?></strong></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php if ($this->session->userdata('id_user_level') == 1) { ?>
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr text-success">
                        <h2>
                            Biaya Lain-lain <span class="fw-300"><i>Kredit</i></span>
                        </h2>
                    </div>
                    <div class="panel-container">
                        <div class="panel-content">
                            <button type="button" class="btn btn-block btn-warning" data-toggle="modal" data-target="#kredit-modal">Tambah Pembayaran (Kredit)</button>

                            <table id="example" class="table table-bordered table-striped mt-2">
                                <thead class="thead-themed">
                                    <tr>
                                        <th>No.</th>
                                        <th>Tanggal</th>
                                        <th class="text-center">Group</th>
                                        <th class="text-center">Tukang</th>
                                        <th class="text-center">Deskripsi</th>
                                        <th class="text-center">Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $this->db->where('id_survei', $this->uri->segment(3));
                                    $this->db->where('id_group', '1');
                                    $this->db->order_by('created_date');
                                    $result = $this->db->get('v_pembukuan_new')->result();
                                    foreach ($result as $dt) {
                                    ?>
                                        <tr>
                                            <td><?php echo $no ?></td>
                                            <td><?php echo $dt->created_date ?></td>
                                            <td><?php echo $dt->nm_group_sub ?></td>
                                            <td><?php echo $dt->nm_tukang ?></td>
                                            <td><?php echo $dt->deskripsi ?></td>
                                            <td class="text-right"><strong> <?php echo angka($dt->total); ?></strong></td>
                                            <td><a href="<?php echo site_url('t_pembukuan/delete/' . $dt->id_survei . '/' . $dt->id_buku) ?>" class=" btn btn-danger btn-xs"><i class="fal fa-trash" aria-hidden="true"></i></a></td>
                                        </tr>
                                    <?php $no++;
                                    }
                                    $this->db->select('sum(total) as xdebit');
                                    $this->db->where('id_survei', $this->uri->segment(3));
                                    $this->db->where('id_group', '1');
                                    $result = $this->db->get('v_pembukuan_new')->row();
                                    $ttl_biaya = $result->xdebit;
                                    ?>
                                    <tr>
                                        <td colspan="4" class="text-right"><strong>TOTAL</strong></td>
                                        <td class="text-right"><strong><?php echo angka($ttl_biaya) ?></strong></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>

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
                                                <!-- <div class="form-group">
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
                                            </div> -->
                                                <div class="form-group">
                                                    <label class="form-label" for="example-fileinput">Total</label>
                                                    <input type="text" class="form-control" name="total" id="tanpa-rupiah-material">
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label" for="example-fileinput">Tukang</label>
                                                    <?php echo select2_update('nm_tukang', 'm_sales', 'nm_sales', 'nm_sales', '', 'group="TUKANG" and aktif="Y"', '') ?></td>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label" for="example-fileinput">Note</label>
                                                    <textarea class="form-control" name="note"><?php echo $no_invoice . ' a/n ' . $nama ?></textarea>
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

                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php if ($this->session->userdata('id_user_level') == 1) { ?>
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr text-success">
                        <h2>
                            Laba <span class="fw-300"><i>Rugi</i></span>
                        </h2>
                    </div>
                    <div class="panel-container">
                        <div class="panel-content">
                            <table id="example" class="table table-striped mt-2">
                                <tbody>
                                    <?php
                                    $debit = $ttl_payment;
                                    $kredit = $ttl_biaya + $ttl_material;
                                    $margin = $debit - $kredit;
                                    ?>
                                    <!-- <tr>
                                    <td>Total Pesanan</td>
                                    <td></td>
                                    <td class="text-right"><strong><?php echo angka($ttl_pesanan) ?></strong></td>
                                </tr> -->
                                    <?php
                                    $no = 1;
                                    $this->db->where('id_survei', $this->uri->segment(3));
                                    $this->db->where('id_group', '2');
                                    $this->db->order_by('created_date');
                                    $result = $this->db->get('v_pembukuan_new')->result();
                                    foreach ($result as $dt) { ?>
                                        <tr>
                                            <td>- <?php echo $dt->nm_group_sub ?></td>
                                            <!-- <td><?php echo $dt->deskripsi ?></td> -->
                                            <td class="text-right"><strong> <?php echo angka($dt->total); ?></strong></td>
                                            <td></td>
                                        </tr>
                                    <?php } ?>
                                    <tr>
                                        <td><strong>Total Pendapatan</strong></td>
                                        <td></td>
                                        <td class="text-right"><strong><?php echo angka($ttl_payment) ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"></td>
                                    </tr>
                                    <tr>
                                        <td>- Biaya Material</td>
                                        <td class="text-right"><strong><?php echo angka($ttl_material) ?></strong></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>- Biaya Lain-lain</td>
                                        <td class="text-right"><strong><?php echo angka($ttl_biaya) ?></strong></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Total Beban</strong></td>
                                        <td></td>
                                        <td class="text-right"><strong><?php echo angka($ttl_biaya + $ttl_material) ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Laba (Rugi)</strong></td>
                                        <td></td>
                                        <td class="text-right"><strong><?php echo angka($margin) ?></strong></td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</main>
<script src="<?php echo base_url() ?>assets/smartadmin-slim/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin-slim/js/app.bundle.js"></script>
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

        /* Tanpa Rupiah */
        var tanpa_rupiah = document.getElementById('tanpa-rupiah');
        tanpa_rupiah.addEventListener('keyup', function(e) {
            tanpa_rupiah.value = formatRupiah(this.value);
        });

        var tanpa_rupiah_material = document.getElementById('tanpa-rupiah-material');
        tanpa_rupiah_material.addEventListener('keyup', function(e) {
            tanpa_rupiah_material.value = formatRupiah(this.value);
        });

        /* Fungsi */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }

    });
</script>