<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class BiayaAir extends Model
{
    public function type(){
        return $this->hasMany(JenisKatUserAir::class, 'id');
    }
}
