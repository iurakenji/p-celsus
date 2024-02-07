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
        Schema::create('lote_fisicos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lote_id')->constrained();
            $table->dateTime('entrada', $precision = 0);
            $table->double('qt_usada')->nullable();
            $table->double('qt_ajustada')->nullable();
            $table->dateTime('chegada', $precision = 0);
            $table->dateTime('tratamento_inicio', $precision = 0);
            $table->dateTime('tratamento_fim', $precision = 0);
            $table->dateTime('analise_inicio', $precision = 0);
            $table->dateTime('analise_fim', $precision = 0);
            $table->dateTime('envase_inicio', $precision = 0);
            $table->dateTime('envase_fim', $precision = 0);
            $table->dateTime('liberacao', $precision = 0);
            $table->dateTime('aprovacao', $precision = 0);
            $table->boolean('mp_aprovada')->default('0');
            $table->enum('cond_aprovacao',['Aprovado com AR', 'Aprovação Pendente', 'Reprovado']);
            $table->boolean('laudo_aprovado')->default('0');
            $table->foreignId('aprovadoPor_id')->nullable()->constrained(table: 'usuarios', indexName: 'aprovadoPor_id');
            $table->foreignId('analisadoPor_id')->nullable()->constrained(table: 'usuarios', indexName: 'analisadoPor_id');
            $table->foreignId('liberadoPor_id')->nullable()->constrained(table: 'usuarios', indexName: 'liberadoPor_id');
            $table->foreignId('recebidoPor_id')->nullable()->constrained(table: 'usuarios', indexName: 'recebidoPor_id');
            $table->foreignId('envasadoPor_id')->nullable()->constrained(table: 'usuarios', indexName: 'envasadoPor_id');
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
        Schema::dropIfExists('lote_fisicos');
    }
};
