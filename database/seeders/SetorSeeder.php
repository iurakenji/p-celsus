<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SetorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('setors')->insert(['nome' => 'Citostáticos', 'descricao' => '']);
        DB::table('setors')->insert(['nome' => 'Controlados', 'descricao' => '']);
        DB::table('setors')->insert(['nome' => 'Homeopatia', 'descricao' => '']);
        DB::table('setors')->insert(['nome' => 'Hormônios Externos', 'descricao' => '']);
        DB::table('setors')->insert(['nome' => 'Hormônios Internos', 'descricao' => '']);
        DB::table('setors')->insert(['nome' => 'Injetáveis', 'descricao' => '']);
        DB::table('setors')->insert(['nome' => 'Lactos', 'descricao' => '']);
        DB::table('setors')->insert(['nome' => 'Líquidos Externos (Dermato)', 'descricao' => '']);
        DB::table('setors')->insert(['nome' => 'Semissólidos (Pastilha)', 'descricao' => '']);
        DB::table('setors')->insert(['nome' => 'Pesagem', 'descricao' => '']);
        DB::table('setors')->insert(['nome' => 'Produção', 'descricao' => '']);
        DB::table('setors')->insert(['nome' => 'Shake', 'descricao' => '']);
        DB::table('setors')->insert(['nome' => 'Líquidos Internos (Xarope)', 'descricao' => '']);
    }
}
