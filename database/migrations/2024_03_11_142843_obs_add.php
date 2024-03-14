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
        Schema::create('obs_add', function (Blueprint $table) {
            $table->integer('relacao_id');
            $table->integer('observacao_id');
            $table->enum('tipo',['Matéria-Prima','Método Analítico','Análise de Lote', 'Lote', 'Movimentação'])->default('Método Analítico');
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obs_add');
    }
};
