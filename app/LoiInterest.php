<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoiInterest extends Model
{
    protected $connection = 'mysql';

    protected $table = 'loi_interests';

    protected $fillable = ['profile_id','user_id','kab_kota_id','nilai_usd','nilai_rp','lokasi_investasi','sektor_id'];

    public function kota(){
        return $this->belongsTo(KabKota::class, 'kab_kota_id');
    }
}
