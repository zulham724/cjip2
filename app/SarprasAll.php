<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use CyrildeWit\EloquentViewable\Viewable;
use CyrildeWit\EloquentViewable\Contracts\Viewable as ViewableContract;
use TCG\Voyager\Traits\Translatable;

class SarprasAll extends Model
{
    use Searchable;

    use Viewable;
    protected $connection = 'mysql';

    protected $table = 'sarpras_alls';

    public $asYouType = true;

    public function userId(){
        return $this->belongsTo(\TCG\Voyager\Models\User::class, 'kab_kota_id');
    }

    public function searchableAs()
    {
        return 'sarpras_index';
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
