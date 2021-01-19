<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class SementaraBukus extends Model
{
    protected $table = 'sementara_bukus';
    public $timestamps = false;
    protected $fillable = ['nama_perusahaan',
                'alamat_perusahaan',
                'no_telepon_perusahaan',
                'bidang_usaha',
                'lokasi_proyek',
                'negara',
                'no_ip',
                'jenis_permohonan',
                'tanggal_disetujui',
                'nama_sektor',
                'kabkot',
                'investasi',
                'tki',
                'tka',
                'cluster'];
}
