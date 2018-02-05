<?php

use Illuminate\Database\Seeder;
use App\Regras;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $regra_master = Regras:where('titulo', 'master')->first();

        $user = new User();
        $user->email = 'master';
        $user->password = bcrypt('master');
        $user->save();
    }
}
