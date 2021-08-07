<?php

header("Content-type: application/pdf");
header("Content-Disposition: attachment; filename=rkpbmd.pdf");
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Pragma: public');
header("Pragma: no-cache");

$this->db->where('id', $this->uri->segment(3));
$result = $this->db->get('v_invoice')->row();

$this->db->where('id_buku', $this->uri->segment(4));
$result2 = $this->db->get('v_pembukuan_new')->row();
?>
<link rel="stylesheet" media="screen, print" href="<?php echo base_url() ?>assets/smartadmin/css/vendors.bundle.css">
<link rel="stylesheet" media="screen, print" href="<?php echo base_url() ?>assets/smartadmin/css/app.bundle.css">
<link rel="stylesheet" media="screen, print" href="<?php echo base_url() ?>assets/smartadmin/css/page-invoice.css">
<link rel="stylesheet" media="screen, print" href="<?php echo base_url() ?>assets/smartadmin/costume/default.css">

<div class="page-wrapper">
    <div class="page-inner">
        <div class="page-content-wrapper">
            <main id="js-page-content" role="main">
                <div class="container">
                    <div data-size="A4">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="d-flex align-items-center mb-0">
                                    <h2 class="keep-print-font fw-500 mb-0 text-primary flex-1 position-relative">
                                        <img src="<?php echo base_url() ?>assets/smartadmin/img/dekorumah.png">
                                        <h3><strong>KWITANSI </strong><br><?php echo $result->no_invoice ?></h3>
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-sm-12"><br><br>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped mt-5">
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
                                                <h4><b><?php echo $result->status ?></b></h4>
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
                            <div class="col-sm-4 ml-sm-auto">

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5 d-flex">
                            </div>
                            <div class="col-sm-2 d-flex"></div>
                            <div class="col-sm-5 d-flex">
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
        </div>
    </div>
</div>

</body>
<script src="<?php echo base_url() ?>assets/smartadmin/js/vendors.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/smartadmin/js/app.bundle.js"></script>

</html>