<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class MpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::unprepared(file_get_contents('storage\app\public\mp.sql'));
        DB::unprepared(file_get_contents('storage\app\public\analisess.sql'));
        $mp_id = 0;
        $lote_id = 0;
        $mpAntigos = DB::table('mp')->select('codigo','nome','nome_fc','tipo','cas','nome_popular','parte_usada','mp_vegetal','dcb_dci','m_potes', 'hormonio', 'citostatico', 'controlado', 'pfed', 'pc', 'exercito','micronizado', 'lacto', 'tintura', 'enzima', 'producao', 'li_h2o', 'ls_h2o', 'li_etoh', 'ls_etoh', 'li_ph', 'ls_ph', 'li_densidade', 'ls_densidade', 'li_pf', 'ls_pf', 'ref_car_org', 'ref_sol', 'ref_dens','ref_ph', 'ref_pf', 'car_org','armazenamento')->orderby('nome', 'asc')->get();
            foreach ($mpAntigos as $mpAntigo) {
                ++$mp_id;
                echo "Criando registro ".$mp_id." - ";
                echo $mpAntigo->nome.' - Inserindo dados: ';
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
                echo "... Sucesso\n";

                //Começo Lotes

            echo "Criando Lotes..."."\n";

            $analises = DB::table('analisess')->select('situacao', 'cod_mp', 'situacao', 'fornecedor', 'quantidade', 'val', 'dt_mp', 'lote', 'nf', 'certificado', 'urgente', 'dt_laudo', 'situacao')->where('cod_mp',$mpAntigo->codigo)->orderby('cod_mp', 'asc')->get();
            foreach ($analises as $analise) {
                //dd($analise);
                echo "Criando registro de lote ".$analise->lote."\n";
                ++$lote_id;
                switch ($mpAntigo->armazenamento) {
                    case 'Temperatura Ambiente':
                        $armazenamento = 1;
                        break;
                    case 'Geladeira':
                        $li_h2o = 2;
                        break;
                    case 'Freezer':
                        $li_h2o = 3;
                        break;
                    default:
                        $armazenamento = 1;
                        break;
                }

                $forn = DB::table('fornecedors')->where('nome',$analise->fornecedor);
                if (isset($forn)) {
                    $fornecedor = $forn->value('id');
                } else {
                    $fornecedor = 1;
                }

                switch ($analise->situacao) {
                    case 'Liberado com AR':
                        $situacao = 'Liberado';
                        break;
                    case 'Liberado':
                        $situacao = 'Liberado';
                        break;
                    case 'Aprovação Pendente':
                        $situacao = 'Liberado';
                        break;
                    case 'Reprovado':
                        $situacao = 'Liberado';
                        break;
                    case 'Aguardando Análise':
                        $situacao = 'Liberado';
                        break;
                    case 'Devolvido':
                        $situacao = 'Liberado';
                        break;
                    case 'Aguardando Laudo':
                        $situacao = 'Aguardando Liberação';
                        break;
                    default:
                        $situacao = 'Aguardando Liberação';
                        break;
                }

            DB::table('lotes')->insert([
                'mp_id' => $mp_id,
                'fornecedor_id' => $fornecedor ?? 1,
                'situacao' => $situacao,
                'quantidade' => $analise->quantidade,
                'validade' => $analise->val,
                'fabricacao' => '1900-01-01',
                'lote' => $analise->lote ?? '00000',
                'nf' => $analise->nf,
                'certificado' => $analise->certificado,
                'amostra_cq' => null,
                'origem' => null,
                'fc' => null,
                'umidade' => null,
                'teor' => null,
                'armazenamento_id' => $armazenamento,
                'resp_supri_id' => 9,
                'resp_gq_id' => 9,
                'entrada' => $analise->dt_mp,
                'liberacao_gq' => $analise->dt_laudo,
                'urgente' => $analise->urgente == 'Sim' ? 1 : 0,
                'ativ_enz' => null,
                'unidade_ativ_enz' => null,

            ]);

            //Início Análises

            $referencia_car = DB::table('referencias')->where('nome','=', $mpAntigo->ref_car_org)->get()->value('id');
            $referencia_sol = DB::table('referencias')->where('nome','=',$mpAntigo->ref_sol)->get()->value('id');
            $referencia_dens = DB::table('referencias')->where('nome','=',$mpAntigo->ref_dens)->get()->value('id');
            $referencia_ph = DB::table('referencias')->where('nome','=',$mpAntigo->ref_ph)->get()->value('id');
            $referencia_pf = DB::table('referencias')->where('nome','=',$mpAntigo->ref_pf)->get()->value('id');
            echo $mpAntigo->nome.' - Inserindo análises: ';
            
            if (isset($mpAntigo->ref_car_org)) {
/*Car_Org*/     DB::table('analise_lote')->insert([
                    'lote_id' => $lote_id,
                    'analise_id' => 1,
                    'lim_sup' => null,
                    'lim_inf' => null,
                    'especificacao' => $mpAntigo->car_org,
                    'referencia_id' => $referencia_car,
                    'informativo' => 0,
                    'analise_cq' => 1]);}
            if (isset($mpAntigo->ref_sol)) {
/*Sol H2O*/     DB::table('analise_lote')->insert([
                    'lote_id' => $lote_id,
                    'analise_id' => 2,
                    'lim_sup' => traduzSol($mpAntigo->ls_h2o),
                    'lim_inf' => traduzSol($mpAntigo->li_h2o),
                    'especificacao' => null,
                    'referencia_id' => $referencia_sol,
                    'informativo' => 0,
                    'analise_cq' => 1]);
                    echo traduzSol($mpAntigo->li_h2o).' - '.$mpAntigo->li_h2o;
                    echo traduzSol($mpAntigo->ls_h2o).' - '.$mpAntigo->ls_h2o;
                    if (traduzSol($mpAntigo->ls_etoh) != 0) {
/*Sol_ETOH*/    DB::table('analise_lote')->insert([
                    'lote_id' => $lote_id,
                    'analise_id' => 3,
                    'lim_sup' => traduzSol($mpAntigo->ls_etoh),
                    'lim_inf' => traduzSol($mpAntigo->li_etoh),
                    'especificacao' => null,
                    'referencia_id' => $referencia_sol,
                    'informativo' => 0,
                    'analise_cq' => 1]);}
                    echo traduzSol($mpAntigo->li_etoh).' - '.$mpAntigo->li_etoh." - ";
                    echo traduzSol($mpAntigo->ls_etoh).' - '.$mpAntigo->ls_etoh."\n";
                        }
            if (isset($mpAntigo->ref_ph)) {
/*pH*/          DB::table('analise_lote')->insert([
                    'lote_id' => $lote_id,
                    'analise_id' => 4,
                    'lim_sup' => $mpAntigo->ls_ph,
                    'lim_inf' => $mpAntigo->li_ph,
                    'especificacao' => null,
                    'referencia_id' => $referencia_ph,
                    'informativo' => 0,
                    'analise_cq' => 1]);}
            if (isset($mpAntigo->ref_dens)) {
/*Dens*/        DB::table('analise_lote')->insert([
                    'lote_id' => $lote_id,
                    'analise_id' => 5,
                    'lim_sup' => $mpAntigo->ls_densidade,
                    'lim_inf' => $mpAntigo->li_densidade,
                    'especificacao' => null,
                    'referencia_id' => $referencia_dens,
                    'informativo' => 0,
                    'analise_cq' => 1]);}
            if (isset($mpAntigo->ref_pf)) {
/*PF*/          DB::table('analise_lote')->insert([
                    'lote_id' => $lote_id,
                    'analise_id' => 6,
                    'lim_sup' => $mpAntigo->ls_pf,
                    'lim_inf' => $mpAntigo->li_pf,
                    'especificacao' => null,
                    'referencia_id' => $referencia_pf,
                    'informativo' => 0,
                    'analise_cq' => 1]);}

            echo "... Sucesso\n";

            //Final Análises



            }

                //Final Lotes
        }

            echo $mp_id." registros criados."."\n"."\n"."\n";


        Schema::drop('analisess');
        Schema::drop('mp');
    }
}
