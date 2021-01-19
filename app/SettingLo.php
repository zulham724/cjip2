<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class SettingLo extends Model
{
    public $timestamps = false;

    public function meja(){
        return $this->belongsToMany(CjibfTable::class, 'lo_mejas', 'setting_lo_id');
    }
}
