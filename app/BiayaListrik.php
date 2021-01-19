<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class BiayaListrik extends Model
{
    public function kategori(){
        return $this->belongsTo(JenisKatUserListrik::class, 'jenis_user_id');
    }
}
