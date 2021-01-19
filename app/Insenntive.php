<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Insenntive extends Model
{
    public function save(array $options = [])
    {
        if(Auth::user()->hasRole('kab')){
            $this->kab_kota_id = Auth::user()->id;
        };

        parent::save();
    }
}
