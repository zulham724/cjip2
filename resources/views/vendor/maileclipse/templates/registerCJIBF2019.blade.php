<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8"> <!-- utf-8 works for most cases -->
    <meta name="viewport" content="width=device-width"> <!-- Forcing initial-scale shouldn't be necessary -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Use the latest (edge) version of IE rendering engine -->
    <title></title> <!-- The title tag shows in email notifications, like Android 4.4. -->

    <!-- Web Font / @font-face : BEGIN -->
    <!-- NOTE: If web fonts are not required, lines 9 - 26 can be safely removed. -->

    <!-- Desktop Outlook chokes on web font references and defaults to Times New Roman, so we force a safe fallback font. -->
    <!--[if mso]>
    <style>
        * {
            font-family: sans-serif !important;
        }
    </style>
    <![endif]-->

    <!-- All other clients get the webfont reference; some will render the font and others will silently fail to the fallbacks. More on that here: http://stylecampaign.com/blog/2015/02/webfont-support-in-email/ -->
    <!--[if !mso]><!-->
    <!-- insert web font reference, eg: <link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'> -->
    <!--<![endif]-->

    <!-- Web Font / @font-face : END -->

    <!-- CSS Reset -->
    <style type="text/css">

        /* What it does: Remove spaces around the email design added by some email clients. */
        /* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
        html,
        body {
            margin: 0 auto !important;
            padding: 0 !important;
            height: 100% !important;
            width: 100% !important;
        }

        /* What it does: Stops email clients resizing small text. */
        * {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }

        /* What is does: Centers email on Android 4.4 */
        div[style*="margin: 16px 0"] {
            margin:0 !important;
        }

        /* What it does: Stops Outlook from adding extra spacing to tables. */
        table,
        td {
            mso-table-lspace: 0pt !important;
            mso-table-rspace: 0pt !important;
        }

        /* What it does: Fixes webkit padding issue. Fix for Yahoo mail table alignment bug. Applies table-layout to the first 2 tables then removes for anything nested deeper. */
        table {
            border-spacing: 0 !important;
            border-collapse: collapse !important;
            table-layout: fixed !important;
            Margin: 0 auto !important;
        }
        table table table {
            table-layout: auto;
        }

        /* What it does: Uses a better rendering method when resizing images in IE. */
        img {
            -ms-interpolation-mode:bicubic;
        }

        /* What it does: A work-around for iOS meddling in triggered links. */
        .mobile-link--footer a,
        a[x-apple-data-detectors] {
            color:inherit !important;
            text-decoration: underline !important;
        }

    </style>

    <!-- Progressive Enhancements -->
    <style>

        /* What it does: Hover styles for buttons */
        .button-td,
        .button-a {
            transition: all 100ms ease-in;
        }
        .button-td:hover,
        .button-a:hover {
            background: #555555 !important;
            border-color: #555555 !important;
        }

        /* Media Queries */
        @media screen and (max-width: 600px) {

            .email-container {
                width: 100% !important;
                margin: auto !important;
            }

            /* What it does: Forces elements to resize to the full width of their container. Useful for resizing images beyond their max-width. */
            .fluid,
            .fluid-centered {
                max-width: 100% !important;
                height: auto !important;
                Margin-left: auto !important;
                Margin-right: auto !important;
            }
            /* And center justify these ones. */
            .fluid-centered {
                Margin-left: auto !important;
                Margin-right: auto !important;
            }

            /* What it does: Forces table cells into full-width rows. */
            .stack-column,
            .stack-column-center {
                display: block !important;
                width: 100% !important;
                max-width: 100% !important;
                direction: ltr !important;
            }
            /* And center justify these ones. */
            .stack-column-center {
                text-align: center !important;
            }

            /* What it does: Generic utility class for centering. Useful for images, buttons, and nested tables. */
            .center-on-narrow {
                text-align: center !important;
                display: block !important;
                Margin-left: auto !important;
                Margin-right: auto !important;
                float: none !important;
            }
            table.center-on-narrow {
                display: inline-block !important;
            }

        }

    </style>
    <style type="text/css">
        body {
            -webkit-text-size-adjust: 100% !important;
            -ms-text-size-adjust: 100% !important;
            -webkit-font-smoothing: antialiased !important;
            /*background: url("http://invest.dpmptsp.jatengprov.go.id/storage/settings/July2019/yEv8etnj3bf1l2AJWjoB.png") no-repeat center center fixed;



            background-size: cover;
            margin: 0;*/
        }
        img {
            border: 0 !important;
            outline: none !important;
        }
        .bg {
            /* The image used */
            background-image: url("http://invest.dpmptsp.jatengprov.go.id/storage/settings/July2019/yEv8etnj3bf1l2AJWjoB.png");

            /* Full height */

            /* Center and scale the image nicely */
            max-width: 900px;
            background-position: -1100px 200px;
            background-repeat: no-repeat;
            background-size: cover;
        }
        #bg {
            position: fixed;
            top: 0;
            left: 0;

            /* Preserve aspet ratio */
            min-width: 100%;
            min-height: 100%;
        }
        p {
            Margin: 0px !important;
            Padding: 0px !important;
        }
        table {
            border-collapse: collapse;
            mso-table-lspace: 0px;
            mso-table-rspace: 0px;
        }
        td, a, span {
            border-collapse: collapse;
            mso-line-height-rule: exactly;
        }
        .ExternalClass * {
            line-height: 100%;
        }
        span.MsoHyperlink {
            mso-style-priority:99;
            color:inherit;}
        span.MsoHyperlinkFollowed {
            mso-style-priority:99;
            color:inherit;}
    </style>
    <style media="only screen and (min-width:481px) and (max-width:599px)" type="text/css">
        @media only screen and (min-width:481px) and (max-width:599px) {
            table[class=em_main_table] {
                width: 100% !important;
            }
            table[class=em_wrapper] {
                width: 100% !important;
            }
            td[class=em_hide], br[class=em_hide] {
                display: none !important;
            }
            img[class=em_full_img] {
                width: 100% !important;
                height: auto !important;
            }
            td[class=em_align_cent] {
                text-align: center !important;
            }
            td[class=em_aside]{
                padding-left:10px !important;
                padding-right:10px !important;
            }
            td[class=em_height]{
                height: 20px !important;
            }
            td[class=em_font]{
                font-size:14px !important;
            }
            td[class=em_align_cent1] {
                text-align: center !important;
                padding-bottom: 10px !important;
            }
        }
    </style>
    <style media="only screen and (max-width:480px)" type="text/css">
        @media only screen and (max-width:480px) {
            table[class=em_main_table] {
                width: 100% !important;
            }
            table[class=em_wrapper] {
                width: 100% !important;
            }
            td[class=em_hide], br[class=em_hide], span[class=em_hide] {
                display: none !important;
            }
            img[class=em_full_img] {
                width: 100% !important;
                height: auto !important;
            }
            td[class=em_align_cent] {
                text-align: center !important;
            }
            td[class=em_height]{
                height: 20px !important;
            }
            td[class=em_aside]{
                padding-left:10px !important;
                padding-right:10px !important;
            }
            td[class=em_font]{
                font-size:14px !important;
                line-height:28px !important;
            }
            span[class=em_br]{
                display:block !important;
            }
            td[class=em_font1]{
                font-size:32px !important;
                line-height:35px !important;
            }
            td[class=em_align_cent1] {
                text-align: center !important;
                padding-bottom: 10px !important;
            }
        }
    </style>
    <style>
        .screen
        {
            width:100%;
            height:20px;
            background:#4388cc;
            color:#fff;
            line-height:20px;
            font-size:15px;
            text-align: center;
            margin-right: auto;
            margin-left: auto;
        }

        .inner-seat{
            width: 10px;
            height: 10px;
            border-radius: 100px;
            top: 50%;
            left: 50%;
            margin: -35px 0px 0px -35px;
            background: #D8D8D8 ;
            position: absolute;
        }

        #div-inline{float: left; }


        #div-inline:hover .inner-seat{
            background: #3366CC;
        }

        .clearBoth { clear:both; }

        .selected-innerColor {
            background-color: #3366CC;
        }

    </style>
