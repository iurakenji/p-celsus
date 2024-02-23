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
        Schema::create('analise_lote', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lote_id')->constrained();
            $table->integer('analise_id');
            $table->string('especificacao', 200)->nullable();
            $table->double('lim_sup')->nullable();
            $table->double('lim_inf')->nullable();
            $table->foreignId('referencia_id')->constrained();
            $table->boolean('informativo');
            $table->boolean('analise_cq');
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analise_lote');
    }
};
