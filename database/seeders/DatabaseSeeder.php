<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Tipo_acesso;
use App\Models\Usuario;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(TipoAcessoSeeder::class);
        $this->call(UsuarioSeeder::class);
        $this->call(SetorSeeder::class);
        //Usuario::factory(30)->create();
    }
}
