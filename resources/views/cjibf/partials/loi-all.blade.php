<table id="example" class="mdl-data-table" style="width:100%">
    <thead>
    <tr>
        <th>No</th>
        <th>Company</th>
        <th>Negara</th>
        <th>Sector</th>
        <th>Lokasi</th>
        <th>USD</th>
        <th>RP</th>
    </tr>
    </thead>
    <tbody>
    @isset($lois)
        @foreach($lois as $loi)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $loi->nama_perusahaan }}</td>
                <td>
                    @isset($loi->asal_negara)
                    {{$loi->asal_negara}}
                        @else
                    -
                    @endisset
                </td>

                <td>{{$loi->bidang_usaha}}</td>


                <td>{{$loi->kabkota->namakota[0]->nama}}</td>
                <td>{{ $loi->nilai_usd }}</td>
                <td>{{ $loi->nilai_rp }}</td>
            </tr>
        @endforeach
    @endisset
    </tbody>
</table>