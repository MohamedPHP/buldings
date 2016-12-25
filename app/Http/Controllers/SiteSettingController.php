<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\SiteSetting;
class SiteSettingController extends Controller
{
    public function index(SiteSetting $siteSetting)
    {
        $siteSetting = $siteSetting->all();
        return view('backend.sitesetting..index', compact('siteSetting'));
    }
}
