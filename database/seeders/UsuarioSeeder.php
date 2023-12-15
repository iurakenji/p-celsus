<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('usuarios')->insert(['login' => 'kendji.iura','nome' => 'Kendji Iura',
        'tipo_acesso_id' => '2', 'conselho' => 'CRF/SC', 'registro' => '19103',
        'genero' => 'M', 'titulo' => 'Farmacêutico', 'email' => 'kendji.iura@essentia.com.br',
        'password' => Hash::make('123456'),
        'slug' => 'kendjiiura', 'ativo' => true
    ]);
    }
}
