<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/


use Illuminate\Support\Facades\Redirect;
use Spatie\Sitemap\SitemapGenerator;

Route::get('map-test', function (){
   return view('maptest');
});
Route::get('pisah', 'Admin\UMKM\UmkmController@pisah');
Route::get('updateTambahan', 'Admin\UMKM\UmkmController@updateTambahan');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();

    Route::get('umkm-baru', 'Admin\UMKM\UmkmController@show')->name('show.umkm-baru')->middleware(['auth']);
    Route::get('umkm-detail', 'Admin\UMKM\UmkmController@umkmDetail')->name('show.umkm-detail')->middleware(['auth']);
    Route::get('umkm-import', 'Admin\UMKM\UmkmController@showUmkm')->name('show.umkm');
    Route::post('umkm-import', 'Admin\UMKM\UmkmController@umkmImport')->name('import.umkm');
    Route::post('umkm-export', 'Admin\UMKM\UmkmController@export')->name('export.umkm');
    Route::get('kbli', 'Admin\UMKM\UmkmController@kbli')->name('show.kbli')->middleware(['auth']);
    Route::post('kbli', 'Admin\UMKM\UmkmController@importKbli')->name('import.kbli')->middleware(['auth']);

    Route::get('getKoordinat', 'Admin\UMKM\UmkmController@getKoordinat')->name('getkoordinat');
    Route::post('upload-ckeditor', 'Admin\Kabkota\Proyeks\ProyekController@ckeditor')->name('upload.ckeditor');

    //Route::get('map-umkm', 'Admin\UMKM\UmkmController@map')->name('show.umkm-sebaran');
    //Route::post('umkm-map-filtered', 'Admin\UMKM\UmkmController@map')->name('filtered.umkm-sebaran');
    //Route::post('umkm-map', 'Admin\UMKM\UmkmController@mapSearch')->name('search.umkm-map');
    //Route::get('umkm-map', 'Admin\UMKM\UmkmController@umkmMap')->name('show.umkm-map');
    //Route::post('koordinat-umkm', 'Admin\UMKM\UmkmController@search')->name('umkm.search');


    Route::get('koordinat', 'Map\MapController@data')->name('map.koordinat');
    Route::post('koordinat-filtered', 'Map\MapController@data')->name('map.filtered');
    Route::get('peta-potensi-investasi', 'Map\MapController@map')->name('map.baru');
    Route::post('koordinat', 'Map\MapController@search')->name('map.search');

    Route::get('umkmkoordinat', 'Map\MapController@dataumkm')->name('map.koordinatumkm');
    Route::post('umkmkoordinat-filtered', 'Map\MapController@dataumkm')->name('map.filteredumkm');
    Route::get('umkmpeta', 'Map\MapController@mapumkm')->name('map.baruumkm');
    Route::post('umkmkoordinat', 'Map\MapController@searchumkm')->name('map.searchumkm');

    Route::get('/chatembed', function (){
        return view('chat.chat-embed');
    })->name('cp-provsd');

    Route::get('/reset', 'CJIBF\LayoutController@reset')->name('reset');
    Route::get('/event', 'CJIBF\LayoutController@eventHome')->name('event.home');
    Route::get('/cjibf', 'CJIBF\LayoutController@eventSetting')->name('event.form');
    Route::post('/cjibf', 'CJIBF\LayoutController@eventStore')->name('event.post');


    Route::get('/layout', 'CJIBF\LayoutController@layoutForm')->name('layout.form');
    Route::post('/layout', 'CJIBF\LayoutController@layoutPost')->name('layout.post');

    Route::get('/cjibf/layout/table', 'CJIBF\LayoutController@mejaShow')->name('meja.show');
    Route::post('/cjibf/layout/table', 'CJIBF\LayoutController@mejaPost')->name('meja.post');
    Route::get('/cjibf/layout/table-filter', 'CJIBF\LayoutController@filterShow')->name('mejafilter.show');
    Route::patch('/cjibf/layout/table-filter', 'CJIBF\LayoutController@filterPost')->name('mejafilter.post');
    Route::get('/cjibf/layout/table-kabkota', 'CJIBF\LayoutController@kabkotaShow')->name('kabkota.show');
    Route::patch('/cjibf/layout/table-kabkota', 'CJIBF\LayoutController@kabkotaPost')->name('kabkota.post');


    Route::get('/cjibf/loi/{profil_id}/{id}', 'CJIBF\LayoutController@Loi')->name('loi.cjibf');
    Route::post('/cjibf/loi/{profil_id}/{id}', 'CJIBF\LayoutController@addLoi')->name('loi-cjibf.post');

    Route::get('/cjibf/loimanual/', 'CJIBF\LayoutController@LoiManual')->name('loi.manual');
    Route::post('/cjibf/loimanual/', 'CJIBF\LayoutController@addLoiManual')->name('loi-cjibf.manual');

    Route::get('/daftar-hadir', 'CJIBF\DaftarHadirController@index')->name('daftar.hadir');
    Route::get('/cetak-daftar-hadir', 'CJIBF\DaftarHadirController@cetak')->name('cetak.daftar-hadir');
    Route::get('/cetakmeja-daftar-hadir', 'CJIBF\DaftarHadirController@cetakMeja')->name('cetakpermeja.daftar-hadir');

    Route::get('/rekap-pendaftar', 'CJIBF\RekapPendaftarController@cetakRekap')->name('rekap-pendaftar');
    Route::get('/rekap-lokasi', 'CJIBF\RekapPendaftarController@cetakLokasi')->name('rekap-lokasi');
    Route::get('/rekap-sektor', 'CJIBF\RekapPendaftarController@cetakSektor')->name('rekap-sektor');
    Route::get('/rekap-negara', 'CJIBF\RekapPendaftarController@cetakNegara')->name('rekap-negara');

    Route::get('/rekap-project', 'CJIBF\RekapPendaftarController@rekapProject')->name('rekap-project');
    Route::get('/rekap-project-by-sector', 'CJIBF\RekapPendaftarController@rekapProjectSector')->name('rekap-project-sektor');
    Route::get('/rekap-project-by-city', 'CJIBF\RekapPendaftarController@rekapProjectKabkota')->name('rekap-project-kabkota');


    Route::get('/rekap-loi', 'CJIBF\RekapPendaftarController@rekapLoI')->name('rekap-loi');

    Route::get('/loi-cjibf-2019/', 'CJIBF\LOController@lo')->name('lo');
    Route::get('/loi-cjibf-2019/{id}', 'CJIBF\LOController@loSetting')->name('lo.setting');

