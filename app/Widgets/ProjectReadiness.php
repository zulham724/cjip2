<?php

namespace App\Widgets;

use App\CjibfInvestor;
use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;

class ProjectReadiness extends AbstractWidget
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
        $count = \App\Proyek::all()->count();
        //dd($count);
        $string = trans_choice('Total Projects', $count);
        //dd($string);
        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-group',
            'title'  => "Project's Readiness",
            'text'   => "Download Total Nilai Investasi Berdasarkan Kesiapan Proyek",
            'button' => [
                'text' => 'Download',
                'link' => route('rekap-project'),
            ],
            'image' => asset('images/widget/readiness.jpg'),
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return auth()->user()->hasRole(['admin', 'Kabid PDI', 'Promosi']);
    }
}
