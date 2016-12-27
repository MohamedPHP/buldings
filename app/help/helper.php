<?php



function getString($sitename = 'sitename')
{
    return \App\SiteSetting::where('namesetting', $sitename)->first()->value;
}


public function bulding_type()
{
    $array = [
        'villa'
        'apartment'
        'beachHome'
    ];
    return $array;
}
