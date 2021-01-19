<table class="table mb-0">
    <thead class="bg-light">
    <tr style="text-align: center !important;">
        <th scope="col" class="border-0" style="text-align: center">#</th>
        <th scope="col" class="border-0" style="text-align: center">Negara</th>
        <th>RP</th>
        <th>USD</th>
    </tr>
    </thead>
    <tbody>
    @isset($loi_country)
        @foreach($loi_country as $loi)

            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$loi->country}}</td>
                <td>
                    @isset($loi->sumrp)
                        Rp. {{number_format($loi->sumrp)}}
                        @else
                        -
                    @endisset
                </td>
                <td>
                    @isset($loi->sumusd)
                        USD $ {{number_format($loi->sumusd)}}
                        @else
                        -
                    @endisset
                </td>
            </tr>
        @endforeach
    @endisset

    </tbody>
</table>