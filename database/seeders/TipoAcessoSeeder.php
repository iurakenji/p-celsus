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
       DB::table('tipo_acessos')->insert(['nome' => 'CQ - Técnico', 'descricao' => '', 'protegido' => 0]);
       DB::table('tipo_acessos')->insert(['nome' => 'CQ - Farmacêutico', 'descricao' => '', 'protegido' => 0]);
       DB::table('tipo_acessos')->insert(['nome' => 'GQ', 'descricao' => '', 'protegido' => 0]);
       DB::table('tipo_acessos')->insert(['nome' => 'Suprimentos', 'descricao' => '', 'protegido' => 0]);
       DB::table('tipo_acessos')->insert(['nome' => 'Sem Acesso Ativo', 'descricao' => '', 'protegido' => 0]);
    }
}
