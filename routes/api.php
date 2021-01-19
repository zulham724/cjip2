<?php

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
Route::get('peluang-potensi-investasi-jawa-tengah', 'API\ApiController@dataGeoJSON')->name('geojson.map.baru');
Route::get('get-marketplace', 'API\ProyekController@getMarketplace');
Route::get('get-sektor', 'API\ProyekController@getSektor');
Route::get('umk', 'API\ApiController@dataUmk')->name('api.umk-tahun-berjalan');
Route::get('umkm-tahun-ini', 'API\ApiController@dataUmkm')->name('api.umkm-tahun-berjalan');

Route::get('umkm', 'API\UmkmController@map');


Route::post('login', 'API\UserController@login');
Route::group(['middleware' => 'auth:api'], function(){
    Route::post('details', 'API\UserController@details');
    Route::post('projects', 'API\ProyekController@postProject');
    Route::post('update-projects', 'API\ProyekController@updateProject');
    Route::get('projects-show', 'API\ProyekController@getProject');
    Route::get('projects-on-map', 'API\ProyekController@getProjectGeoJson');

});
Route::get('/user', function (Request $request) {
    return
    Auth::guard('investor')->check() ?
    response()->json(Auth::guard('investor')->user()->load(['profile','loi_interests'])) :
    abort(401,'Login First');
});

Route::group(['prefix' => 'v1', 'namespace' => 'API\\v1'], function () {
    Route::apiResources([
        'infrastrukturpendukung' => 'InfrastrukturPendukungController',
        'post' => 'PostController',
        'umr' => 'UmrController',
        'biayalistrik' => 'BiayaListrikController',
        'jeniskatuserair' => 'JenisKatUserAirController',
        'sektor' => 'SektorController',
        'proyek' => 'ProyekController',
        'cjibfsektor' => 'CjibfSektorController',
        'profilkabupaten' => 'ProfilKabupatenController',
        'pertumbuhanekonomi' => 'PertumbuhanEkonomiController',
        'jenisfaq' => 'JenisFaqController',
        'city'=> 'KabKotaController',
        'loiinterest' => 'LoiInterestController',
        'kabkota'=>'KabKotaController',
        'mailcampaign'=>'MailCampaignController',
        'mailtemplate'=>'MailTemplateController',
        'mailrecipient'=>'MailRecipientController',
        'file'=>'FileController',
        'userinvestor'=>'UserInvestorController',
        'economicgrowth'=>'EconomicGrowthController'
    ]);

    // Authentication
    Route::post('/login','AuthController@login');
    // Auth with Provider
    Route::get('/login/{provider}','AuthController@provider');
    // Call Provider Auth
    Route::get('/login/{provider}/callback','AuthController@providerCallback');
    // Register
    Route::post('/register','AuthController@register');
    // Template Setting
    Route::get('/consuloan/settings','ConsuloanController@settings');
    // Template Map
    Route::get('/consuloan/map','ConsuloanController@map');
    // get ready to offer proyeks
    Route::get('/proyeks/readytooffer','ProyekController@readyToOffer');
    // get prospective projects
    Route::get('/proyeks/prospectiveproject','ProyekController@prospectiveProject');
    // get potential projects
    Route::get('/proyeks/potentialproject','ProyekController@potentialProject');
    // get proyek by sector
    Route::get('/proyeks/bycjibfsector/{id}','ProyekController@byCjibfSector');
    // search proyek
    Route::get('/proyeks/search/{key}','ProyekController@search');
    // update auth user
    Route::put('/auth','AuthController@update');
    // send post notif to all investor
    Route::get('/email/sendnotifpost','EmailController@sendnotifpost');
    // send test mail
    Route::get('/mailcampaigns/test','MailCampaignController@test');
});

