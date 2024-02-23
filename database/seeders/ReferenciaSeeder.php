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
        DB::table('referencias')->insert(['nome' => 'Análises Internas', 'peso' => 1, 'protegido' => 1, 'descricao' => '']);
        DB::table('referencias')->insert(['nome' => 'BP 2020', 'peso' => 4, 'protegido' => 1, 'descricao' => '']);
        DB::table('referencias')->insert(['nome' => 'CAMEO Chemicals', 'peso' => 2, 'protegido' => 0, 'descricao' => '']);
        DB::table('referencias')->insert(['nome' => 'ChemSrc', 'peso' => 2, 'protegido' => 0, 'descricao' => '']);
        DB::table('referencias')->insert(['nome' => 'Declarado pelo fornecedor e referenciado pelo mesmo como FB 6', 'peso' => 2, 'protegido' => 0, 'descricao' => '']);
        DB::table('referencias')->insert(['nome' => 'Drug Bank', 'peso' => 2, 'protegido' => 0, 'descricao' => '']);
        DB::table('referencias')->insert(['nome' => 'EP10', 'peso' => 5, 'protegido' => 1, 'descricao' => '']);
        DB::table('referencias')->insert(['nome' => 'EPA DSSTox', 'peso' => 2, 'protegido' => 0, 'descricao' => '']);
        DB::table('referencias')->insert(['nome' => 'Farmacopeia Homeopatica Brasileira 3ª Edição', 'pesoo' => 6, 'protegido' => 1, 'descricao' => '']);
        DB::table('referencias')->insert(['nome' => 'FB 6', 'peso' => 6, 'protegido' => 1, 'descricao' => '']);
        DB::table('referencias')->insert(['nome' => 'FCC 9', 'peso' => 4, 'protegido' => 1, 'descricao' => '']);
        DB::table('referencias')->insert(['nome' => 'Handbook of pharmaceutical excipients, 2003', 'peso' => 2, 'protegido' => 0, 'descricao' => '']);
        DB::table('referencias')->insert(['nome' => 'HMDB', 'peso' => 2, 'protegido' => 0, 'descricao' => '']);
        DB::table('referencias')->insert(['nome' => 'HSDB', 'peso' => 2, 'protegido' => 0, 'descricao' => '']);
        DB::table('referencias')->insert(['nome' => 'JP XVII', 'peso' => 5, 'protegido' => 1, 'descricao' => '']);
        DB::table('referencias')->insert(['nome' => 'Laudo do Fornecedor', 'peso' => 3, 'protegido' => 1, 'descricao' => '']);
        DB::table('referencias')->insert(['nome' => 'PB 20', 'peso' => 5, 'protegido' => 1, 'descricao' => '']);
        DB::table('referencias')->insert(['nome' => 'PubChem', 'peso' => 2, 'protegido' => 0, 'descricao' => '']);
        DB::table('referencias')->insert(['nome' => 'Sci-finder', 'peso' => 2, 'protegido' => 0, 'descricao' => '']);
        DB::table('referencias')->insert(['nome' => 'USP 43', 'peso' => 5, 'protegido' => 1, 'descricao' => '']);
        DB::table('referencias')->insert(['nome' => 'USP 44 NF 39', 'peso' => 5, 'protegido' => 1, 'descricao' => '']);
    }
}
