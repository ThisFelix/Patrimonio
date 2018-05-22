<?php

use Illuminate\Database\Seeder;

class PatrimoniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('patrimonies')->insert([
            'name' => 'Monitor',
            'category' => 'Periférico',
            'model' => 'LG A4325',
            'description' => 'Monitor LG 21',
            'image' => 'img.jpg',
            'location' => 'F2',
            'sector' => 'informatica'
        ]);

        factory('App\Patrimony', 15)->create();
    }
}
