<?php

namespace App;

use CyrildeWit\EloquentViewable\Viewable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use CyrildeWit\EloquentViewable\Contracts\Viewable as ViewableContract;
use TCG\Voyager\Traits\Translatable;

class Feed extends Model implements ViewableContract
{
    use Searchable;

    use Viewable;

    use Translatable;

    protected $connection = 'mysql';

    protected $table = 'feeds';

    public $asYouType = true;

    public function searchableAs()
    {
        return 'investasi_index';
    }

    public function perikanans(){
        return $this->belongsTo(Perikanan::class, 'feed_id');
    }
    public function perkebunans(){
        return $this->belongsTo(Perkebunan::class, 'feed_id');
    }
    public function pertanians(){
        return $this->belongsTo(Pertanian::class, 'feed_id');
    }
    public function peternakans(){
        return $this->belongsTo(Peternakan::class, 'feed_id');
    }
    public function pariwisatas(){
        return $this->belongsTo(Pariwisata::class, 'feed_id');
    }

    public function sektor(){
        return $this->belongsTo(Sektor::class, 'model_name', 'model');
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
