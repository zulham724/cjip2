<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;


class JenisKomodita extends Model
{
    use Translatable;

    protected $translatable = ['jenis_komoditas'];
}
