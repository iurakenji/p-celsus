<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArmazenamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('armazenamentos')->insert(['nome' => 'Temperatura Ambiente', 'descricao' => '', 'protegido' => 1]);
        DB::table('armazenamentos')->insert(['nome' => 'Refrigerador', 'descricao' => '', 'protegido' => 1]);
        DB::table('armazenamentos')->insert(['nome' => 'Freezer', 'descricao' => '', 'protegido' => 1]);
        DB::table('armazenamentos')->insert(['nome' => 'Adicionar Sílica', 'descricao' => '', 'protegido' => 0]);
        
    }
}
