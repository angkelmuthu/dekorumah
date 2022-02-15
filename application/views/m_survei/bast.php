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

<body bgcolor="#F5F8FA" style="width: 100%; margin: auto 0; padding:0; font-family:Lato, sans-serif; font-size:18px; color:#33475B; word-break:break-word">

    <! View in Browser Link -->

        <div id="email">
            <! Banner -->
                <table bgcolor="#14618d" cellpadding="5" role="presentation" width="100%">
                    <tr bgcolor="#14618d" style="color: white;">
                        <td>
                            <h3 style="margin-bottom:0;"> gallery dekoruma</h3>
                            <h5 style="margin-top:0;"> <?php echo $alamat ?> </h5>
                        </td>
                        <td align="center">
                            <img alt="gallerydekoruma" src="<?php echo base_url() ?>assets/logo_mail.png" width="70px" align="middle">
                        </td>
                </table>




                <! First Row -->

                    <table role="presentation" border="0" cellpadding="0" cellspacing="10px" style="padding: 5px 5px 5px 60px;" width="100%">
                        <tr>
                            <td align="center"><b>BUKTI ACARA SERAH TERIMA</b></td>
                        </tr>
                    </table>

                    <table role="presentation" border="0" cellpadding="0" cellspacing="10px" style="padding: 5px 5px 5px 60px;" width="100%">
                        <tr>
                            <td width="20%"><b>No Invoice</b></td>
                            <td width="1%">:</td>
                            <td width="79%"><?php echo $no_invoice ?></td>
                        </tr>
                        <tr>
                            <td width="20%"><b>Tanggal</b></td>
                            <td width="1%">:</td>
                            <td width="79%"><?php echo tanggal($create_date) ?></td>
                        </tr>
                        <tr>
                            <td width="20%"><b>Kepada</b></td>
                            <td width="1%">:</td>
                            <td><?php echo $nama ?><br>
                                <?php echo $alamat ?><br></td>
                        </tr>
                    </table>
                    <table class="full" data-module="list" data-bgcolor="Main BG" mc:repeatable="layout" mc:hideable="" mc:variant="list" style="padding: 0px 0px 0px 80px;" width="100%" bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr>
                                <td data-size="list" data-color="list" mc:edit="invoice-11" width="263" align="left" valign="top" style="font-family: 'Open Sans', Arial, sans-serif; font-size:14px; color:#3b3b3b; line-height:26px;  font-weight: bold;">
                                    <singleline label="list-1">Item Barang</singleline>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <?php foreach ($list as $row) { ?>
                        <table class="full" data-module="list" data-bgcolor="Main BG" mc:repeatable="layout" mc:hideable="" mc:variant="list" style="padding: 0px 0px 0px 80px;" width="100%" bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0">
                            <tbody>
                                <tr>
                                    <td>
                                        <table class="table-full" border="0" cellspacing="0" cellpadding="0">
                                            <tbody>
                                                <tr>
                                                    <td height="5"></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <table width="100%" class="table-inner" border="0" cellspacing="0" cellpadding="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td data-size="list" data-color="list" mc:edit="invoice-11" width="263" align="left" valign="top" style="font-family: 'Open Sans', Arial, sans-serif; font-size:14px; color:#3b3b3b; line-height:26px;  font-weight: bold;">
                                                                        <singleline label="list-1">- <?php echo $row->kategori ?></singleline>
                                                                    </td>
                                                                    <td data-size="list" data-color="list" mc:edit="invoice-13" width="87" align="center" valign="top" style="font-family: 'Open Sans', Arial, sans-serif; font-size:14px; color:#3b3b3b; line-height:26px;  font-weight: bold;">
                                                                        <singleline label="list-3"><?php echo $row->qty ?></singleline>
                                                                    </td>
                                                                    <td data-size="list" data-color="list" mc:edit="invoice-14" width="87" align="right" valign="top" style="font-family: 'Open Sans', Arial, sans-serif; font-size:14px; color:#3b3b3b; line-height:26px;  font-weight: bold;">
                                                                        <singleline label="list-4"></singleline>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    <?php } ?>

                    <table role="presentation" border="0" cellpadding="0" cellspacing="10px" style="padding: 20px 20px 20px 60px;" width="100%">
                        <tr>
                            <td width="60%"></td>
                            <td align="center" width="30%">Diterima</td>
                            <td width="10%"></td>
                        </tr>
                        <tr>
                            <td width="60%"></td>
                            <td width="30%"><br><br></td>
                            <td width="10%"></td>
                        </tr>
                        <tr>
                            <td width="60%"></td>
                            <td align="center" width="30%">
                                <hr>nama jelas
                            </td>
                            <td width="10%"></td>
                        </tr>
                    </table>
                    <hr>
                    <table class="full" data-module="list" data-bgcolor="Main BG" mc:repeatable="layout" mc:hideable="" mc:variant="list" style="padding: 2px 2px 2px 80px;" width="100%" bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr>
                                <td data-size="list" data-color="list" mc:edit="invoice-11" width="263" align="left" valign="top" style="font-family: 'Open Sans', Arial, sans-serif; font-size:14px; color:#3b3b3b; line-height:26px;  font-weight: bold;">
                                    <singleline label="list-1"> Checklist Perlengkapan :</singleline>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="full" data-module="list" data-bgcolor="Main BG" mc:repeatable="layout" mc:hideable="" mc:variant="list" style="padding: 2px 2px 2px 80px;" width="100%" bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr>
                                <td>
                                    <table class="table-full" border="0" cellspacing="0" cellpadding="0">
                                        <tbody>
                                            <tr>
                                                <td height="5"></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table width="100%" class="table-inner" border="0" cellspacing="0" cellpadding="0">
                                                        <tbody>
                                                            <tr>
                                                                <td data-size="list" data-color="list" mc:edit="invoice-11" width="263" align="left" valign="top" style="font-family: 'Open Sans', Arial, sans-serif; font-size:14px; color:#3b3b3b; line-height:26px;  font-weight: bold;">
                                                                    <singleline label="list-1">- Finishing Keseluruhan</singleline>
                                                                </td>
                                                                <td data-size="list" data-color="list" mc:edit="invoice-11" width="50" align="left" valign="top" style="border: 1px solid black;">
                                                                    <singleline label="list-1"></singleline>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td width="20"></td>
                                                <td>
                                                    <table width="100%" class="table-inner" border="0" cellspacing="0" cellpadding="0">
                                                        <tbody>
                                                            <tr>
                                                                <td data-size="list" data-color="list" mc:edit="invoice-11" width="263" align="left" valign="top" style="font-family: 'Open Sans', Arial, sans-serif; font-size:14px; color:#3b3b3b; line-height:26px;  font-weight: bold;">
                                                                    <singleline label="list-1">- Pemasangan Saluran Pembuangan</singleline>
                                                                </td>
                                                                <td data-size="list" data-color="list" mc:edit="invoice-11" width="50" align="left" valign="top" style="border: 1px solid black;">
                                                                    <singleline label="list-1"></singleline>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table width="100%" class="table-inner" border="0" cellspacing="0" cellpadding="0">
                                                        <tbody>
                                                            <tr>
                                                                <td data-size="list" data-color="list" mc:edit="invoice-11" width="263" align="left" valign="top" style="font-family: 'Open Sans', Arial, sans-serif; font-size:14px; color:#3b3b3b; line-height:26px;  font-weight: bold;">
                                                                    <singleline label="list-1">- Pintu & laci</singleline>
                                                                </td>
                                                                <td data-size="list" data-color="list" mc:edit="invoice-11" width="50" align="left" valign="top" style="border: 1px solid black;">
                                                                    <singleline label="list-1"></singleline>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td width="20"></td>
                                                <td>
                                                    <table width="100%" class="table-inner" border="0" cellspacing="0" cellpadding="0">
                                                        <tbody>
                                                            <tr>
                                                                <td data-size="list" data-color="list" mc:edit="invoice-11" width="263" align="left" valign="top" style="font-family: 'Open Sans', Arial, sans-serif; font-size:14px; color:#3b3b3b; line-height:26px;  font-weight: bold;">
                                                                    <singleline label="list-1">- Test air kran 5 menit</singleline>
                                                                </td>
                                                                <td data-size="list" data-color="list" mc:edit="invoice-11" width="50" align="left" valign="top" style="border: 1px solid black;">
                                                                    <singleline label="list-1"></singleline>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table width="100%" class="table-inner" border="0" cellspacing="0" cellpadding="0">
                                                        <tbody>
                                                            <tr>
                                                                <td data-size="list" data-color="list" mc:edit="invoice-11" width="263" align="left" valign="top" style="font-family: 'Open Sans', Arial, sans-serif; font-size:14px; color:#3b3b3b; line-height:26px;  font-weight: bold;">
                                                                    <singleline label="list-1">- Lighting Menyala</singleline>
                                                                </td>
                                                                <td data-size="list" data-color="list" mc:edit="invoice-11" width="50" align="left" valign="top" style="border: 1px solid black;">
                                                                    <singleline label="list-1"></singleline>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td width="20"></td>
                                                <td>
                                                    <table width="100%" class="table-inner" border="0" cellspacing="0" cellpadding="0">
                                                        <tbody>
                                                            <tr>
                                                                <td data-size="list" data-color="list" mc:edit="invoice-11" width="263" align="left" valign="top" style="font-family: 'Open Sans', Arial, sans-serif; font-size:14px; color:#3b3b3b; line-height:26px;  font-weight: bold;">
                                                                    <singleline label="list-1">- Kartu garansi beserta kardus elektronik diserahkan ke owner</singleline>
                                                                </td>
                                                                <td data-size="list" data-color="list" mc:edit="invoice-11" width="50" align="left" valign="top" style="border: 1px solid black;">
                                                                    <singleline label="list-1"></singleline>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table width="100%" class="table-inner" border="0" cellspacing="0" cellpadding="0">
                                                        <tbody>
                                                            <tr>
                                                                <td data-size="list" data-color="list" mc:edit="invoice-11" width="263" align="left" valign="top" style="font-family: 'Open Sans', Arial, sans-serif; font-size:14px; color:#3b3b3b; line-height:26px;  font-weight: bold;">
                                                                    <singleline label="list-1">- Posisi Saklar Lighting</singleline>
                                                                </td>
                                                                <td data-size="list" data-color="list" mc:edit="invoice-11" width="50" align="left" valign="top" style="border: 1px solid black;">
                                                                    <singleline label="list-1"></singleline>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td width="20"></td>
                                                <td>
                                                    <table width="100%" class="table-inner" border="0" cellspacing="0" cellpadding="0">
                                                        <tbody>
                                                            <tr>
                                                                <td data-size="list" data-color="list" mc:edit="invoice-11" width="263" align="left" valign="top" style="font-family: 'Open Sans', Arial, sans-serif; font-size:14px; color:#3b3b3b; line-height:26px;  font-weight: bold;">
                                                                    <singleline label="list-1">- Kebersihan Area</singleline>
                                                                </td>
                                                                <td data-size="list" data-color="list" mc:edit="invoice-11" width="50" align="left" valign="top" style="border: 1px solid black;">
                                                                    <singleline label="list-1"></singleline>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table width="100%" class="table-inner" border="0" cellspacing="0" cellpadding="0">
                                                        <tbody>
                                                            <tr>
                                                                <td data-size="list" data-color="list" mc:edit="invoice-11" width="263" align="left" valign="top" style="font-family: 'Open Sans', Arial, sans-serif; font-size:14px; color:#3b3b3b; line-height:26px;  font-weight: bold;">
                                                                    <singleline label="list-1">- Pemasangan Selang GAS</singleline>
                                                                </td>
                                                                <td data-size="list" data-color="list" mc:edit="invoice-11" width="50" align="left" valign="top" style="border: 1px solid black;">
                                                                    <singleline label="list-1"></singleline>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table width="100%" class="table-inner" border="0" cellspacing="0" cellpadding="0">
                                                        <tbody>
                                                            <tr>
                                                                <td data-size="list" data-color="list" mc:edit="invoice-11" width="263" align="left" valign="top" style="font-family: 'Open Sans', Arial, sans-serif; font-size:14px; color:#3b3b3b; line-height:26px;  font-weight: bold;">
                                                                    <singleline label="list-1">- Pemasangan Sink & Sealent</singleline>
                                                                </td>
                                                                <td data-size="list" data-color="list" mc:edit="invoice-11" width="50" align="left" valign="top" style="border: 1px solid black;">
                                                                    <singleline label="list-1"></singleline>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table width="100%" class="table-inner" border="0" cellspacing="0" cellpadding="0">
                                                        <tbody>
                                                            <tr>
                                                                <td data-size="list" data-color="list" mc:edit="invoice-11" width="263" align="left" valign="top" style="font-family: 'Open Sans', Arial, sans-serif; font-size:14px; color:#3b3b3b; line-height:26px;  font-weight: bold;">
                                                                    <singleline label="list-1">- Pemasangan Kran</singleline>
                                                                </td>
                                                                <td data-size="list" data-color="list" mc:edit="invoice-11" width="50" align="left" valign="top" style="border: 1px solid black;">
                                                                    <singleline label="list-1"></singleline>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>

        </div>
        <script>
            window.print();
        </script>
</body>

</html>