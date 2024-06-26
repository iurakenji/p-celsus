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
        DB::table('analises')->insert(['nome' => 'Características Organolépticas', 'tipo' => 'Categórica Nominal','unidade' => null, 'margem' => 0, 'valor_ar' => 5, 'tipo_id' => 1, 'protegido' => 1]);
        DB::table('analises')->insert(['nome' => 'Solubilidade em água', 'tipo' => 'Categórica Ordinal','unidade' => null, 'margem' => 0, 'valor_ar' => 1, 'tipo_id' => 1, 'protegido' => 1]);
        DB::table('analises')->insert(['nome' => 'Solubilidade em álcool', 'tipo' => 'Categórica Ordinal','unidade' => null, 'margem' => 0, 'valor_ar' => 1, 'tipo_id' => 1, 'protegido' => 1]);
        DB::table('analises')->insert(['nome' => 'pH', 'tipo' => 'Numérica Contínua','unidade' => null, 'margem' => 0.1, 'valor_ar' => 5, 'tipo_id' => 1, 'protegido' => 1]);
        DB::table('analises')->insert(['nome' => 'Densidade (com compactação)', 'tipo' => 'Numérica Contínua','unidade' => 'g/cm³', 'margem' => 0.1, 'valor_ar' => 1, 'tipo_id' => 1, 'protegido' => 1]);
        DB::table('analises')->insert(['nome' => 'Ponto de Fusão', 'tipo' => 'Numérica Contínua','unidade' => '° C', 'margem' => 0.1, 'valor_ar' => 5, 'tipo_id' => 1, 'protegido' => 1]);
        DB::table('analises')->insert(['nome' => 'Solubilidade em água Quente', 'tipo' => 'Categórica Ordinal','unidade' => null, 'margem' => 0, 'valor_ar' => 1, 'tipo_id' => 1, 'protegido' => 1]);
        DB::table('analises')->insert(['nome' => 'Solubilidade em isopropanol', 'tipo' => 'Categórica Ordinal','unidade' => null, 'margem' => 0, 'valor_ar' => 1, 'tipo_id' => 1, 'protegido' => 1]);
        DB::table('analises')->insert(['nome' => 'Características físicas', 'tipo' => 'Categórica Nominal','unidade' => null, 'margem' => 0, 'valor_ar' => 1, 'tipo_id' => 3, 'protegido' => 1]);
        DB::table('analises')->insert(['nome' => 'Largura', 'tipo' => 'Numérica contínua','unidade' => 'mm', 'margem' => 0, 'valor_ar' => 1, 'tipo_id' => 3, 'protegido' => 1]);
        DB::table('analises')->insert(['nome' => 'Comprimento', 'tipo' => 'Numérica contínua','unidade' => 'mm', 'margem' => 0, 'valor_ar' => 1, 'tipo_id' => 3, 'protegido' => 1]);
        DB::table('analises')->insert(['nome' => 'Condições gerais', 'tipo' => 'Categórica Nominal','unidade' => null, 'margem' => 0, 'valor_ar' => 1, 'tipo_id' => 3, 'protegido' => 1]);
        DB::table('analises')->insert(['nome' => 'Características organolépticas Gerais', 'tipo' => 'Categórica Nominal','unidade' => null, 'margem' => 0, 'valor_ar' => 1, 'tipo_id' => 4, 'protegido' => 1]);
        DB::table('analises')->insert(['nome' => 'Características organolépticas: Coloração', 'tipo' => 'Categórica Nominal','unidade' => null, 'margem' => 0, 'valor_ar' => 1, 'tipo_id' => 4, 'protegido' => 1]);
        DB::table('analises')->insert(['nome' => 'Peso médio', 'tipo' => 'Categórica Nominal','unidade' => null, 'margem' => 0, 'valor_ar' => 1, 'tipo_id' => 4, 'protegido' => 1]);
        
    }
}
