<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Matheus Félix',
            'email' => 'mat@felix.com',
            'password'=> bcrypt('admin01'),
            'prontuario' => 'gu1661027'
        ]);
    }
}
