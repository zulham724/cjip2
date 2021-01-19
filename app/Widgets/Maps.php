<?php

namespace App\Widgets;

use App\CjibfInvestor;
use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;

class Maps extends AbstractWidget
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
        //dd($count);
        $string = 'Sebaran Peluang Investasi';
        //dd($string);
        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-group',
            'title'  => "Peta Investasi Jawa Tengah",
            'text'   => 'Peta Sebaran Peluang Investasi Jawa Tengah',
            'button' => [
                'text' => "Go to MAPS",
                'link' => route('map.baru'),
            ],
            'image' => asset('images/widget/lokasi.jpg'),
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return auth()->user()->hasRole(['admin', 'Kabid PDI', 'Promosi', 'Gubernur Jawa Tengah', 'Kabid PDI']);
    }
}