</head>
<body bgcolor="#d4d4d4" width="100%" style="Margin: 0;">
<center style="width: 100%; background: #222222;"><!-- Visually Hidden Preheader Text : BEGIN -->
    <div style="display: none; font-size: 1px; line-height: 1px; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">(Optional) This text will appear in the inbox preview, but not the email body.</div>
    <!-- Visually Hidden Preheader Text : END --> <!-- Email Header : BEGIN --><!-- Email Header : END --> <!-- Email Body : BEGIN -->
    <table class="email-container" style="margin: auto; width: 600px;" border="0" width="600" cellspacing="0" cellpadding="0" align="center" bgcolor="#ffffff"><!-- Hero Image, Flush : BEGIN -->
        <tbody>
        <tr>
            <td style="width: 600px;"><img style="width: 600px; max-width: 600px;" src="http://invest.dpmptsp.jatengprov.go.id/storage/settings/July2019/ErhsbLGv4BlEM7RzoUez.png" alt="alt_text" width="600" height="114" align="center" border="0" /></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td style="padding: 40px; text-align: center; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555; width: 520px;">
                <strong>
                    @foreach($send->event as $event3)
                        {{$event3->nama_kegiatan}}
                    @endforeach
                </strong><br /><!-- Button : Begin --><!-- Button : END --></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td style="text-align: center; background-position: center center !important; background-size: cover !important; width: 600px;" valign="middle" bgcolor="#d4d4d4"><!-- [if gte mso 9]>
                <v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false" style="width:600px;height:175px; background-position: center center !important;">
                    <v:fill type="tile" src="http://placehold.it/600x230/222222/666666" color="#222222" />
                    <v:textbox inset="0,0,0,0">
                <![endif]-->
                <div>
                    <table style="height: 80px; width: 100%;" border="0" width="100%" cellspacing="0" cellpadding="0" align="center">
                        <tbody>
                        <tr style="height: 80px;">
                            <td style="text-align: center; padding: 40px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #ffffff; height: 80px;" valign="middle">
                                <table border="0" width="100%" cellspacing="0" cellpadding="0">
                                    <tbody>
                                    <tr>
                                        <td class="em_height" height="35">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td class="em_font1" style="font-family: 'Open Sans', Arial, sans-serif; font-size: 20px; font-weight: bold; line-height: 50px; color: #30373b; text-transform: uppercase;" colspan="2" align="center">
                                            @foreach($send->event as $event3)
                                                {{$event3->nama_kegiatan}}
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="em_height" height="140">&nbsp;</td>
                                    </tr>

                                    <tr>
                                        <td style="font-family: 'Open Sans', Arial, sans-serif; font-size: 15px; font-weight: bold; line-height: 18px; color: #30373b;" align="left" width="70%">Hi {{$send->nama_investor}}</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td class="em_font1" style="font-family: 'Open Sans', Arial, sans-serif; font-size: 20px; font-weight: bold; line-height: 50px; color: #30373b; text-transform: uppercase;" align="left" width="70%">See You Soon!</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td class="em_height" height="35">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td style="font-family: 'Open Sans', Arial, sans-serif; font-size: 18px; line-height: 20px; color: #30373b;" align="left" width="50%">@foreach($send->event as $event) on {{$event->lokasi}} @endforeach</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td class="em_height" height="35">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 1px; line-height: 1px;" height="20">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td style="font-family: 'Open Sans', Arial, sans-serif; font-size: 18px; line-height: 20px; color: #feae39; max-width: 400px;" align="left" width="70%">@foreach($send->event as $event2) Mark Your Calendar at {{\Carbon\Carbon::parse($event2->tgl_mulai)->format('M d, Y')}} @endforeach</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 1px; line-height: 1px;" height="12">&nbsp;</td>
                                    </tr>

                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- [if gte mso 9]>
                </v:textbox>
                </v:rect>
                <![endif]--></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td style="padding: 10px; width: 580px;" align="center" valign="top">&nbsp;</td>
            <td>&nbsp;</td>
        </tr>

        <tr>
            <td dir="ltr" style="padding: 10px; width: 580px;" align="center" valign="top">
                <table id="seatsBlock" style="margin-left:auto; margin-right:auto;">
                    <p id="notification"></p>
                    <tr>
                        <td colspan="{{count($send->col)+1}}" style="align-content: center"><div class="screen">SCREEN</div></td>

                        <br/>
                    </tr>
                    @foreach($send->row as $row1)
                        <tr>
                            <td>{{$row1->row}}</td>
                            @foreach($send->col as $col)
                                <td>
                                    @foreach($send->mejas as $meja)

                                        @if((($row1->row).($col->col)) == ($meja->kode_meja))
                                            @if($send->meja == (($row1->row).($col->col)))
                                                <div class="inner-seat selected-innerColor"></div>
                                            @else
                                                <div class="inner-seat"></div>
                                            @endif
                                        @endif

                                    @endforeach
                                </td>

                            @endforeach
                        </tr>
                    @endforeach
                </table>
            </td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td dir="rtl" style="padding: 10px; width: 580px;" align="center" valign="top">
                <table border="0" width="100%" cellspacing="0" cellpadding="0" align="center">
                    <tbody>
                    <tr><!-- Column : BEGIN -->
                        <td class="stack-column-center" width="33.33%">&nbsp;</td>
                        <!-- Column : END --> <!-- Column : BEGIN -->
                        <td class="stack-column-center" width="66.66%">&nbsp;</td>
                        <!-- Column : END --></tr>
                    </tbody>
                </table>
                <img style="width: 600px; max-width: 600px;" src="http://invest.dpmptsp.jatengprov.go.id/storage/settings/July2019/s1EotJA9D7mT8HcaASln.png" alt="alt_text" width="600" height="147" align="left" border="0" /><br /><br /></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td class="stack-column-center" width="33.33%">&nbsp;</td>
            <td class="stack-column-center" width="66.66%">&nbsp;</td>
        </tr>
        </tbody>
    </table>
    <table class="email-container" style="margin: auto;" border="0" width="600" cellspacing="0" cellpadding="0" align="center">
        <tbody>
        <tr>
            <td style="padding: 40px 10px; width: 100%; font-size: 12px; font-family: sans-serif; mso-height-rule: exactly; line-height: 18px; text-align: center; color: #888888;">View as a Web Page<br /><br />Company Name<br /><span class="mobile-link--footer">123 Fake Street, SpringField, OR, 97477 US</span><br /><span class="mobile-link--footer">(123) 456-7890</span> <br /><br />unsubscribe</td>
        </tr>
        </tbody>
    </table>
    <!-- Email Footer : END --></center>
</body>
</html>