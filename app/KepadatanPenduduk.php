<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;


class KepadatanPenduduk extends Model
{
    protected $fillable = ['kab_kota_id', 'kecamatan_id', 'lelaki', 'perempuan', 'sumber_data'];

    public function userId(){
        return $this->belongsTo(\TCG\Voyager\Models\User::class, 'kab_kota_id');
    }
}
