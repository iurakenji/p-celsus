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
        Schema::create('observacaos', function (Blueprint $table) {
            $table->id();
            $table->string('nome',150);
            $table->enum('tipo',['Matéria-Prima','Método Analítico','Análise de Lote', 'Lote', 'Movimentação'])->default('Método Analítico');
            $table->text('observacao')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('observacaos');
    }
};
