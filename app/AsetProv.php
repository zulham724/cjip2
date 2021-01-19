<?php

namespace App;

use CyrildeWit\EloquentViewable\Viewable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use CyrildeWit\EloquentViewable\Contracts\Viewable as ViewableContract;
use TCG\Voyager\Traits\Translatable;

class AsetProv extends Model implements ViewableContract
{
    use Searchable;


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
