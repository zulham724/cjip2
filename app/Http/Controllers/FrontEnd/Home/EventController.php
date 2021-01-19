<?php

namespace App\Http\Controllers\FrontEnd\Home;

use App\CjibfCp;
use App\CjibfEvent;
use App\DisplaySector;
use App\TalkshowSpeaker;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\TwitterCard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use TCG\Voyager\Facades\Voyager;

class EventController extends Controller
{
    public function event(){

        $setting = CjibfEvent::first();
        $sectors = DisplaySector::all();
        $talkshows = TalkshowSpeaker::all();
        $cps = CjibfCp::all();

        SEOTools::setTitle('CJIBF & CJIBE 2019 - Central Java Investment Platform');
        SEOTools::setDescription($setting->keterangan);
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::addImages(Voyager::image($setting->logo));
        SEOTools::setCanonical(url()->current());
        SEOTools::opengraph()->addProperty('type', 'website')->setSiteName('Central Java Investment Platform')->setDescription($setting->keterangan);
        SEOTools::jsonLd()->addImage(Voyager::image($setting->logo))->setUrl(url()->current())->setDescription($setting->keterangan);

        TwitterCard::addValue('card', Voyager::image(setting('site.logo')))
            ->setType('summary_large_image')
            ->setImage(Voyager::image(setting('site.logo')))
            ->setTitle('CJIBF & CJIBE 2019 - Central Java Investment Platform')
            ->setDescription($setting->keterangan)
            ->setUrl(url()->current())
            ->setSite('@DPMPTSPJateng');

        SEOMeta::addKeyword('cjibf, cjibf 2019, cjibe, cjibe 2019, masuk, daftar, investasi, jawa tengah, investasi, investment, indonesia, FDI indonesia, industrial park, indonesia investment, central java, invest central java');

        return view('front-end.event.event', compact('setting', 'sectors', 'talkshows', 'cps'));
    }
}
