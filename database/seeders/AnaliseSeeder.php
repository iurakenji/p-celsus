<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnaliseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('analises')->insert(['nome' => 'Características Organolépticas', 'tipo' => 'Categórica Nominal','unidade' => null, 'observacao' => null, 'margem' => 0, 'valor_ar' => 5]);
        DB::table('analises')->insert(['nome' => 'Solubilidade em água', 'tipo' => 'Categórica Ordinal','unidade' => null, 'observacao' => null, 'margem' => 0, 'valor_ar' => 1]);
        DB::table('analises')->insert(['nome' => 'Solubilidade em álcool', 'tipo' => 'Categórica Ordinal','unidade' => null, 'observacao' => null, 'margem' => 0, 'valor_ar' => 1]);
        DB::table('analises')->insert(['nome' => 'pH', 'tipo' => 'Numérica Contínua','unidade' => null, 'observacao' => null, 'margem' => 0.1, 'valor_ar' => 5]);
        DB::table('analises')->insert(['nome' => 'Densidade (com compactação)', 'tipo' => 'Numérica Contínua','unidade' => 'g/cm³', 'observacao' => null, 'margem' => 0.1, 'valor_ar' => 1]);
        DB::table('analises')->insert(['nome' => 'Ponto de Fusão', 'tipo' => 'Numérica Contínua','unidade' => '° C', 'observacao' => null, 'margem' => 0.1, 'valor_ar' => 5]);
    }
}
