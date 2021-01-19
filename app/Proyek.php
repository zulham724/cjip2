<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use TCG\Voyager\Traits\Spatial;
use Illuminate\Support\Facades\Auth;

class Proyek extends Model
{
    use Spatial;


    protected $fillable = [
        'project_name', 'latar_belakang',
        'lingkup_pekerjaan',
        'eksisting',
        'luas_lahan',
        'status_kepemilikan',
        'skema_investasi',
        'npv',
        'irr',
        'bc_ratio',
        'playback_period',
        'cp_alamat',
    ];

    protected $spatial = ['location'];

    public function kabkota(){
        return $this->belongsTo(User::class, 'kab_kota_id');
    }

    public function kotas(){
        return $this->belongsToMany(KabKota::class, 'kabkota_user', 'user_id', 'kab_kota_id', 'kab_kota_id');
    }

    public function save(array $options = [])
    {
        if(Auth::user()->hasRole('kab')){
            $this->kab_kota_id = Auth::user()->id;
        };

        parent::save();
    }

    public function marketplace(){
        return $this->belongsTo(JenisMarketplace::class, 'market_id');
    }

    public function bySector(){
        return $this->belongsTo(CjibfSektor::class, 'sektor_id');
    }

    public function byUser(){
        return $this->belongsTo(User::class, 'kab_kota_id');
    }

    public function search(){
        $this->morphMany(Search::class,'searchable');
    }

    public function scopeFilter($query, $nama, $kabkota, $status, $sektor, $kepemilikan, $skema, $kajian, $keuangan)
    {
        return $query->when(!is_null('project_name') , function ($query) use($nama){
            if ($nama != null){
                return $query->where('project_name',$nama);
            }
        })->when(!is_null('kab_kota_id') , function ($query) use($kabkota){
            if ($kabkota != null){
                return $query->where('kab_kota_id',$kabkota);
            }
        })->when(!is_null('market_id') , function ($query) use($status){
            if ($status != null){
                return $query->Where('market_id',$status);
            }
        })->when(!is_null('sektor_id') , function ($query) use($sektor){
            if ($sektor){
                return $query->Where('sektor_id',$sektor);
            }
        })->when(!is_null('status_kepemilikan') , function ($query) use($kepemilikan){
            if ($kepemilikan){
                return $query->Where('status_kepemilikan',$kepemilikan);
            }
        })->when(!is_null('skema_investasi') , function ($query) use($skema){
            if ($skema){
                return $query->where('skema_investasi',$skema);
            }
        })->when(!is_null('file_kajian') , function ($query) use($kajian){
            if ($kajian != null){
                return $query->whereIn('file_kajian', [$kajian]);
            }
        })->when(!is_null('file_keuangan') , function ($query) use($keuangan){
            if ($keuangan != null){
                return $query->whereIn('file_keuangan', [$keuangan]);
            }
        });
    }

}
