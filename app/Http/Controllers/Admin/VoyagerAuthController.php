<?php

namespace App\Http\Controllers\Admin;

use TCG\Voyager\Http\Controllers\VoyagerAuthController as BaseVoyagerAuthController;

class VoyagerAuthController extends BaseVoyagerAuthController
{
    public function redirectTo()
    {
        $isAdmin = auth()->user()->hasRole('Gubernur Jawa Tengah');
        if ($isAdmin){
            return config('voyager.user.redirect-gub', route('map.baru'));
        }
        return config('voyager.user.redirect', route('voyager.dashboard'));
    }
}
