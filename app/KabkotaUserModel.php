<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KabkotaUserModel extends Model
{
    protected $table = 'kabkota_user';
    public $timestamps = false;

    public function admin(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kabkota(){
        return $this->belongsTo(KabKota::class, 'kab_kota_id', 'id');
    }
}
