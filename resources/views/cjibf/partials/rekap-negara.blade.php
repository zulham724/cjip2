<table class="table mb-0">
    <thead class="bg-light">
    <tr style="text-align: center !important;">
        <th scope="col" class="border-0" style="text-align: center">#</th>
        <th scope="col" class="border-0" style="text-align: center">Negara</th>
        <th scope="col" class="border-0" style="text-align: center">Jumlah Investor Berminat</th>
    </tr>
    </thead>
    <tbody>
    @if(app('VoyagerAuth')->user()->hasRole('kab'))


    @else
        @foreach($country_info as $country => $info)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$country}}</td>
                <td>{{count($info)}}</td>
            </tr>
        @endforeach
    @endif
    <tr>
        <td colspan="2" align="center">TOTAL</td>
        <td align="center">{{count($pesertas2)}}</td>
    </tr>

    </tbody>
</table>