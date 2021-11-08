<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>Preview Fullscreen</title>
    <style type="text/css">
        .ReadMsgBody {
            width: 100%;
            background-color: #ffffff;
        }

        .ExternalClass {
            width: 100%;
            background-color: #ffffff;
        }

        .ExternalClass,
        .ExternalClass p,
        .ExternalClass span,
        .ExternalClass font,
        .ExternalClass td,
        .ExternalClass div {
            line-height: 100%;
        }

        html {
            width: 100%;
        }

        body {
            -webkit-text-size-adjust: none;
            -ms-text-size-adjust: none;
            margin: 0;
            padding: 0;
            font-family: 'Open Sans', Arial, Sans-serif !important;
        }

        table {
            border-spacing: 0;
            table-layout: auto;
            margin: 0 auto;
        }

        img {
            display: block !important;
            overflow: hidden !important;
        }

        .yshortcuts a {
            border-bottom: none !important;
        }

        img:hover {
            opacity: 0.9 !important;
        }

        a {
            color: #4a4a4a;
            text-decoration: none;
        }

        .textbutton a {
            font-family: 'open sans', arial, sans-serif !important;
        }

        .btn-link a {
            color: #FFFFFF !important;
        }

        /*Responsive*/
        @media only screen and (max-width: 640px) {
            body {
                margin: 0px;
                width: auto !important;
                font-family: 'Open Sans', Arial, Sans-serif !important;
            }

            .table-inner {
                width: 90% !important;
                max-width: 90% !important;
            }

            .table-full {
                width: 100% !important;
                max-width: 100% !important;
                text-align: center !important;
            }
        }

        @media only screen and (max-width: 479px) {
            body {
                width: auto !important;
                font-family: 'Open Sans', Arial, Sans-serif !important;
            }

            .table-inner {
                width: 90% !important;
                text-align: center !important;
            }

            .table-full {
                width: 100% !important;
                max-width: 100% !important;
                text-align: center !important;
            }

            /*gmail*/
            u+.body .full {
                width: 100% !important;
                width: 100vw !important;
            }
        }
    </style>
</head>

