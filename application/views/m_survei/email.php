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
    </style>

</head>

<body bgcolor="#F5F8FA" style="width: 100%; margin: auto 0; padding:0; font-family:Lato, sans-serif; font-size:18px; color:#33475B; word-break:break-word">

    <! View in Browser Link -->

        <div id="email">
            <! Banner -->
                <table bgcolor="#14618d" cellpadding="5" role="presentation" width="100%">
                    <tr bgcolor="#14618d" style="color: white;">
                        <td>
                            <h3 style="margin-bottom:0;"> Bukti Pembayaran </h3>
                            <h5 style="margin-top:0;"> #<?php echo $no_invoice ?> </h5>
                        </td>
                        <td align="center">
                            <img alt="gallerydekoruma" src="<?php echo base_url() ?>assets/logo_mail.png" width="70px" align="middle">
                        </td>
                </table>




                <! First Row -->

                    <table role="presentation" border="0" cellpadding="0" cellspacing="10px" style="padding: 20px 20px 20px 60px;" width="100%">
                        <tr>
                            <td width="70%"><b>Bill To:</b></td>
                            <td width="30%" align="right"><b>Date:</b></td>
                        </tr>
                        <tr>
                            <td style="font-size: 16px;">
                                <?php echo $nama ?><br>
                                <?php echo $alamat ?><br>
                            </td>
                            <td align="right" style="font-size: 16px;"><?php echo tanggal($create_date) ?></td>
                        </tr>
                    </table>

                    <! Second Row with Two Columns-->
                        <table class="full" data-module="title" data-bgcolor="Main BG" mc:repeatable="layout" mc:hideable="" mc:variant="title" width="100%" align="center" bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0">
                            <tbody>
                                <tr>
                                    <td align="center">
                                        <table align="center" width="600" style="max-width:600px;" class="table-full" border="0" cellspacing="0" cellpadding="0">
                                            <tbody>
                                                <tr>
                                                    <td height="50"></td>
                                                </tr>
                                                <!-- header -->
                                                <tr>
                                                    <td>
                                                        <table class="table-inner" width="100%" border="0" cellspacing="0" cellpadding="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td data-size="Title" data-color="Title" mc:edit="invoice-7" width="263" align="left" valign="top">
                                                                        <singleline label="title-1">Description</singleline>
                                                                    </td>
                                                                    <td data-size="Title" data-color="Title" mc:edit="invoice-9" width="87" align="center" valign="top">
                                                                        <singleline label="title-3">QTY</singleline>
                                                                    </td>
                                                                    <td data-size="Title" data-color="Title" mc:edit="invoice-10" width="87" align="right" valign="top">
                                                                        <singleline label="title-4">AMOUNT</singleline>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <!-- end header -->
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <?php foreach ($list as $row) { ?>
                            <table class="full" data-module="list" data-bgcolor="Main BG" mc:repeatable="layout" mc:hideable="" mc:variant="list" align="center" width="100%" bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0">
                                <tbody>
                                    <tr>
                                        <td align="center">
                                            <table width="600" style="max-width: 600px;" class="table-full" border="0" cellspacing="0" cellpadding="0">
                                                <tbody>
                                                    <tr>
                                                        <td height="5"></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="center">
                                                            <table width="100%" class="table-inner" border="0" cellspacing="0" cellpadding="0">
                                                                <tbody>
                                                                    <tr>
                                                                        <td data-size="list" data-color="list" mc:edit="invoice-11" width="263" align="left" valign="top" style="font-family: 'Open Sans', Arial, sans-serif; font-size:14px; color:#3b3b3b; line-height:26px;  font-weight: bold;">
                                                                            <singleline label="list-1"><?php echo $row->kategori ?></singleline>
                                                                        </td>
                                                                        <td data-size="list" data-color="list" mc:edit="invoice-13" width="87" align="center" valign="top" style="font-family: 'Open Sans', Arial, sans-serif; font-size:14px; color:#3b3b3b; line-height:26px;  font-weight: bold;">
                                                                            <singleline label="list-3"><?php echo $row->qty ?></singleline>
                                                                        </td>
                                                                        <td data-size="list" data-color="list" mc:edit="invoice-14" width="87" align="right" valign="top" style="font-family: 'Open Sans', Arial, sans-serif; font-size:14px; color:#3b3b3b; line-height:26px;  font-weight: bold;">
                                                                            <singleline label="list-4">Rp. <?php echo angka($row->ttl) ?></singleline>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td data-border-size="List Border" data-border-color="List Border" height="5" style="border-bottom:1px solid #ecf0f1;"></td>
                                                    </tr>
                                                    <tr>
                                                        <td height="5"></td>
                                                    </tr>
                                                    <!-- detail -->
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        <?php } ?>
                        <table class="full" data-module="list" data-bgcolor="Main BG" mc:repeatable="layout" mc:hideable="" mc:variant="list" align="center" width="100%" bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0">
                            <tbody>
                                <tr>
                                    <td align="center">
                                        <table width="600" style="max-width: 600px;" class="table-full" border="0" cellspacing="0" cellpadding="0">
                                            <tbody>
                                                <tr>
                                                    <td data-border-size="Total Border" data-border-color="Total Border" height="10" style="border-bottom:3px solid #3b3b3b;"></td>
                                                </tr>
                                                <tr>
                                                    <td align="center">
                                                        <table width="100%" class="table-inner" border="0" cellspacing="0" cellpadding="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td data-size="list" data-color="list" mc:edit="invoice-11" width="263" align="left" valign="top" style="font-family: 'Open Sans', Arial, sans-serif; font-size:14px; color:#3b3b3b; line-height:26px;  font-weight: bold;">
                                                                    </td>
                                                                    <td data-size="list" data-color="list" mc:edit="invoice-13" width="87" align="center" valign="top" style="font-family: 'Open Sans', Arial, sans-serif; font-size:14px; color:#3b3b3b; line-height:26px;  font-weight: bold;">
                                                                    </td>
                                                                    <td data-size="list" data-color="list" mc:edit="invoice-14" width="87" align="right" valign="top" style="font-family: 'Open Sans', Arial, sans-serif; font-size:14px; color:#3b3b3b; line-height:26px;  font-weight: bold;">
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td data-border-size="List Border" data-border-color="List Border" height="5" style="border-bottom:1px solid #ecf0f1;"></td>
                                                </tr>
                                                <tr>
                                                    <td height="5"></td>
                                                </tr>
                                                <!-- detail -->
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <table class="full" data-module="list" data-bgcolor="Main BG" mc:repeatable="layout" mc:hideable="" mc:variant="list" align="center" width="100%" bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0">
                            <tbody>
                                <tr>
                                    <td align="center">
                                        <table width="600" style="max-width: 600px;" class="table-full" border="0" cellspacing="0" cellpadding="0">
                                            <tbody>
                                                <tr>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td align="center">
                                                        <table width="100%" class="table-inner" border="0" cellspacing="0" cellpadding="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td data-size="list" data-color="list" mc:edit="invoice-11" width="263" align="left" valign="top" style="font-family: 'Open Sans', Arial, sans-serif; font-size:14px; color:#3b3b3b; line-height:26px;  font-weight: bold;">
                                                                        <singleline label="list-1"></singleline>
                                                                    </td>
                                                                    <td data-size="list" data-color="list" mc:edit="invoice-13" width="87" align="left" valign="top" style="font-family: 'Open Sans', Arial, sans-serif; font-size:14px; color:#3b3b3b; line-height:26px;  font-weight: bold;">
                                                                        <singleline label="list-3">Subtotal</singleline>
                                                                    </td>
                                                                    <td data-size="list" data-color="list" mc:edit="invoice-14" width="87" align="right" valign="top" style="font-family: 'Open Sans', Arial, sans-serif; font-size:14px; color:#3b3b3b; line-height:26px;  font-weight: bold;">
                                                                        <singleline label="list-4"><?php echo angka($ttl) ?> &nbsp;</singleline>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td data-border-size="List Border" data-border-color="List Border" height="5" style="border-bottom:1px solid #ecf0f1;"></td>
                                                </tr>
                                                <tr>
                                                    <td height="5"></td>
                                                </tr>
                                                <!-- detail -->
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <?php //foreach ($bayar as $row) { 
                        ?>
                        <!-- <table class="full" data-module="list" data-bgcolor="Main BG" mc:repeatable="layout" mc:hideable="" mc:variant="list" align="center" width="100%" bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0">
                            <tbody>
                                <tr>
                                    <td align="center">
                                        <table width="600" style="max-width: 600px;" class="table-full" border="0" cellspacing="0" cellpadding="0">
                                            <tbody>
                                                <tr>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td align="center">
                                                        <table width="100%" class="table-inner" border="0" cellspacing="0" cellpadding="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td data-size="list" data-color="list" mc:edit="invoice-11" width="263" align="left" valign="top" style="font-family: 'Open Sans', Arial, sans-serif; font-size:14px; color:#3b3b3b; line-height:26px;  font-weight: bold;">
                                                                        <singleline label="list-1"></singleline>
                                                                    </td>
                                                                    <td data-size="list" data-color="list" mc:edit="invoice-13" width="87" align="left" valign="top" style="font-family: 'Open Sans', Arial, sans-serif; font-size:14px; color:#3b3b3b; line-height:26px;  font-weight: bold;">
                                                                        <singleline label="list-3"><?php echo $row->nm_group_sub ?></singleline>
                                                                    </td>
                                                                    <td data-size="list" data-color="list" mc:edit="invoice-14" width="87" align="right" valign="top" style="font-family: 'Open Sans', Arial, sans-serif; font-size:14px; color:#3b3b3b; line-height:26px;  font-weight: bold;">
                                                                        <singleline label="list-4"><?php echo angka($row->total) ?> -</singleline>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td data-border-size="List Border" data-border-color="List Border" height="5" style="border-bottom:1px solid #ecf0f1;"></td>
                                                </tr>
                                                <tr>
                                                    <td height="5"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table> -->
                        <?php //} 
                        ?>
                        <table class="full" data-module="list" data-bgcolor="Main BG" mc:repeatable="layout" mc:hideable="" mc:variant="list" align="center" width="100%" bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0">
                            <tbody>
                                <tr>
                                    <td align="center">
                                        <table width="600" style="max-width: 600px;" class="table-full" border="0" cellspacing="0" cellpadding="0">
                                            <tbody>
                                                <tr>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td align="center">
                                                        <table width="100%" class="table-inner" border="0" cellspacing="0" cellpadding="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td data-size="list" data-color="list" mc:edit="invoice-11" width="263" align="left" valign="top" style="font-family: 'Open Sans', Arial, sans-serif; font-size:14px; color:#3b3b3b; line-height:26px;  font-weight: bold;">
                                                                        <singleline label="list-1"></singleline>
                                                                    </td>
                                                                    <td data-size="list" data-color="list" mc:edit="invoice-13" width="87" align="left" valign="top" style="font-family: 'Open Sans', Arial, sans-serif; font-size:14px; color:#3b3b3b; line-height:26px;  font-weight: bold;">
                                                                        <singleline label="list-3">Paid</singleline>
                                                                    </td>
                                                                    <td data-size="list" data-color="list" mc:edit="invoice-14" width="87" align="right" valign="top" style="font-family: 'Open Sans', Arial, sans-serif; font-size:14px; color:#3b3b3b; line-height:26px;  font-weight: bold;">
                                                                        <singleline label="list-4"><?php echo angka($bayar_ttl) ?> -</singleline>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td data-border-size="List Border" data-border-color="List Border" height="5" style="border-bottom:1px solid #ecf0f1;"></td>
                                                </tr>
                                                <tr>
                                                    <td height="5"></td>
                                                </tr>
                                                <!-- detail -->
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="full" data-module="list" data-bgcolor="Main BG" mc:repeatable="layout" mc:hideable="" mc:variant="list" align="center" width="100%" bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0">
                            <tbody>
                                <tr>
                                    <td align="center">
                                        <table width="600" style="max-width: 600px;" class="table-full" border="0" cellspacing="0" cellpadding="0">
                                            <tbody>
                                                <tr>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td align="center">
                                                        <table width="100%" class="table-inner" border="0" cellspacing="0" cellpadding="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td data-size="list" data-color="list" mc:edit="invoice-11" width="263" align="left" valign="top" style="font-family: 'Open Sans', Arial, sans-serif; font-size:14px; color:#3b3b3b; line-height:26px;  font-weight: bold;">
                                                                        <singleline label="list-1"></singleline>
                                                                    </td>
                                                                    <td data-size="list" data-color="list" mc:edit="invoice-13" width="87" align="left" valign="top" style="font-family: 'Open Sans', Arial, sans-serif; font-size:14px; color:#3b3b3b; line-height:26px;  font-weight: bold;">
                                                                        <singleline label="list-3">Balance Due</singleline>
                                                                    </td>
                                                                    <td data-size="list" data-color="list" mc:edit="invoice-14" width="87" align="right" valign="top" style="font-family: 'Open Sans', Arial, sans-serif; font-size:14px; color:#3b3b3b; line-height:26px;  font-weight: bold;">
                                                                        <singleline label="list-4"><?php echo angka($ttl - $bayar_ttl) ?> &nbsp;</singleline>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td data-border-size="List Border" data-border-color="List Border" height="5" style="border-bottom:1px solid #ecf0f1;"></td>
                                                </tr>
                                                <tr>
                                                    <td height="5"></td>
                                                </tr>
                                                <!-- detail -->
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="full" data-module="list" data-bgcolor="Main BG" mc:repeatable="layout" mc:hideable="" mc:variant="list" align="center" width="100%" bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0">
                            <tbody>
                                <tr>
                                    <td height="50"></td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- <table class="full" data-module="total" data-bgcolor="Main BG" mc:repeatable="layout" mc:hideable="" mc:variant="total" align="center" width="100%" bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0">
                            <tbody>
                                <tr>
                                    <td align="center">
                                        <table width="600" class="table-full" style="max-width: 600px;" align="center" border="0" cellpadding="0" cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <td data-border-size="Total Border" data-border-color="Total Border" height="40" style="border-bottom:3px solid #3b3b3b;"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table align="center" width="600" style="max-width: 600px;" class="table-full" border="0" cellspacing="0" cellpadding="0">
                                            <tbody>
                                                <tr>
                                                    <td height="15"></td>
                                                </tr>
                                                <tr>
                                                    <td align="center">

                                                        <table width="400" class="table-full" border="0" align="right" cellpadding="0" cellspacing="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td data-bgcolor="Total BG" align="center" bgcolor="#e1e6e7">
                                                                        <table class="table-inner" width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td height="10"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td data-size="Total Title" data-color="Total Text" mc:edit="invoice-18" style="font-family: 'Open Sans', Arial, sans-serif; font-size:12px; color:#3b3b3b; line-height:26px; text-transform:uppercase;line-height:24px;">
                                                                                        <singleline label="title">Total</singleline>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td data-size="Total Sum" data-color="Total Text" mc:edit="invoice-19" style="font-family: 'Open Sans', Arial, sans-serif; font-size:24px; color:#3b3b3b;  font-weight: bold;">
                                                                                        <singleline label="price">Rp. <?php echo angka($ttl) ?></singleline>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td height="15"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="15"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table> -->

                        <! Banner Row -->
                            <table role="presentation" bgcolor="#EAF0F6" width="100%" style="margin-top: 5px;">
                                <tr>
                                    <td style="padding: 10px 10px;font-size:12px;">
                                        <?php echo $ketentuan ?>
                                    </td>
                                </tr>
                            </table>
        </div>
</body>

</html>