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
        $mpAntigos = DB::table('mp')->select('codigo','nome','nome_fc','tipo','cas','nome_popular','parte_usada','mp_vegetal','dcb_dci','m_potes', 'hormonio', 'citostatico', 'controlado', 'pfed', 'pc', 'exercito','micronizado', 'lacto', 'tintura', 'enzima', 'producao', 'li_h2o', 'ls_h2o', 'li_etoh', 'ls_etoh', 'li_ph', 'ls_ph', 'li_densidade', 'ls_densidade', 'li_pf', 'ls_pf', 'ref_car_org', 'ref_sol', 'ref_dens','ref_ph', 'ref_pf', 'car_org')->get();
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
                $mp_id = DB::table('mps')->latest()->first()->id;
                $referencia_car = DB::table('referencias')->where('nome','=', $mpAntigo->ref_car_org)->get();
                $referencia_sol = DB::table('referencias')->where('nome','=',$mpAntigo->ref_sol)->get();
                $referencia_dens = DB::table('referencias')->where('nome','=',$mpAntigo->ref_dens)->get();
                $referencia_ph = DB::table('referencias')->where('nome','=',$mpAntigo->ref_ph)->get();
                $referencia_pf = DB::table('referencias')->where('nome','=',$mpAntigo->ref_pf)->get();
                switch ($mpAntigo->li_h2o) {
                    case 'Praticamente insolúvel ou Insolúvel':
                        $li_h2o = 1;
                        break;
                    case 'Muito pouco solúvel':
                        $li_h2o = 2;
                        break;
                    case 'Pouco solúvel':
                        $li_h2o = 3;
                        break;
                    case 'Moderadamente solúvel':
                        $li_h2o = 4;
                        break;
                    case 'solúvel':
                        $li_h2o = 5;
                        break;
                    case 'Facilmente solúvel':
                        $li_h2o = 6;
                        break;
                    case 'Muito solúvel':
                        $li_h2o = 7;
                        break;
                    default:

                        break;
                }
                switch ($mpAntigo->ls_h2o) {
                    case 'Praticamente insolúvel ou Insolúvel':
                        $ls_h2o = 1;
                        break;
                    case 'Muito pouco solúvel':
                        $ls_h2o = 2;
                        break;
                    case 'Pouco solúvel':
                        $ls_h2o = 3;
                        break;
                    case 'Moderadamente solúvel':
                        $ls_h2o = 4;
                        break;
                    case 'solúvel':
                        $ls_h2o = 5;
                        break;
                    case 'Facilmente solúvel':
                        $ls_h2o = 6;
                        break;
                    case 'Muito solúvel':
                        $ls_h2o = 7;
                        break;
                    default:
                        $ls_h2o = 0;
                        break;
                }
                switch ($mpAntigo->li_etoh) {
                    case 'Praticamente insolúvel ou Insolúvel':
                        $li_etoh = 1;
                        break;
                    case 'Muito pouco solúvel':
                        $li_etoh = 2;
                        break;
                    case 'Pouco solúvel':
                        $li_etoh = 3;
                        break;
                    case 'Moderadamente solúvel':
                        $li_etoh = 4;
                        break;
                    case 'solúvel':
                        $li_etoh = 5;
                        break;
                    case 'Facilmente solúvel':
                        $li_etoh = 6;
                        break;
                    case 'Muito solúvel':
                        $li_etoh = 7;
                        break;
                    default:
                        $li_etoh = 0;
                        break;
                }
                switch ($mpAntigo->ls_etoh) {
                    case 'Praticamente insolúvel ou Insolúvel':
                        $ls_etoh = 1;
                        break;
                    case 'Muito pouco solúvel':
                        $ls_etoh = 2;
                        break;
                    case 'Pouco solúvel':
                        $ls_etoh = 3;
                        break;
                    case 'Moderadamente solúvel':
                        $ls_etoh = 4;
                        break;
                    case 'solúvel':
                        $ls_etoh = 5;
                        break;
                    case 'Facilmente solúvel':
                        $ls_etoh = 6;
                        break;
                    case 'Muito solúvel':
                        $ls_etoh = 7;
                        break;
                    default:
                        $ls_etoh = 0;
                        break;
                }


                if ($referencia_car != null) {
/*Car_Org*/     DB::table('analise_mp')->insert(['mp_id' => $mp_id, 'analise_id' => 1, 'lim_sup' => null, 'lim_inf' => null, 'especificacao' => $mpAntigo->car_org, 'referencia_id' => $referencia_car->id, 'informativo' => 0, 'analise_cq' => 1]);
/*Sol H2O*/     DB::table('analise_mp')->insert(['mp_id' => $mp_id, 'analise_id' => 2, 'lim_sup' => $ls_h2o, 'lim_inf' => $li_h2o, 'especificacao' => null, 'referencia_id' => $referencia_sol->id, 'informativo' => 0, 'analise_cq' => 1]);
/*Sol_ETOH*/    DB::table('analise_mp')->insert(['mp_id' => $mp_id, 'analise_id' => 3, 'lim_sup' => $ls_etoh, 'lim_inf' => $li_etoh, 'especificacao' => null, 'referencia_id' => $referencia_sol->id, 'informativo' => 0, 'analise_cq' => 1]);
/*pH*/          DB::table('analise_mp')->insert(['mp_id' => $mp_id, 'analise_id' => 4, 'lim_sup' => $mpAntigo->ls_ph, 'lim_inf' => $mpAntigo->li_ph, 'especificacao' => null, 'referencia_id' => $referencia_ph->id, 'informativo' => 0, 'analise_cq' => 1]);
/*Dens*/        DB::table('analise_mp')->insert(['mp_id' => $mp_id, 'analise_id' => 5, 'lim_sup' => $mpAntigo->ls_densidade, 'lim_inf' => $mpAntigo->li_densidade, 'especificacao' => null, 'referencia_id' => $referencia_dens->id, 'informativo' => 0, 'analise_cq' => 1]);
/*PF*/          DB::table('analise_mp')->insert(['mp_id' => $mp_id, 'analise_id' => 6, 'lim_sup' => $mpAntigo->ls_pf, 'lim_inf' => $mpAntigo->li_pf, 'especificacao' => null, 'referencia_id' => $referencia_pf->id, 'informativo' => 0, 'analise_cq' => 1]);
                }
            }
        Schema::drop('mp');
        //Usuario::factory(30)->create();
    }



}
