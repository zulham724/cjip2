<?php

namespace App;

use CyrildeWit\EloquentViewable\Viewable;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Spatial;
use CyrildeWit\EloquentViewable\Contracts\Viewable as ViewableContract;
use TCG\Voyager\Traits\Translatable;

class Bank extends Model implements ViewableContract
{
    use Spatial;

    use Translatable;

    protected $translatable = ['nama_bank', 'keterangan', 'sumber_data'];

    protected $spatial = ['coordinates'];

    use Viewable;

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
