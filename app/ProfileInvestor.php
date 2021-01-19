<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileInvestor extends Model
{
    protected $table = 'profile_investors';

    protected $connection = 'mysql';

    protected $fillable = [
        'user_id',
        'investor_name',
        'jabatan',
        'phone',
        'nama_perusahaan',
        'bidang_usaha',
        'alamat',
        'country',
        'badan_hukum'
    ];

    public function userInv(){
        return $this->belongsTo(UserInvestor::class, 'user_id');
    }

    public function sektors(){
        return $this->belongsTo(CjibfInvestor::class, 'id', 'profile_id');
    }
}
