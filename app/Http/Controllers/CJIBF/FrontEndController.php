<?php

namespace App\Http\Controllers\CJIBF;

use App\CjibfChair;
use App\CjibfCp;
use App\CjibfEvent;
use App\CjibfInvestor;
use App\CjibfSektor;
use App\CjibfTable;
use App\KabKota;
use App\KabkotaUserModel;
use App\LayoutCol;
use App\LayoutRow;
use App\Mail\DaftarCJIBF;
use App\Pengumuman;
use App\ProfileInvestor;
use App\Proyek;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class FrontEndController extends Controller
{
    public function front(){
        $user = Auth::guard('investor')->user()->id;
        $events = CjibfEvent::where('is_open', 1)->first();
        $profile = ProfileInvestor::where('user_id', $user)->first();
        $cities = KabKota::all();
        $sektors = CjibfSektor::all();
        $pengumuman = Pengumuman::all();
        $registered = CjibfInvestor::where('profile_id', $profile->id)->first();

        foreach ($cities as $city){
            //dd($city->usernya[0]->id);
        }
        //dd($cities->usernya[0]->id);
        //dd($registered->userId->kabkota->nama);

        //dd($profile);
        //dd($registered);
        if (isset($events)){
            $cps = CjibfCp::where('event_id', $events->id)->get();
            $buka = Carbon::parse($events->tgl_buka)->format('d/m/Y');
            $now = Carbon::now()->format('d/m/Y');
            return view('front-end.investor.content.cjibf', compact('events', 'profile', 'cities', 'sektors', 'pengumuman', 'registered', 'cps'));
        }

        //dd(Carbon::parse($events->tgl_buka)->lte(Carbon::now()));

        //dd(Carbon::parse($events->tgl_buka)->format('d/m/Y'));
        //dd(Carbon::now()->format('d/m/Y'));
        return view('front-end.investor.content.cjibf', compact('events', 'profile', 'cities', 'sektors', 'pengumuman', 'registered'));
    }

    public function failed(){
        $layout_col = LayoutCol::all();
        $layout_row = LayoutRow::all();
        $event = CjibfEvent::first();
        $mejas = CjibfTable::all();
        $pengumuman = Pengumuman::all();

        $sendObj2 = new \stdClass();
        $sendObj2->nama_investor = 'Kang Ho Sung';
        $sendObj2->minat_kabkota = 'Kabupaten Jepara';
        $sendObj2->minat_sektor = 'Industri Pengerjaan Logam (moulding)';
        $sendObj2->meja = 'E4';
        $sendObj2->col = $layout_col;
        $sendObj2->row = $layout_row;
        $sendObj2->event = $event;
        $sendObj2->mejas = $mejas;
        $sendObj2->perusahaan = 'ANUGRAH CIPTA MOULD INDONESIA, PT';
        $sendObj2->project = '';
        $sendObj2->qr = QrCode::format('png')
            ->errorCorrection('H')
            ->size(200)
            ->merge('http://cjip.jatengprov.go.id/storage/additional/cjip-2.png', .3, true)
            ->generate($sendObj2->event->nama_kegiatan.','.$sendObj2->nama_investor.','.$sendObj2->perusahaan.','.$sendObj2->meja.','.$sendObj2->project);

        Mail::to('philip_dsi@acmi.co.id')->send(new DaftarCJIBF($sendObj2));

        return 'email sent to philip_dsi@acmi.co.id';
    }

    public function join(Request $request){
        //dd($request->all());
        /*try {
            $this->validate($request, [
                'kab_kota' => 'required',
                'profil' => 'required',
                'why' => 'required',
            ]);
        } catch (ValidationException $e) {
        }*/
        $user_id = Auth::guard('investor')->user()->id;
        $user_name = Auth::guard('investor')->user()->name;
        $layout_col = LayoutCol::all();
        $layout_row = LayoutRow::all();
        $event = CjibfEvent::first();
        $mejas = CjibfTable::all();
        $pengumuman = Pengumuman::all();
        $user_kab_kota = KabkotaUserModel::where('kab_kota_id', $request->kabkota)->first();
        //dd($user_kab_kota);
       /* $test = CjibfInvestor::first();*/
        //dd($test->user->namakota[0]->nama);

        //dd($user_kab_kota->user_id);
        //dd($request->all());


        //dd($join->kota->user->user_id);
        $sisakursi = CjibfTable::where('kabkota_id', $request->kabkota)->first();
        $project = Proyek::findOrFail($request->project_id);
        //dd($sisakursi);

        if ($sisakursi->sisa <= 0){

            /* $cadangans = CjibfTable::with('jenis')->where('jenis_meja', 8)->where('sisa', '>', 0)->first();*/
            $cadangans = CjibfTable::whereHas('jenis', function ($query){
                $query->where('nama', 'Cadangan')->where('sisa', '>', 0);
            })->first();



            if (isset($cadangans)){
                $join = new CjibfInvestor;
                $join->kab_kota_id = $request->kabkota;
                $join->profile_id = $request->profil;
                $join->sektor_interest = $request->sektor;
                $join->project_id = $request->project_id;

                //dd($join);
                $join->save();
                $cadangans->sisa = ($cadangans->sisa)-1;
                $cadangans->update();

                $updateInvestor = CjibfInvestor::where('id', $join->id)->first();
                $updateInvestor->meja_id = $cadangans->kode_meja;
                //dd($updateInvestor);
                $updateInvestor->update();


                //dd($daftar);
                $sendObj = new \stdClass();
                $sendObj->nama_investor = $user_name;
                $sendObj->minat_kabkota = $updateInvestor->user->namakota[0]->nama;
                $sendObj->minat_sektor = $updateInvestor->sektor_interest;
                $sendObj->meja = $updateInvestor->meja_id;
                $sendObj->col = $layout_col;
                $sendObj->row = $layout_row;
                $sendObj->event = $event;
                $sendObj->mejas = $mejas;
                $sendObj->perusahaan = $updateInvestor->profil->nama_perusahaan;
                $sendObj->project = $project->project_name;
                $sendObj->qr = QrCode::format('png')
                    ->errorCorrection('H')
                    ->size(200)
                    ->merge('http://cjip.jatengprov.go.id/storage/additional/cjip-2.png', .3, true)
                    ->generate($sendObj->event->nama_kegiatan.','.$sendObj->nama_investor.','.$sendObj->perusahaan.','.$sendObj->meja.','.$sendObj->project);


            Mail::to(Auth::guard('investor')->user()->email)->send(new DaftarCJIBF($sendObj));
                //return PDF::loadView('attach', ['send' => $sendObj])->setPaper($customPaper, $paper_orientation)->stream();
                //dd($attach);
                //return $pdf->stream('CJIBF_'.$filename.'.pdf');
            return view('front-end.investor.content.cjibf-registered', compact('pengumuman'));
            }
            else{
                $kota = $request->kabkota;
                $user = User::findOrFail($kota);
                //dd($user->namakota);
                $pengumuman = Pengumuman::all();
                return view('front-end.investor.content.full', compact('pengumuman', 'user'));
            }

        }
        else{
            $join = new CjibfInvestor;
            $join->kab_kota_id = $request->kabkota;
            $join->profile_id = $request->profil;
            $join->sektor_interest = $request->sektor;
            $join->project_id = $request->project_id;

            //dd($join);
            $join->save();

            $sisakursi->sisa = ($sisakursi->sisa)-1;
            $sisakursi->update();
            //dd($sisakursi);

            $updateInvestor = CjibfInvestor::where('id', $join->id)->first();
            $updateInvestor->meja_id = $sisakursi->kode_meja;

            $updateInvestor->update();
            //dd($updateInvestor);
            //dd($updateInvestor->userId->);
            $sendObj = new \stdClass();
            $sendObj->nama_investor = $user_name;
            $sendObj->minat_kabkota = $updateInvestor->user->namakota[0]->nama;
            $sendObj->minat_sektor = $updateInvestor->sektor_interest;
            $sendObj->meja = $updateInvestor->meja_id;
            $sendObj->col = $layout_col;
            $sendObj->row = $layout_row;
            $sendObj->event = $event;
            $sendObj->mejas = $mejas;
            $sendObj->perusahaan = $updateInvestor->profil->nama_perusahaan;
            $sendObj->project = $project;
            $sendObj->qr = QrCode::format('png')
                ->errorCorrection('H')
                ->size(200)
                ->merge('http://cjip.jatengprov.go.id/storage/additional/cjip-2.png', .3, true)
                ->generate($sendObj->event->nama_kegiatan.','.$sendObj->nama_investor.','.$sendObj->perusahaan.','.$sendObj->meja);

            //return view('attach', ['send'=>$sendObj]);

            //$pdf = PDF::loadView('attach3', ['send'=>$sendObj]);
            //$filename = $sendObj->perusahaan;
            //return $pdf->stream('CJIBF_'.$filename.'.pdf');


        Mail::to(Auth::guard('investor')->user()->email)->send(new DaftarCJIBF($sendObj));

        return view('front-end.investor.content.cjibf-registered', compact('pengumuman'));
            //return $pdf->stream('CJIBF_'.$filename.'.pdf');
        }

    }

    public function joinManual(Request $request){
        //dd($request->all());
        try {
            $this->validate($request, [
                'kab_kota_manual' => 'required',
                'sektor_manual' => 'required'
            ]);
        } catch (ValidationException $e) {
        }
        $user_id = Auth::guard('investor')->user()->id;
        $user_name = Auth::guard('investor')->user()->name;
        $layout_col = LayoutCol::all();
        $layout_row = LayoutRow::all();
        $event = CjibfEvent::first();
        $mejas = CjibfTable::all();
        $pengumuman = Pengumuman::all();
        $user_kab_kota = KabkotaUserModel::where('kab_kota_id', $request->kab_kota)->first();

       /* $test = CjibfInvestor::first();*/
        //dd($test->user->namakota[0]->nama);

        //dd($user_kab_kota->user_id);
        //dd($request->all());


        //dd($join->kota->user->user_id);
        $sisakursi = CjibfTable::where('kabkota_id', $request->kab_kota_manual)->first();

        //dd($sisakursi);

        if ($sisakursi->sisa <= 0){

            /* $cadangans = CjibfTable::with('jenis')->where('jenis_meja', 8)->where('sisa', '>', 0)->first();*/
            $cadangans = CjibfTable::whereHas('jenis', function ($query){
                $query->where('nama', 'Cadangan')->where('sisa', '>', 0);
            })->first();
            //dd(isset($cadangans));

            if (isset($cadangans)){
                $join = new CjibfInvestor;
                $join->kab_kota_id = $request->kab_kota_manual;
                $join->profile_id = $request->profil;
                $join->sektor_interest = $request->sektor_manual;

                //dd($join);
                $join->save();

                $cadangans->sisa = ($cadangans->sisa)-1;
                $cadangans->update();

                $updateInvestor = CjibfInvestor::where('id', $join->id)->first();
                $updateInvestor->meja_id = $cadangans->kode_meja;
                //dd($updateInvestor);
                $updateInvestor->update();


                //dd($daftar);
                $sendObj = new \stdClass();
                $sendObj->nama_investor = $user_name;
                $sendObj->minat_kabkota = $updateInvestor->user->namakota[0]->nama;
                $sendObj->minat_sektor = $updateInvestor->sektor_interest;
                $sendObj->meja = $updateInvestor->meja_id;
                $sendObj->col = $layout_col;
                $sendObj->row = $layout_row;
                $sendObj->event = $event;
                $sendObj->mejas = $mejas;
                $sendObj->perusahaan = $updateInvestor->profil->nama_perusahaan;
                $sendObj->qr = QrCode::format('png')
                    ->errorCorrection('H')
                    ->size(200)
                    ->merge('http://cjip.jatengprov.go.id/storage/additional/cjip-2.png', .3, true)
                    ->generate($sendObj->event->nama_kegiatan.','.$sendObj->nama_investor.','.$sendObj->perusahaan.','.$sendObj->meja);

            Mail::to(Auth::guard('investor')->user()->email)->send(new DaftarCJIBF($sendObj));

            return view('front-end.investor.content.cjibf-registered', compact('pengumuman'));
            }
            else{
                $kota = $request->kab_kota_manual;
                $user = User::findOrFail($kota);
                $pengumuman = Pengumuman::all();
                return view('front-end.investor.content.full', compact('pengumuman', 'user'));
            }

        }
        else{
            $join = new CjibfInvestor;
            $join->kab_kota_id = $request->kab_kota_manual;
            $join->profile_id = $request->profil;
            $join->sektor_interest = $request->sektor_manual;

            //dd($join);
            $join->save();

            $sisakursi->sisa = ($sisakursi->sisa)-1;
            $sisakursi->update();
            //dd($sisakursi);

            $updateInvestor = CjibfInvestor::where('id', $join->id)->first();
            $updateInvestor->meja_id = $sisakursi->kode_meja;

            $updateInvestor->update();
            //dd($updateInvestor);
            //dd($updateInvestor->userId->);
            $sendObj = new \stdClass();
            $sendObj->nama_investor = $user_name;
            $sendObj->minat_kabkota = $updateInvestor->user->namakota[0]->nama;
            $sendObj->minat_sektor = $updateInvestor->sektor_interest;
            $sendObj->meja = $updateInvestor->meja_id;
            $sendObj->col = $layout_col;
            $sendObj->row = $layout_row;
            $sendObj->event = $event;
            $sendObj->mejas = $mejas;
            $sendObj->perusahaan = $updateInvestor->profil->nama_perusahaan;
            $sendObj->qr = QrCode::format('png')
                ->errorCorrection('H')
                ->size(200)
                ->merge('http://cjip.jatengprov.go.id/storage/additional/cjip-2.png', .3, true)
                ->generate($sendObj->event->nama_kegiatan.','.$sendObj->nama_investor.','.$sendObj->perusahaan.','.$sendObj->meja);

        Mail::to(Auth::guard('investor')->user()->email)->send(new DaftarCJIBF($sendObj));

        return view('front-end.investor.content.cjibf-registered', compact('pengumuman'));
            //return $pdf->stream('CJIBF_'.$filename.'.pdf');
        }

    }

    public function pdf(){
        $send = CjibfInvestor::first();

        $pdf = PDF::loadView('attach3', ['send' => $send])->setPaper('legal', 'portrait');

        return $pdf->stream();

    }

    public function liveCount(){

    }
}
