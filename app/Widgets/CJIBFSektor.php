<?php

namespace App\Widgets;

use App\CjibfInvestor;
use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;

class CJIBFSektor extends AbstractWidget
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
        $count = \App\CjibfInvestor::all()->count();
        //dd($count);
        $string = trans_choice('User Investor', $count);
        //dd($string);
        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-group',
            'title'  => "Sektor",
            'text'   => __('voyager::dimmer.user_text', ['count' => $count, 'string' => Str::lower($string)]),
            'button' => [
                'text' => 'Rekap Peserta CJIBF 2019 berdasarkan Sektor',
                'link' => route('rekap-sektor'),
            ],
            'image' => asset('images/widget/sektor.jpg'),
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return auth()->user()->hasRole(['admin', 'Kabid PDI']);
    }
}
