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
        DB::table('tipos')->insert(['nome' => 'Insumo Farmacêutico Ativo', 'descricao' => 'Insumos utilizados no preparo de medicamentos com atividade terapêutica relevante.', 'protegido' => 0]);
        DB::table('tipos')->insert(['nome' => 'Excipiente', 'descricao' => 'Insumos inertes utilizados no preparo de medicamentos.', 'protegido' => 0]);
        DB::table('tipos')->insert(['nome' => 'Embalagem', 'descricao' => 'Invólucros utilizados para armazenamento temporário ou definitivo de medicamentos ou de outros insumos.', 'protegido' => 0]);
        DB::table('tipos')->insert(['nome' => 'Cápsula', 'descricao' => 'Invólucros gelatinosos usados para o acondicionamento da mistura de princípio ativos farmaceuticamente ativo e excipientes.', 'protegido' => 0]);
        DB::table('tipos')->insert(['nome' => 'Outros', 'descricao' => 'Outros, uai.', 'protegido' => 0]);
    }
}
