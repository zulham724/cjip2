<?php

namespace App\Imports;

use App\SementaraBukus;
use Maatwebsite\Excel\Concerns\ToModel;

class BukuSementara implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new SementaraBukus([
            'nama_perusahaan'     => $row[0],
            'alamat_perusahaan'    => $row[1],
            'no_telepon_perusahaan'    => $row[2],
            'bidang_usaha'    => $row[3],
            'lokasi_proyek'    => $row[4],
            'negara'    => $row[5],
            'no_ip'    => $row[6],
            'jenis_permohonan'    => $row[7],
            'tanggal_disetujui'    => $row[8],
            'nama_sektor'    => $row[9],
            'kabkot'    => $row[10],
            'investasi'    => $row[11],
            'tki'    => $row[12],
            'tka'    => $row[13],
            'cluster'    => 3,
        ]);
    }
}
