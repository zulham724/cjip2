<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class LoiDoc extends Model
{

    protected $connection = 'mysql';

    protected $table = 'loi_docs';

    public function save(array $options = [])
    {
        $this->kab_kota_id = Auth::user()->id;
        parent::save();
    }
}
