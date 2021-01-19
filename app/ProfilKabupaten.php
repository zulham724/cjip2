<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;


class ProfilKabupaten extends Model
{
    public function kabkota(){
        return $this->belongsTo(User::class, 'kab_kota_id');
    }
   protected $table = 'profil_kabupatens';

    use Translatable;

    protected $translatable = [
        'profil',
        'infrasturktur',
        'desc_profil',
        'luas',
        'jarak_ke_smg',
        'rtrw',
        'grdp',
        'pert_ekonomi',
        'inflasi',
        'populasi',
        'angk_kerja',
        'umr',
        'komp_usia',
    ];
}
