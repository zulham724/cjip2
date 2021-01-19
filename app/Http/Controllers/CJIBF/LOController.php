<?php

namespace App\Http\Controllers\CJIBF;

use App\CjibfInvestor;
use App\CjibfTable;
use App\Lois;
use App\SettingLo;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LOController extends Controller
{

    public function lo(){
        return view('master-lo');
    }

    public function loSetting($id){

        $lo = SettingLo::with('meja')->where('user_lo', $id)->first();


            $investor_daftar = CjibfInvestor::where('meja_id', $lo->meja[0]->kode_meja)->orWhere('meja_id', $lo->meja[1]->kode_meja)->get();
            $meja1 = CjibfInvestor::where('meja_id', $lo->meja[0]->kode_meja)->get();
            $meja2 = CjibfInvestor::where('meja_id', $lo->meja[1]->kode_meja)->get();

            $investor = CjibfInvestor::has('loi')->with('loi')->where('meja_id', $lo->meja[0]->kode_meja)->orWhere('meja_id', $lo->meja[1]->kode_meja)->get();


            return view('cjibf.lo2019', compact('investor', 'investor_daftar', 'meja1', 'meja2'));


    }
}
