<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipos')->insert(['nome' => 'Insumo Farmacêutico Ativo', 'descricao' => 'Insumos utilizados no preparo de medicamentos com atividade terapêutica relevante.']);
        DB::table('tipos')->insert(['nome' => 'Excipiente', 'descricao' => 'Insumos inertes utilizados no preparo de medicamentos.']);
        DB::table('tipos')->insert(['nome' => 'Embalagem', 'descricao' => 'Invólucros utilizados para armazenamento temporário ou definitivo de medicamentos ou de outros insumos.']);
        DB::table('tipos')->insert(['nome' => 'Cápsula', 'descricao' => 'Invólucros gelatinosos usados para o acondicionamento da mistura de princípio ativos farmaceuticamente ativo e excipientes.']);
        DB::table('tipos')->insert(['nome' => 'Outros', 'descricao' => 'Outros, uai.']);
    }
}
