<?php

use Illuminate\Database\Seeder;

class BuldingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('buldings')->truncate();
        $bu = [];
        for ($i = 1; $i < 100 ; $i++)
        {
            $bu[] = [
                'name'      => 'Bulding ' . $i,
                'price'     => rand(1000, 9999),
                'rooms'     => rand(2, 8),
                'rent'      => rand(0, 1),
                'square'    => rand(100, 250),
                'type'      => rand(0, 2),
                'small_dis' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut en' . $i,
                'meta'      => 'good, place, apartments, villas, egar, tamleek ' . $i,
                'langtude'  => rand(0, 100),
                'latitude'  => rand(0, 100),
                'larg_dis'  => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.' . 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.' . $i,
                'status'    => rand(0, 1),
                'place_id'    => rand(1, 49),
                'user_id'   => 1,
            ];
        }
        DB::table('buldings')->insert($bu);
    }
}
