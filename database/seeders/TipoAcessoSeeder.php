<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;


class TipoAcessoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table('tipo_acessos')->insert(['nome' => 'CQ - Técnico', 'descricao' => '']);
       DB::table('tipo_acessos')->insert(['nome' => 'CQ - Farmacêutico', 'descricao' => '']);
       DB::table('tipo_acessos')->insert(['nome' => 'GQ', 'descricao' => '']);
       DB::table('tipo_acessos')->insert(['nome' => 'Suprimentos', 'descricao' => '']);
       DB::table('tipo_acessos')->insert(['nome' => 'Sem Acesso Ativo', 'descricao' => '']);
    }
}
