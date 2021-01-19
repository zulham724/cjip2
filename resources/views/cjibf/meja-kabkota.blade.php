
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    @if(empty($mejas[0]))


                        <a href="{{route('meja.show')}}"><button>Setting Mejo sek</button></a>


                    @else

                        <form action="{{route('kabkota.post')}}" class="form-edit-add" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="panel-body">
                                <div class="form-group col-md-12">
                                    <label class="control-label" for="jenis">Kabkota</label>
                                    <select name="kabkota" class="form-control select2" id="kabkota">
                                        @foreach($kabkotas as $kabkota)
                                            <option value="{{$kabkota->id}}">{{$kabkota->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <label class="control-label" for="table">Select Table Used</label>
                                <table id="printJS-form" style="margin-left:auto; margin-right:auto;">
                                    <tr>
                                        <td colspan="{{count($cols)+1}}" style="align-content: center"><div class="screen">SCREEN</div></td>

                                        <br/>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        @foreach($cols as $col1)
                                            <td style="margin-right: 20px">{{$col1->col}}</td>
                                        @endforeach
                                    </tr>
                                    @foreach($rows as $row1)
                                        <tr>
                                            <td>{{$row1->row}}</td>
                                            @foreach($cols as $col)
                                                <td style="padding:0 15px 0 15px;">
                                                    @foreach($mejas as $meja)

                                                        @if((($row1->row).($col->col)) == ($meja->kode_meja))
                                                            @if(empty($meja->jenis))
                                                                <input type="checkbox" name="meja[]" id="{{$meja->nama}}" class="seats" value="{{($row1->row).($col->col)}}">
                                                                <p>{{$meja->sisa}}</p>
                                                            @else
                                                                <input type="checkbox" name="meja[]" id="{{$meja->nama}}" class="bBox {{$meja->jenis->nama}}" value="{{($row1->row).($col->col)}}">
                                                                <p>
                                                                    @if(empty($meja->userId->name))
                                                                        {{$meja->sisa}}
                                                                    @else
                                                                        {{$meja->userId->name}} <br> {{$meja->sisa}}
                                                                    @endif
                                                                </p>
                                                            @endif
                                                        @endif

                                                    @endforeach

                                                </td>
                                            @endforeach
                                        </tr>

                                    @endforeach
                                </table>
                                <table>
                                    <tr>
                                        @foreach($jeniss as $meja)

                                            <div class="bBox {{$meja->nama}}">{{$meja->nama}}</div>

                                        @endforeach
                                    </tr>
                                </table>
                                <div class="panel-footer">
                                    <button type="submit" class="btn btn-primary save">Save</button>
                                    <button type="button" style="float: right" onclick="printJS('printJS-form', 'html')" class="btn btn-primary">Print</button>
                                </div>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>

@section('javascript')
    <script type="text/javascript" src="{{asset('js/front-end/print.min.js')}}"></script>
    <script>
        function printData()
        {
            var divToPrint=document.getElementById("printTable");
            newWin= window.open("");
            newWin.document.write(divToPrint.outerHTML);
            newWin.print();
            newWin.close();
        }
    </script>
@endsection