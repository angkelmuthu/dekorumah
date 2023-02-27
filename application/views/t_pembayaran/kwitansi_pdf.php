<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>A simple, clean, and responsive HTML invoice template</title>

    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 10px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        /* .invoice-box table tr.information table td {
            padding-bottom: 40px;
        } */

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .invoice-box.rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .invoice-box.rtl table {
            text-align: right;
        }

        .invoice-box.rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
</head>
<?php
$path = base_url('assets/logo_nata.png'); // Modify this part (your_img.png
//$path = 'https://ppid.ombudsman.go.id/assets/img/logo.png';
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

$this->db->where('id_bayar', $this->uri->segment(3));
$bayar = $this->db->get('t_pembayaran')->row();

$this->db->where('id_pelanggan', $bayar->id_pelanggan);
$cos = $this->db->get('m_pelanggan')->row();

?>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                <h3 style="margin-bottom: 0px;">PT. DIA Inti Dekorasi</h3>
                                <p style="margin-top: 0px;">Jl Raya Setu No 85B Cipayung Jakarta Timur.</p>
                            </td>

                            <td class="title">
                                <img src="<?php echo $base64 ?>" style="width: 100%; max-width: 300px" />

                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td width="50%">
                                <table cellpadding="0" cellspacing="0">
                                    <tr class="heading">
                                        <td>Terima Dari</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo $cos->nama ?><br />
                                            <?php echo $cos->alamat ?>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td width="5%"></td>
                            <td width="45%">
                                <table cellpadding="0" cellspacing="0">
                                    <tr class="heading">
                                        <td>Kwitansi Pembayaran</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <table cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td>Nomor</td>
                                                    <td><?php echo $bayar->no_bayar ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Tanggal</td>
                                                    <td><?php echo tanggal($bayar->create_date) ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Pembayaran</td>
                                                    <td><?php echo angka($bayar->total) ?></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                <table cellpadding="0" cellspacing="0">
                                    <tr class="heading">
                                        <td>Perihal</td>
                                        <td>Pembayaran</td>
                                    </tr>
                                    <tr class="item">
                                        <td><?php echo $bayar->title ?></td>
                                        <td><?php echo angka($bayar->total) ?></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <!-- <tr class="heading">
                <td>Item</td>

                <td>Price</td>
            </tr>

            <tr class="item">
                <td><?php echo $bayar->title ?></td>

                <td><?php echo angka($bayar->total) ?></td>
            </tr> -->
            <!--
            <tr class="total">
                <td></td>

                <td>Total: <?php echo angka($bayar->total) ?></td>
            </tr>
            <tr class="heading">
                <td colspan="2"><?php echo terbilang($bayar->total) ?></td>
            </tr> -->

            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td width="70%">
                                <table cellpadding="0" cellspacing="0">
                                    <tr class="heading">
                                        <td><i><?php echo terbilang($bayar->total) ?> rupiah</i></td>
                                    </tr>
                                </table>
                            </td>
                            <td width="30%">
                                <table cellpadding="0" cellspacing="0">
                                    <tr class="heading">
                                        <td>Total: Rp. <?php echo angka($bayar->total) ?></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="2">
                    <table cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="50%">
                                <table cellpadding="0" cellspacing="0">
                                    <tr class="heading">
                                        <td>Keterangan</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo $bayar->keterangan ?>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td width="10%"></td>
                            <td width="40%">
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="item">
                <td colspan="2" style="text-align: center;">
                    <p style="font-size:smaller !important;"><i>Kwitansi ini dikeluarkan oleh sistem, tidak memerlukan tanda tangan.</i></p>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>