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
                            <img src="<?php echo base_url() ?>assets/smartadmin/img/dekorumah.png">
                            <h3><strong>RINCIAN PENAWARAN HARGA</strong><br>Spesifikasi dan Dimensi</h3>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-5 d-flex">
                    <div class="table-responsive">
                        <table class="table table-clean table-sm align-self-end">
                            <tbody>
                                <tr>
                                    <td width="35%">
                                        Nama Pemesan
                                    </td>
                                    <td width="5%">
                                        :
                                    </td>
                                    <td width="60%">

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Alamat
                                    </td>
                                    <td>
                                        :
                                    </td>
                                    <td>

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
                        <table class="table table-bordered table-striped mt-5">
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
                                        if ($dt3->id_satuan == 1) {
                                            $qty = $dt3->panjang;
                                        } elseif ($dt3->id_satuan == 2) {
                                            $qty = $dt3->panjang * $dt3->tinggi;
                                        } elseif ($dt3->id_satuan == 3) {
                                            $qty = $dt3->panjang * $dt3->lebar * $dt3->tinggi;
                                        } else {
                                            $qty = $dt3->qty;
                                        }
                                    ?>
                                        <tr>
                                            <td></td>
                                            <td>- <?php echo $dt3->nm_barang_detail ?></td>
                                            <td class="text-center">PxLxT (<?php echo $dt3->panjang ?>x<?php echo $dt3->lebar ?>x<?php echo $dt3->tinggi ?>)</td>
                                            <td class="text-center"><?php echo $qty ?></td>
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
                                    <tr>
                                        <td colspan="8">Terbilang : <strong><i><?php echo terbilang($ttl->grand) ?> rupiah.</i></strong></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- <div class="row">
                <div class="col-sm-6">

                </div>
                <div class="col-sm-4 ml-sm-auto">
                    <table class="table table-clean">
                        <tbody>
                            <tr class="table-scale-border-top border-left-0 border-right-0 border-bottom-0">
                                <td class="text-left keep-print-font">
                                    <h4 class="m-0 fw-700 h2 keep-print-font color-primary-700">Total</h4>
                                </td>
                                <td class="text-right keep-print-font">
                                    <h4 class="m-0 fw-700 h2 keep-print-font">Rp. </h4>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div> -->
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
            </div>
            <div class="row">
                <div class="col-sm-5 d-flex">
                    <div class="table-responsive">
                        <table class="table table-clean table-sm align-self-end">
                            <tbody>
                                <tr class="text-center">
                                    <td>
                                        Pemesan
                                    </td>
                                </tr>
                                <tr class="text-center">
                                    <td><br><br><br>
                                        <?php echo $this->session->userdata('full_name')
                                        ?>
                                        <!-- (...................................) -->
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-sm-2 d-flex"></div>
                <div class="col-sm-5 d-flex">
                    <div class="table-responsive">
                        <table class="table table-clean table-sm align-self-end">
                            <tbody>
                                <tr class="text-center">
                                    <td>
                                        Gallery Dekorumah
                                    </td>
                                </tr>
                                <tr class="text-center">
                                    <td><br><br><br>
                                        <?php echo $this->session->userdata('full_name')
                                        ?>
                                    </td>
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