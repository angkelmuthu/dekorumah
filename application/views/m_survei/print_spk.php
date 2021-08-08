<?php
$this->db->where('id', $this->uri->segment('3'));
$row = $this->db->get('v_invoice')->row();
?>
<main id="js-page-content" role="main" class="page-content">
    <div class="container">
        <a href="#" class="btn btn-block btn-primary" data-action="app-print" title="Print page">
            <i class="fal fa-print"></i> PRINT
        </a>
        <br><br>
        <div data-size="A4">
            <div class="row">
                <div class="col-sm-12">
                    <div class="d-flex align-items-center mb-0">
                        <h2 class="keep-print-font fw-500 mb-0 text-primary flex-1 position-relative">
                            <img src="<?php echo base_url() ?>assets/dekorumah.png">
                            <h3><strong>RINCIAN PENAWARAN HARGA</strong><br>Spesifikasi dan Dimensi</h3>
                        </h2>
                    </div>
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col-sm-5 d-flex">
                    <div class="table-responsive">
                        <table class="table table-clean table-sm align-self-end">
                            <tbody>
                                <tr>
                                    <td width="35%">Nama Pemesan</td>
                                    <td width="5%">:</td>
                                    <td width="60%"><?php echo $row->nama ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>
                                        :
                                    </td>
                                    <td>
                                        <?php echo $row->alamat ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-sm-2 ml-sm-auto"></div>
                <div class="col-sm-5 ml-sm-auto">
                    <div class="table-responsive">
                        <table class="table table-clean table-sm align-self-end">
                            <tbody>
                                <tr>
                                    <td class="text-right">
                                        Jakarta, <?php echo date("d F Y"); ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table id="example" class="table table-bordered table-striped" style="font-size:12px;line-height: 0.9;">
                            <thead class="thead-themed">
                                <tr>
                                    <th rowspan="2">No.</th>
                                    <th rowspan="2">Item Barang & Spesifikasi</th>
                                    <th colspan="5" class="text-center">Ukuran</th>
                                    <th rowspan="2" class="text-center">Harga</th>
                                    <th rowspan="2" class="text-center">Jumlah</th>
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
                                $this->db->select('id_produk,nm_produk');
                                $this->db->where('id_invoice', $this->uri->segment(3));
                                $this->db->group_by('id_produk');
                                $result = $this->db->get('v_pesanan')->result();
                                foreach ($result as $dt) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td colspan="9"><?php echo $dt->nm_produk ?></td>
                                    </tr>
                                    <?php
                                    $no2 = 1;
                                    //$this->db->select('id_produk_sub,nm_produk_sub,sum(total) as total');
                                    $this->db->where('id_invoice', $this->uri->segment(3));
                                    $this->db->where('id_produk', $dt->id_produk);
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
                                            <td><strong><?php echo $no2++ . '. '; ?><?php echo $dt2->nm_produk_sub ?></strong></td>
                                            <td class="text-center"><?php echo $qty ?></td>
                                            <td class="text-center"><?php echo $dt2->lebar ?></td>
                                            <td class="text-center"><?php echo $dt2->tinggi ?></td>
                                            <td class="text-center"><?php echo $qty ?></td>
                                            <td class="text-center"><?php echo $dt2->satuan ?></td>
                                            <td class="text-right"><?php echo angka($dt2->harga) ?></td>
                                            <td class="text-right"><?php echo angka($dt2->total) ?></td>
                                        </tr>
                                        <?php
                                        $no3 = 'a';
                                        $this->db->where('id_pesanan', $dt2->id_pesanan);
                                        $result = $this->db->get('v_pesanan_detail')->result();
                                        foreach ($result as $dt3) {
                                        ?>
                                            <tr>
                                                <td></td>
                                                <td><?php echo '&nbsp&nbsp&nbsp' . $no3++ . '. '; ?><?php echo $dt3->nm_produk_detail ?></td>
                                                <td colspan="7"></td>
                                            </tr>
                                        <?php
                                        }
                                    }
                                    $this->db->select('nm_produk,sum(total) as ttl_produk');
                                    $this->db->where('id_invoice', $this->uri->segment(3));
                                    $this->db->where('id_produk', $dt->id_produk);
                                    $result = $this->db->get('v_pesanan')->result();
                                    foreach ($result as $dtx) {
                                        ?>
                                        <tr>
                                            <td colspan="8" class="text-right"><strong>Total <?php echo $dtx->nm_produk ?></strong></td>
                                            <td class="text-right"><strong><?php echo angka($dtx->ttl_produk) ?></strong></td>
                                        </tr>
                                <?php
                                    }
                                }
                                $this->db->select('sum(total) as grand');
                                $this->db->where('id_invoice', $this->uri->segment(3));
                                $result = $this->db->get('v_pesanan')->row();
                                $ttl_pesanan = $result->grand;
                                ?>
                                <tr>
                                    <td colspan="8" class="text-right"><strong>TOTAL</strong></td>
                                    <td class="text-right"><strong><?php echo angka($ttl_pesanan) ?></strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel-tag p-2 mb-2" style="font-size:10px;">
                        Syarat dan Ketentuan :
                        <ol class="mb-0">
                            <li>Harga yang tercantum dalam Penawaran ini TIDAK MENGIKAT dan akan fixed setelah dilakukan pengukuran serta design yang telah disetujui.</li>
                            <li>. Pembayaran uang Tanda Jadi sebesar Rp 3.000.000,-</li>
                            <li>Apabila terjadi pembatalan maka dikenakan denda dari 50% uang Tanda Jadi yang telah dibayarkan.</li>
                            <li>Minimal pesanan tidak kurang dari senilai Rp 10.000.000,-</li>
                            <li>Apabila ada biaya lain yang Tidak Tercantum dalam Spesifikasi Penawaran Harga maka akan dibebankan ke Pemesan</li>
                            <li>. Pembayaran dapat ditransfer ke Bank Mandiri No. 125.0000.999102 atau Bank BCA 4070225439 an. Nia Septiani</li>
                        </ol>
                    </div>
                </div>
                <div class="col-sm-5">
                </div>
                <div class="col-sm-2"></div>
                <div class="col-sm-5">
                    <div class="table-responsive">
                        <table class="table table-clean table-sm align-self-end">
                            <tbody>
                                <tr class="text-center">
                                    <td>
                                        Jakarta, <?php echo tanggal($row->tgl_invoice) ?>
                                    </td>
                                </tr>
                                <tr class="text-center">
                                    <td>
                                        <img width="150" height="100" src="<?php echo base_url() ?>assets/ttd.png">
                                    </td>
                                </tr>
                                <tr class="text-center">
                                    <td><b>Syahrul Ramadhan</b></td>
                                </tr>
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