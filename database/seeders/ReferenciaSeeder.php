<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReferenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('referencias')->insert(['nome' => 'Análises Internas', 'descricao' => '']);
        DB::table('referencias')->insert(['nome' => 'BP 2020', 'descricao' => '']);
        DB::table('referencias')->insert(['nome' => 'CAMEO Chemicals', 'descricao' => '']);
        DB::table('referencias')->insert(['nome' => 'ChemSrc', 'descricao' => '']);
        DB::table('referencias')->insert(['nome' => 'Declarado pelo fornecedor e referenciado pelo mesmo como FB 6', 'descricao' => '']);
        DB::table('referencias')->insert(['nome' => 'Drug Bank', 'descricao' => '']);
        DB::table('referencias')->insert(['nome' => 'EP10', 'descricao' => '']);
        DB::table('referencias')->insert(['nome' => 'EPA DSSTox', 'descricao' => '']);
        DB::table('referencias')->insert(['nome' => 'Farmacopeia Homeopatica Brasileira 3ª Edição', 'descricao' => '']);
        DB::table('referencias')->insert(['nome' => 'FB 6', 'descricao' => '']);
        DB::table('referencias')->insert(['nome' => 'FCC 9', 'descricao' => '']);
        DB::table('referencias')->insert(['nome' => 'Handbook of pharmaceutical excipients, 2003', 'descricao' => '']);
        DB::table('referencias')->insert(['nome' => 'HMDB', 'descricao' => '']);
        DB::table('referencias')->insert(['nome' => 'HSDB', 'descricao' => '']);
        DB::table('referencias')->insert(['nome' => 'JP XVII', 'descricao' => '']);
        DB::table('referencias')->insert(['nome' => 'Laudo do Fornecedor', 'descricao' => '']);
        DB::table('referencias')->insert(['nome' => 'PB 20', 'descricao' => '']);
        DB::table('referencias')->insert(['nome' => 'PubChem', 'descricao' => '']);
        DB::table('referencias')->insert(['nome' => 'Sci-finder', 'descricao' => '']);
        DB::table('referencias')->insert(['nome' => 'USP 43', 'descricao' => '']);
        DB::table('referencias')->insert(['nome' => 'USP 44 NF 39', 'descricao' => '']);
    }
}
