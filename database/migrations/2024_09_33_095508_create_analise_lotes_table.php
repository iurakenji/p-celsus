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
            $table->foreignId('lote_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('analise_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('especificacao', 200)->nullable();
            $table->double('lim_sup')->nullable();
            $table->double('lim_inf')->nullable();
            $table->foreignId('referencia_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->boolean('informativo');
            $table->boolean('analise_cq');
            $table->string('resultado', 150)->nullable();
            $table->boolean('aprovado')->nullable();
            $table->boolean('cond_aprovacao')->nullable();
            $table->string('obs', 200)->nullable();
            $table->boolean('na')->nullable();
            $table->timestamps();
            $table->unique(['lote_id', 'analise_id']);
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
