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
        Schema::create('var_categoricas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('analise_id')->constrained()->nullable();
            $table->integer('ordem');
            $table->string('nome',150);
            $table->boolean('protegido');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('var_categoricas');
    }
};
