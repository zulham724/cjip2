<?php

namespace App;

use CyrildeWit\EloquentViewable\Viewable;
use Illuminate\Database\Eloquent\Model;
use CyrildeWit\EloquentViewable\Contracts\Viewable as ViewableContract;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Traits\Translatable;

class Umkm extends Model implements ViewableContract
{
    use Viewable;
    use Translatable;
    protected $translatable = ['nama_perusahaan', 'jns_usaha'];
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

    public function save(array $options = [])
    {

        $this->kab_kota_id = Auth::user()->id;

        parent::save();
    }
}
