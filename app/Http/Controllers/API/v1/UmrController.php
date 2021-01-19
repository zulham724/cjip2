<?php

namespace App\Http\Controllers\API\v1;

use App\Umr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UmrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $umks = Umr::with('kab.namakota')->groupBy(['kab_kota_id', 'tahun'])->get();
        // $min = Umr::min('nilai_umr');
        // $max = Umr::max('nilai_umr');
        // $min_umk = Umr::where('nilai_umr', $min)->where('tahun', '2020')->first();
        // $max_umk = Umr::where('nilai_umr', $max)->where('tahun', '2020')->first();
        return response()->json($umks);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Umr  $umr
     * @return \Illuminate\Http\Response
     */
    public function show(Umr $umr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Umr  $umr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Umr $umr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Umr  $umr
     * @return \Illuminate\Http\Response
     */
    public function destroy(Umr $umr)
    {
        //
    }
}
