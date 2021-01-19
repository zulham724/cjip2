<?php

namespace App\Models\UMKM;

use Illuminate\Database\Eloquent\Model;

class Kbli extends Model
{
    protected $table = 'kblis';

    protected $fillable = [
      'kelompok',
      'judul_kelompok',
      'desk_kelompok',
    ];
}
