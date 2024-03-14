<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('loteFisicos', function (Blueprint $table) {
            $table->foreignId('lote_id')->constrained();
            $table->enum('situacao',['Aguardando Conferência','Aguardando Análise','Aguardando Envase', 'Aguardando Tratamento', 'Aguardando Produção', 'Pendente', 'Aguardando Aprovação', 'Aguardando Liberação', 'Liberado com AR', 'Reprovado', 'Devolvido', 'Descartado', 'Segregado', 'Liberado']);
            $table->dateTime('entrada', $precision = 0)->nullable();
            $table->double('qt_usada')->nullable();
            $table->double('qt_ajustada')->nullable();
            $table->dateTime('chegada', $precision = 0)->nullable();
            $table->dateTime('tratamento_inicio', $precision = 0)->nullable();
            $table->dateTime('tratamento_fim', $precision = 0)->nullable();
            $table->dateTime('analise_inicio', $precision = 0)->nullable();
            $table->dateTime('analise_fim', $precision = 0)->nullable();
            $table->dateTime('envase_inicio', $precision = 0)->nullable();
            $table->dateTime('envase_fim', $precision = 0)->nullable();
            $table->dateTime('liberacao', $precision = 0)->nullable();
            $table->dateTime('aprovacao', $precision = 0)->nullable();
            $table->boolean('mp_aprovada')->default('0')->nullable();
            $table->enum('cond_aprovacao',['Aprovado com AR', 'Aprovação Pendente', 'Reprovado'])->nullable();
            $table->boolean('laudo_aprovado')->default('0')->nullable();
            $table->foreignId('aprovadoPor_id')->nullable()->constrained(table: 'usuarios', indexName: 'aprovadoPor_id')->nullable();
            $table->foreignId('analisadoPor_id')->nullable()->constrained(table: 'usuarios', indexName: 'analisadoPor_id')->nullable();
            $table->foreignId('liberadoPor_id')->nullable()->constrained(table: 'usuarios', indexName: 'liberadoPor_id')->nullable();
            $table->foreignId('recebidoPor_id')->nullable()->constrained(table: 'usuarios', indexName: 'recebidoPor_id')->nullable();
            $table->foreignId('envasadoPor_id')->nullable()->constrained(table: 'usuarios', indexName: 'envasadoPor_id')->nullable();
            $table->string('imagem_1',200)->nullable();
            $table->string('imagem_2',200)->nullable();
            $table->string('imagem_3',200)->nullable();
            $table->text('observacao')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loteFisicos');
    }
};
