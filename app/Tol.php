<?php

namespace App;

use CyrildeWit\EloquentViewable\Viewable;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Spatial;
use CyrildeWit\EloquentViewable\Contracts\Viewable as ViewableContract;
use TCG\Voyager\Traits\Translatable;

class Tol extends Model implements ViewableContract
{
    use Spatial;

    use Viewable;
    use Translatable;
    protected $translatable = ['nama_tol', 'keterangan', 'sumber_data'];
    protected $spatial = ['coordinates'];

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
