<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ReferenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        echo "Criando tabela Referencias..."."\n";
        DB::unprepared(file_get_contents('storage\app\public\referencias.sql'));
        $referenciaAntigos = DB::table('referenciass')->select('nome')->orderby('nome', 'asc')->get();
        foreach ($referenciaAntigos as $referenciaAntigo) {
            echo "Criando registro ".$referenciaAntigo->nome."\n";
            if (in_array($referenciaAntigo->nome,['Análises Internas', 'Laudo do Fornecedor'])) {
                DB::table('referencias')->insert(['nome' => $referenciaAntigo->nome, 'descricao' => '', 'protegido' => 1]);
            } else {
                DB::table('referencias')->insert(['nome' => $referenciaAntigo->nome, 'descricao' => '', 'protegido' => 0]);
            }
        }
        Schema::drop('referenciass');
    }
}