/*
    Route::get('/loi-cjibf-2019/', 'CJIBF\LOController@lo')->name('lo');
    Route::get('/loi-cjibf-2019/{id}', 'CJIBF\LOController@loSetting')->name('lo.setting');*/


});

// Route::get('/', function(){
//     return Redirect::route('homey2');
// });



        Route::get('/homey2', 'FrontEnd\Home\HomeController@home')->name('homey2');
        Route::post('/checkemail', 'FrontEnd\Home\HomeController@checkEmail')->name('checkemail');
        Route::get('/bkpm', 'FrontEnd\Home\HomeController@bkpm')->name('bkpm');
        Route::get('sitemap-generate', 'SitemapController@sitemap');


        Route::get('buku-sementara', 'SementaraController@import');
        Route::get('buku', 'SementaraController@download');
        /*Route::get('sitemap', function(){

            SitemapGenerator::create('127.0.0.1:8000')->writeToFile('sitemap.xml');

            return 'sitemap created';

        });*/
        Route::get('/investment-opportunities', 'FrontEnd\Home\HomeController@investmentOpportunities')->name('investment-opportunities');
        Route::get('/ready-to-offer', 'FrontEnd\Home\HomeController@readyToOffer')->name('ready-to-offer');
        Route::get('/prospective-project', 'FrontEnd\Home\HomeController@prospectiveProject')->name('prospective-project');
        Route::get('/potential-project', 'FrontEnd\Home\HomeController@potentialProject')->name('potential-project');

        Route::get('/ready-to-offer/{id}/{slug}', 'FrontEnd\Home\HomeController@detailRto')->name('detail.rto');
        Route::get('/prospective-project/{id}/{slug}', 'FrontEnd\Home\HomeController@detailPros')->name('detail.pros');
        Route::get('/potential-project/{id}/{slug}', 'FrontEnd\Home\HomeController@detailPot')->name('detail.pot');
        Route::get('/project/{id}', 'FrontEnd\Home\HomeController@detailProyek')->name('detail.proyek');

        Route::get('/sectors/{slug}', 'FrontEnd\Home\HomeController@bySector')->name('sector.fo');
        Route::get('/city/{id}', 'FrontEnd\Home\HomeController@byCity')->name('by.city');
        Route::get('/interest-sector/{id}', 'FrontEnd\Home\HomeController@findInterestBySector')->name('interest.sector');


        Route::get('/location-on-maps', 'FrontEnd\Home\HomeController@maps')->name('cluster.maps');




        Route::get('/project-owner/{id}/{slug}', 'FrontEnd\Home\HomeController@detailProfile')->name('detail.profile');

        Route::get('/tespdf', 'CJIBF\FrontEndController@pdf');

        Route::get('/how-can-we-help', 'FrontEnd\Home\HomeController@faq')->name('faq');

        Route::get('/news', 'FrontEnd\News\NewsController@news')->name('news');
        Route::get('/news/{id}', 'FrontEnd\News\NewsController@readBerita')->name('berita.detail');
