<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;


class Potensi extends Model
{
    use Translatable;
    protected $translatable = ['nama_potensi'];
}
