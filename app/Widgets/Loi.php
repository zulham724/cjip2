<?php

namespace App\Widgets;

use App\Lois;
use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;

class Loi extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        if (Auth::user()->hasRole('kab')){
            $count = Lois::where('kab_kota_id', Auth::user()->id)->count();
            $string = trans_choice('LoI', $count);
        }
        else{
            $count = Lois::all()->count();
            $string = trans_choice('LoI', $count);
        }


        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-group',
            'title'  => "{$count} {$string}",
            'text'   => __('voyager::dimmer.user_text', ['count' => $count, 'string' => Str::lower($string)]),
            'button' => [
                'text' => __('voyager::dimmer.user_link_text'),
                'link' => route('voyager.lois.index'),
            ],
            'image' => asset('images/widget/loi.jpg'),
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return auth()->user()->hasRole(['admin', 'kab', 'Promosi']);
    }
}
