<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class CjibfTable extends Model
{
    protected $table = 'cjibf_tables';

    public $timestamps = false;

    public function jenis(){
        return $this->belongsTo(CjibfJenismeja::class, 'jenis_meja');
    }

    public function kursi(){
        return $this->belongsTo(CjibfChair::class, 'id', 'meja_id');
    }

    public function userId(){
        return $this->belongsTo(\TCG\Voyager\Models\User::class, 'kabkota_id');
    }
}
