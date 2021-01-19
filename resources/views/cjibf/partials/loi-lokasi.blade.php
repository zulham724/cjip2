<table class="table mb-0">
    <thead class="bg-light">
    <tr style="text-align: center !important;">
        <th scope="col" class="border-0" style="text-align: center">#</th>
        <th scope="col" class="border-0" style="text-align: center">Lokasi</th>
        <th>RP</th>
        <th>USD</th>
    </tr>
    </thead>
    <tbody>
    @isset($graphics)
    @foreach($graphics as $loi)

        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$loi->kabkota->namakota[0]->nama}}</td>
            <td>
                @isset($loi->sumrp)
                    {{number_format($loi->sumrp)}}
                @else
                    -
                @endisset
            </td>
            <td>
                @isset($loi->sumusd)
                    {{number_format($loi->sumusd)}}
                @else
                    -
                @endisset
            </td>
        </tr>

    @endforeach
    <tr>
        <td>
            TOTAL
        </td>
        <td>
            {{count($graphics)}}
        </td>
        <td>
            {{$graphics->sum('nilai_rp')}}
        </td>
        <td>
            {{$graphics->sum('nilai_usd')}}
        </td>
    </tr>
    @endisset

    </tbody>
</table>