<?php

namespace App\Models\UMKM;

use App\KabKota;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Umkm extends Model
{
    protected $table = 'umkm_new';
    protected $casts = [
        'tambahan' => 'array'
    ];
    protected $fillable = [
        'nib',
        'nama_perusahaan',
        'alamat',
        'nama_pendaftar',
        'kab_kota_id',
        'tenaga_kerja',
        'kbli',
        'jumlah_investasi',
        'tgl_terbit_oss',
        'status_pm',
        'masa_berlaku',
        'tahun',
        'lat',
        'kelurahan',
        'kecamatan',
        'tambahan',
        'lng',
    ];

    public function kabkota(){
        return $this->belongsTo(KabKota::class, 'kab_kota_id');
    }


    public function kblis(){
        return $this->HasMany(Kbli::class, 'kbli');
    }

    public function save(array $options = [])
    {
        //dd(Auth::user());
        if (Auth::user()->role_id == 3){
            //dd('tests');
            $this->kab_kota_id = Auth::user()->namakota[0]->id;
        }

        parent::save();
    }

    public function scopeFilter($query, $nama, $kabkota, $nib, $tahun_a, $tahun_b, $kbli)
    {
        return $query->when(!is_null('nama_pendaftar') , function ($query) use($nama){
            if ($nama != null){
                return $query->where('nama_pendaftar',$nama);
            }
        })->when(!is_null('kab_kota_id') , function ($query) use($kabkota){
            if ($kabkota != null){
                return $query->where('kab_kota_id',$kabkota);
            }
        })->when(!is_null('nib') , function ($query) use($nib){
            if ($nib != null){
                return $query->Where('nib',$nib);
            }
        })->when(!is_null('tfl_terbit_oss') , function ($query) use($tahun_a, $tahun_b){
            if ($tahun_a && $tahun_b){
                return $query->whereBeetween('tfl_terbit_oss',[$tahun_a, $tahun_b]);
            }
        })->when(!is_null('kbli') , function ($query) use($kbli){
            if ($kbli){
                return $query->Where('kbli',$kbli);
            }
        });
    }

}
