<?php

namespace App\Http\Controllers\CJIBF;

use App\CjibfChair;
use App\CjibfEvent;
use App\CjibfInvestor;
use App\CjibfJenismeja;
use App\CjibfSektor;
use App\CjibfTable;
use App\Events\LiveLoiUpdate;
use App\Events\TestEvent;
use App\KabKota;
use App\LayoutCol;
use App\LayoutRow;
use App\LayoutSetting;
use App\Lois;
use App\ProfileInvestor;
use App\Proyek;
use App\User;
use App\UserInvestor;
use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use function Sodium\increment;
use TCG\Voyager\Facades\Voyager;
use test\Mockery\ReturnTypeObjectTypeHint;
use Illuminate\Support\Facades\Log;

class LayoutController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function reset(){
        CjibfEvent::query()->delete();
        CjibfChair::query()->delete();
        CjibfTable::query()->delete();
        CjibfSektor::query()->delete();
        CjibfJenismeja::query()->delete();
        LayoutRow::query()->delete();
        LayoutCol::query()->delete();

        return redirect()->route('voyager.cjibf-events.index');
    }

    public function eventHome(){
        $alphabet = range('A', 'Z');
        $user = Auth::user();
        //dd($user->kota->kab_kota_id);
        $rows = LayoutRow::all();
        $cols = LayoutCol::all();
        $mejas = CjibfTable::all();
        $jeniss = CjibfJenismeja::all();
        $kabkotas = User::where('role_id', 3)->get();
        $cjibf = CjibfEvent::first();
        $pesertas = CjibfInvestor::with('profil', 'loi')->paginate(20);
        $pesertas2 = CjibfInvestor::all();
        //dd($pesertas);
        $events = CjibfEvent::all();

        $user_info = CjibfInvestor::groupBy('kab_kota_id')->select('kab_kota_id', DB::raw('count(*) as total'))->get();
        $sector_info = CjibfInvestor::groupBy('sektor_interest')->select('sektor_interest', DB::raw('count(*) as totalsektor'))->get();
        $country_info = CjibfInvestor::with('profil')->get()->groupBy('profil.country');

        foreach ($mejas as $meja){
            if ($meja->sisa != 0){
                $total = CjibfInvestor::with('profil')->where('meja_id', 'G8')->get();
                /*$total = CjibfTable::where('sisa', '!=', 0)->sum('sisa');*/
                //$total = CjibfTable::where('sisa', '!=', 0)->sum('sisa');
                //dd($total);
            }
        }

        //dd($country_info);
        //dd($sector_info);
        //dd($user_info[0]->user->namakota[0]->nama);
        //dd($user_info[0]);

        //dd($user->kota);
        if (app('VoyagerAuth')->user()->hasRole('kab')){
            $pesertakabs = CjibfInvestor::where('kab_kota_id', $user->id)->get();
            return view('cjibf.home', compact(
                'alphabet',
                'rows',
                'cols',
                'mejas',
                'jeniss',
                'kabkotas',
                'cjibf',
                'events',
                'pesertas',
                'pesertakabs'
            ));
        }
        else{
            return view('cjibf.home', compact(
                'alphabet',
                'rows',
                'cols',
                'mejas',
                'jeniss',
                'kabkotas',
                'cjibf',
                'events',
                'pesertas',
                'user_info',
                'sector_info',
                'country_info',
                'pesertas2'
            ));
        }


        //dd($dataTypeContent);

    }

    public function Loi($profil_id, $id){

        $profile = ProfileInvestor::findOrFail($profil_id);
        $sektors = CjibfSektor::all();
        $peserta = CjibfInvestor::findOrFail($id);
        //dd($peserta->id);
        //dd($peserta);
        return view('cjibf.partials.add-loi', compact('profile', 'sektors', 'peserta'));
    }

    /**
     * @param Request $request
     * @param $profil_id
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addLoi(Request $request, $profil_id, $id){

        $peserta = CjibfInvestor::findOrFail($id);
        //dd(is_null($peserta->project_id));
        if (is_null($peserta->project_id)){
            $this->validate($request, [
                'project_name' => 'required',
                'luas_lahan' => 'required',
            ]);
        }

        $peta = $request->maps;
        $lat = (float) $peta['lat'];
        $lng = (float) $peta['lng'];
        //dd($peta['lat']);

        //dd($peserta);
        $profile = ProfileInvestor::findOrFail($profil_id);
        //dd($request->all());

        if ($request->filled('rp')){
            $rp = $request->input('rp');
            $storethis = (string)str_replace(',', '',$rp);
            /*dd($storethis);*/
        }
        else {
            $storethis = 0;
        }

        if ($request->has('usd')){
            $iki = $request->input('usd');
            $storethisusd = (string)str_replace(',', '',$iki);
            /*dd($storethis);*/
        }
        else {
            $storethisusd = 0;
        }

        if (is_null($peserta->project_id)){
            $project = new Proyek();
            $project->project_name = $request->project_name;
            $project->lingkup_pekerjaan = $request->lingkup_pekerjaan;
            $project->eksisting = $request->eksisting;
            $project->luas_lahan = $request->luas_lahan;
            $project->status_kepemilikan = $request->status_kepemilikan;
            $project->skema_investasi = $request->skema_investasi;
            $project->npv = $request->npv;
            $project->irr = $request->irr;
            $project->bc_ratio = $request->bc_ratio;
            $project->kab_kota_id = $request->kab_kota_id;
            $project->location = DB::raw("ST_GeomFromText('POINT({$lng} {$lat})')");
            //dd($project);
            $project->save();
        }

        //dd($project);


        $loi = new Lois();
        if (is_null($peserta->project_id)){
            $loi->kab_kota_id = $request->kab_kota_id;
        }
        else{
            $loi->kab_kota_id = Auth::user()->id;
        }
        $loi->nama_perusahaan = $profile->nama_perusahaan;
        $loi->alamat_perusahaan = $profile->alamat;
        $loi->bidang_usaha = $request->sektor;
        $loi->nama_pengusaha = $profile->investor_name;
        $loi->jabatan_pengusaha = $profile->jabatan;
        $loi->lokasi_investasi = $request->lokasi;
        $loi->phone = $profile->phone;
        $loi->email = $profile->userInv->email;
        $loi->asal_negara = $profile->country;
        if ($storethisusd == 0) {
            $loi->nilai_usd = 0;
            $loi->nilai_rp = $storethis;
        }
        elseif ($storethis == 0) {
            $loi->nilai_rp = 0;
            $loi->nilai_usd = $storethisusd;
        }
        $loi->lokasi_investasi = $request->lokasi;
        $loi->cjibf = 1;
        if (is_null($peserta->project_id)){
            $loi->project_id = $project->id;
        }
        else{
            $loi->project_id = $peserta->project_id;
        }
        //dd($loi);
        $loi->save();

        $peserta = CjibfInvestor::findOrFail($id);
        $peserta->loi_id = $loi->id;
        $peserta->update();


        return redirect()->route('event.home');
    }


    public function LoiManual(){

        $sektors = CjibfSektor::all();
        return view('cjibf.partials.add-loi-manual', compact( 'sektors'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws ValidationException
     */
    public function addLoiManual(Request $request){
        //dd($request->all());
        $this->validate($request, [
            'project_name' => 'required',
            'luas_lahan' => 'required',
            'investor_name' => 'required',
            'jabatan' => 'required',
            'nama_perusahaan' => 'required',
            'badan_hukum' => 'required',
            'bidang_usaha' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'country' => 'required',
        ]);
        $peta = $request->maps;
        $lat = (float) $peta['lat'];
        $lng = (float) $peta['lng'];

        $project = new Proyek();
        $project->project_name = $request->project_name;
        $project->lingkup_pekerjaan = $request->lingkup_pekerjaan;
        $project->eksisting = $request->eksisting;
        $project->luas_lahan = $request->luas_lahan;
        $project->status_kepemilikan = $request->status_kepemilikan;
        $project->skema_investasi = $request->skema_investasi;
        $project->npv = $request->npv;
        $project->irr = $request->irr;
        $project->bc_ratio = $request->bc_ratio;
        $project->kab_kota_id = Auth::user()->id;
        $project->location = DB::raw("ST_GeomFromText('POINT({$lng} {$lat})')");
        //dd($project);
        $project->save();

        if ($request->filled('rp')){
            $rp = $request->input('rp');
            $storethis = (string)str_replace(',', '',$rp);
            /*dd($storethis);*/
        }
        else {
            $storethis = 0;
        }

        if ($request->has('usd')){
            $iki = $request->input('usd');
            $storethisusd = (string)str_replace(',', '',$iki);
            /*dd($storethis);*/
        }
        else {
            $storethisusd = 0;
        }

        $user = new UserInvestor();
        $user->name = $request->investor_name;
        $user->email = $request->email;
        $user->password = Hash::make('cjip2019');
        $user->save();

        $profil = new ProfileInvestor();
        $profil->user_id = $user->id;
        $profil->investor_name = $request->investor_name;
        $profil->jabatan = $request->jabatan;
        $profil->phone = $request->phone;
        $profil->nama_perusahaan = $request->nama_perusahaan;
        $profil->bidang_usaha = $request->bidang_usaha;
        $profil->badan_hukum = $request->badan_hukum;
        $profil->country = $request->country;
        //dd($profil);
        $profil->save();

        $loi = new Lois();
        $loi->kab_kota_id = Auth::user()->id;
        $loi->nama_perusahaan = $request->nama_perusahaan;
        $loi->alamat_perusahaan = $request->alamat;
        $loi->bidang_usaha = $request->sektor;
        $loi->nama_pengusaha = $request->investor_name;
        $loi->jabatan_pengusaha = $request->jabatan;
        $loi->phone = $request->phone;
        $loi->email = $request->email;
        $loi->asal_negara = $profil->country;
        if ($storethisusd == 0) {
            $loi->nilai_usd = 0;
            $loi->nilai_rp = $storethis;
        }
        elseif ($storethis == 0) {
            $loi->nilai_rp = 0;
            $loi->nilai_usd = $storethisusd;
        }
        $loi->lokasi_investasi = $request->lokasi;
        $loi->cjibf = 1;
        $loi->save();
        //dd($loi);




        $peserta = new CjibfInvestor();
        $peserta->kab_kota_id = $loi->kab_kota_id;
        $peserta->profile_id = $profil->id;
        $peserta->sektor_interest = $request->why;
        $peserta->loi_id = $loi->id;
        $peserta->save();
        //dd($peserta);

        return redirect()->route('event.home');
    }


    public function layoutPost(Request $request){

        //dd($request->all());
        $y = $request->y;
        $x = $request->x;
        $alphabet = range('A', 'Z');
        //dd($y);
        for ($i='A';$i<($alphabet[$y]);$i++){
            $baris = new LayoutRow();
            $baris->row = $i;
            //dump($baris);
            $baris->save();
        }
        for ($y=1;$y<=$x;$y++){
            $kolom = new LayoutCol();
            $kolom->col = $y;
            //dump($baris);
            $kolom->save();
        }

        //die();

        return redirect()->back();
    }

    public function mejaShow(){
        $rows = LayoutRow::all();
        $cols = LayoutCol::all();

        return view('cjibf.meja', compact('cols','rows'));
    }

    public function mejaPost(Request $request){

        $mejas = $request->meja;
        //dd($meja);

        foreach ($mejas as $meja){
            $used_table = new CjibfTable();
            $used_table->kode_meja = $meja;
            //dd($used_table);
            $used_table->save();

        }

        return redirect()->route('event.home');
    }

    public function filterShow(){
        $rows = LayoutRow::all();
        $cols = LayoutCol::all();
        $mejas = CjibfTable::all();
        $jeniss = CjibfJenismeja::all();




        //dd(empty($mejas[0]));
        return view('cjibf.filter-meja', compact('cols','rows', 'mejas', 'jeniss'));
    }

    public function filterPost(Request $request){
        //dd($request->all());
        $mejas = $request->meja;
        $jenis = $request->jenis;
        //dd($jenis);

        foreach ($mejas as $meja){
            $updateMeja = CjibfTable::where('kode_meja', $meja)->first();
            $updateMeja->jenis_meja = $jenis;
            //dd(($updateMeja->jenis->max_seats)-($updateMeja->jenis->default_seats));
            //dump($updateMeja);
            $jml = CjibfJenismeja::where('id', $jenis)->first();
            //dd(($jml->max_seats)-($jml->default_seats));
            $updateMeja->sisa = ($jml->max_seats)-($jml->default_seats);
            //dd($updateMeja);
            $updateMeja->update();

            for ($i=0;$i<(($updateMeja->jenis->max_seats)-($updateMeja->jenis->default_seats));$i++){
                $chairs = new CjibfChair();
                $chairs->meja_id = $updateMeja->id;
                //dump($chairs);
                $chairs->save();
            }
        }
        //die();

        return redirect()->back();
    }

    public function kabkotaShow(){
        $rows = LayoutRow::all();
        $cols = LayoutCol::all();
        $mejas = CjibfTable::all();
        $jeniss = CjibfJenismeja::all();
        $kabkotas = User::where('role_id', 3)->get();

        foreach ($mejas as $meja){
            //dd(count(CjibfChair::where('meja_id', $meja->id)->where('user_id', null)->get()));
            //dd((($meja->jenis->max_seats)-($meja->jenis->default_seats)));
            $sisa = CjibfChair::where('meja_id', $meja->id)->where('user_id', null)->get();

            foreach ($sisa as $s){
                //dd($s->meja->kode_meja);
            }
        }

        $chairs = CjibfChair::groupBy('meja_id')->count();


        //dd(empty($mejas[0]));
        return view('cjibf.meja-kabkota', compact('cols','rows', 'mejas', 'jeniss', 'kabkotas', 'sisa', 'chairs'));
    }

    public function kabkotaPost(Request $request){
        //dd($request->all());
        $mejas = $request->meja;
        $kabkota = $request->kabkota;
        foreach ($mejas as $meja){
            $updateMeja = CjibfTable::where('kode_meja', $meja)->first();
            $updateMeja->kabkota_id = $kabkota;
            $updateMeja->update();
            //dd($updateMeja);
        }

        return redirect()->back();
    }


    public function eventSetting(){

        $cjibf = CjibfEvent::first();
        //dd($cjibf);
        return view('cjibf.cjibf', compact('cjibf'));
    }



}
