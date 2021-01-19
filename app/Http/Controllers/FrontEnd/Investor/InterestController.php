<?php

namespace App\Http\Controllers\FrontEnd\Investor;

use App\CjibfEvent;
use App\CjibfSektor;
use App\Feed;
use App\KabKota;
use App\LoiInterest;
use App\Lois;
use App\ProfileInvestor;
use App\Sektor;
use App\Berita;
use App\Widgets\Loi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class InterestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:investor');
    }

    public function showInterestForm(){

        $perusahaan = ProfileInvestor::all()->first();
        $sektors = CjibfSektor::all();
        $cities = KabKota::all();
        //dd($cities);
        foreach ($cities as $city){
            //dd($city->user->id);
        }
        $intersts = LoiInterest::all();
        $populers = Feed::orderByViews()->take(5)->get();
        $news = Berita::take(5)->get();
        $cjibf = CjibfEvent::first();
        return view('front-end.investor.interest-manual', compact('cjibf','perusahaan', 'sektors', 'cities', 'intersts', 'populers', 'news'));
    }

    /**
     * @param Request $request
     * @throws \Illuminate\Validation\ValidationException
     */
    public function storeInterest(Request $request){
        //dd($request->all());

       // dd(Input::rew('kab_kota'));



        $user = Auth::guard('investor')->user()->id;
        $profil = ProfileInvestor::where('user_id', $user)->first();


        $post = new Lois();

        $post->kab_kota_id = $request->kabkota;
        $post->nama_perusahaan = $profil->nama_perusahaan;
        $post->alamat_perusahaan = $profil->alamat;
        $post->bidang_usaha = $profil->bidang_usaha;
        $post->nama_pengusaha = $profil->investor_name;
        $post->jabatan_pengusaha = $profil->jabatan;
        $post->phone = $profil->phone;
        $post->email = $profil->userInv->email;
        $post->user_id = $user;
        $post->project_id = $request->project_id;
        //dd($post);

        $post->save();


        return redirect()->route('homey2');
    }
}
