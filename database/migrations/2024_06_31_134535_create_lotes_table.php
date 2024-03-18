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
        Schema::create('lotes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mp_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('fornecedor_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->enum('situacao',['Aguardando Conferência', 'Liberado', 'Em Espera', 'Recebido no CQ'])->default('Aguardando Conferência');
            $table->double('quantidade');
            $table->date('validade');
            $table->date('fabricacao');
            $table->string('lote',100);
            $table->string('nf',50)->nullable();
            $table->string('certificado',50)->nullable();
            $table->double('amostra_cq')->nullable();
            $table->string('origem',100)->nullable();
            $table->double('fc')->nullable();
            $table->double('umidade')->nullable();
            $table->double('teor')->nullable();
            $table->foreignId('armazenamento_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('resp_supri_id')->nullable()->constrained(table: 'usuarios', indexName: 'resp_supri_id')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('resp_gq_id')->nullable()->constrained(table: 'usuarios', indexName: 'resp_gq_id')->onUpdate('cascade')->onDelete('cascade');
            $table->dateTime('entrada', $precision = 0);
            $table->dateTime('liberacao_gq', $precision = 0)->nullable();
            $table->boolean('urgente')->default('0');
            $table->double('ativ_enz')->nullable();
            $table->enum('unidade_ativ_enz',['SKB','GDU/g','CU', 'U', 'GalU', 'HCU', 'ALU/FCC', 'USP', 'DP', 'FAU', 'DU', 'FIP', 'USP/PU', 'BTU/g', 'MCU/g', 'LU/FCC', 'BP', 'FIP/BP', 'FCC/HUT', 'SAP', 'XU', 'PC', 'FCC/mg'])->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lotes');
    }
};
