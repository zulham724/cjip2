<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;


class JnsPeraturan extends Model
{
    use Translatable;

    protected $translatable = ['nama_peraturan'];
}
