<?php

namespace App\Widgets;

use App\CjibfInvestor;
use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;

class RekapLoi extends AbstractWidget
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
        $string = 'Peserta CJIBF 2019';
        //dd($string);
        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-group',
            'title'  => "CJIBF 2019",
            'text'   => 'Download Rekap Hasil LoI CJIBF 2019',
            'button' => [
                'text' => "Rekap Loi",
                'link' => route('rekap-loi'),
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
        return auth()->user()->hasRole(['admin', 'Kabid PDI', 'Promosi', 'Gubernur Jawa Tengah', 'Kabid PDI']);
    }
}
