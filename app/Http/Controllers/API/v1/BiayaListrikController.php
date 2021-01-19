<?php

namespace App\Http\Controllers\API\v1;

use App\BiayaListrik;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BiayaListrikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $biayaListriks = BiayaListrik::with('kategori')->get();
        return response()->json($biayaListriks);
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
     * @param  \App\BiayaListrik  $biayaListrik
     * @return \Illuminate\Http\Response
     */
    public function show(BiayaListrik $biayaListrik)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BiayaListrik  $biayaListrik
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BiayaListrik $biayaListrik)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BiayaListrik  $biayaListrik
     * @return \Illuminate\Http\Response
     */
    public function destroy(BiayaListrik $biayaListrik)
    {
        //
    }
}
