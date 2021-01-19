<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;


class Sektor extends Model
{
    use Translatable;
    protected $translatable = ['nama'];

    public function proyeks(){
        return $this->hasMany('App\Proyek','id','sektor_id');
    }
}
