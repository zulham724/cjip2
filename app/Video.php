<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Traits\Translatable;


class Video extends Model
{
    protected $connection ='mysql';

    protected $table = 'videos';
    use Translatable;
    protected $translatable = ['judul'];
    public function save(array $options = [])
    {

            $this->kab_kota_id = Auth::user()->id;

        parent::save();
    }
}
