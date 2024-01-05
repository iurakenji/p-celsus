<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('locals')->insert(['nome' => 'A1', 'descricao' => '']);
        DB::table('locals')->insert(['nome' => 'A2', 'descricao' => '']);
        DB::table('locals')->insert(['nome' => 'A3', 'descricao' => '']);
        DB::table('locals')->insert(['nome' => 'A4', 'descricao' => '']);
        DB::table('locals')->insert(['nome' => 'A5', 'descricao' => '']);
        DB::table('locals')->insert(['nome' => 'A6', 'descricao' => '']);
        DB::table('locals')->insert(['nome' => 'A7', 'descricao' => '']);
        DB::table('locals')->insert(['nome' => 'A8', 'descricao' => '']);
        DB::table('locals')->insert(['nome' => 'A9', 'descricao' => '']);
        DB::table('locals')->insert(['nome' => 'B1', 'descricao' => '']);
        DB::table('locals')->insert(['nome' => 'B2', 'descricao' => '']);
        DB::table('locals')->insert(['nome' => 'B3', 'descricao' => '']);
        DB::table('locals')->insert(['nome' => 'B4', 'descricao' => '']);
        DB::table('locals')->insert(['nome' => 'B5', 'descricao' => '']);
        DB::table('locals')->insert(['nome' => 'B6', 'descricao' => '']);
        DB::table('locals')->insert(['nome' => 'B7', 'descricao' => '']);
        DB::table('locals')->insert(['nome' => 'B8', 'descricao' => '']);
        DB::table('locals')->insert(['nome' => 'B9', 'descricao' => '']);
        DB::table('locals')->insert(['nome' => 'Bandejas', 'descricao' => '']);
        DB::table('locals')->insert(['nome' => 'Controlados', 'descricao' => '']);
        DB::table('locals')->insert(['nome' => 'Freezer', 'descricao' => '']);
        DB::table('locals')->insert(['nome' => 'Geladeira', 'descricao' => '']);
        DB::table('locals')->insert(['nome' => 'Líquidos', 'descricao' => '']);
        DB::table('locals')->insert(['nome' => 'Pallets', 'descricao' => '']);
    }
}
