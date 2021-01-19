<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;


class VideoProv extends Model
{
    use Translatable;
    protected $translatable = ['judul'];
}
