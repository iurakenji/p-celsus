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
        Schema::create('analises', function (Blueprint $table) {
            $table->id();
            $table->string('nome',150);
            $table->enum('tipo',['Numérica Discreta','Numérica Contínua','Categórica Nominal', 'Categórica Ordinal']);
            $table->string('unidade',100)->nullable();
            $table->text('observacao')->nullable();
            $table->double('margem',100)->default(0);
            $table->integer('valor_ar')->default('0');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analises');
    }
};
