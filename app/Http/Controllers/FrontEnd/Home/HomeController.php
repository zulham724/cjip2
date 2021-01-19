<?php

namespace App\Http\Controllers\Frontend\Home;

use App\Award;
use App\Berita;
use App\BiayaAir;
use App\BiayaListrik;
use App\CjibfEvent;
use App\CjibfInvestor;
use App\CjibfSektor;
use App\Events\FeedAction;
use App\Faq;
use App\Feed;
use App\InfrastrukturPendukung;
use App\JenisFaq;
use App\JenisKatUserAir;
use App\KabkotaUserModel;
use App\LoiInterest;
use App\Pariwisata;
use App\Perikanan;
use App\Perkebunan;
use App\Pertanian;
use App\PertumbuhanEkonomi;
use App\Peternakan;
use App\ProfileInvestor;
use App\ProfilKabupaten;
use App\Proyek;
use App\Umr;
use App\User;
use App\UserInvestor;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\TwitterCard;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;
use GuzzleHttp\Client;
use Hashids\Hashids;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function Symfony\Component\Debug\Tests\testHeader;
use TCG\Voyager\Facades\Voyager;

class HomeController extends Controller
{
    public function home(){



        //$cjibf = CjibfInvestor::where('meja_id', 'G3')->get();
        //dd($cjibf);
        SEOTools::setTitle('Home - Central Java Investment Bussiness Platform');
        SEOTools::setDescription(Voyager::setting('site.ket_why'));
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::setCanonical(url()->current());
        SEOTools::addImages(Voyager::image(setting('site.bg_why')));
        SEOTools::opengraph()->addProperty('type', 'website')->setSiteName('Central Java Investment Platform')->setDescription(Voyager::setting('site.ket_why'));
        SEOTools::jsonLd()->addImage('https://cjip.jatengprov.go.id/storage/settings/August2019/esr0C8HmQss78AAnlaue.png')->setUrl(url()->current())->setDescription(Voyager::setting('site.ket_why'));

        TwitterCard::addValue('card', Voyager::image(setting('site.bg_why')))
            ->setType('summary_large_image')
            ->setImage(Voyager::image(setting('site.bg_why')))
            ->setTitle('Central Java Investment Platform')
            ->setDescription(Voyager::setting('site.ket_why'))
            ->setUrl(url()->current())
            ->setSite('@DPMPTSPJateng');

        SEOMeta::addKeyword('jawa tengah, investasi, investment, indonesia, FDI indonesia, industrial park, indonesia investment, central java, invest central java');

        $test = Proyek::where('status', 1)->get();
        //dd($test);
        foreach ($test as $t){

            $total[] = (int)str_replace(['Rp', '.', ',', '%', ': Dairy goat cultivation area Rp 97.213.602.800 and Goat milk processing factory Rp 62.762.973.308', 'Total ', ' (22% Pemerintah Kota, 38% Swasta, 40% CSR)'], '', $t->nilai_investasi);

        }
        //dd(array_sum($total));

        $mapsKey = 'AIzaSyBGsawbqVs083lGEe8cilVz0FqO0rHt5ZE&amp';
        $feeds = Feed::orderByViews()->paginate(8);
        $populers = Feed::orderByViews()->take(5)->get();
        $news = Berita::take(5)->get();

        $ekonomis = PertumbuhanEkonomi::where('status', 1)->get();
        $awards = Award::all();
        $infrastrukturs = InfrastrukturPendukung::all();
        $umks = Umr::all()->groupBy(['kab_kota_id', 'tahun']);
        $min = Umr::min('nilai_umr');
        $max = Umr::max('nilai_umr');
        $min_umk = Umr::where('nilai_umr', $min)->where('tahun', '2020')->first();
        $max_umk = Umr::where('nilai_umr', $max)->where('tahun', '2020')->first();
        //dd($min_umk->kab->kota->kabkota->nama);


        //dd($hashed);
        $user = User::all();
        //dd($user);
        //dd($umks->toJson());
        foreach ($umks as $key1 => $umk){
            //dd($key1);
            //dd(count($umk));
            $kota = User::where('id', $key1)->first();
            //dd($kota->kota->kabkota->nama);
            //dd($umk);
        }
        $listriks = BiayaListrik::all();
        $airs = JenisKatUserAir::all();
        $alphabet = range('A', 'Z');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, 'http://sijablayv2.dpmptsp.jatengprov.go.id/api/realisasi');
        $result = curl_exec($ch);
        curl_close($ch);
        $obj = json_decode($result);
        //dd(json_encode($obj));


