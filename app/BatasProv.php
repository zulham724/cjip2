<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;


class BatasProv extends Model
{
    use Translatable;

    protected $translatable = ['batas_wilayah', 'sumber_data'];
}
