<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class JenisKatUserAir extends Model
{
    public $timestamps = false;

    public function air(){
        return $this->hasMany(BiayaAir::class, 'jenis_kat_user_air_id');
    }
}
