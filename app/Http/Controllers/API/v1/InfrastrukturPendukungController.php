<?php

namespace App\Http\Controllers\API\v1;

use App\InfrastrukturPendukung;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InfrastrukturPendukungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $infrastrukturPendukungs = InfrastrukturPendukung::get();
        return response()->json($infrastrukturPendukungs);
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
     * @param  \App\InfrastrukturPendukung  $infrastrukturPendukung
     * @return \Illuminate\Http\Response
     */
    public function show(InfrastrukturPendukung $infrastrukturPendukung)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InfrastrukturPendukung  $infrastrukturPendukung
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InfrastrukturPendukung $infrastrukturPendukung)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InfrastrukturPendukung  $infrastrukturPendukung
     * @return \Illuminate\Http\Response
     */
    public function destroy(InfrastrukturPendukung $infrastrukturPendukung)
    {
        //
    }
}
