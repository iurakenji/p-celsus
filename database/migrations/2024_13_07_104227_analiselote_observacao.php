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
        Schema::create('analiselote_observacao', function (Blueprint $table) {
            $table->foreignId('lote_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('analise_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('observacao_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->primary(['lote_id', 'analise_id','observacao_id']);
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analiselote_observacao');
    }
};
