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

        DB::table('usuarios')->insert(['login' => 'daiane.waltrick','nome' => 'Daiane Waltrick',
        'tipo_acesso_id' => '1', 'conselho' => null, 'registro' => null,
        'genero' => 'F', 'titulo' => 'Técnica', 'email' => null,
        'password' => Hash::make('123456'),
        'slug' => 'daianewaltrick', 'ativo' => true
            ]);
        DB::table('usuarios')->insert(['login' => 'jidiane.costa','nome' => 'Jidiane da Costa',
        'tipo_acesso_id' => '1', 'conselho' => null, 'registro' => null,
        'genero' => 'F', 'titulo' => 'Técnica', 'email' => null,
        'password' => Hash::make('123456'),
        'slug' => 'jidianedacosta', 'ativo' => true
            ]);
        DB::table('usuarios')->insert(['login' => 'tatiane.mitrus','nome' => 'Tatiane Mitrus',
        'tipo_acesso_id' => '1', 'conselho' => null, 'registro' => null,
        'genero' => 'F', 'titulo' => 'Técnica', 'email' => null,
        'password' => Hash::make('123456'),
        'slug' => 'tatianemitrus', 'ativo' => true
            ]);
        DB::table('usuarios')->insert(['login' => 'taynara.machado','nome' => 'Taynara Janete Machado',
        'tipo_acesso_id' => '1', 'conselho' => null, 'registro' => null,
        'genero' => 'F', 'titulo' => 'Técnica', 'email' => null,
        'password' => Hash::make('123456'),
        'slug' => 'taynaramachado', 'ativo' => true
            ]);
    }
}
