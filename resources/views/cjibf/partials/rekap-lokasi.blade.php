<table class="table mb-0">
    <thead class="bg-light">
    <tr style="text-align: center !important;">
        <th scope="col" class="border-0" style="text-align: center">#</th>
        <th scope="col" class="border-0" style="text-align: center">Kabupaten/ Kota</th>
        <th scope="col" class="border-0" style="text-align: center">Jumlah Investor Berminat</th>
    </tr>
    </thead>
    <tbody>
    @if(app('VoyagerAuth')->user()->hasRole('kab'))


    @else
        @foreach($user_info as $kab)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$kab->user->namakota[0]->nama}}</td>
                <td>{{$kab->total}}</td>
            </tr>
        @endforeach
    @endif

    </tbody>
</table>