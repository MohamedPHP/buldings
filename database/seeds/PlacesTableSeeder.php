<?php

use Illuminate\Database\Seeder;

class PlacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('places')->truncate();
        $places = [];
        for ($i = 1; $i < 50 ; $i++)
        {
            $places[] = [
                'name'      => 'Bulding Area ' . $i,
            ];
        }
        DB::table('places')->insert($places);
    }
}