<body>
    <table class="full" data-module="header" data-bgcolor="Header BG" bgcolor="#f8f8f8" width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tbody>
            <tr>
                <td align="center">
                    <table width="600" style="max-width: 600px" class="table-full" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tbody>
                            <tr>
                                <td align="center">
                                    <table width="200" class="table-full" align="left" border="0" cellpadding="0" cellspacing="0">
                                        <tbody>
                                            <tr>
                                                <td data-bgcolor="Logo BG" align="center">
                                                    <img width="100%" src="<?php echo base_url(); ?>assets/smartadmin/logo.jpg">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!--[if (gte mso 9)|(IE)]></td><td><![endif]-->
                                    <table width="400" class="table-full" border="0" align="right" cellpadding="0" cellspacing="0">
                                        <tbody>
                                            <tr>
                                                <td align="center">
                                                    <table width="90%" class="table-inner" border="0" align="center" cellpadding="0" cellspacing="0">
                                                        <tbody>
                                                            <tr>
                                                                <td height="50"></td>
                                                            </tr>
                                                            <!-- title -->
                                                            <tr>
                                                                <td data-size="Invoice" data-color="Invoice" mc:edit="invoice-4" align="right" style="font-family: 'Open Sans', Arial, sans-serif; font-size:38px; color:#3b3b3b; line-height:26px;">
                                                                    <singleline label="title">INVOICE</singleline>
                                                                </td>
                                                            </tr>
                                                            <!-- end title -->
                                                            <tr>
                                                                <td height="25"></td>
                                                            </tr>
                                                            <!--dash-->
                                                            <tr>
                                                                <td align="right">
                                                                    <table data-width="Dash" align="right" width="50" border="0" cellpadding="0" cellspacing="0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td data-bgcolor="Dash" bgcolor="#ff646a" height="3"></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <!--end dash-->
                                                            <tr>
                                                                <td height="15"></td>
                                                            </tr>
                                                            <!-- company name -->
                                                            <tr>
                                                                <td data-color="Customer Text" data-size="Customer Title" mc:edit="invoice-5" align="right" style="font-family: 'Open Sans', Arial, sans-serif; font-size:16px; color:#3b3b3b; line-height:26px; font-weight: bold;">
                                                                    <singleline label="company name"><?php echo $nama ?></singleline>
                                                                </td>
                                                            </tr>
                                                            <!-- end company name -->
                                                            <tr>
                                                                <td height="5"></td>
                                                            </tr>
                                                            <!-- address -->
                                                            <tr>
                                                                <td data-color="Customer Text" data-size="Address" mc:edit="invoice-6" align="right" style="font-family: 'Open Sans', Arial, sans-serif; font-size:13px; color:#7f8c8d; line-height:26px;">
                                                                    <multiline label="address">
                                                                        <?php echo $alamat ?>
                                                                    </multiline>
                                                                </td>
                                                            </tr>
                                                            <!-- end address -->
                                                            <tr>
                                                                <td height="25"></td>
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
                </td>
            </tr>
        </tbody>
    </table>


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
                                                <td data-size="Title" data-color="Title" mc:edit="invoice-7" width="263" align="left" valign="top" style="font-family: 'Open Sans', Arial, sans-serif; font-size:13px; color:#3b3b3b; line-height:26px; text-transform:uppercase;">
                                                    <singleline label="title-1">Description</singleline>
                                                </td>
                                                <td data-size="Title" data-color="Title" mc:edit="invoice-9" width="87" align="center" valign="top" style="font-family: 'Open Sans', Arial, sans-serif; font-size:13px; color:#3b3b3b; line-height:26px; text-transform:uppercase;">
                                                    <singleline label="title-3">QTY</singleline>
                                                </td>
                                                <td data-size="Title" data-color="Title" mc:edit="invoice-10" width="87" align="right" valign="top" style="font-family: 'Open Sans', Arial, sans-serif; font-size:13px; color:#3b3b3b; line-height:26px; text-transform:uppercase;">
                                                    <singleline label="title-4">AMOUNT</singleline>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <!-- end header -->
                            <tr>
                                <td data-border-size="Title Underline" data-border-color="Title Underline" height="10" style="border-bottom:3px solid #bcbcbc;"></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>

    <?php foreach ($list as $dt) { ?>
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
                                                        <singleline label="list-1"><?php echo $dt->kategori ?></singleline>
                                                    </td>
                                                    <td data-size="list" data-color="list" mc:edit="invoice-13" width="87" align="center" valign="top" style="font-family: 'Open Sans', Arial, sans-serif; font-size:14px; color:#3b3b3b; line-height:26px;  font-weight: bold;">
                                                        <singleline label="list-3"><?php echo $dt->qty ?></singleline>
                                                    </td>
                                                    <td data-size="list" data-color="list" mc:edit="invoice-14" width="87" align="right" valign="top" style="font-family: 'Open Sans', Arial, sans-serif; font-size:14px; color:#3b3b3b; line-height:26px;  font-weight: bold;">
                                                        <singleline label="list-4">Rp. <?php echo angka($dt->ttl) ?></singleline>
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

    <table class="full" data-module="total" data-bgcolor="Main BG" mc:repeatable="layout" mc:hideable="" mc:variant="total" align="center" width="100%" bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0">
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
                                    <!-- <table width="400" class="table-full" align="left" border="0" cellpadding="0" cellspacing="0">
                                        <tbody>
                                            <tr>
                                                <td data-bgcolor="Texs BG" bgcolor="#f8f8f8" align="center">
                                                    <table class="table-inner" align="center" width="90%" border="0" cellpadding="0" cellspacing="0">
                                                        <tbody>
                                                            <tr>
                                                                <td height="10"></td>
                                                            </tr>
                                                            <tr>
                                                                <td data-size="Texs Title" data-color="Texs Text" mc:edit="invoice-16" style="font-family: 'Open Sans', Arial, sans-serif; font-size:12px; color:#3b3b3b; line-height:26px; text-transform:uppercase;line-height:24px;">
                                                                    <singleline label="title">taxes / fees</singleline>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td data-size="Texs Total" data-color="Texs Text" mc:edit="invoice-17" style="font-family: 'Open Sans', Arial, sans-serif; font-size:24px; color:#3b3b3b;  font-weight: bold;">
                                                                    <singleline label="price">+$50 USD</singleline>
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
                                    <!--[if (gte mso 9)|(IE)]></td><td><![endif]-->
                                    <table width="200" class="table-full" border="0" align="right" cellpadding="0" cellspacing="0">
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
    </table>


    <table class="full" data-module="note" data-bgcolor="Main BG" mc:repeatable="layout" mc:hideable="" mc:variant="note" align="center" width="100%" bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <td align="center">
                    <table align="center" border="0" cellpadding="0" cellspacing="0">
                        <tbody>
                            <tr>
                                <td width="600" align="center">
                                    <table align="center" width="100%" class="table-inner" border="0" cellspacing="0" cellpadding="0">
                                        <tbody>
                                            <tr>
                                                <td height="40"></td>
                                            </tr>
                                            <!-- title -->
                                            <tr>
                                                <td data-size="Title" data-color="Title" mc:edit="invoice-20" align="left" style="font-family: 'Open Sans', Arial, sans-serif; font-size:16px; color:#3b3b3b; line-height:26px;  font-weight: bold; text-transform:uppercase">
                                                    <singleline label="title">Notes</singleline>
                                                </td>
                                            </tr>
                                            <!-- end title -->
                                            <tr>
                                                <td height="5"></td>
                                            </tr>
                                            <!-- content -->
                                            <tr>
                                                <td data-size="Content" data-color="Content" mc:edit="invoice-21" align="left" style="font-family: 'Open Sans', Arial, sans-serif; font-size:13px; color:#7f8c8d; line-height:26px;">
                                                    <multiline label="content">Envato is an ecosystem of sites to help you get creative. It includes Envato Market, the leading marketplace for images, themes, project files and creative assets.</multiline>
                                                </td>
                                            </tr>
                                            <!-- end content -->
                                            <tr>
                                                <td data-border-size="Note Underline" data-border-color="Note Underline" height="15" style="border-bottom:3px solid #bcbcbc;"></td>
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


    <table class="full" data-module="footer" data-bgcolor="Main BG" align="center" width="100%" bgcolor="#FFFFFF" border="0" cellpadding="0" cellspacing="0">
        <tbody>
            <tr>
                <td data-border-size="Footer Border" data-border-color="Footer Border" align="center" style="border-bottom:10px solid #ecf0f1;">
                    <table width="600" style="max-width: 600px;" class="table-full" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tbody>
                            <tr>
                                <td height="25"></td>
                            </tr>
                            <tr>
                                <td>
                                    <!--left-->
                                    <table width="180" class="table-full" align="left" border="0" cellpadding="0" cellspacing="0">
                                        <tbody>
                                            <tr>
                                                <td align="center">
                                                    <table width="90%" align="center" border="0" cellpadding="0" cellspacing="0">
                                                        <tbody>
                                                            <tr>
                                                                <td align="center" style="line-height:0px;"><img data-color="Phone icon	" editable="" label="image" mc:edit="invoice-22" style="display:block;font-size:0px; border:0px; line-height:0px;" src="http://www.stampready.net/dashboard/editor/user_uploads/zip_uploads/2019/02/20/UD6QkEHvhAcKF0B1SJY4WPmz/Invoice/images/phone.png" alt="img"></td>
                                                                <td data-size="Footer" data-color="Footer" mc:edit="invoice-23" style="font-family: 'Open Sans', Arial, sans-serif; font-size:13px; color:#3b3b3b; line-height:26px; padding-left:15px;">
                                                                    <singleline label="detail">+62 987 654 3210</singleline>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!--end left-->
                                    <!--[if (gte mso 9)|(IE)]></td><td><![endif]-->
                                    <table width="25" align="left" border="0" cellpadding="0" cellspacing="0">
                                        <tbody>
                                            <tr>
                                                <td height="15"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!--[if (gte mso 9)|(IE)]></td><td><![endif]-->
                                    <!--middle-->
                                    <table width="180" class="table-full" align="left" border="0" cellpadding="0" cellspacing="0">
                                        <tbody>
                                            <tr>
                                                <td align="center">
                                                    <table width="90%" align="center" border="0" cellpadding="0" cellspacing="0">
                                                        <tbody>
                                                            <tr>
                                                                <td align="center" style="line-height:0px;"><img data-color="Mail icon" editable="" label="image" mc:edit="invoice-24" style="display:block;font-size:0px; border:0px; line-height:0px;" src="http://www.stampready.net/dashboard/editor/user_uploads/zip_uploads/2019/02/20/UD6QkEHvhAcKF0B1SJY4WPmz/Invoice/images/mail.png" alt="img"></td>
                                                                <td data-size="Footer" data-color="Footer" mc:edit="invoice-25" style="font-family: 'Open Sans', Arial, sans-serif; font-size:13px; color:#3b3b3b; line-height:26px;padding-left: 15px;">
                                                                    <singleline label="detail">koble@someone.com</singleline>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!--end middle-->
                                    <!--[if (gte mso 9)|(IE)]></td><td><![endif]-->
                                    <table width="25" align="left" border="0" cellpadding="0" cellspacing="0">
                                        <tbody>
                                            <tr>
                                                <td height="15"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!--[if (gte mso 9)|(IE)]></td><td><![endif]-->
                                    <!--right-->
                                    <table width="180" class="table-full" align="right" border="0" cellpadding="0" cellspacing="0">
                                        <tbody>
                                            <tr>
                                                <td align="center">
                                                    <table class="table-inner" width="100%" align="center" border="0" cellpadding="0" cellspacing="0">
                                                        <tbody>
                                                            <tr>
                                                                <td data-size="Footer" data-color="Footer" mc:edit="invoice-26" class="btn-link-2" style="font-family: 'Open Sans', Arial, sans-serif; font-size:13px; color:#3b3b3b; line-height:26px;">
                                                                    <webversion>webversion</webversion> <span>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                                                                    <unsubscribe>unsubscribe</unsubscribe>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!--end right-->
                                </td>
                            </tr>
                            <tr>
                                <td height="25"></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>



</body>

</html>