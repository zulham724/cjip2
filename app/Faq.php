<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;


class Faq extends Model
{
    use Translatable;

    protected $translatable = [
        'question',
        'answer',
    ];

    public $timestamps = false;

    public function jenis(){
        return $this->belongsTo(JenisFaq::class, 'jenis_faq');
    }
}
