<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>font-style</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <style>
        /* Remove the navbar's default margin-bottom and rounded borders */
        .navbar {
            margin-bottom: 0;
            border-radius: 0;
        }

        /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
        .row.content

        /* Set gray background color and 100% height */
        .sidenav {
            padding-top: 20px;
            background-color: #f1f1f1;
            height: 100%;
        }

        /* Set black background color, white text and some padding */
        footer {
            background-color: #555;
            color: white;
            padding: 15px;
        }

        /* On small screens, set height to 'auto' for sidenav and grid */
        @media screen and (max-width: 767px) {
            .sidenav {
                height: auto;
                padding: 15px;
            }
            .row.content {height:auto;}
        }
    </style>
    <style type='text/css'>
        body {
            font: 14px sans-serif;
            line-height: 30px;
        }
        span {
            background: yellow;
            border: 1px solid gold;
        }
        span.oblique {
            font-style: oblique;
        }
        span.italic {
            font-style: italic;
        }
        p.naught {
            font-family: "Monotype Corsiva";
            font-style: italic;
        }
        p.naught2 {
            font-family: "Cookie";
            font-style: italic;
        }
        .page_break { page-break-before: always; }
    </style>

</head>
<body>

<!--Static start part of a letter-->
    {{--<div class="row">
        <div class="col-4">
            <p class="naught">Nama Perusahaan</p>
        </div>
        <div class="col-4">
            <p class="naught">:</p>
        </div>
        <div class="col-4">
            <p class="naught2">Perusahaan blablabla</p>
        </div>
    </div>--}}
<!--Static last part of a letter-->
<div class="container-fluid text-center" {{--style="background-image: url({{asset('sementara/a.png')}});opacity: 0.5;"--}}>

    @foreach($bukus as $buku)
        <div class="row content">
            <div class="col-sm-3">
                <p class="naught" style="font-weight: bold">Nama Perusahaan</p>
            </div>
            <div class="col-sm-1 text-center">
                :
            </div>
            <div class="col-sm-8 text-left">
                <p class="naught2">{{$buku->nama_perusahaan}}</p>
            </div>
        </div>
        <div class="row content">
            <div class="col-sm-3">
                <p class="naught" style="font-weight: bold">Alamat Perusahaan</p>
            </div>
            <div class="col-sm-1 text-center">
                :
            </div>
            <div class="col-sm-8 text-left">
                <p class="naught2">{{$buku->alamat_perusahaan}}</p>
            </div>
        </div>
        <div class="row content">
            <div class="col-sm-3">
                <p class="naught" style="font-weight: bold">Nomor Telepon Perusahaan</p>
            </div>
            <div class="col-sm-1 text-center">
                :
            </div>
            <div class="col-sm-8 text-left">
                <p class="naught2">{{$buku->no_telepon_perusahaan}}</p>
            </div>
        </div>
        <div class="row content">
            <div class="col-sm-3">
                <p class="naught" style="font-weight: bold">Bidang Usaha</p>
            </div>
            <div class="col-sm-1 text-center">
                :
            </div>
            <div class="col-sm-8 text-left">
                <p class="naught2">{{$buku->bidang_usaha}}</p>
            </div>
        </div>
        <div class="row content">
            <div class="col-sm-3">
                <p class="naught" style="font-weight: bold">Nama Perusahaan</p>
            </div>
            <div class="col-sm-1 text-center">
                :
            </div>
            <div class="col-sm-8 text-left">
                <p class="naught2">{{$buku->nama_perusahaan}}</p>
            </div>
        </div>
        <div class="row content">
            <div class="col-sm-3">
                <p class="naught" style="font-weight: bold">Lokasi Proyek</p>
            </div>
            <div class="col-sm-1 text-center">
                :
            </div>
            <div class="col-sm-8 text-left">
                <p class="naught2">{{$buku->lokasi_proyek}}</p>
            </div>
        </div>
        <div class="row content">
            <div class="col-sm-3">
                <p class="naught" style="font-weight: bold">Negara</p>
            </div>
            <div class="col-sm-1 text-center">
                :
            </div>
            <div class="col-sm-8 text-left">
                <p class="naught2">{{$buku->negara}}</p>
            </div>
        </div>
        <div class="row content">
            <div class="col-sm-3">
                <p class="naught" style="font-weight: bold">No IP</p>
            </div>
            <div class="col-sm-1 text-center">
                :
            </div>
            <div class="col-sm-8 text-left">
                <p class="naught2">{{$buku->no_ip}}</p>
            </div>
        </div>
        <div class="row content">
            <div class="col-sm-3">
                <p class="naught" style="font-weight: bold">Jenis Permohonan</p>
            </div>
            <div class="col-sm-1 text-center">
                :
            </div>
            <div class="col-sm-8 text-left">
                <p class="naught2">{{$buku->jenis_permohonan}}</p>
            </div>
        </div>
        <div class="row content">
            <div class="col-sm-3">
                <p class="naught" style="font-weight: bold">Tanggal Disetujui</p>
            </div>
            <div class="col-sm-1 text-center">
                :
            </div>
            <div class="col-sm-8 text-left">
                <p class="naught2">{{$buku->tanggal_disetujui}}</p>
            </div>
        </div>
        <div class="row content">
            <div class="col-sm-3">
                <p class="naught" style="font-weight: bold">Nama Sektor</p>
            </div>
            <div class="col-sm-1 text-center">
                :
            </div>
            <div class="col-sm-8 text-left">
                <p class="naught2">{{$buku->nama_sektor}}</p>
            </div>
        </div>
        <div class="row content">
            <div class="col-sm-3">
                <p class="naught" style="font-weight: bold">Kab/Kota</p>
            </div>
            <div class="col-sm-1 text-center">
                :
            </div>
            <div class="col-sm-8 text-left">
                <p class="naught2">{{$buku->kabkot}}</p>
            </div>
        </div>
        <div class="row content">
            <div class="col-sm-3">
                <p class="naught" style="font-weight: bold">Nilai Investasi (dalam Rp. Juta)</p>
            </div>
            <div class="col-sm-1 text-center">
                :
            </div>
            <div class="col-sm-8 text-left">
                <p class="naught2">{{$buku->investasi}}</p>
            </div>
        </div>
        <div class="row content">
            <div class="col-sm-3">
                <p class="naught" style="font-weight: bold">TKI</p>
            </div>
            <div class="col-sm-1 text-center">
                :
            </div>
            <div class="col-sm-8 text-left">
                <p class="naught2">{{$buku->tki}}</p>
            </div>
        </div>
        <div class="row content">
            <div class="col-sm-3">
                <p class="naught" style="font-weight: bold">TKA</p>
            </div>
            <div class="col-sm-1 text-center">
                :
            </div>
            <div class="col-sm-8 text-left">
                <p class="naught2">{{$buku->tka}}</p>
            </div>
        </div>
        <div class="page_break"></div>
    @endforeach

</div>

</body>
</html>
