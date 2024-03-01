<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Tipo_acesso;
use App\Models\Usuario;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(TipoAcessoSeeder::class);
        $this->call(UsuarioSeeder::class);
        $this->call(ArmazenamentoSeeder::class);
        $this->call(LocalSeeder::class);
        $this->call(RiscoSeeder::class);
        $this->call(TipoSeeder::class);
        $this->call(GrupoDescarteSeeder::class);
        $this->call(ObservacaoSeeder::class);
        $this->call(AnaliseSeeder::class);
        $this->call(VarCategoricaSeeder::class);
        $this->call(FornecedorSeeder::class);
        $this->call(ReferenciaSeeder::class);
        $this->call(SetorSeeder::class);
        $this->call(MpSeeder::class);
        //$content = File::get($filename);

        


    }



}

/*

*/