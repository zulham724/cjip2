<?php

namespace App;

use CyrildeWit\EloquentViewable\Viewable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use TCG\Voyager\Traits\Resizable;
use TCG\Voyager\Traits\Spatial;
use CyrildeWit\EloquentViewable\Contracts\Viewable as ViewableContract;
use TCG\Voyager\Traits\Translatable;

class Pariwisata extends Model implements ViewableContract
{
    use Searchable;

    use Spatial;

    use Viewable;

    use Translatable;
    protected $translatable = ['nama_wisata', 'lokasi', 'sarpras', 'keterangan', 'sumber_data'];
    protected $spatial = ['coordinate'];

    public function userId(){
        return $this->belongsTo(\TCG\Voyager\Models\User::class, 'kab_kota_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
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
