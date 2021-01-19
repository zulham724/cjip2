<?php

namespace App\Http\Controllers\FrontEnd\Investor;

use App\CjibfEvent;
use App\CjibfSektor;
use App\KabKota;
use App\LoiInterest;
use App\Pengumuman;
use App\ProfileInvestor;
use App\Sektor;
use App\UserInvestor;
use FontLib\Table\Type\post;
use Hashids\Hashids;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:investor');
    }

    public function showProfileForm($id){

        $user = UserInvestor::findOrFail($id);
        $sektors = CjibfSektor::all();
        $pengumuman = Pengumuman::all();
        $cjibf = CjibfEvent::first();

        return view('front-end.investor.form-profile', compact('user', 'sektors', 'pengumuman', 'cjibf'));
    }

    /**
     * @param Request $request
     * @throws \Illuminate\Validation\ValidationException
     */
    public function storeProfile(Request $request){

        $this->validate($request, [
            'name' => 'required',
            'jabatan' => 'required',
            'phone' => 'required',
            'company_name' => 'required',
            'bidang_usaha' => 'required',
            'badan_hukum' => 'required',
            'address' => 'required',
            'country' => 'required',
        ]);
        //dd($request->all());

        $profile = new ProfileInvestor();
        $profile->user_id = Auth::guard('investor')->user()->id;
        $profile->investor_name = $request->input('name');
        $profile->jabatan = $request->input('jabatan');
        $profile->phone = $request->input('phone');
        $profile->nama_perusahaan = $request->input('company_name');
        $profile->badan_hukum = $request->input('badan_hukum');
        $profile->country = $request->input('country');
        $profile->bidang_usaha = $request->input('bidang_usaha');
        $profile->alamat = $request->input('address');

        //dd($profile);
        $profile->save();

        return redirect()->route('frontend.cjibf');
    }

    public function daftar(){
        return redirect()->route('form.profile', Auth::guard('investor')->user()->id);
    }

    public function dashboard($hashed){

        $hashids = new Hashids();

        $id = $hashids->decode($hashed);
        //dd($id);
        $profile = ProfileInvestor::where('user_id', $id)->first();
        $pengumuman = Pengumuman::all();
        $user = Auth::guard('investor')->user();
        if ($user->profile != null){
            return view('front-end.investor.content.profile', compact('profile', 'user', 'pengumuman'));
        }
        else{
            return redirect()->route('form.profile', $id);
        }
    }

    public function updateProfile(Request $request, $hashed){
        //dd($request->all());
        $hashids = new Hashids();

        $id = $hashids->decode($hashed);
        $profile = ProfileInvestor::findOrFail($id);
        $profile->investor_name = $request->name;
        $profile->jabatan = $request->jabatan;
        $profile->phone = $request->phone;
        $profile->nama_perusahaan = $request->company_name;
        $profile->badan_hukum = $request->badan_hukum;
        $profile->bidang_usaha = $request->bidang_usaha;
        $profile->alamat = $request->address;
        $email = UserInvestor::where('id', $profile->user_id)->first();
        $email->email = $request->email;
        //dd($profile);
        $email->update();
        $profile->update();

        return redirect()->back()->with(['success' => 'Your Company Profiles has been updated',
            'error' => 'Failed to update your Company Profiles']);
    }


    public function investment(){

        $profile = ProfileInvestor::where('user_id', Auth::guard('investor')->user()->id)->first();
        // dd($investment);
        $sektors = Sektor::all();
        $cities = KabKota::all();
        $pengumuman = Pengumuman::all();
        $lois = LoiInterest::where('profile_id', $profile->id)->get();
        //dd(empty($lois));

        $user = Auth::guard('investor')->user();
        //dd($user);
        $cjibf = CjibfEvent::first();

        return view('front-end.investor.content.investment', compact( 'cjibf','profile', 'sektors','cities', 'user', 'lois', 'pengumuman'));
    }

    public function investmentEdit($id){

        $loi_edit = LoiInterest::findOrFail($id);
        $pengumuman = Pengumuman::all();
        $sektors = Sektor::all();
        $cities = KabKota::all();
        $profile = ProfileInvestor::where('user_id', Auth::guard('investor')->user()->id)->first();
        $lois = LoiInterest::where('profile_id', $profile->id)->get();
        //dd(empty($lois));
        $user = Auth::guard('investor')->user();
        //dd($user);
        return view('front-end.investor.content.invest-edit', compact( 'loi_edit',  'cities', 'lois', 'pengumuman' ));
    }

    public function investmentUpdate(Request $request, $id){

        //dd($request->all());

        $loi_edit = LoiInterest::findOrFail($id);

        $sektors = Sektor::all();
        $cities = KabKota::all();
        $profile = ProfileInvestor::where('user_id', Auth::guard('investor')->user()->id)->first();
        $lois = LoiInterest::where('profile_id', $profile->id)->get();
        //dd(empty($lois));
        $user = Auth::guard('investor')->user();
        //dd($user);
        return view('front-end.investor.content.investment', compact( 'loi_edit',  'cities', 'lois' ));
    }
    /**
     * @param Request $request
     * @throws \Illuminate\Validation\ValidationException
     */
    public function investmentPost(Request $request){
        $this->validate($request, [
            'sektor' => 'required',
            'kab_kota' => 'required',
            'lokasi' => 'required',
        ]);
        //dd($request->all());
        $user = Auth::guard('investor')->user()->id;
        $profil = ProfileInvestor::where('user_id', $user)->first();

        // dd($request->filled('rp'));

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

        /*$jml = Loi::with('nilai_investasi');*/

        $post = new LoiInterest();
        if ($storethisusd == 0) {
            $post->nilai_usd = 0;
            $post->nilai_rp = $storethis;
        }
        elseif ($storethis == 0) {
            $post->nilai_rp = 0;
            $post->nilai_usd = $storethisusd;
        }

        $post->user_id = $user;
        $post->profile_id = $profil->id;
        $post->sektor_id = $request->sektor;
        $post->kab_kota_id = $request->input('kab_kota');
        $post->lokasi_investasi = $request->input('lokasi');
        //dd($post);
        $post->save();
        return redirect()->back()->with(['success' => 'Thank You for investing in '.$post->kota->nama .', We will support you :)',
            'error' => 'Failed to make a Letter of Intent']);
    }

    public function updateInvestment(Request $request, $id){
        //dd($request->all());
        return redirect()->back();
    }
}
