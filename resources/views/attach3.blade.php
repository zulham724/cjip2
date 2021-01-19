<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{$send->event->nama_kegiatan}}</title>
    <style type="text/css">


        .screen {
            width: 100%;
            height: 20px;
            background: #1fc8db;
            background-image: linear-gradient(141deg, #9fb8ad 0%, #1fc8db 51%, #2cb5e8 75%);
            color: #fff;
            line-height: 20px;
            font-size: 15px;
            text-align: center;
            margin-right: auto;
            margin-left: auto;
        }

        .inner-seat {
            width: 10px;
            height: 10px;
            border-radius: 100px;
            top: 50%;
            left: 50%;
            margin: -35px 0px 0px -35px;
            background: #D8D8D8;
            position: absolute;
        }

        #div-inline {
            float: left;
        }


        #div-inline:hover .inner-seat {
            background: #3366CC;
        }

        .clearBoth {
            clear: both;
        }

        .selected-innerColor {
            background-color: #3366CC;
        }
        .page_break { page-break-before: always; }
    </style>
</head>
<body>

<!--Static start part of a letter-->
<table border="0" cellpadding="0" cellspacing="0"
       style="border-collapse: separate; mso-table-lspace: 0; mso-table-rspace: 0; width: 100%; padding-bottom: 64px;
       box-sizing: border-box; min-width: 100% !important; background-color: #fafcff" bgcolor="#fafcff"
       width="100%">
    <tr>
        <td align="center" style="vertical-align: top; padding-top: 10px;" valign="top">
            <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0;
      mso-table-rspace: 0; width: 100%; max-width: 560px; background-color: #ffffff; border: solid 2px #ceddf2;
       padding-top: 32px; padding-left: 8px; padding-right: 8px; padding-bottom: 20px" bgcolor="#ffffff">
                <tr>
                    <td style="height: 85px; background: url('http://cjip.jatengprov.go.id/storage/additional/cjibf.png');
              background-position: center; background-repeat: no-repeat; background-size: contain;"
                        valign="top" height="85px">
                    </td>
                </tr>
                <tr>
                    <td style="font-family: sans-serif; font-size: 18px; vertical-align: top; text-align: center; color: #7d93b2;
              padding-top: 12px" valign="top" align="center">Central Java Investment Business Forum & Expo 2019
                    </td>
                </tr>
                <tr>
                    <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; text-align: center; color: #9eb4d2;
              padding-top: 20px" valign="top" align="center">Thank You for Joining Us
                    </td>
                </tr>
                <tr>
                    <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; text-align: center; color: #414857;
              padding-top: 20px" valign="top" align="center">Hotel Bidakara Jakarta
                    </td>
                </tr>
                <tr>
                    <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; text-align: center; color: #414857;
              padding-top: 10px" valign="top" align="center">Birawa Assembly Hall, Hotel Bidakara Jakarta, Jl. Gatot Subroto No.Kav. 71-73, Jakarta
                    </td>
                </tr>
                <tr>
                    <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; text-align: center; color: #414857;
              padding-top: 10px" valign="top" align="center">November, 5th 2019
                    </td>
                </tr>
                <!--Static start part of a letter-->

                <!--Bill-->
                <tr>
                    <td align="center" style="vertical-align: top; padding-top: 36px;" valign="center">
                        <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0;
              mso-table-rspace: 0; width: 100%; max-width: 400px; border: solid 2px #e5f0ff;">
                            <!--1-->
                            <tr>
                                <td align="center" style="vertical-align: top;" valign="center">
                                        <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0;
              mso-table-rspace: 0; width: 100%; max-width: 200px; border: none">
                                            <tr>
                                                <td align="left" style="vertical-align: top;  padding-left: 16px;" valign="center">
                                                    <p style="text-align: center; font-size: 14px; font-family: sans-serif;
                                        color: #7d93b2; padding-left: 16px; margin-top: 0; margin-bottom: 0;">
                                                        Company Name <b style="color: #4c6280"><br><i>(Nama Perusahaan)</i></b>
                                                    </p>
                                                </td>
                                                <td align="left" style="vertical-align: top;  " valign="center">
                                                    <p style=" text-align: center; font-size: 14px; font-family: sans-serif;
                                        color: #7d93b2;">
                                                        :
                                                    </p>
                                                </td>
                                                <td align="left" style="vertical-align: top; " valign="center">
                                                    <p style="text-align: left; font-size: 14px; font-family: sans-serif;
                                        color: #7d93b2; padding-left: 16px; margin-top: 0; margin-bottom: 0;">
                                                        <b style="color: #4c6280">
                                                            {{$send->perusahaan}}
                                                        </b>
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="left" style="vertical-align: top; padding-left: 16px;" valign="center">
                                                    <p style="text-align: center; font-size: 14px; font-family: sans-serif;
                                        color: #7d93b2; padding-left: 16px; margin-top: 0; margin-bottom: 0;">
                                                        Name <b style="color: #4c6280"><br><i>(Nama)</i></b>
                                                    </p>
                                                </td>
                                                <td align="left" style="vertical-align: top; " valign="center">
                                                    <p style=" text-align: center; font-size: 14px; font-family: sans-serif;color: #7d93b2;">
                                                        :
                                                    </p>
                                                </td>
                                                <td align="left" style="vertical-align: top;" valign="center">
                                                    <p style="text-align: left; font-size: 14px; font-family: sans-serif;
                                        color: #7d93b2; padding-left: 16px; margin-top: 0; margin-bottom: 0;">
                                                        <b style="color: #4c6280">
                                                            {{$send->nama_investor}}
                                                        </b>
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="left" style="vertical-align: top;padding-left: 16px;" valign="cecnter">
                                                    <p style="text-align: center; font-size: 14px; font-family: sans-serif;
                                        color: #7d93b2; padding-left: 16px;margin-top: 0; margin-bottom: 0;">
                                                        Interested in <b style="color: #4c6280"><br><i>(Berminat di)</i></b>
                                                    </p>
                                                </td>
                                                <td align="left" style="vertical-align: top;" valign="center">
                                                    <p style=" text-align: center; font-size: 14px; font-family: sans-serif;
                                        color: #7d93b2;">
                                                        :
                                                    </p>
                                                </td>
                                                <td align="left" style="vertical-align: top;" valign="cecnter">
                                                    <p style="text-align: left; font-size: 14px; font-family: sans-serif;
                                        color: #7d93b2; padding-left: 16px; margin-top: 0; margin-bottom: 0;">
                                                        <b style="color: #4c6280">
                                                            {{$send->minat_sektor}}, {{$send->minat_kabkota}}
                                                        </b>
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="left" style="vertical-align: top; padding-left: 16px;" valign="center">
                                                    <p style="text-align: center; font-size: 14px; font-family: sans-serif;
                                        color: #7d93b2; padding-left: 16px; margin-top: 0; margin-bottom: 0;">
                                                        Table Code <b style="color: #4c6280"><br><i>(Kode Meja)</i></b>
                                                    </p>
                                                </td>
                                                <td align="left" style="vertical-align: top; " valign="center">
                                                    <p style=" text-align: center; font-size: 14px; font-family: sans-serif;
                                        color: #7d93b2;">
                                                        :
                                                    </p>
                                                </td>
                                                <td align="left" style="vertical-align: top;" valign="center">
                                                    <p style="text-align: left; font-size: 14px; font-family: sans-serif;
                                        color: #7d93b2; padding-left: 16px; margin-top: 0; margin-bottom: 0;">
                                                        <b style="color: #4c6280">
                                                            {{$send->meja}}
                                                        </b>
                                                    </p>
                                                </td>
                                            </tr>
                                        </table>
                                </td>

                                <td align="center" style="vertical-align: top;" valign="center">
                                    <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0;
              mso-table-rspace: 0; width: 100%; max-width: 200px; border: none">
                                        <tr>
                                            <td align="center" style="vertical-align: top;  " valign="top">
                                                <p style="text-align: center; font-size: 14px; font-family: sans-serif;
                    padding-right: 16px; padding-top: 16px; margin-top: 0; margin-bottom: 0;">
                                                    <img src="data:image/png;base64, {!! base64_encode($send->qr) !!}" style="max-width: 200px;max-height: 200px" alt="">
                                                </p>
                                            </td>
                                        </tr>
                                    </table>

                                </td>
                            </tr>
                            <!--1-->
                        </table>
                    </td>
                </tr>
                <!--Bill-->

                <!--Total-->
                <tr>
                    <td style="vertical-align: top; padding-top: 18px;" valign="top" align="center">
                        <table id="seatsBlock" style="margin-left:auto; margin-right:auto;width: 600px;height:400px;">
                            <tr>
                                <td colspan="{{count($send->col)+1}}" style="align-content: center; padding-top:20px;padding-bottom:20px;padding-right:20px; ">
                                    <div class="screen">SCREEN</div>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-top: 30px"></td>
                                @foreach($send->col as $col1)
                                    <td style="padding-top: 30px"><p style="font-size: 14px; font-family: sans-serif;
                    color: #7d93b2; padding-left: 16px; padding-top: 16px; margin-top: 0; margin-bottom: 0;">{{$col1->col}}</p></td>
                                @endforeach
                            </tr>
                            @foreach($send->row as $row1)
                                <tr>
                                    <td style="padding-top: 10px"><p style="font-size: 14px; font-family: sans-serif;
                    color: #7d93b2; padding-left: 16px; padding-top: 16px; margin-top: 0; margin-bottom: 0;">{{$row1->row}}</p></td>
                                    @foreach($send->col as $col)
                                        <td style="padding-top: 10px">
                                            @foreach($send->mejas as $meja)

                                                @if((($row1->row).($col->col)) == ($meja->kode_meja))
                                                    @if($send->meja == (($row1->row).($col->col)))

                                                        <img src="http://cjip.jatengprov.go.id/storage/additional/seated.png"
                                                             style="width: 20px" alt="">

                                                    @else
                                                        <img src="http://cjip.jatengprov.go.id/storage/additional/seat.png"
                                                             style="width: 20px" alt="">
                                                    @endif
                                                @endif

                                            @endforeach
                                        </td>

                                    @endforeach
                                </tr>
                            @endforeach
                        </table>
                    </td>
                </tr>

                <tr>
                    <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; text-align: center; color: #9eb4d2;
              padding-top: 10px; max-width: 400px;" valign="top" align="center">Please <span style="color: #ff5c72;">Show This Confirmation</span> at The <span style="color: #ff5c72">Registration Desk</span> to Receive The Participant Badges & Business Forum Materials
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<!--Static last part of a letter-->


</body>
</html>
