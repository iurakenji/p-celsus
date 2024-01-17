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
        $this->call(SetorSeeder::class);
        $this->call(ArmazenamentoSeeder::class);
        $this->call(FornecedorSeeder::class);
        $this->call(LocalSeeder::class);
        $this->call(ReferenciaSeeder::class);
        $this->call(RiscoSeeder::class);
        $this->call(TipoSeeder::class);
        $this->call(GrupoDescarteSeeder::class);
        $this->call(ObservacaoSeeder::class);
        $this->call(AnaliseSeeder::class);
        $this->call(VarCategoricaSeeder::class);
        //$content = File::get($filename);


        DB::unprepared(file_get_contents('storage\app\public\mp.sql'));
        $mpAntigos = DB::table('mp')->select('codigo','nome','nome_fc','tipo','cas','nome_popular','parte_usada','mp_vegetal','dcb_dci','m_potes', 'hormonio', 'citostatico', 'controlado', 'pfed', 'pc', 'exercito','micronizado', 'lacto', 'tintura', 'enzima', 'producao')->get();
            foreach ($mpAntigos as $mpAntigo) {

                DB::table('mps')->insert([
                    'codigo' => $mpAntigo->codigo,
                    'nome' => $mpAntigo->nome,
                    'nome_fc' => $mpAntigo->nome_fc,
                    'forma' => $mpAntigo->tipo,
                    'tipo_id' => '1',
                    'cas' => $mpAntigo->cas,
                    'nome_popular' => $mpAntigo->nome_popular,
                    'parte_usada' => $mpAntigo->parte_usada,
                    'mp_vegetal' => ($mpAntigo->mp_vegetal == 'Sim' ? 1 : 0),
                    'dci' => $mpAntigo->dcb_dci,
                    'dcb' => $mpAntigo->dcb_dci,
                    'bancada' => ($mpAntigo->m_potes == 'Sim' ? 1 : 0),
                    'hormonio' => ($mpAntigo->hormonio == 'Sim' ? 1 : 0),
                    'citostatico' => ($mpAntigo->citostatico == 'Sim' ? 1 : 0),
                    'lacto' => ($mpAntigo->lacto == 'Sim' ? 1 : 0),
                    'tintura' => ($mpAntigo->tintura == 'Sim' ? 1 : 0),
                    'enzima' => ($mpAntigo->enzima == 'Sim' ? 1 : 0),
                    'producao' => ($mpAntigo->producao == 'Sim' ? 1 : 0),
                    'micronizado' => ($mpAntigo->micronizado == 'Sim' ? 1 : 0),
                    'p344' => ($mpAntigo->controlado == 'Sim' ? 1 : 0),
                    'pf' => ($mpAntigo->pfed == 'Sim' ? 1 : 0),
                    'pc' => ($mpAntigo->pc == 'Sim' ? 1 : 0),
                    'ex' => ($mpAntigo->exercito == 'Sim' ? 1 : 0),
                    'grupodescarte_id' => 1,
                    'fornecedor_id' => 1,
                ]);
            }
        Schema::drop('mp');
        //Usuario::factory(30)->create();
    }
}
