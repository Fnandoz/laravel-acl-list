<?php

use Illuminate\Database\Seeder;
use App\Regras;

class RegraTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $regra_1 = new Regras();
        $regra_1->titulo = "create";
        $regra_1->descricao = "Criar itens na lista";
        $regra_1->save();

        $regra_2 = new Regras();
        $regra_2->titulo = "read";
        $regra_2->descricao = "Lê itens na lista";
        $regra_2->save();

        $regra_3 = new Regras();
        $regra_3->titulo = "update";
        $regra_3->descricao = "Atualiza itens na lista";
        $regra_3->save();

        $regra_4 = new Regras();
        $regra_4->titulo = "delete";
        $regra_4->descricao = "Apaga itens na lista";
        $regra_4->save();

        $regra_5 = new Regras();
        $regra_5->titulo = "master";
        $regra_5->descricao = "Master";
        $regra_5->save();

    }
}
