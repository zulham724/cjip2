<?php

namespace App\Http\Controllers\FrontEnd\SaranaPrasarana;

use App\Bandara;
use App\Bank;
use App\Bpk;
use App\JalurGa;
use App\KawasanIndustri;
use App\Kereta;
use App\Listrik;
use App\Lpk;
use App\MenuSarana;
use App\Pelabuhan;
use App\SarprasAll;
use App\SarprasDetail;
use App\Smk;
use App\Tol;
use App\Waduk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SarprasController extends Controller
{
    public function sarpras(){

        $sarpras = SarprasAll::where('status', 1)->orderByViews()->get();

        $lists = MenuSarana::all();
        //dd($sarpras);
        return view('front-end.content.sarpras.sarpras', compact('lists'));
    }

    public function detail($sarpras){

        //dd($sarpras);


        $detail = SarprasDetail::where('slug', $sarpras)->first();
        if (!empty($detail->model)) {
            $sarpras_detail = $detail->model::all();
        }
        //dd($sarpras_detail);
        foreach ($sarpras_detail as $item){

            //dd($item->userId->name);
        }


        //dd($sarpras_detail);
        return view('front-end.content.sarpras.detail',compact('sarpras_detail', 'sarpras'));
    }

    public function mapsKi($id){

        $ki = KawasanIndustri::findOrFail($id);
        $mapsKey = 'AIzaSyBGsawbqVs083lGEe8cilVz0FqO0rHt5ZE&amp';

        //dd($ki);

        return view('front-end.master.master', compact('ki', 'mapsKey'));

    }

    public function bandara($id){
        $ki = Bandara::findOrFail($id);
        //dd($ki);
        $mapsKey = 'AIzaSyBGsawbqVs083lGEe8cilVz0FqO0rHt5ZE&amp';

        return view('front-end.master.master', compact('ki', 'mapsKey'));
    }
    public function pelabuhan($id){
        $ki = Pelabuhan::findOrFail($id);
        //dd($ki);
        $mapsKey = 'AIzaSyBGsawbqVs083lGEe8cilVz0FqO0rHt5ZE&amp';

        return view('front-end.master.master', compact('ki', 'mapsKey'));
    }
    public function kereta($id){
        $ki = Kereta::findOrFail($id);
        //dd($ki);
        $mapsKey = 'AIzaSyBGsawbqVs083lGEe8cilVz0FqO0rHt5ZE&amp';

        return view('front-end.master.master', compact('ki', 'mapsKey'));
    }
    public function listrik($id){
        $ki = Listrik::findOrFail($id);
        //dd($ki);
        $mapsKey = 'AIzaSyBGsawbqVs083lGEe8cilVz0FqO0rHt5ZE&amp';

        return view('front-end.master.master', compact('ki', 'mapsKey'));
    }
    public function gas($id){
        $ki = JalurGa::findOrFail($id);
        //dd($ki);
        $mapsKey = 'AIzaSyBGsawbqVs083lGEe8cilVz0FqO0rHt5ZE&amp';

        return view('front-end.master.master', compact('ki', 'mapsKey'));
    }
    public function waduk($id){
        $ki = Waduk::findOrFail($id);
        //dd($ki);
        $mapsKey = 'AIzaSyBGsawbqVs083lGEe8cilVz0FqO0rHt5ZE&amp';

        return view('front-end.master.master', compact('ki', 'mapsKey'));
    }
    public function tol($id){
        $ki = Tol::findOrFail($id);
        //dd($ki);
        $mapsKey = 'AIzaSyBGsawbqVs083lGEe8cilVz0FqO0rHt5ZE&amp';

        return view('front-end.master.master', compact('ki', 'mapsKey'));
    }
    public function smk($id){
        $ki = Smk::findOrFail($id);
        //dd($ki);
        $mapsKey = 'AIzaSyBGsawbqVs083lGEe8cilVz0FqO0rHt5ZE&amp';

        return view('front-end.master.master', compact('ki', 'mapsKey'));
    }
    public function bpk($id){
        $ki = Bpk::findOrFail($id);
        //dd($ki);
        $mapsKey = 'AIzaSyBGsawbqVs083lGEe8cilVz0FqO0rHt5ZE&amp';

        return view('front-end.master.master', compact('ki', 'mapsKey'));
    }
    public function lpk($id){
        $ki = Lpk::findOrFail($id);
        //dd($ki);
        $mapsKey = 'AIzaSyBGsawbqVs083lGEe8cilVz0FqO0rHt5ZE&amp';

        return view('front-end.master.master', compact('ki', 'mapsKey'));
    }
    public function bank($id){
        $ki = Bank::findOrFail($id);
        //dd($ki);
        $mapsKey = 'AIzaSyBGsawbqVs083lGEe8cilVz0FqO0rHt5ZE&amp';

        return view('front-end.master.master', compact('ki', 'mapsKey'));
    }
}
