<?php

namespace App\Http\Controllers\API\v1;

use App\MailRecipient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MailRecipientController extends Controller
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MailRecipient  $mailRecipient
     * @return \Illuminate\Http\Response
     */
    public function show(MailRecipient $mailRecipient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MailRecipient  $mailRecipient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MailRecipient $mailRecipient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MailRecipient  $mailRecipient
     * @return \Illuminate\Http\Response
     */
    public function destroy(MailRecipient $mailRecipient)
    {
        //
    }
}
