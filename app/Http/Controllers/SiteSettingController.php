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
            if ($siteSettingUpdate->type == 2) {
                if ($siteSettingUpdate->value != 'src/buldings/no_image/no_image.jpg') {
                    if ($siteSettingUpdate->value != 'src/buldings/default.jpg') {
                        unlink(public_path($siteSettingUpdate->value));
                    }
                }
                $siteSettingUpdate->value = $this->upload($r);
            }else {
                $siteSettingUpdate->value = $r;
            }
            $siteSettingUpdate->save();
        }
        return redirect()->back()->with(['message' => 'Site Settings Updated Successfully']);
    }
    public function upload($file){
        $extension = $file->getClientOriginalExtension();
        $sha1 = sha1($file->getClientOriginalName());
        $filename = date('Y-m-d-h-i-s')."_".$sha1.".".$extension;
        $path = public_path('src/sitesettings/images');
        $file->move($path, $filename);
        return 'src/sitesettings/images/'.$filename;
    }

}
