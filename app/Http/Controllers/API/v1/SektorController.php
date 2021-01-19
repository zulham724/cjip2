<?php

namespace App\Http\Controllers\API\v1;

use App\Sektor;
use App\Proyek;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SektorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sektors = Sektor::get();
        return response()->json($sektors);
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
        $sektor = new Sektor($request->all());
        $sektor->save();
        return response()->json($sektor);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sektor  $sektor
     * @return \Illuminate\Http\Response
     */
    public function show(Sektor $sektor)
    {
        $sektor->load(['proyeks'=>function($query){
            $query->select('id','latar_belakang','project_name')->where('status',1);
        }]);
        return response()->json($sektor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sektor  $sektor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sektor $sektor)
    {
        $sektor->fill($request->all())->update();
        return response()->json($sektor);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sektor  $sektor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sektor $sektor)
    {
        $sektor->delete();
        return response()->json($sektor);
    }
}
