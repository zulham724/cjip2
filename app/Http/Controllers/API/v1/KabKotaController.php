<?php

namespace App\Http\Controllers\API\v1;

use App\KabKota;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KabKotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cities = KabKota::all();
        return response()->json($cities);
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
     * @param  \App\KabKota  $kabKota
     * @return \Illuminate\Http\Response
     */
    public function show(KabKota $kabKota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\KabKota  $kabKota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KabKota $kabKota)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\KabKota  $kabKota
     * @return \Illuminate\Http\Response
     */
    public function destroy(KabKota $kabKota)
    {
        //
    }
}
