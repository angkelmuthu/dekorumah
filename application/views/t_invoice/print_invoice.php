<?php
$this->db->where('id', $this->uri->segment('3'));
$row = $this->db->get('v_invoice')->row();

$desk = $this->db->get('m_desk')->row();
?>
<i class="fas fa-mobile-alt text-muted mr-2"></i>
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
                            <img src="<?php echo base_url() ?>assets/dekoruma.png">
                            <h3><strong>INVOICE #<?php echo $row->no_invoice ?></strong></h3>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-5">
                    <div class="table-responsive">
                        <table class="table table-clean table-sm align-self-end">
                            <tbody>

                                <?php
                                if (!empty($desk->tlp)) {
                                    echo '<tr><td width="5%"><i class="fal fa-phone-square text-muted mr-2"></i></td><td>' . $desk->tlp . '</td></tr>';
                                }
                                if (!empty($desk->wa)) {
                                    echo '<tr><td width="5%"><i class="fal fa-mobile-alt text-muted mr-2"></i></td><td>' . $desk->wa . '</td></tr>';
                                }
                                if (!empty($desk->facebook)) {
                                    echo '<tr><td width="5%"><i class="fab fa-facebook-square text-muted mr-2"></i></td><td>' . $desk->facebook . '</td></tr>';
                                }
                                if (!empty($desk->instagram)) {
                                    echo '<tr><td width="5%"><i class="fab fa-instagram text-muted mr-2"></i></td><td>' . $desk->instagram . '</td></tr>';
                                }
                                if (!empty($desk->alamat)) {
                                    echo '<tr><td width="5%"><i class="fal fa-map-marker-alt text-muted mr-2"></i></td><td>' . $desk->alamat . '</td></tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-sm-2"></div>
                <div class="col-sm-5 ml-sm-auto">
                    <div class="table-responsive">
                        <table class="table table-clean table-sm align-self-end">
                            <tbody>
                                <tr>
                                    <td width="35%">Tanggal</td>
                                    <td width="5%">:</td>
                                    <td width="60%"><?php echo tanggal($row->tgl_invoice) ?></td>
                                </tr>
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
            </div>
            <div class="row">

                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table id="example" class="table table-bordered table-striped" style="font-size:12px;line-height: 0.9;">
                            <thead class="thead-themed">
                                <tr>
                                    <th class="text-center">Banyaknya</th>
                                    <th>Nama Barang</th>
                                    <th class="text-center">Harga</th>
                                    <th class="text-center">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $this->db->select('nm_produk,sum(total) as total');
                                $this->db->where('id_invoice', $this->uri->segment(3));
                                $this->db->group_by('id_produk');
                                $result = $this->db->get('v_pesanan')->result();
                                foreach ($result as $dt) {
                                ?>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td><?php echo $dt->nm_produk ?></td>
                                        <td class="text-right"><?php echo angka($dt->total) ?></td>
                                        <td class="text-right"><?php echo angka($dt->total) ?></td>
                                    </tr>
                                <?php
                                }
                                $this->db->select('sum(total) as grand');
                                $this->db->where('id_invoice', $this->uri->segment(3));
                                $result = $this->db->get('v_pesanan')->row();
                                $ttl_pesanan = $result->grand;
                                ?>
                                <tr>
                                    <td colspan="3" class="text-right"><strong>TOTAL</strong></td>
                                    <td class="text-right"><strong><?php echo angka($ttl_pesanan) ?></strong></td>
                                </tr>
                                <?php
                                $this->db->select('sum(total) as payment');
                                $this->db->where('id_survei', $this->uri->segment(3));
                                $this->db->where('id_group', '2');
                                $result = $this->db->get('t_pembukuan')->row();
                                $ttl_payment = $result->payment;
                                ?>
                                <tr>
                                    <td colspan="3" class="text-right"><strong>PEMBAYARAN</strong></td>
                                    <td class="text-right"><strong><?php echo angka($ttl_payment) ?></strong></td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="text-right"><strong>SISA PEMBAYARAN</strong></td>
                                    <td class="text-right"><strong><?php echo angka($ttl_pesanan - $ttl_payment) ?></strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
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
                                        Hormat Kami
                                    </td>
                                </tr>
                                <tr class="text-center">
                                    <td>
                                        <img width="150" height="100" src="<?php echo base_url() ?>assets/ttd.png">
                                    </td>
                                </tr>
                                <tr class="text-center">
                                    <td><b>Nia Septiani</b></td>
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