<?php

use Illuminate\Database\Seeder;
use App\Regra;

class RegraTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $regra_1 = new Regra();
        $regra_1->titulo = "create";
        $regra_1->descricao = "Criar itens na lista";
        $regra_1->save();

        $regra_2 = new Regra();
        $regra_2->titulo = "read";
        $regra_2->descricao = "Lê itens na lista";
        $regra_2->save();

        $regra_3 = new Regra();
        $regra_3->titulo = "update";
        $regra_3->descricao = "Atualiza itens na lista";
        $regra_3->save();

        $regra_4 = new Regra();
        $regra_4->titulo = "delete";
        $regra_4->descricao = "Apaga itens na lista";
        $regra_4->save();

        $regra_5 = new Regra();
        $regra_5->titulo = "master";
        $regra_5->descricao = "Master";
        $regra_5->save();

    }
}
