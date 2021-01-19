<?php

namespace App;

use CyrildeWit\EloquentViewable\Viewable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Laravel\Scout\Searchable;
use CyrildeWit\EloquentViewable\Contracts\Viewable as ViewableContract;
use TCG\Voyager\Traits\Spatial;
use TCG\Voyager\Traits\Translatable;

class Berita extends Model implements ViewableContract
{
    use Searchable;
    use Spatial;
    use Viewable;

    use Translatable;

    protected $table = 'beritas';

    protected $translatable = ['judul', 'isi_berita'];

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

    public function userId(){
        return $this->belongsTo(\TCG\Voyager\Models\User::class, 'user_id');
    }

    public function save(array $options = [])
    {

        $this->user_id = Auth::user()->id;

        parent::save();
    }
}
