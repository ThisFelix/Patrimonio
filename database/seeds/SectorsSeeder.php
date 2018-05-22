<?php

use Illuminate\Database\Seeder;

class SectorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Sectors')->insert([
            'responsible' => 'Informatica',
            'name' => 'Matheus Félix',
            'responsibleEmail' => 'matheus.felix96@gmail.com',
            'sectorEmail' => 'info@fake.com.br',
            'sectorPhone' => '11965050505'
        ]);

        factory('App\Models\Sector', 15)->create();
    }
}
