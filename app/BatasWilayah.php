<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Traits\Translatable;


class BatasWilayah extends Model
{
    use Translatable;

    protected $translatable = ['batas_wilayah', 'sumber_data'];

    public function save(array $options = [])
    {

        $this->kab_kota_id = Auth::user()->id;

        parent::save();
    }

    public function userId(){
        return $this->belongsTo(\TCG\Voyager\Models\User::class, 'kab_kota_id');
    }
}