/*
        Route::get('/profile_jateng', 'FrontEnd\Profile\ProfileController@profile')->name('profile_jateng');

        Route::get('/profile_jateng/{id}', 'FrontEnd\Profile\ProfileController@profileDetail')->name('detail.profile_jateng');*/

        Route::get('/cjibf-cjibe-2019', 'FrontEnd\Home\EventController@event')->name('event');



        Route::get('/live-count', 'CJIBF\LiveController@live')->name('live.count');
        Route::get('/reload', 'CJIBF\LiveController@reload')->name('live.reload');
        Route::get('/reloadtotal', 'CJIBF\LiveController@reloadtotal')->name('total.reload');
        Route::get('/reloadchart', 'CJIBF\LiveController@reloadchart')->name('chart.reload');


        /*Route::get('/x', 'FrontEnd\Provinsi\VideoPlayerController@home')->name('homey');*/


        Route::get('/failed', 'CJIBF\FrontEndController@failed')->name('failed');

        /*Route::get('/sidebar', 'FrontEnd\Home\HomeController@sidebar')->name('sidebar');
        Route::get('/menu', 'FrontEnd\Provinsi\VideoPlayerController@menu')->name('menu');
        Route::get('/search', 'FrontEnd\Home\SearchController@search')->name('search');*/

        /*Route::post('/feed/{id}/like', 'FrontEnd\Home\HomeController@likes')->name('likes.count');

        Route::get('pariwisata/', 'FrontEnd\Potensi\PariwisataController@pariwisata')->name('only.pariwisata');
        Route::get('perikanan/', 'FrontEnd\Potensi\PerikananController@perikanan')->name('only.perikanan');
        Route::get('pertanian/', 'FrontEnd\Potensi\PertanianController@pertanian')->name('only.pertanian');
        Route::get('perkebunan/', 'FrontEnd\Potensi\PerkebunanController@perkebunan')->name('only.perkebunan');
        Route::get('peternakan/', 'FrontEnd\Potensi\PeternakanController@peternakan')->name('only.peternakan');*/

        /*Route::get('/pariwisata', 'FrontEnd\Provinsi\VideoPlayerController@pariwisata')->name('pariwisata');*/
        /*Route::get('/pariwisata/{id}', 'FrontEnd\Provinsi\VideoPlayerController@readPariwisata')->name('pariwisata.detail');
        Route::get('/pariwisata/maps/{id}', 'FrontEnd\Provinsi\VideoPlayerController@mapsPariwisata')->name('pariwisata.maps');*/

        /*Route::get('/perikanan', 'FrontEnd\Provinsi\VideoPlayerController@perikanan')->name('perikanan');*/
        /*Route::get('/perikanan/{id}', 'FrontEnd\Provinsi\VideoPlayerController@readPerikanan')->name('perikanan.detail');*/

        /*Route::get('/pertanian', 'FrontEnd\Provinsi\VideoPlayerController@pertanian')->name('pertanian');*/
        /*Route::get('/pertanian/{id}', 'FrontEnd\Provinsi\VideoPlayerController@readPertanian')->name('pertanian.detail');*/

        /*Route::get('/perkebunan', 'FrontEnd\Provinsi\VideoPlayerController@perkebunan')->name('perkebunan');*/
        /*Route::get('/perkebunan/{id}', 'FrontEnd\Provinsi\VideoPlayerController@readPerkebunan')->name('perkebunan.detail');*/

        /*Route::get('/peternakan', 'FrontEnd\Provinsi\VideoPlayerController@peternakan')->name('peternakan');*/
        /*Route::get('/peternakan/{id}', 'FrontEnd\Provinsi\VideoPlayerController@readPeternakan')->name('peternakan.detail');

        Route::get('/sarpras', 'FrontEnd\SaranaPrasarana\SarprasController@sarpras')->name('sarpras');

        Route::get('/kajian', 'FrontEnd\Kajian\KajianController@kajian')->name('kajian');

        Route::get('/regulasi', 'FrontEnd\Regulasi\RegulasiController@regulasi')->name('regulasi');*/



