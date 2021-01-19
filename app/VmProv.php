<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;


class VmProv extends Model
{
    use Translatable;
    protected $translatable = ['visi_misi', 'program_unggulan'];
}
