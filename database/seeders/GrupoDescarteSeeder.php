<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GrupoDescarteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('grupodescartes')->insert(['nome' => 'Comum', 'orientacoes' => '']);
        DB::table('grupodescartes')->insert(['nome' => 'Ácidos', 'orientacoes' => '']);
        DB::table('grupodescartes')->insert(['nome' => 'Bases', 'orientacoes' => '']);
        DB::table('grupodescartes')->insert(['nome' => 'Nitrogenados', 'orientacoes' => '']);
        DB::table('grupodescartes')->insert(['nome' => 'Oxidantes', 'orientacoes' => '']);
    }
}
