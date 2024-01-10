<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ObservacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('observacaos')->insert(['nome' => 'Densímetro','tipo' => 'Método Analítico', 'observacao' => 'Como esta análise consta no laudo do fornecedor com metodologia aplicada "sem compactação", e utilizamos como referência a análise de densidade aparente (com compactação) com o uso da precisão do densímetro, conforme metodologia descrita na FB Ed. 6, não utilizaremos o dado do fornecedor como medida de comparação para o resultado.']);
        DB::table('observacaos')->insert(['nome' => 'Domperidona Maleato','tipo' => 'Matéria-Prima', 'observacao' => 'Pode ser adquirido Domperidona Maleato (99497-03-7), solubilidade conforme BP 2020 será de muito pouco solúvel em água e etanol.']);
        DB::table('observacaos')->insert(['nome' => 'Histórico de Análises - dens, sol, pf','tipo' => 'Método Analítico', 'observacao' => 'Essa matéria-prima não possui valor de referência de ponto de fusão, densidade e solubilidade na Farmacopeia Brasileira Ed6, nos compêndios internacionais reconhecidos pela ANVISA, assim como em artigos científicos. Como esta análise não consta no laudo do fornecedor, a specificação foi baseada no histórico de análises internas deste ativo, considerando como referência a metodologia citada na Farmacopeia Brasileira Ed6 para análise de densidade, solubilidade e ponto de fusão.']);
        DB::table('observacaos')->insert(['nome' => 'Histórico de Análises - PF','tipo' => 'Método Analítico', 'observacao' => 'Essa matéria-prima não possui valor de referência de ponto de fusão na Farmacopeia Brasileira Ed6, nos compêndios internacionais reconhecidos pela ANVISA, assim como em artigos científicos. Como esta análise não consta no laudo do fornecedor, a specificação foi baseada no histórico de análises internas deste ativo, considerando como referência a metodologia citada na Farmacopeia Brasileira Ed6 para análise de ponto de fusão.']);
        DB::table('observacaos')->insert(['nome' => 'Laudo Fornecedor','tipo' => 'Método Analítico', 'observacao' => 'Insumo não consta em nenhum compêndio oficial, e suas especificações não foram encontradas em artigos científicos. Por essa razão, utilizamos como referência os dados do certificado de análise do fornecedor.']);
        DB::table('observacaos')->insert(['nome' => 'Mais de Um Fornecedor','tipo' => 'Método Analítico', 'observacao' => 'Essa matéria-prima não possui valor de referência de pH e densidade na Farmacopeia Brasileira Ed. 6, nos compêndios internacionais reconhecidos pela Anvisa, assim como em artigos científicos. Como este insumo é adquirido de mais de um fornecedor, as especificações foram baseadas no histórico de análises internas deste ativo, considerando como referência a metodologia citada na Farmacopeia Brasileira Ed. 6 para análise de pH e densidade.']);
        DB::table('observacaos')->insert(['nome' => 'Não consta em compêndios - Laudo do Fornecedor','tipo' => 'Método Analítico', 'observacao' => 'A análise não consta em nenhum compêndio oficial, e não foi encontrada em artigos científicos. Por essa razão, utilizamos como referência os dados do certificado do fornecedor.']);
    }
}
