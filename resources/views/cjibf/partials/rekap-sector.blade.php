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
        @foreach($sector_info as $sector)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$sector->sektor_interest}}</td>
                <td>{{$sector->totalsektor}}</td>
            </tr>
        @endforeach
    @endif

    </tbody>
</table>