<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Traits\Translatable;


class VmKabKota extends Model
{
    public function save(array $options = [])
    {

        $this->kab_kota_id = Auth::user()->id;

        parent::save();
    }

    use Translatable;
    protected $translatable = ['visi_misi', 'sumber_data'];
}
