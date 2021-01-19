<table id="datatable" hidden>
    <thead>
    <tr>
        <th>Sectors</th>
        <th>Jumlah Proyek</th>
        <th>Rp</th>
        <th>USD</th>
    </tr>
    </thead>
    <tbody>
    @isset($graphics)
    @foreach($graphics as $graphic)
        <tr>
            <th>{{ $graphic->bidang_usaha }}</th>
            <th>{{ $graphic->total }}</th>
            <td>{{$graphic->sumrp}}</td>
            <td>{{$graphic->sumusd}}</td>
        </tr>
    @endforeach
    @endisset
    </tbody>
</table>