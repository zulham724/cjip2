<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Traits\Spatial;
use TCG\Voyager\Traits\Translatable;


class Cp extends Model
{
    use Spatial;
    use Translatable;
    protected $translatable = ['alamat'];
    protected $spatial = ['coordinate'];

    public function save(array $options = [])
    {

        $this->kab_kota_id = Auth::user()->id;

        parent::save();
    }
}
