<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Lois extends Model
{
    protected $connection = 'mysql';

    protected $table = 'lois';

    public function save(array $options = [])
    {

        $this->kab_kota_id = Auth::user()->id;

        parent::save();
    }

    public function sektor(){
        return $this->belongsTo(CjibfInvestor::class, 'id', 'loi_id');
    }
    public function kabkota(){
        return $this->belongsTo(User::class,  'kab_kota_id');
    }

    public function kota(){
        return $this->belongsToMany(KabKota::class, 'kabkota_user', 'user_id', 'kab_kota_id');
    }

    public function loi(){
        return $this->belongsTo(ProfileInvestor::class, 'nama_perusahaan', 'nama_perusahaan');
    }

    public function statusLoi(){
        return $this->belongsTo(ProsesLois::class, 'status_proses', 'id');
    }
}
