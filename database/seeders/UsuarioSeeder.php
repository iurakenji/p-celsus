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
        'slug' => 'kendjiiura', 'ativo' => true, 'protegido' => 0
            ]);
        DB::table('usuarios')->insert(['login' => 'daiane.waltrick','nome' => 'Daiane Waltrick',
        'tipo_acesso_id' => '1', 'conselho' => null, 'registro' => null,
        'genero' => 'F', 'titulo' => 'Técnica', 'email' => null,
        'password' => Hash::make('123456'),
        'slug' => 'daianewaltrick', 'ativo' => true, 'protegido' => 0
            ]);
        DB::table('usuarios')->insert(['login' => 'jidiane.costa','nome' => 'Jidiane da Costa',
        'tipo_acesso_id' => '1', 'conselho' => null, 'registro' => null,
        'genero' => 'F', 'titulo' => 'Técnica', 'email' => null,
        'password' => Hash::make('123456'),
        'slug' => 'jidianedacosta', 'ativo' => true, 'protegido' => 0
            ]);
        DB::table('usuarios')->insert(['login' => 'tatiane.mitrus','nome' => 'Tatiane Mitrus',
        'tipo_acesso_id' => '1', 'conselho' => null, 'registro' => null,
        'genero' => 'F', 'titulo' => 'Técnica', 'email' => null,
        'password' => Hash::make('123456'),
        'slug' => 'tatianemitrus', 'ativo' => false, 'protegido' => 0
            ]);
        DB::table('usuarios')->insert(['login' => 'taynara.machado','nome' => 'Taynara Janete Machado',
        'tipo_acesso_id' => '1', 'conselho' => null, 'registro' => null,
        'genero' => 'F', 'titulo' => 'Técnica', 'email' => null,
        'password' => Hash::make('123456'),
        'slug' => 'taynaramachado', 'ativo' => true, 'protegido' => 0
            ]);
            DB::table('usuarios')->insert(['login' => 'andreia.medeiros','nome' => 'Andreia Medeiros',
        'tipo_acesso_id' => '1', 'conselho' => null, 'registro' => null,
        'genero' => 'F', 'titulo' => 'Técnica', 'email' => null,
        'password' => Hash::make('123456'),
        'slug' => 'andreiamedeiros', 'ativo' => false, 'protegido' => 0
            ]);
            DB::table('usuarios')->insert(['login' => 'clebson.lira','nome' => 'Clebson Pires Lira',
        'tipo_acesso_id' => '1', 'conselho' => null, 'registro' => null,
        'genero' => 'M', 'titulo' => 'Técnico', 'email' => null,
        'password' => Hash::make('123456'),
        'slug' => 'taynaramachado', 'ativo' => false, 'protegido' => 0
            ]);
            DB::table('usuarios')->insert(['login' => 'talita.alvez','nome' => 'Talita Juraci Alvez',
        'tipo_acesso_id' => '1', 'conselho' => null, 'registro' => null,
        'genero' => 'F', 'titulo' => 'Técnica', 'email' => null,
        'password' => Hash::make('123456'),
        'slug' => 'talitaalvez', 'ativo' => true, 'protegido' => 0
            ]);
            DB::table('usuarios')->insert(['login' => 'nenhum','nome' => 'N/I',
        'tipo_acesso_id' => '5', 'conselho' => null, 'registro' => null,
        'genero' => 'O', 'titulo' => '', 'email' => null,
        'password' => Hash::make('123456'),
        'slug' => 'naoinformado', 'ativo' => false, 'protegido' => 0
            ]);
            DB::table('usuarios')->insert(['login' => 'maria.oliver','nome' => 'Maria Luisa Oliver',
        'tipo_acesso_id' => '3', 'conselho' => null, 'registro' => null,
        'genero' => 'F', 'titulo' => 'Assistente de Gestão da Qualidade', 'email' => 'maria.luisa@essentia.com.br',
        'password' => Hash::make('123456'),
        'slug' => 'talitaalvez', 'ativo' => true, 'protegido' => 0
            ]);
            DB::table('usuarios')->insert(['login' => 'enderson.braga','nome' => 'Enderson Braga',
        'tipo_acesso_id' => '4', 'conselho' => null, 'registro' => null,
        'genero' => 'M', 'titulo' => 'Assistente de Suprimentos', 'email' => 'compras1@essentia.com.br',
        'password' => Hash::make('123456'),
        'slug' => 'endersonbraga', 'ativo' => true, 'protegido' => 0
            ]);
    }
}
