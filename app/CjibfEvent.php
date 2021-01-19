<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Spatial;

class CjibfEvent extends Model
{
    protected $table = 'cjibf_events';
    use Spatial;

    protected $spatial = ['maps'];
}
