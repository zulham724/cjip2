@extends('front-end.investor.dashboard')

@section('investment')
    <!-- Page Header -->

    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Dashboard</span>
            <h3 class="page-title">Invest in Central Java</h3>
        </div>
    </div>

    @if($cjibf->is_open == 1)
        <div class="row">
            <div class="col-lg-12 mb-4">
                <div class="card card-small mb-4">
                    <div class="card-header border-bottom">
                        <h6 class="m-0">{{$cjibf->nama_kegiatan}} is open, Join us Now </h6>
                    </div>
                </div>
            </div>

        </div>
        @else
        <div class="row">
            <div class="col-lg-8 mb-4">
                <div class="card card-small mb-4">
                    <div class="card-header border-bottom">
                        <h6 class="m-0">Get LoI now</h6>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item p-3">
                            <div class="row">
                                <div class="col">
                                    <form action="{{route('investment.post')}}" method="post">
                                        @csrf
                                        <div class="form-row">

                                            <div class="form-group col-md-6">
                                                <label for="sektor">Sector</label>
                                                <input type="text" class="form-control" id="sektor" name="sektor"
                                                       placeholder="Business Field (Industry, Tourism, etc)" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="kab_kota">Cities</label>
                                                <select id="kab_kota" name="kab_kota" class="form-control" required>
                                                    <option selected>Select city</option>
                                                    @foreach($cities as $city)
                                                        <option value="{{$city->user->kab_kota_id}}">{{$city->nama}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="lokasi">Location</label>
                                                <input type="text" class="form-control" id="lokasi" name="lokasi"
                                                       placeholder="Detail Location" required>
                                            </div>
                                        </div>
                                        <div class="form-row">

                                            <div class="form-group col-md-12">
                                                <label for="inv">Investment Value</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <select id="alarm_action" class="form-control" required>
                                                            <option selected>Choose...</option>
                                                            <option value='rupiah'>Rupiah</option>
                                                            <option value='dollar'>US Dollar</option>
                                                        </select>
                                                    </div>
                                                    <input class="form-control" name="rp" placeholder="Rupiah" id="rp"
                                                           style="display: none"/>
                                                    <input class="form-control" name="usd" id="usd" placeholder="USD"
                                                           style="display: none"/>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-accent">Invest Now !!!</button>
                                    </form>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-4 mb-4">
                @if(empty($lois))
                    <div class="row">
                        <div class="col-lg col-md-6 col-sm-6 mb-4">
                            <div class="stats-small stats-small--1 card card-small">
                                <div class="card-body p-0 d-flex">
                                    <div class="d-flex flex-column m-auto">
                                        <div class="stats-small__data text-center">
                                            <span class="stats-small__label text-uppercase">You currently don't have any investment here</span>
                                            <h6 class="stats-small__value count my-3"><img src="{{asset('images/sad.png')}}" alt=":)"></h6>
                                        </div>
                                    </div>
                                    <canvas height="120" class="blog-overview-stats-small-1"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    @foreach($lois as $loi)
                        <div class="row">
                            <div class="col-lg col-md-6 col-sm-6 mb-4">
                                <div class="stats-small stats-small--1 card card-small">
                                    <div class="card-body p-0 d-flex">
                                        <div class="d-flex flex-column m-auto">
                                            <div class="stats-small__data text-center">
                                                <span class="stats-small__label">Thank You For Investing in {{$loi->kota->nama}}</span>
                                                <h6 class="stats-small__value count my-3">
                                                    @if(empty($loi->nilai_usd))
                                                        <div id="rp_in" hidden>{{$loi->nilai_rp}}</div>
                                                        <div id="rp_out"></div>
                                                    @else
                                                        <div id="usd_in" hidden>{{$loi->nilai_usd}}</div>
                                                        <div id="usd_out"></div>
                                                    @endif
                                                </h6>
                                                <div class="stats-small__data">
                                                    <span class="stats-small__percentage">{{$loi->sektor_id}}</span>
                                                </div>
                                            </div>
                                        </div>

                                        <a href="{{route('edit.investment', $loi->id)}}"><button type="submit" class="btn btn-info">Detail</button></a>

                                        <canvas height="120" class="blog-overview-stats-small-1"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif


            </div>
        </div>
    @endif

@endsection

        @section('js')
            <script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
            <script>
                $('#rp').inputmask("numeric", {
                    radixPoint: ".",
                    groupSeparator: ".",
                    digits: 3,
                    autoGroup: true,
                    /* prefix: 'Rp. ',*/ //Space after $, this will not truncate the first character.
                    rightAlign: false,
                    oncleared: function () {
                        self.Value('');
                    }
                });
            </script>
            <script>
                $('#usd').inputmask("numeric", {
                    radixPoint: ".",
                    groupSeparator: ".",
                    digits: 3,
                    autoGroup: true,
                    /* prefix: 'Rp. ',*/ //Space after $, this will not truncate the first character.
                    rightAlign: false,
                    oncleared: function () {
                        self.Value('');
                    }
                });
            </script>
            <script>
                input = document.getElementById("rp_in");
                output = document.getElementById("rp_out");

                var amount = parseInt(input.innerHTML);
                var options = {style:'currency', currency: 'IDR', minimumFractionDigits: 0};

                var numberFormat = new Intl.NumberFormat('idr', options);

                output.innerHTML = numberFormat.format(amount);
            </script>
            <script>
                input = document.getElementById("usd_in");
                output = document.getElementById("usd_out");

                var amount = parseInt(input.innerHTML);
                var options = {style:'currency', currency: 'USD', minimumFractionDigits: 0};

                var numberFormat = new Intl.NumberFormat('en-Us', options);

                output.innerHTML = numberFormat.format(amount);
            </script>

            <script>
                var alarmInput = $('#alarm_action');
                alarmInput.on('change', function () {
                    var rp = $('#rp');
                    var usd = $('#usd');
                    //this == alarmInput within this change handler
                    switch ($(this).val()) {
                        case 'rupiah':
                            rp.show();
                            usd.hide();
                            break;
                        case 'dollar':
                            rp.hide();
                            usd.show();
                            break;
                    }
                });
            </script>
@endsection
