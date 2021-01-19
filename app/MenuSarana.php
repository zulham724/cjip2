<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;


class MenuSarana extends Model
{
    protected $connection = 'mysql';
    use Translatable;
    protected $translatable = ['nama'];
    protected $table = 'menusaranas';
}
