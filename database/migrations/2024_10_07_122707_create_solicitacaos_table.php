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
        Schema::create('solicitacaos', function (Blueprint $table) {
            $table->id();
            $table->enum('situacao',['Aguardando Atendimento', 'Aguardando Análise', 'Aguardando Laudo', 'Aguardando Envase', 'Liberado'])->default('Aguardando Atendimento');
            $table->integer('codigo');
            $table->string('nome',100);
            $table->string('solicitante', 100);
            $table->foreignId('setor_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('lote', 100);
            $table->string('nf', 100);
            $table->string('horario_req', 20);
            $table->datetime('data_hora');
            $table->datetime('data_hora_atendimento');
            $table->foreignId('usuario_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitacaos');
    }
};
