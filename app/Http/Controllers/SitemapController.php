<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Sitemap\SitemapGenerator;

class SitemapController extends Controller
{
    public function sitemap(){
        SitemapGenerator::create('http://cjip.jatengprov.go.id/')->writeToFile('sitemap.xml');
        return 'success';
    }

}
