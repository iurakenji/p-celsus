<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class SetorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        echo "Criando tabela Setores..."."\n";
        DB::unprepared(file_get_contents('storage\app\public\setores.sql'));
        $setorAntigos = DB::table('setores')->select('nome')->orderby('nome', 'asc')->get();
        foreach ($setorAntigos as $setorAntigo) {
            echo "Criando registro ".$setorAntigo->nome."\n";
        DB::table('setors')->insert(['nome' => $setorAntigo->nome, 'descricao' => '', 'protegido' => 0]);
        }
        Schema::drop('setores');
    }
}
