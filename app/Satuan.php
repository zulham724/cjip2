<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;


class Satuan extends Model
{
    public function potensiId(){
        return $this->belongsTo(Potensi::class);
    }

}
