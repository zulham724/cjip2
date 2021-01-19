<table>
    <thead>
    <tr>
        <th>Kab/Kota</th>
        <th>Perusahaan</th>
        <th>Sektor</th>
        <th>Nama</th>
        <th>Jabatan</th>
        <th>Phone</th>
        <th>E-mail</th>
        <th>Meja</th>
    </tr>
    </thead>
    <tbody>
    @foreach($pesertas as $meja => $peserta1)

            @foreach($peserta1 as $peserta)
                @if($peserta->meja_id)
                <tr>
                    <td>{{ $peserta->userId->admin->name }}</td>
                    <td>{{ $peserta->profil->nama_perusahaan}}, {{ $peserta->profil->badan_usaha}}</td>
                    <td>{{ $peserta->sektor_interest }}</td>
                    <td>{{ $peserta->profil->investor_name }}</td>
                    <td>{{ $peserta->profil->jabatan }}</td>
                    <td>{{ $peserta->profil->phone }}</td>
                    <td>{{ $peserta->profil->userInv->email }}</td>
                    <td>{{$meja}}</td>
                </tr>

                    @else
                    <tr>
                        <td>{{ $peserta->userId->admin->name }}</td>
                        <td>{{ $peserta->profil->nama_perusahaan}}, {{ $peserta->profil->badan_usaha}}</td>
                        <td>{{ $peserta->sektor_interest }}</td>
                        <td>{{ $peserta->profil->investor_name }}</td>
                        <td>{{ $peserta->profil->jabatan }}</td>
                        <td>{{ $peserta->profil->phone }}</td>
                        <td>{{ $peserta->profil->userInv->email }}</td>
                        <td>Isi Manual</td>
                    </tr>
                @endif
            @endforeach
    @endforeach
    </tbody>
</table>
