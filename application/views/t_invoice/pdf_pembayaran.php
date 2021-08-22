<?php
$this->db->where('id', $this->uri->segment(3));
$result = $this->db->get('v_invoice')->row();

$this->db->where('id_buku', $this->uri->segment(4));
$result2 = $this->db->get('v_pembukuan_new')->row();
$result3 = $this->db->get('m_desk')->row();

?>
<main id="js-page-content" role="main" class="page-content">
    <div class="container">
        <a href="#" class="btn btn-block btn-primary" data-action="app-print" title="Print page">
            <i class="fal fa-print"></i> PRINT
        </a>
        <br><br>
        <div data-size="A4">
            <div class="row mt-0">
                <div class="col-sm-12">
                    <div class="d-flex align-items-center mb-0">
                        <h2 class="keep-print-font fw-500 mb-0 text-primary flex-1 position-relative">
                            <img src="<?php echo base_url() ?>assets/dekoruma.png">
                            <small class="text-muted mb-0 fs-xs"><br>
                            </small>
                            <h3><strong>TANDA TERIMA </strong></h3>
                        </h2>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-clean table-sm align-self-end">
                            <tbody>

                                <?php
                                if (!empty($result3->tlp)) {
                                    echo '<tr><td width="5%"><img width="15" src="' . base_url() . 'assets/tlp.png"></td><td>' . $result3->tlp . '</td></tr>';
                                }
                                if (!empty($result3->wa)) {
                                    echo '<tr><td width="5%"><img width="15" src="' . base_url() . 'assets/wa.png"></td><td>' . $result3->wa . '</td></tr>';
                                }
                                if (!empty($result3->facebook)) {
                                    echo '<tr><td width="5%"><img width="15" src="' . base_url() . 'assets/fb.png"></td><td>' . $result3->facebook . '</td></tr>';
                                }
                                if (!empty($result3->instagram)) {
                                    echo '<tr><td width="5%"><img width="15" src="' . base_url() . 'assets/ig.png"></td><td>' . $result3->instagram . '</td></tr>';
                                }
                                if (!empty($result3->alamat)) {
                                    echo '<tr><td width="5%"><img width="15" src="' . base_url() . 'assets/map.png"></td><td>' . $result3->alamat . '</td></tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped mt-0">
                            <tr>
                                <td>
                                    <h4>Sudah Diterima Dari</h4>
                                </td>
                                <td>
                                    <h4><b><?php echo $result->nama ?></b></h4>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4>Sejumlah Uang</h4>
                                </td>
                                <td>
                                    <h4><b><?php echo penyebut($result2->total) ?> rupiah</b></h4>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4>Untuk Pembayaran</h4>
                                </td>
                                <td>
                                    <h4><b><?php echo $result2->nm_group_sub ?></b></h4>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td class="text-center keep-print-font">
                                    <h4 class="m-0 fw-700 h2 keep-print-font">Rp. <?php echo angka($result2->total) ?></h4>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-sm-6">
                    <div class="table-responsive">
                        <table class="table table-clean table-sm align-self-end">
                            <tbody>
                                <tr class="text-center">
                                    <td>
                                        Jakarta, <?php echo tanggal($result->tgl_invoice) ?>
                                    </td>
                                </tr>
                                <tr class="text-center">
                                    <td>
                                        <img width="150" height="71" src="<?php echo base_url() ?>assets/ttd.png">
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