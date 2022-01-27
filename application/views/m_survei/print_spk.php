<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml" lang="en">

<head>
    <link rel="stylesheet" type="text/css" hs-webfonts="true" href="https://fonts.googleapis.com/css?family=Lato|Lato:i,b,bi">
    <title>Email template</title>
    <meta property="og:title" content="Email template">

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style type="text/css">
        body {
            -webkit-print-color-adjust: exact;
        }

        a {
            text-decoration: underline;
            color: inherit;
            font-weight: bold;
            color: #253342;
        }

        h1 {
            font-size: 56px;
        }

        h2 {
            font-size: 28px;
            font-weight: 900;
        }

        p {
            font-weight: 100;
        }

        td {
            vertical-align: top;
        }

        #email {
            margin: auto;
            width: 800px;
            background-color: white;
        }

        button {
            font: inherit;
            background-color: #FF7A59;
            border: none;
            padding: 10px;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-weight: 900;
            color: white;
            border-radius: 5px;
            box-shadow: 3px 3px #d94c53;
        }

        .subtle-link {
            font-size: 9px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #CBD6E2;
        }

        @media print {

            body.printing * {
                display: block;
            }
        }
    </style>

</head>

<?php
$this->db->where('id', $this->uri->segment(3));
$query = $this->db->get('v_invoice');
$invoice = $query->row();
?>

<body bgcolor="#F5F8FA" style="width: 100%; margin: auto 0; padding:0; font-family:Lato, sans-serif; font-size:18px; color:#33475B; word-break:break-word">

    <! View in Browser Link -->

        <div id="email">
            <! Banner -->
                <table bgcolor="#14618d" cellpadding="5" role="presentation" width="100%">
                    <tr bgcolor="#14618d" style="color: white;">
                        <td>
                            <h3 style="margin-bottom:0;"> PENAWARAN HARGA FINAL </h3>
                            <h5 style="margin-top:0;"> #<?php echo $invoice->no_invoice ?> </h5>
                        </td>
                        <td align="center">
                            <img alt="gallerydekoruma" src="<?php echo base_url() ?>assets/logo_mail.png" width="70px" align="middle">
                        </td>
                </table>




                <! First Row -->

                    <table role="presentation" border="0" cellpadding="0" cellspacing="10px" style="padding: 20px 20px 20px 20px;" width="100%">
                        <tr>
                            <td width="70%"><b>Bill To:</b></td>
                            <td width="30%" align="right"><b>Date:</b></td>
                        </tr>
                        <tr>
                            <td style="font-size: 16px;">
                                <?php echo $invoice->nama ?><br>
                                <?php echo $invoice->alamat ?><br>
                            </td>
                            <td align="right" style="font-size: 16px;"><?php echo tanggal($invoice->create_date) ?></td>
                        </tr>
                    </table>
                    <! Second Row with Two Columns-->
                        <table role="presentation" style="border-collapse: collapse; padding: 20px 20px 20px 20px; font-size:12px;" width="100%">
                            <thead class="thead-themed">
                                <tr>
                                    <th style="border: 1px solid black;" align="center" rowspan="2">No.</th>
                                    <th style="border: 1px solid black;" align="left" rowspan="2">Item Barang & Spesifikasi</th>
                                    <th style="border: 1px solid black;" align="center" colspan="5" class="text-center">Ukuran</th>
                                    <th style="border: 1px solid black;" align="center" rowspan="2" class="text-center">Harga</th>
                                    <th style="border: 1px solid black;" align="center" rowspan="2" class="text-center">Jumlah</th>
                                </tr>
                                <tr>
                                    <th style="border: 1px solid black;" align="center" class="text-center">Panjang</th>
                                    <th style="border: 1px solid black;" align="center" class="text-center">Lebar</th>
                                    <th style="border: 1px solid black;" align="center" class="text-center">Tinggi</th>
                                    <th style="border: 1px solid black;" align="center" class="text-center">Sum</th>
                                    <th style="border: 1px solid black;" align="center" class="text-center">Unit</th>
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
                                        <td style="border: 1px solid black;" align="center"><?php echo $no++; ?></td>
                                        <td style="border: 1px solid black;" align="left" colspan="9">
                                            <?php echo $dt->kategori ?>
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
                                            <td style="border: 1px solid black;" align="left"></td>
                                            <td style="border: 1px solid black;" align="left"><strong><?php echo $no2++ . '. '; ?><?php echo $dt2->nm_paket ?></strong><?php echo $dt2->deskripsi ?><br><?php echo $dt2->note ?></td>
                                            <td style="border: 1px solid black;" align="center"><?php echo $qty ?></td>
                                            <td style="border: 1px solid black;" align="center"><?php echo $dt2->lebar ?></td>
                                            <td style="border: 1px solid black;" align="center"><?php echo $dt2->tinggi ?></td>
                                            <td style="border: 1px solid black;" align="center"><?php echo $qty ?></td>
                                            <td style="border: 1px solid black;" align="center"><?php echo $dt2->satuan ?></td>
                                            <td style="border: 1px solid black;" align="right"><?php echo angka($dt2->harga) ?></td>
                                            <td style="border: 1px solid black;" align="right"><?php echo angka($dt2->total) ?></td>
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
                                    <td colspan="8" style="border: 1px solid black;" align="right"><strong>TOTAL</strong></td>
                                    <td style="border: 1px solid black;" align="right"><strong><?php echo angka($ttl_pesanan) ?></strong></td>
                                </tr>
                            </tbody>
                        </table>

                        <?php
                        $info = $this->db->get('m_desk')->row();
                        ?>
                        <! Banner Row -->
                            <table role="presentation" bgcolor="#EAF0F6" width="100%" style="margin-top: 5px;">
                                <tr>
                                    <td style="padding: 10px 10px;font-size:12px;">
                                        <?php echo $info->note_bayar ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px 10px;font-size:12px;">
                                        <?php echo $info->note_final ?>
                                    </td>
                                </tr>
                            </table>
        </div>
        <script>
            window.print();
        </script>
</body>

</html>