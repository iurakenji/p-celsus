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
        Schema::create('mps', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('codigo');
            $table->string('nome',150);
            $table->string('nome_fc',150)->nullable();
            $table->enum('forma',['Sólido','Líquido','Semi-Sólido', 'Semi-Acabado', 'Produto Final', 'Outros'])->default('Sólido');
            $table->foreignId('tipo_id')->constrained()->nullable();
            $table->string('cas',100)->nullable();
            $table->string('nome_popular',100)->default('N/A')->nullable();
            $table->string('parte_usada',100)->default('N/A')->nullable();
            $table->boolean('mp_vegetal')->default('0');
            $table->string('dci',100)->nullable();
            $table->string('dcb',100)->nullable();
            $table->boolean('bancada')->default('0');
            $table->boolean('tratado')->default('0');
            $table->boolean('hormonio')->default('0');
            $table->boolean('citostatico')->default('0');
            $table->boolean('enzima')->default('0');
            $table->boolean('lacto')->default('0');
            $table->boolean('tintura')->default('0');
            $table->boolean('producao')->default('0');
            $table->boolean('micronizado')->default('0');
            $table->foreignId('grupodescarte_id')->nullable()->constrained();
            $table->boolean('patenteado')->default('0');
            $table->foreignId('fornecedor_id')->nullable()->constrained();
            $table->boolean('p344')->default('0');
            $table->boolean('pf')->default('0');
            $table->boolean('pc')->default('0');
            $table->boolean('ex')->default('0');
            $table->softDeletes();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mps');



    }
};
