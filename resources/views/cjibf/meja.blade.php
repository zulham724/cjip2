
@section('page_header')
    <h1 class="page-title">
        {{ 'Tables Settings' }}
    </h1>
    @include('voyager::multilingual.language-selector')
@stop

    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    @if(empty($rows[0]->row))


                        <a href="{{route('layout.form')}}"><button>Setting Layout sek</button></a>


                    @else

                        <form action="{{route('meja.post')}}" class="form-edit-add" method="post">
                            @csrf
                            <div class="panel-body">
                                <label class="control-label" for="name">Select Table Used</label>
                                <table id="seatsBlock" style="margin-left:auto; margin-right:auto;">
                                    <p id="notification"></p>
                                    <tr>
                                        <td colspan="{{count($cols)+1}}" style="align-content: center"><div class="screen">SCREEN</div></td>
                                        {{--<td rowspan="20">
                                            <div class="smallBox greenBox">Selected Seat</div> <br/>
                                            <div class="smallBox redBox">Reserved Seat</div><br/>
                                            <div class="smallBox emptyBox">Empty Seat</div><br/>
                                        </td>--}}

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
                                                    <input type="checkbox" name="meja[]" id="" class="seats" value="{{($row1->row).($col->col)}}">
                                                    {{-- <input type='hidden' value='0' name='meja[]'>--}}
                                                </td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </table>
                                <div class="panel-footer">
                                    <button type="submit" class="btn btn-primary save">Save</button>
                                </div>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>

