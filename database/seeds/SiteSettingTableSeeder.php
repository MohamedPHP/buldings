<?php

use Illuminate\Database\Seeder;

class SiteSettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
         DB::statement('SET FOREIGN_KEY_CHECKS=0');
         DB::table('siteSetting')->truncate();
         // `id`, `slug`, `namesetting`, `value`, `type`
         $siteSetting = [
             [
                 'slug' => 'Site Name',
                 'namesetting' => 'sitename',
                 'value' => 'Buldings',
                 'type' => 0,
             ],
             [
                 'slug' => 'Phone',
                 'namesetting' => 'sitephone',
                 'value' => '01127946754',
                 'type' => 0,
             ],
             [
                 'slug' => 'address',
                 'namesetting' => 'siteaddress',
                 'value' => 'nasr city',
                 'type' => 0,
             ],
             [
                 'slug' => 'FB',
                 'namesetting' => 'siteFB',
                 'value' => 'https://www.facebook.com',
                 'type' => 0,
             ],
             [
                 'slug' => 'YT',
                 'namesetting' => 'siteYT',
                 'value' => 'https://www.youtube.com',
                 'type' => 0,
             ],
             [
                 'slug' => 'description',
                 'namesetting' => 'sitedesc',
                 'value' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                 'type' => 1,
             ],
             [
                 'slug'         => 'No Image',
                 'namesetting'  => 'no_image',
                 'value'        => 'src/buldings/no_image/no_image.jpg',
                 'type'         => 2,
             ],
             [
                 'slug'         => 'The Main Slider',
                 'namesetting'  => 'slider_image',
                 'value'        => 'src/buldings/default.jpg',
                 'type'         => 2,
             ],
         ];
         DB::table('siteSetting')->insert($siteSetting);
     }
}
