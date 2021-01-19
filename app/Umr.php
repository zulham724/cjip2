<?php

namespace App;

use CyrildeWit\EloquentViewable\Viewable;
use Illuminate\Database\Eloquent\Model;
use CyrildeWit\EloquentViewable\Contracts\Viewable as ViewableContract;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Traits\Translatable;

class Umr extends Model implements ViewableContract
{
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

    public function kab(){
        return $this->belongsTo(User::class, 'kab_kota_id');
    }

    public function kotas(){
        return $this->belongsToMany(KabKota::class, 'kabkota_user', 'user_id', 'kab_kota_id', 'kab_kota_id');
    }

    public function groupedKota()
    {
        return $this->kotas()->groupBy('nama')->get();
    }
    /*public function save(array $options = [])
    {

        $this->kab_kota_id = Auth::user()->id;

        parent::save();
    }*/
}
