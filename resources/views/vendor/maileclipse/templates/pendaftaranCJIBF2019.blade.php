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

</head>
<body bgcolor="#222222" width="100%" style="Margin: 0;">
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
<td style="text-align: center; background-position: center center !important; background-size: cover !important; width: 600px;" valign="middle" bgcolor="#222222"><!-- [if gte mso 9]>
                    <v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false" style="width:600px;height:175px; background-position: center center !important;">
                    <v:fill type="tile" src="http://placehold.it/600x230/222222/666666" color="#222222" />
                    <v:textbox inset="0,0,0,0">
                    <![endif]-->
<div>
<table style="height: 80px; width: 100%;" border="0" width="100%" cellspacing="0" cellpadding="0" align="center">
<tbody>
<tr style="height: 80px;">
<td style="text-align: center; padding: 40px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #ffffff; height: 80px;" valign="middle">
    @foreach($send->event as $event3)
        {{$event3->nama_kegiatan}}
    @endforeach
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
<td style="padding: 10px; width: 580px;" align="center" valign="top">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tbody>
<tr><!-- Column : BEGIN -->
<td class="stack-column-center"><img src="http://invest.dpmptsp.jatengprov.go.id/storage/settings/July2019/9ebASHbxWi4IXEF6Md3N.png" alt="" width="590" height="624" /></td>
<!-- Column : END --> <!-- Column : BEGIN -->
<td class="stack-column-center">&nbsp;</td>
<!-- Column : END --></tr>
</tbody>
</table>
</td>
<td>&nbsp;</td>
</tr>
<tr>
<td style="padding: 10px; width: 580px;" align="center" valign="top">&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td dir="ltr" style="padding: 10px; width: 580px;" align="center" valign="top">
<table border="0" width="100%" cellspacing="0" cellpadding="0" align="center">
<tbody>
<tr><!-- Column : BEGIN -->
<td class="stack-column-center" width="33.33%">&nbsp;</td>
<!-- Column : END --> <!-- Column : BEGIN -->
<td class="stack-column-center" width="66.66%">&nbsp;</td>
<!-- Column : END --></tr>
</tbody>
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