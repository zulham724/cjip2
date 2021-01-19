<?php

namespace App;

use CyrildeWit\EloquentViewable\Viewable;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Spatial;
use CyrildeWit\EloquentViewable\Contracts\Viewable as ViewableContract;
use TCG\Voyager\Traits\Translatable;

class Gass extends Model implements ViewableContract
{
    use Spatial;

    protected $spatial = ['coordinates'];

    use Viewable;

    use Translatable;

    protected $translatable = ['nama_jalur', 'keterangan'];

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
