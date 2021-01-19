<table class="table mb-0">
    <thead class="bg-light">
    <tr style="text-align: center !important;">
        <th scope="col" class="border-0" style="text-align: center">#</th>
        <th scope="col" class="border-0" style="text-align: center">Project Readiness</th>
        <th scope="col" class="border-0" style="text-align: center">Investment Value</th>
    </tr>
    </thead>
    <tbody>
    @if(app('VoyagerAuth')->user()->hasRole('kab'))


    @else

            <tr>
                <td>1</td>
                <td>Ready to Offer</td>
                <td>{{number_format(array_sum($total))}}</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Prospective Projects</td>
                <td>{{number_format(array_sum($totalpro))}}</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Potentials Projects</td>
                <td>{{number_format(array_sum($totalpot))}}</td>
            </tr>

    @endif

    </tbody>
</table>