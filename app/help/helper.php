<?php



function getString($sitename = 'sitename')
{
    return \App\SiteSetting::where('namesetting', $sitename)->first()->value;
}