Route::get('/admin/perikanans/{id}/edit', 'Admin\Kabkota\Potensi\PerikananController@edit')->name('edit.perikanan');
Route::delete('/admin/perikanans/delete/{id}', 'Admin\Kabkota\Potensi\PerikananController@destroy')->name('delete.perikanan');
Route::get('/admin/perkebunans/{id}/edit', 'Admin\Kabkota\Potensi\PerkebunanController@edit')->name('edit.perkebunan');
Route::delete('/admin/perkebunans/delete/{id}', 'Admin\Kabkota\Potensi\PerkebunanController@destroy')->name('delete.perkebunan');
Route::get('/admin/pertanians/{id}/edit', 'Admin\Kabkota\Potensi\PertanianController@edit')->name('edit.pertanian');
Route::delete('/admin/pertanians/delete/{id}', 'Admin\Kabkota\Potensi\PertanianController@destroy')->name('delete.pertanian');
Route::get('/admin/peternakans/{id}/edit', 'Admin\Kabkota\Potensi\PeternakanController@edit')->name('edit.peternakan');
Route::delete('/admin/peternakans/delete/{id}', 'Admin\Kabkota\Potensi\PeternakanController@destroy')->name('delete.peternakan');


Route::post('/admin/post-loi', 'Loi\LoiController@postloi')->name('post.loi');
Route::patch('/admin/post-loi/{id}', 'Loi\LoiController@updateloi')->name('update.loi');

Route::get('/admin/lois/pdf/{id}', 'Loi\LoiController@cetakPdf')->name('cetak.loi');

Route::group(['prefix'=>'admin'],function(){
    Route::get('mailcampaign',function(){
        return view('pages.admin.email.campaign');
    });
    Route::get('mailtemplate',function(){
        return view('pages.admin.email.template');
    });
});



Auth::routes();
Route::get('/chats', 'Chat\ChatController@index')->name('home');
Route::get('/contacts', 'Chat\ContactsController@get');
Route::get('/conversation/{id}', 'Chat\ContactsController@getMessagesFor');
Route::post('/conversation/send', 'Chat\ContactsController@send');



Route::get('login/', 'Auth\LoginController@showInvestorLoginForm')->name('show.login');
Route::post('login/', 'Auth\LoginController@investorLogin')->name('investor.login');
Route::get('register/', 'Auth\RegisterController@showInvestorRegisterForm')->name('show.register');
Route::post('register/', 'Auth\RegisterController@createInvestor')->name('investor.register');
Route::get('login/{provider}', 'Auth\SocialController@redirect');
Route::get('login/{provider}/callback','Auth\SocialController@Callback');


Route::middleware(['auth:investor'])->group(function () {
    Route::get('profile/{id}','FrontEnd\Investor\ProfilController@showProfileForm')->name('form.profile');
    Route::group(['middleware'=>'checkprofile'],function(){
        Route::get('dashboard/{id}','FrontEnd\Investor\ProfilController@dashboard')->name('dashboard.investor');
        Route::patch('dashboard/{id}','FrontEnd\Investor\ProfilController@updateProfile')->name('update.investor');
        Route::post('profile/','FrontEnd\Investor\ProfilController@storeProfile')->name('store.profile');


        Route::get('investment/','FrontEnd\Investor\ProfilController@investment')->name('investment.investor');
        Route::post('investment/','FrontEnd\Investor\ProfilController@investmentPost')->name('investment.post');
        Route::get('investment/{id}','FrontEnd\Investor\ProfilController@investmentEdit')->name('edit.investment');
        Route::patch('investment/{id}','FrontEnd\Investor\ProfilController@updateInvestment')->name('update.investment');


        Route::get('register-cjibf', 'CJIBF\FrontEndController@front')->name('frontend.cjibf');
        Route::post('register-cjibf-join', 'CJIBF\FrontEndController@join')->name('join.cjibf');
        Route::post('register-cjibf', 'CJIBF\FrontEndController@joinManual')->name('join.manual');


        Route::get('company_profile/','FrontEnd\Investor\ProfilController@daftar')->name('daftar');

        Route::get('loi/','FrontEnd\Investor\InterestController@showInterestForm')->name('form.interest');
        Route::post('loi/','FrontEnd\Investor\InterestController@storeInterest')->name('store.interest');

        Route::get('mail/daftar-cjibf','Mail\CJIBF\DaftarCjibfController@send')->name('daftar.cjibf');
        Route::get('/sector/{id}', 'FrontEnd\Home\HomeController@findBySector')->name('by.sector');
    });
});

Route::post('feedback', 'Feedback\FeedbackController@feedback')->name('feedback');

/*Route::get('tes/mail', function (){
    return view('vendor.maileclipse.templates.attach');
});
Route::get('testchart', function (){
    return view('front-end.content.profile.kabkota.luaswilayah');
});*/

// CV ARDATA MEDIA ------------------------------
Route::get('/',function(){
    return redirect('/home');
});
Route::get('/home','ConsuloanController@home');
Route::get('/panel-investor',function(){
    return view('pages.vuetify.home');
})->middleware(['checkprofile']);
Route::get('/mailing',function(){
    return view('pages.mailing.index');
})->middleware('admin.user');
Route::resources([
    'berita' => 'PostController'
]);
// ----------------------------------------------



