<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;


class Pengumuman extends Model
{

    protected $table = 'pengumumans';
    public $timestamps = false;
    use Translatable;
    protected $translatable = ['judul_pengumuman', 'detail_pengumuman'];
}
