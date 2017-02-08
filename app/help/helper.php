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
function bulding_rent()
{
    $array = [
        'egar',
        'tamleek',
    ];
    return $array;
}

function roomnumber()
{
    $array = [];
    for ($i=2; $i <= 20; $i++) {
        $array[$i] = $i;
    }
    return $array;
}
function places()
{
    $places = App\Places::all();
    $array = [];
    foreach ($places as $place) {
        $array[$place->id] = $place->name;
    }
    return $array;
}


function search()
{
    $array = [
        'price'      => 'the bulding price',
        'price_to'   => 'the bulding max price',
        'price_from' => 'the bulding min price',
        'rooms'      => 'bulding rooms',
        'type'       => 'the bulding type',
        'rent'       => 'the bulding rent',
        'place_id'   => 'the area of the bulding',
        'square'     => 'the square of the bulding',
    ];
    return $array;
}
