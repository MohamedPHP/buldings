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


    public function store(Request $request, SiteSetting $siteSetting)
    {
        foreach (array_except($request->toArray(), ['_token']) as $req => $r) {
            $siteSettingUpdate = $siteSetting->where('namesetting', $req)->first();
            $siteSettingUpdate->value = $r;
            $siteSettingUpdate->save();
        }
        return redirect()->back()->with(['message' => 'Site Settings Updated Successfully']);
    }
}
