<?php

namespace App;

use CyrildeWit\EloquentViewable\Viewable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use CyrildeWit\EloquentViewable\Contracts\Viewable as ViewableContract;
use TCG\Voyager\Traits\Translatable;

class Perikanan extends Model implements ViewableContract
{
    use Searchable;

    use Viewable;
    protected $connection = 'mysql';

    protected $table = 'perikanans';

    public function satuanId(){
        return $this->belongsTo(Satuan::class);
    }

    public function potensiId(){
        return $this->belongsTo(JenisKomodita::class, 'komoditas_id');
    }

    public function userId(){
        return $this->belongsTo(\TCG\Voyager\Models\User::class, 'kab_kota_id');
    }

    public function views_count()
    {
        return $this->morphMany(
            \App\PageView::class,
            'viewable'
        );
    }

    /**
     * Get the total number of views.
     *
     * @return int
     */
    public function getViewsCount()
    {
        return $this->views_count()->count();
    }



}
