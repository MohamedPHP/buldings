<?php



function getString($sitename = 'sitename')
{
    return \App\SiteSetting::where('namesetting', $sitename)->first()->value;
}


function bulding_type()
{
    $array = [
        'villa',
        'apartment',
        'beachHome',
    ];
    return $array;
}
function bulding_status()
{
    $array = [
        'Deactivated',
        'Activated',
    ];
    return $array;
}
