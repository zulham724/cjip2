<?php

namespace App\Http\Controllers\API\v1;

use App\LoiInterest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoiInterestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $auth = Auth::guard('investor')->user();
        $loiInterest = new LoiInterest($request->all());
        $auth->loi_interests()->save($loiInterest);
        return response()->json($auth->load('loi_interests'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LoiInterest  $loiInterest
     * @return \Illuminate\Http\Response
     */
    public function show(LoiInterest $loiInterest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LoiInterest  $loiInterest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LoiInterest $loiInterest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LoiInterest  $loiInterest
     * @return \Illuminate\Http\Response
     */
    public function destroy(LoiInterest $loiInterest)
    {
        //
    }
}
