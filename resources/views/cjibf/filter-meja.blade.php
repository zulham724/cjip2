


    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    @if(empty($mejas[0]))


                        <a href="{{route('meja.show')}}"><button>Setting Mejo sek</button></a>


                    @else

                        <form action="{{route('mejafilter.post')}}" class="form-edit-add" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="panel-body">
                                <div class="form-group col-md-12">
                                    <label class="control-label" for="jenis">Jenis Meja</label>
                                    <select name="jenis" class="form-control select2" id="jenis">
                                        @foreach($jeniss as $jenis)
                                        <option value="{{$jenis->id}}">{{$jenis->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <label class="control-label" for="table">Select Table Used</label>
                                <table id="seatsBlock" style="margin-left:auto; margin-right:auto;">
                                    <p id="notification"></p>
                                    <tr>
                                        <td colspan="{{count($cols)+1}}" style="align-content: center"><div class="screen">SCREEN</div></td>

                                        <td colspan="20" style="align-content: center">

                                        </td>

                                        <br/>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        @foreach($cols as $col1)
                                            <td>{{$col1->col}}</td>
                                        @endforeach
                                    </tr>
                                    @foreach($rows as $row1)
                                        <tr>
                                            <td>{{$row1->row}}</td>
                                            @foreach($cols as $col)
                                                <td>
                                                    @foreach($mejas as $meja)

                                                        @if((($row1->row).($col->col)) == ($meja->kode_meja))
                                                            @if(empty($meja->jenis))
                                                                <input type="checkbox" name="meja[]" id="{{$meja->nama}}" class="seats" value="{{($row1->row).($col->col)}}">
                                                            @else
                                                                <input type="checkbox" name="meja[]" id="{{$meja->nama}}" class="bBox {{$meja->jenis->nama}}" disabled value="{{($row1->row).($col->col)}}">
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

                                               <div class="bBox {{$meja->nama}}">{{$meja->nama}}</div><br/>

                                       @endforeach
                                   </tr>
                               </table>
                                <div class="panel-footer">
                                    <button type="submit" class="btn btn-primary save">Save</button>
                                    <a href="{{route('kabkota.show')}}"><button type="button" style="float: right" class="btn btn-primary">Next Step</button></a>
                                </div>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>


@section('js')
    <script>
        $("#chk1").hover(
            function() {
                $(this).find(".infoCheckbox:first").show();
            },
            function() {
                $(this).find(".infoCheckbox:first").hide();
            }
        );
    </script>
@endsection