<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RiscoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('riscos')->insert(['nome' => 'Inflamável', 'descricao' => '']);
        DB::table('riscos')->insert(['nome' => 'Oxidante', 'descricao' => '']);
        DB::table('riscos')->insert(['nome' => 'Corrosivo', 'descricao' => '']);
        DB::table('riscos')->insert(['nome' => 'Risco à Saúde', 'descricao' => '']);
        DB::table('riscos')->insert(['nome' => 'Risco Ambiental', 'descricao' => '']);
        DB::table('riscos')->insert(['nome' => 'Explosivo', 'descricao' => '']);
        DB::table('riscos')->insert(['nome' => 'Irritante', 'descricao' => '']);
        DB::table('riscos')->insert(['nome' => 'Tóxico', 'descricao' => '']);
    }
}
