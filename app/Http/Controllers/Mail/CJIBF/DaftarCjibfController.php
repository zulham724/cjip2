<?php

namespace App\Http\Controllers\CJIBF;

use App\CjibfChair;
use App\CjibfEvent;
use App\CjibfInvestor;
use App\CjibfSektor;
use App\CjibfTable;
use App\KabKota;
use App\LayoutCol;
use App\LayoutRow;
use App\Mail\DaftarCJIBF;
use App\Pengumuman;
use App\ProfileInvestor;
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
        $events = CjibfEvent::first();
        $profile = ProfileInvestor::where('user_id', $user)->first();
        $cities = KabKota::all();
        $sektors = CjibfSektor::all();
        $pengumuman = Pengumuman::all();

        $buka = Carbon::parse($events->tgl_buka)->format('d/m/Y');
        $now = Carbon::now()->format('d/m/Y');

        //dd(Carbon::parse($events->tgl_buka)->lte(Carbon::now()));

        //dd(Carbon::parse($events->tgl_buka)->format('d/m/Y'));
        //dd(Carbon::now()->format('d/m/Y'));
        return view('front-end.investor.content.cjibf', compact('events', 'profile', 'cities', 'sektors', 'pengumuman'));
    }

    public function join(Request $request){
        //dd($request->all());
        try {
            $this->validate($request, [
                'kab_kota' => 'required',
                'profil' => 'required',
                'why' => 'required',
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

        $join = new CjibfInvestor;
        $join->kab_kota_id = $request->kab_kota;
        $join->profile_id = $request->profil;
        $join->sektor_interest = $request->why;

        //dd($join);
        $join->save();

        //dd($join->kota->user->user_id);
        $sisakursi = CjibfTable::where('kabkota_id', $join->kota->user->user_id)->first();
        //dd($sisakursi);

        if ($sisakursi->sisa <= 0){
            /* $cadangans = CjibfTable::with('jenis')->where('jenis_meja', 8)->where('sisa', '>', 0)->first();*/
            $cadangans = CjibfTable::whereHas('jenis', function ($query){
                $query->where('nama', 'Cadangan')->where('sisa', '>', 0);
            })->first();

            //dd($cadangans);
            if (isset($cadangans)){
                $cadangans->sisa = ($cadangans->sisa)-1;
                $cadangans->update();

                $updateInvestor = CjibfInvestor::where('id', $join->id)->first();
                $updateInvestor->meja_id = $cadangans->kode_meja;
                //dd($updateInvestor);
                $updateInvestor->update();


                //dd($daftar);
                $sendObj = new \stdClass();
                $sendObj->nama_investor = $user_name;
                $sendObj->minat_kabkota = $updateInvestor->kota->user->name;
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
                    ->generate($sendObj->event->nama_kegiatan.','.$sendObj->nama_investor.','.$sendObj->perusahaan.','.$sendObj->meja);
                //dd($sendObj);

                /*$pdf = PDF::loadView('attach', ['send'=>$sendObj])->save($sendObj->perusahaan .'-'.'CJIBF2019-registered-detail.pdf');
                $attach = Storage::put('public/register/'.$sendObj->perusahaan .'-'.'CJIBF2019-registered-detail.pdf' ,$pdf->output());*/
                //dd($attach);
                Mail::to(Auth::guard('investor')->user()->email)->send(new DaftarCJIBF($sendObj));
                //return PDF::loadView('attach', ['send' => $sendObj])->setPaper($customPaper, $paper_orientation)->stream();
                //dd($attach);

                return view('front-end.investor.content.cjibf-registered', compact('pengumuman'));
            }
            else{
                $pengumuman = Pengumuman::all();
                return view('front-end.investor.content.full', compact('pengumuman'));
            }

        }
        else{
            $sisakursi->sisa = ($sisakursi->sisa)-1;
            $sisakursi->update();
            //dd($sisakursi);

            $updateInvestor = CjibfInvestor::where('id', $join->id)->first();
            $updateInvestor->meja_id = $sisakursi->kode_meja;

            $updateInvestor->update();
            //dd($updateInvestor);

            $sendObj = new \stdClass();
            $sendObj->nama_investor = $user_name;
            $sendObj->minat_kabkota = $updateInvestor->kota->user->name;
            $sendObj->minat_sektor = $updateInvestor->sektor_interest;
            $sendObj->meja = $updateInvestor->meja_id;
            $sendObj->col = $layout_col;
            $sendObj->row = $layout_row;
            $sendObj->event = $event;
            $sendObj->mejas = $mejas;
            $sendObj->qr = QrCode::format('png')
                ->errorCorrection('H')
                ->size(200)
                ->generate($sendObj->event->nama_kegiatan.','.$sendObj->nama_investor.','.$sendObj->perusahaan.','.$sendObj->meja);

            Mail::to(Auth::guard('investor')->user()->email)->send(new DaftarCJIBF($sendObj));

            return view('front-end.investor.content.cjibf-registered', compact('pengumuman'));
        }

    }

    public function liveCount(){

    }
}
