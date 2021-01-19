<?php

namespace App\Widgets;

use App\ProfileInvestor;
use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;

class Download extends AbstractWidget
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
        $count = ProfileInvestor::all()->count();

        $string = trans_choice('Investor Profile', $count);

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-group',
            'title'  => "LoI CJIBF 2019",
            'text'   => "Download Panduan Teknis Pelaksanaan One on One Meeting",
            'button' => [
                'text' => 'Download',
                'link' => 'http://cjip.jatengprov.go.id/storage/Buku%20Panduan/Panduan%20LoI%20CJIBF.pdf',
            ],
            'image' => voyager_asset('images/widget-backgrounds/03.jpg'),
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return auth()->user()->hasRole(['admin', 'kab', 'Promosi', 'Renbang', 'Kabid PDI', 'LO']);
    }
}
