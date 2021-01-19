<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class CjibfChair extends Model
{
    protected $table = 'cjibf_chairs';

    public $timestamps = false;

    public function meja(){
        return $this->belongsTo(CjibfTable::class, 'meja_id');
    }
}