        if (Auth::guard('investor')->check()){
            $registered = ProfileInvestor::where('user_id',Auth::guard('investor')->user()->id)->first();
            $intersts = LoiInterest::where('user_id', Auth::guard('investor')->user()->id)->get();
            //dd($registered);
            if (is_null($registered)){
                return redirect()->route('form.profile', Auth::guard('investor')->user()->id );
            }
            elseif (isset($intersts)){
                return view('front-end.new-home', compact('mapsKey', 'min_umk','max_umk','alphabet','obj','feeds', 'intersts', 'populers', 'news' , 'ekonomis', 'awards', 'infrastrukturs', 'umks', 'listriks', 'airs', 'user'));
            }
            else{
                return view('front-end.new-home', compact('mapsKey', 'min_umk','max_umk','alphabet','feeds','obj',  'populers', 'news' , 'ekonomis', 'awards', 'infrastrukturs', 'umks', 'listriks', 'airs', 'user'));

            }
        }
        else{
            return view('front-end.new-home', compact(
                'mapsKey', 'min_umk','max_umk','feeds', 'populers', 'news', 'ekonomis', 'awards','alphabet','obj', 'infrastrukturs', 'umks', 'listriks', 'airs', 'user'));
        }

    }

    public function likes(Request $request, $id)
    {
        $action = $request->get('action');
        switch ($action) {
            case 'Like':
                Feed::where('id', $id)->increment('likes_count');
                break;
            case 'Unlike':
                Feed::where('id', $id)->decrement('likes_count');
                break;
        }
        event(new FeedAction($id, $action));
        return '';
    }

    public function sidebar(){
        $intersts = LoiInterest::all();
        $populers = Feed::orderByViews()->take(5)->get();
        $news = Berita::take(5)->get();

        return view('front-end.sidebar', compact('intersts', 'populers', 'news'));
    }

    public function readyToOffer(){
        SEOTools::setTitle('Ready to Offer - Central Java Investment Platform');
        SEOTools::setDescription(substr(Voyager::setting('site.ket_rto'), 0, 155));
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::setCanonical(url()->current());
        SEOTools::addImages(Voyager::image(setting('site.bg_why')));
        SEOTools::opengraph()->addProperty('type', 'website')->setSiteName('Central Java Investment Platform')->setDescription(substr(Voyager::setting('site.ket_rto'), 0, 155));
        SEOTools::jsonLd()->addImage(Voyager::image(setting('site.bg_rto')))->setUrl(url()->current())->setDescription(substr(Voyager::setting('site.ket_rto'), 0, 155));

        TwitterCard::addValue('card', Voyager::image(setting('site.bg_why')))
            ->setType('summary_large_image')
            ->setImage(Voyager::image(setting('site.bg_why')))
            ->setTitle('Ready to Offer Projects Central Java Investment Platform')
            ->setDescription(substr(Voyager::setting('site.ket_rto'), 0, 155))
            ->setUrl(url()->current())
            ->setSite('@DPMPTSPJateng');
        SEOMeta::addKeyword('jawa tengah, investasi, investment, indonesia, FDI indonesia, industrial park, indonesia investment, central java, invest central java');

        $proyeks = Proyek::whereHas('marketplace', function ($query) {
            $query->where('name', '=', 'Ready to Offer');
        })->where('status', 1)->paginate(5);
        //dd($proyeks);
        //dd($proyeks->load('translations'));
        if (($isModelTranslatable = is_bread_translatable($proyeks))) {
            $proyeks->load('translations');
        }

        return view('front-end.marketplace.ready-to-offer', compact('proyeks', 'isModelTranslatable'));
        //$proyeks = Proyek::with('marketplace');
    }

    public function detailRto($id, $slug){

        $proyek = Proyek::findOrFail($id);
        $mapsKey = 'AIzaSyBGsawbqVs083lGEe8cilVz0FqO0rHt5ZE&amp';
        /* $proyek*/
        $images = json_decode($proyek->fotos);
        SEOTools::setTitle('Ready to Offer -'.$proyek->translate('en')->project_name);
        SEOTools::setDescription('Investment projects that are ready to be offered in the '.$proyek->bySector->name. ' sector in the city of '.$proyek->byUser->namakota[0]->nama.', Central Java, Indonesia');
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::addImages(Voyager::image($images[0]));
        SEOTools::setCanonical(url()->current());
        SEOTools::opengraph()->addProperty('type', 'articles')->setSiteName('Central Java Investment Platform')->setDescription('Investment projects that are ready to be offered in the '.$proyek->bySector->name. ' sector in the city of '.$proyek->byUser->namakota[0]->nama.', Central Java, Indonesia');
        SEOTools::twitter()->setSite('@DPMPTSPJateng')->setImages(Voyager::image($images[0]))->setDescription('Investment projects that are ready to be offered in the '.$proyek->bySector->name. ' sector in the city of '.$proyek->byUser->namakota[0]->nama.', Central Java, Indonesia');
        SEOTools::jsonLd()->addImage(Voyager::image($images[0]))->setUrl(url()->current())->setDescription('Investment projects that are ready to be offered in the '.$proyek->bySector->name. ' sector in the city of '.$proyek->byUser->namakota[0]->nama.', Central Java, Indonesia');

        TwitterCard::addValue('card', Voyager::image($images[0]))
            ->setType('summary_large_image')
            ->setImage(Voyager::image($images[0]))
            ->setTitle('Ready to Offered -'.$proyek->translate('en')->project_name.' - '.$proyek->project_name)
            ->setDescription('Investment projects that are ready to be offered in the '.$proyek->bySector->name. ' sector in the city of '.$proyek->byUser->namakota[0]->nama.', Central Java, Indonesia')
            ->setUrl(url()->current())
            ->setSite('@DPMPTSPJateng');
        return view('front-end.marketplace.detail.rto', compact('proyek', 'mapsKey'));

    }

    public function prospectiveProject(){
        $proyeks = Proyek::whereHas('marketplace', function ($query) {
            $query->where('name', '=', 'Prospective Project');
        })->where('status', 1)->paginate(5);
        SEOTools::setTitle('Prospective Projects - Central Java Investment Platform');
        SEOTools::setDescription(substr(Voyager::setting('site.ket_pros'), 0, 155));
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::addImages(Voyager::image(setting('site.bg_why')));
        SEOTools::setCanonical(url()->current());
        SEOTools::opengraph()->addProperty('type', 'articles')->setSiteName('Prospective Projects - Central Java Investment Platform')->setDescription(substr(Voyager::setting('site.ket_pros'), 0, 155));
        SEOTools::jsonLd()->addImage(Voyager::image(setting('site.bg_pros')))->setUrl(url()->current())->setDescription(substr(Voyager::setting('site.ket_pros'), 0, 155));

        TwitterCard::addValue('card', substr(Voyager::setting('site.ket_pros'), 0, 155))
            ->setType('summary_large_image')
            ->setImage(Voyager::image(setting('site.bg_why')))
            ->setTitle('Prospective Projects - Central Java Investment Platform')
            ->setDescription(Voyager::setting('site.ket_pros'))
            ->setUrl(url()->current())
            ->setSite('@DPMPTSPJateng');


        //dd($proyeks);
        //$proyeks = Proyek::with('marketplace');
        return view('front-end.marketplace.prospective', compact('proyeks'));
    }

    public function detailPros($id, $slug){
        $proyek = Proyek::findOrFail($id);
        $images = json_decode($proyek->fotos);
        $mapsKey = 'AIzaSyBGsawbqVs083lGEe8cilVz0FqO0rHt5ZE&amp';
        SEOTools::setTitle('Prospective -'.$proyek->translate('en')->project_name);
        SEOTools::setDescription('A Prospective Investment Project in the '.$proyek->bySector->name. ' sector in the city of '.$proyek->byUser->namakota[0]->nama.', Central Java, Indonesia');
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::addImages(Voyager::image($images[0]));
        SEOTools::setCanonical(url()->current());
        SEOTools::opengraph()->addProperty('type', 'articles')->setSiteName('Central Java Investment Platform')->setDescription('A Prospective Investment Project in the '.$proyek->bySector->name. ' sector in the city of '.$proyek->byUser->namakota[0]->nama.', Central Java, Indonesia');
        SEOTools::jsonLd()->addImage(Voyager::image($images[0]))->setUrl(url()->current())->setDescription('A Prospective Investment Project in the '.$proyek->bySector->name. ' sector in the city of '.$proyek->byUser->namakota[0]->nama.', Central Java, Indonesia');

        TwitterCard::addValue('card', Voyager::image(setting('site.bg_why')))
            ->setType('summary_large_image')
            ->setImage(Voyager::image(setting('site.bg_why')))
            ->setTitle('Prospective Projects Central Java Investment Platform')
            ->setDescription('A Prospective Investment Project in the '.$proyek->bySector->name. ' sector in the city of '.$proyek->byUser->namakota[0]->nama.', Central Java, Indonesia')
            ->setUrl(url()->current())
            ->setSite('@DPMPTSPJateng');

        return view('front-end.marketplace.detail.pros', compact('proyek', 'mapsKey'));
    }

    public function potentialProject(){
        SEOTools::setTitle('Potential Projects - Central Java Investment Platform');
        SEOTools::setDescription(substr(Voyager::setting('site.ket_pot'), 0, 155));
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::addImages(Voyager::image(setting('site.bg_why')));
        SEOTools::setCanonical(url()->current());
        SEOTools::opengraph()->addProperty('type', 'articles')->setSiteName('Central Java Investment Platform')->setDescription(substr(Voyager::setting('site.ket_pot'), 0, 155));
        SEOTools::jsonLd()->addImage(Voyager::image(setting('site.bg_why')))->setUrl(url()->current())->setDescription(substr(Voyager::setting('site.ket_pot'), 0, 155));

        TwitterCard::addValue('card', Voyager::image(setting('site.bg_pot')))
            ->setType('summary_large_image')
            ->setImage(Voyager::image(setting('site.bg_why')))
            ->setTitle('Potential Projects - Central Java Investment Platform')
            ->setDescription(substr(Voyager::setting('site.ket_pot'), 0, 155))
            ->setUrl(url()->current())
            ->setSite('@DPMPTSPJateng');


        $proyeks = Proyek::whereHas('marketplace', function ($query) {
            $query->where('name', '=', 'Potential Project');
        })->where('status', 1)->paginate(5);
        //dd($proyeks);
        //$proyeks = Proyek::with('marketplace');
        return view('front-end.marketplace.potentials', compact('proyeks'));
    }

    public function detailPot($id, $slug){
        $proyek = Proyek::findOrFail($id);
        $mapsKey = 'AIzaSyBGsawbqVs083lGEe8cilVz0FqO0rHt5ZE&amp';
        $images = json_decode($proyek->fotos);

        SEOTools::setTitle('Potential -'.$proyek->translate('en')->project_name);
        SEOTools::setDescription('A Potential Investment Project in the '.$proyek->bySector->name. ' sector in the city of '.$proyek->byUser->namakota[0]->nama.', Central Java, Indonesia');
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::addImages(Voyager::image($images[0]));
        SEOTools::setCanonical(url()->current());
        SEOTools::opengraph()->addProperty('type', 'articles')->setSiteName('Central Java Investment Platform')->setDescription('A Potential Investment Project in the '.$proyek->bySector->name. ' sector in the city of '.$proyek->byUser->namakota[0]->nama.', Central Java, Indonesia');
        SEOTools::jsonLd()->addImage(Voyager::image($images[0]))->setUrl(url()->current())->setDescription('A Potential Investment Project in the '.$proyek->bySector->name. ' sector in the city of '.$proyek->byUser->namakota[0]->nama.', Central Java, Indonesia');

        TwitterCard::addValue('card', Voyager::image(setting('site.bg_pros')))
            ->setType('summary_large_image')
            ->setImage(Voyager::image(setting('site.bg_pros')))
            ->setTitle('Potential -'.$proyek->translate('en')->project_name)
            ->setDescription('A Potential Investment Project in the '.$proyek->bySector->name. ' sector in the city of '.$proyek->byUser->namakota[0]->nama.', Central Java, Indonesia')
            ->setUrl(url()->current())
            ->setSite('@DPMPTSPJateng');


        return view('front-end.marketplace.detail.pot', compact('proyek', 'mapsKey'));
    }

    public function detailProyek($id){
        $proyek = Proyek::findOrFail($id);
        $mapsKey = 'AIzaSyBGsawbqVs083lGEe8cilVz0FqO0rHt5ZE&amp';
        $images = json_decode($proyek->fotos);

        SEOTools::setTitle('Investment Project Detail - Central Java Investment Platform');
        SEOTools::setDescription('All Detail about investment on '.$proyek->translate('en')->project_name);
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::setCanonical(url()->current());
        SEOTools::opengraph()->addProperty('type', 'articles')->setSiteName('Investment Project Detail - Central Java Investment Platform')->setDescription('All Detail about investment on '.$proyek->translate('en')->project_name);
        SEOTools::jsonLd()->addImage(Voyager::image($images[0]))->setUrl(url()->current())->setDescription('All Detail about investment on '.$proyek->translate('en')->project_name);
        TwitterCard::addValue('card', Voyager::image(setting('site.bg_why')))
            ->setType('summary_large_image')
            ->setImage(Voyager::image(setting('site.bg_why')))
            ->setTitle('Investment Project Detail - Central Java Investment Platform')
            ->setDescription('All Detail about investment on '.$proyek->translate('en')->project_name)
            ->setUrl(url()->current())
            ->setSite('@DPMPTSPJateng');

        return view('front-end.marketplace.detail.detailproyek', compact('proyek', 'mapsKey'));
    }

    public function detailProfile($id, $slug){
        $profil = ProfilKabupaten::findOrFail($id);
        $mapsKey = 'AIzaSyBGsawbqVs083lGEe8cilVz0FqO0rHt5ZE&amp';
        SEOTools::setTitle($profil->profil.' - Central Java Investment Platform');
        SEOTools::setDescription('A collection of Investment Project in the '.$profil->translate('en')->profil.'on Central Java Investment Platform');
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::setCanonical(url()->current());
        SEOTools::opengraph()->addProperty('type', 'articles')->setSiteName('Central Java Investment Platform')->setDescription('A collection of Investment Project in the '.$profil->translate('en')->profil.'on Central Java Investment Platform');
        SEOTools::jsonLd()->addImage('https://cjip.jatengprov.go.id/storage/settings/August2019/esr0C8HmQss78AAnlaue.png')->setUrl(url()->current())->setDescription('A collection of Investment Project in the '.$profil->translate('en')->profil.'on Central Java Investment Platform');
        TwitterCard::addValue('card', Voyager::image(setting('site.bg_why')))
            ->setType('summary_large_image')
            ->setImage(Voyager::image(setting('site.bg_why')))
            ->setTitle($profil->profil.' - Central Java Investment Platform')
            ->setDescription('A collection of Investment Project in the '.$profil->translate('en')->profil.'on Central Java Investment Platform')
            ->setUrl(url()->current())
            ->setSite('@DPMPTSPJateng');

        return view('front-end.marketplace.detail.profil', compact('profil', 'mapsKey'));
    }

    public function faq(){
        SEOTools::setTitle('FAQ - Central Java Investment Platform');
        SEOTools::setDescription('Frequently Asked Question about investment in Central Java - Pertanyaan yang sering muncul ketika Anda ingin berinvestasi di Provinsi Jawa Tengah');
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::setCanonical(url()->current());
        SEOTools::addImages(Voyager::image(setting('site.bg_why')));
        SEOTools::opengraph()->addProperty('type', 'articles')->setSiteName('Central Java Investment Platform')->setDescription('Frequently Asked Question about investment in Central Java - Pertanyaan yang sering muncul ketika Anda ingin berinvestasi di Provinsi Jawa Tengah');
        SEOTools::jsonLd()->addImage(Voyager::image(setting('site.bg_why')))->setUrl(url()->current())->setDescription('Frequently Asked Question about investment in Central Java - Pertanyaan yang sering muncul ketika Anda ingin berinvestasi di Provinsi Jawa Tengah');

        TwitterCard::addValue('card', Voyager::image(setting('site.bg_why')))
            ->setType('summary_large_image')
            ->setImage(Voyager::image(setting('site.bg_why')))
            ->setTitle('FAQ - Central Java Investment Platform')
            ->setDescription('Frequently Asked Question about investment in Central Java - Pertanyaan yang sering muncul ketika Anda ingin berinvestasi di Provinsi Jawa Tengah')
            ->setUrl(url()->current())
            ->setSite('@DPMPTSPJateng');

        $faqs = Faq::all()->groupBy('jenis_faq');
        //dd($faqs);
        foreach ($faqs as $key => $faq){
            //dd($key);
        }
        $jns_faq = JenisFaq::all();
        //dd($proyeks);
        //$proyeks = Proyek::with('marketplace');
        return view('front-end.faq', compact('faqs', 'jns_faq'));
    }

    public function checkEmail(Request $request){
        $email = $request->input('email');
        $isExists = UserInvestor::where('email',$email)->first();
        //dd($isExists);
        if($isExists){
            return response()->json(array("exists" => true));
        }else{
            return response()->json(array("exists" => false));
        }
    }

    public function bySector($slug){
        //dd($slug);

        $proyeks = Proyek::whereHas('bySector', function ($query) use ($slug) {
            //dd($slug);
            $query->where('name', '=', $slug);
        })->where('status', 1)->paginate(5);


        SEOTools::setTitle($slug.' Sector'.' on Central Java Investment Platform');
        SEOTools::setDescription('A Collection of Investment Project in the sector '.$slug.' to be Offered in Central Java, Indonesia');
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::setCanonical(url()->current());
        SEOTools::addImages(Voyager::image(setting('site.bg_why')));
        SEOTools::opengraph()->addProperty('type', 'articles')->setSiteName('Central Java Investment Platform')->setDescription('A Collection of Investment Project in the sector '.$slug.' to be Offered in Central Java, Indonesia');
        SEOTools::jsonLd()->addImage(Voyager::image(setting('site.bg_why')))->setUrl(url()->current())->setDescription('A Collection of Investment Project in the sector '.$slug.' to be Offered in Central Java, Indonesia');

        TwitterCard::addValue('card', Voyager::image(setting('site.bg_why')))
            ->setType('summary_large_image')
            ->setImage(Voyager::image(setting('site.bg_why')))
            ->setTitle($slug.' Sector'.' on Central Java Investment Platform')
            ->setDescription('A Collection of Investment Project in the sector '.$slug.' to be Offered in Central Java, Indonesia')
            ->setUrl(url()->current())
            ->setSite('@DPMPTSPJateng');

        //dd($proyeks);
        return view('front-end.marketplace.bysector', compact('proyeks', 'slug'));
    }
    public function byCity($id){
        //dd($slug);

        $kabId = KabkotaUserModel::where('kab_kota_id', $id)->first();
        //dd($kabId);
        $userId = $kabId->user_id;
        //dd($userId);
        $user = User::findOrFail($userId);
        $proyeks = Proyek::whereHas('byUser', function ($query) use ($userId) {
            //dd($slug);
            $query->where('id', '=', $userId);
        })->where('status', 1)->get();
        //dd($proyeks);

        foreach ($proyeks as $proyek){
            $image = json_decode($proyek->fotos);
            //dd($proyek->bySector);
        }
        SEOTools::setTitle('All Investment Project in '.$user->name.' - Central Java Investment Plaftform');
        SEOTools::setDescription('A Collection of Investment Project Offered in Central Java Investment Platform in the City/Regency '.$user->name);
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::setCanonical(url()->current());
        SEOTools::addImages(Voyager::image(setting('site.bg_why')));
        SEOTools::opengraph()->addProperty('type', 'articles')->setSiteName('Central Java Investment Platform')->setDescription('All Investment Project in '.$user->name.' - Central Java Investment Plaftform');
        SEOTools::jsonLd()->addImage(Voyager::image(setting('site.bg_why')))->setUrl(url()->current())->setDescription('A Collection of Investment Project Offered in Central Java Investment Platform in the City/Regency '.$user->name);

        TwitterCard::addValue('card', Voyager::image(setting('site.bg_why')))
            ->setType('summary_large_image')
            ->setImage(Voyager::image(setting('site.bg_why')))
            ->setTitle('All Investment Project in '.$user->name.' - Central Java Investment Plaftform')
            ->setDescription('A Collection of Investment Project Offered in Central Java Investment Platform in the City/Regency '.$user->name)
            ->setUrl(url()->current())
            ->setSite('@DPMPTSPJateng');


        return view('front-end.marketplace.detail.proyek', compact('proyeks'));
    }
    public function findBySector($id){
        $user = Auth::guard('investor')->user()->id;
        $profile = ProfileInvestor::where('user_id', $user)->first();
        $proyeks = Proyek::where('sektor_id', $id)->where('status', 1)->get();
        //dd($proyeks);
        foreach ($proyeks as $proyek){
            //dd($proyek->bySector);
        }
        //dd($proyeks[0]->byUser->namakota);

        return view('front-end.marketplace.detail.proyek', compact('proyeks', 'profile'));
    }
    public function findInterestBySector($id){
        $user = Auth::guard('investor')->user()->id;
        $profile = ProfileInvestor::where('user_id', $user)->first();
        $proyeks = Proyek::where('sektor_id', $id)->where('status', 1)->get();
        //dd($proyeks);
        foreach ($proyeks as $proyek){
            //dd($proyek->bySector);
        }
        //dd($proyeks[0]->byUser->namakota);

        return view('front-end.investor.content.interest', compact('proyeks', 'profile'));
    }

    public function maps(){
        $proyeks = Proyek::where('status', 1)->get();

        foreach ($proyeks as $proyek){
            $images = json_decode($proyek->fotos);
            //dd($images[0]);
        }
        SEOTools::setTitle('Central Java Investment by Location');
        SEOTools::setDescription('Discover Central Java Investment on Maps');
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::setCanonical(url()->current());
        SEOTools::addImages(Voyager::image(setting('site.bg_why')));
        SEOTools::opengraph()->addProperty('type', 'website')->setSiteName('Central Java Investment Platform')->setDescription('Discover all Central Java Investment Projects using Maps, Temukan semua projek investasi Jawa Tengah melalui peta');
        SEOTools::twitter()->setSite('@DPMPTSPJateng')->setImages(Voyager::image(setting('site.bg_why')))->setDescription('Discover all Central Java Investment Projects using Maps, Temukan semua projek investasi Jawa Tengah melalui peta');
        SEOTools::jsonLd()->addImage(Voyager::image(setting('site.bg_why')))->setUrl(url()->current())->setDescription('Discover all Central Java Investment Projects using Maps, Temukan semua projek investasi Jawa Tengah melalui peta');


        //dd(asText($proyek->location));

        Mapper::location('Central Java')->map(['zoom' => 8, 'center' => true, 'marker' => false, 'type' => 'ROAD']);

        foreach ($proyeks as $proyek){
            $images = json_decode($proyek->fotos);
            //dd($images[0]);
            //dd(json_encode($proyek->getCoordinates()));
            //dump($images);
            $array = $proyek->getCoordinates();
            //dd((float)$array[0]['lat']);

            if ($proyek->marketplace->name == 'Ready to Offer'){
                Mapper::informationWindow((float)$array[0]['lat'], (float)$array[0]['lng'], '<div id="iw-container">'.
                    '<div class="iw-title">'.$proyek->marketplace->name.'</div>'.
                    '<div class="iw-content">'.
                    '<div class="iw-subTitle">'.$proyek->translate('en')->project_name.'</div>' .
                    '<img src='.'"'.Voyager::image($images[0]).'"'.' alt='.'"'.$proyek->translate('en')->project_name.'"'.' height="115" width="83">' .
                    '<p>'.$proyek->translate('en')->latar_belakang.'</p>'.
                    '<div class="iw-subTitle"><a style="font-weight: 300;color: #c82333" href='.'"'.route('detail.proyek', $proyek->id).'"'.'>Detail</a></div>' .
                    '</div>' .
                    '<div class="iw-bottom-gradient"></div>' .
                    '</div>',
                    ['icon' => 'http://cjip.jatengprov.go.id/storage/additional/ICON/readys.png']
                );
            }
            elseif ($proyek->marketplace->name == 'Prospective Project'){
                Mapper::informationWindow((float)$array[0]['lat'], (float)$array[0]['lng'], '<div id="iw-container">'.
                    '<div class="iw-title">'.$proyek->marketplace->name.'</div>'.
                    '<div class="iw-content">'.
                    '<div class="iw-subTitle">'.$proyek->translate('en')->project_name.'</div>' .
                    '<img src='.'"'.Voyager::image($images[0]).'"'.' alt='.'"'.$proyek->translate('en')->project_name.'"'.' height="115" width="83">' .
                    '<p>'.$proyek->translate('en')->latar_belakang.'</p>'.
                    '<div class="iw-subTitle"><a style="font-weight: 300;color: #c82333" href='.'"'.route('detail.proyek', $proyek->id).'"'.'>Detail</a></div>' .
                    '</div>' .
                    '<div class="iw-bottom-gradient"></div>' .
                    '</div>',
                    ['icon' => 'http://cjip.jatengprov.go.id/storage/additional/ICON/prospectives.png']
                );
            }
            else{
                Mapper::informationWindow((float)$array[0]['lat'], (float)$array[0]['lng'], '<div id="iw-container">'.
                    '<div class="iw-title">'.$proyek->marketplace->name.'</div>'.
                    '<div class="iw-content">'.
                    '<div class="iw-subTitle">'.$proyek->translate('en')->project_name.'</div>' .
                    '<img src='.'"'.Voyager::image($images[0]).'"'.' alt='.'"'.$proyek->translate('en')->project_name.'"'.' height="115" width="83">' .
                    '<p>'.$proyek->translate('en')->latar_belakang.'</p>'.
                    '<div class="iw-subTitle"><a style="font-weight: 300;color: #c82333" href='.'"'.route('detail.proyek', $proyek->id).'"'.'>Detail</a></div>' .
                    '</div>' .
                    '<div class="iw-bottom-gradient"></div>' .
                    '</div>',
                    ['icon' => 'http://cjip.jatengprov.go.id/storage/additional/ICON/potentials.png']
                );
            }


        }
        //die();

        //dd($array);
        $mapsKey = 'AIzaSyBGsawbqVs083lGEe8cilVz0FqO0rHt5ZE&amp';

        return view('front-end.marketplace.bylocation', compact('array', 'mapsKey'));
    }

    public function investmentOpportunities(){
        $proyeks = Proyek::where('status', 1)->paginate(10);
        $mapsKey = 'AIzaSyBGsawbqVs083lGEe8cilVz0FqO0rHt5ZE&amp';

        SEOTools::setTitle('All Central Java Investment Projects (Semua Proyek Investasi di Jawa Tengah Indonesia)');
        SEOTools::setDescription('A Collection of All Investment Project Offered in Central Java, Indonesia (Kumpulan Semua Projek Investasi yang Ditawarkan di Jawa Tengah, Indonesia)');
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::addImages(Voyager::image(setting('site.bg_why')));
        SEOTools::setCanonical(url()->current());
        SEOTools::opengraph()->addProperty('type', 'website')->setSiteName('Central Java Investment Platform')->setDescription('Discover all Central Java Investment Projects, Temukan semua projek investasi Jawa Tengah');
        SEOTools::jsonLd()->addImage(Voyager::image(setting('site.bg_why')))->setUrl(url()->current())->setDescription('A Collection of All Investment Project Offered in Central Java, Indonesia (Kumpulan Semua Projek Investasi yang Ditawarkan di Jawa Tengah, Indonesia)');

        TwitterCard::addValue('card', Voyager::image(setting('site.bg_why')))
            ->setType('summary_large_image')
            ->setImage(Voyager::image(setting('site.bg_why')))
            ->setTitle('All Central Java Investment Projects (Semua Proyek Investasi di Jawa Tengah Indonesia)')
            ->setDescription('A Collection of All Investment Project Offered in Central Java, Indonesia (Kumpulan Semua Projek Investasi yang Ditawarkan di Jawa Tengah, Indonesia)')
            ->setUrl(url()->current())
            ->setSite('@DPMPTSPJateng');

        return view('front-end.investment-opportunities', compact('proyeks', 'mapsKey'));

    }


    public function bkpm(){
        $investors =
        [
            [
                'name' => "YANG YUELU",
                'perusahaan' => "Shandong Wood and Wood Products Circulation Association",
            ],
            [
                'name' => "HAN LAIXIANG",
                'perusahaan' => "Shandong hanyudonglai group han master integrated home",
            ],
            [
                'name' => "LI YAFENG",
                'perusahaan' => "Shandong wang jia industrial development group",
            ],
            [
                'name' => "XU HUICAI",
                'perusahaan' => "Gaotang xinhua wood industry co. LTD",
            ],
            [
                'name' => "XU DIANZHONG",
                'perusahaan' => "Shandong Fuda wood industry co. LTD",
            ],
            [
                'name' => "WU YONGZHANG",
                'perusahaan' => "Linyi haoqing wood industry co. LTD",
            ],
            [
                'name' => "SONG LAIGUANG",
                'perusahaan' => "Shandong Jiahua Wood Industry Engineering Co., Ltd.",
            ],
            [
                'name' => "YANG YUDONG",
                'perusahaan' => "Heze jiuxing wood industry co. LTD",
            ],
            [
                'name' => "LI YIHUA",
                'perusahaan' => "Shandong Little Baby Food Co., Ltd.",
            ],
            [
                'name' => "CHEN JIANDONG",
                'perusahaan' => "Chiping Sensen Wood Industry Co., Ltd.",
            ],
            [
                'name' => "HUO HONGLIANG",
                'perusahaan' => "Shandong Wood Inspection Center",
            ],
            [
                'name' => "XIAO DI",
                'perusahaan' => "Shandong Wood Inspection Center",
            ],
            [
                'name' => "QIAN HUA",
                'perusahaan' => "Shandong Newspaper",
            ],
            [
                'name' => "LIU YANHU",
                'perusahaan' => "Hengjiu furniture",
            ],
            [
                'name' => "WANG XINGYU",
                'perusahaan' => "Chiping Xingfa Wood Industry Co., Ltd.",
            ],
            [
                'name' => "LIU JIACHANG",
                'perusahaan' => "Dezhou Shenma Material Trade Group",
            ],
            [
                'name' => "CHEN JIWEI",
                'perusahaan' => "Shandong Xizhilin Furniture Co., Ltd.",
            ],
            [
                'name' => "HUA FENG",
                'perusahaan' => "Jiudian furniture",
            ],
            [
                'name' => "ZHU XIANGJUN",
                'perusahaan' => "Nuoya furniture",
            ],
            [
                'name' => "HE YUSHAN",
                'perusahaan' => "Zibo Polygrace Group",
            ],
            [
                'name' => "WANG YUNJUN",
                'perusahaan' => "Shandong Xindi Home Decoration Co., Ltd.",
            ],
            [
                'name' => "LI LIANYUN",
                'perusahaan' => "Shandong Xindi Home Decoration Co., Ltd.",
            ],
            [
                'name' => "QIN GUANGYONG",
                'perusahaan' => "Shandong Muya furniture",
            ],
            [
                'name' => "TONG XINGZHU",
                'perusahaan' => "Shandong Jinfutong Furnishing",
            ],
            [
                'name' => "GU ZHENCHAO",
                'perusahaan' => "Yipin wooden door",
            ],
            [
                'name' => "LI LANHE",
                'perusahaan' => "Lai's furniture",
            ],
            [
                'name' => "CUI XINGMU",
                'perusahaan' => "Shandong Chenming Group",
            ],
            [
                'name' => "LIU JIANPING",
                'perusahaan' => "Shandong Wood and Wood Products Circulation Association",
            ],
            [
                'name' => "XU BAOCHUAN",
                'perusahaan' => "Shandong Wood and Wood Products Circulation Association",
            ],
            [
                'name' => "WANG JIAN",
                'perusahaan' => "Phoenix home",
            ],
            [
                'name' => "WU GUIJIE",
                'perusahaan' => "Phoenix home",
            ],
            [
                'name' => "ZHU CHANGCHUN",
                'perusahaan' => "Shandong Qiaoduo Tiangong Furniture Co., Ltd.",
            ],
            [
                'name' => "GAO JINSHENG",
                'perusahaan' => "Shandong Ouke Furniture Co., Ltd.",
            ],
            [
                'name' => "CHEN JIKE",
                'perusahaan' => "Shandong Dalihua Furniture Co., Ltd.",
            ],
            [
                'name' => "GAO XIAOTONG",
                'perusahaan' => "Linyi Futeng Wood Industry Co., Ltd.",
            ],
            [
                'name' => "YANG AIYU",
                'perusahaan' => "Shandong Baishengyuan Group Co., Ltd.",
            ],
            [
                'name' => "KONG DEFENG",
                'perusahaan' => "Shandong yinhe machinery chemical co. LTD",
            ],
            [
                'name' => "XU JIANYONG",
                'perusahaan' => "Shandong Zhongyi Wood Industry Co., Ltd.",
            ],
            [
                'name' => "WEI HONGQUAN",
                'perusahaan' => "Yantai Jisi Furniture Group Co., Ltd.",
            ],
            [
                'name' => "LI JIE",
                'perusahaan' => "Linyi Changxing Machinery Co., Ltd.",
            ],
            [
                'name' => "LI JUCHUAN",
                'perusahaan' => "Shandong Jinruyi Timber Group",
            ],
            [
                'name' => "SHI SHAOGANG",
                'perusahaan' => "Shandong Lubei Timber Group",
            ],
            [
                'name' => "ZHAO PISEN",
                'perusahaan' => "Holtrop & Jansma (Qingdao) Environment Equipment Co., Ltd.",
            ],
            [
                'name' => "WANG DAOLIANG",
                'perusahaan' => "Luli Group LLC",
            ],
            [
                'name' => "NING JIALI",
                'perusahaan' => "Chiping Xinda MDF Co., Ltd.",
            ],
            [
                'name' => "WANG FAN",
                'perusahaan' => "Shandong Heyou Group Co., Ltd.",
            ],
            [
                'name' => "WANG XINHUA",
                'perusahaan' => "Daya home",
            ],
            [
                'name' => "LI QIZHONG",
                'perusahaan' => "Shandong Antong Wood Industry Co., Ltd.",
            ],
            [
                'name' => "WANG SHUANG",
                'perusahaan' => "Chiping Nengtong MDF Co., Ltd.",
            ],
            [
                'name' => "LI YUANJIE",
                'perusahaan' => "Shandong Timber Group",
            ]
        ];

        //dd($investors2);
        foreach ($investors as $investor){
            //dd($investor['name']);
            //dd(str_replace( ' ', '.', strtolower($investor)));
            $email_investor = str_replace( ' ', '.', strtolower($investor['name'])). "@cjip.com";
            $users[] = array(
                'name' => $investor['name'],
                'email' => $email_investor
            );
        }
        dd($users);
    }

}
