<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        echo "Criando tabela Fornecedores..."."\n";
        DB::unprepared(file_get_contents('storage\app\public\fornecedores.sql'));
        $fornecedorAntigos = DB::table('fornecedores')->select('nome')->orderby('nome', 'asc')->get();
        DB::table('fornecedors')->insert(['nome' => '', 'telefone' => '', 'cep' => '', 'cnpj' => '', 'protegido' => 1]);
        foreach ($fornecedorAntigos as $fornecedorAntigo) {
            echo "Criando registro ".$fornecedorAntigo->nome."\n";
        DB::table('fornecedors')->insert(['nome' => $fornecedorAntigo->nome, 'telefone' => '', 'cep' => '', 'cnpj' => '']);
        }
        Schema::drop('fornecedores');
    }
}
