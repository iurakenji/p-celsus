<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VarCategoricaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('var_categoricas')->insert(['analise_id' => '2', 'ordem' => 1, 'nome' => 'Praticamente insolúvel ou Insolúvel']);
        DB::table('var_categoricas')->insert(['analise_id' => '2', 'ordem' => 2, 'nome' => 'Muito pouco solúvel']);
        DB::table('var_categoricas')->insert(['analise_id' => '2', 'ordem' => 3, 'nome' => 'Pouco solúvel']);
        DB::table('var_categoricas')->insert(['analise_id' => '2', 'ordem' => 4, 'nome' => 'Moderadamente solúvel']);
        DB::table('var_categoricas')->insert(['analise_id' => '2', 'ordem' => 5, 'nome' => 'solúvel']);
        DB::table('var_categoricas')->insert(['analise_id' => '2', 'ordem' => 6, 'nome' => 'Facilmente solúvel']);
        DB::table('var_categoricas')->insert(['analise_id' => '2', 'ordem' => 7, 'nome' => 'Muito solúvel']);
        DB::table('var_categoricas')->insert(['analise_id' => '3', 'ordem' => 1, 'nome' => 'Praticamente insolúvel ou Insolúvel']);
        DB::table('var_categoricas')->insert(['analise_id' => '3', 'ordem' => 2, 'nome' => 'Muito pouco solúvel']);
        DB::table('var_categoricas')->insert(['analise_id' => '3', 'ordem' => 3, 'nome' => 'Pouco solúvel']);
        DB::table('var_categoricas')->insert(['analise_id' => '3', 'ordem' => 4, 'nome' => 'Moderadamente solúvel']);
        DB::table('var_categoricas')->insert(['analise_id' => '3', 'ordem' => 5, 'nome' => 'solúvel']);
        DB::table('var_categoricas')->insert(['analise_id' => '3', 'ordem' => 6, 'nome' => 'Facilmente solúvel']);
        DB::table('var_categoricas')->insert(['analise_id' => '3', 'ordem' => 7, 'nome' => 'Muito solúvel']);
    }
}
