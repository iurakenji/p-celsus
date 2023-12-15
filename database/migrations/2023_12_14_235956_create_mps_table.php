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
            $table->codigo();
            $table->string('nome',150);
            $table->string('nome_fc',150);
            $table->enum('tipo',['Sólido','Líquido','Semi-sólido']);
            //$table->enum('forma',['Sólido','Líquido','Semi-sólido']); ???? Verificar
            $table->string('cas',15);
            $table->string('nome_popular',15);

            $table->foreignId('tipo_acesso_id')->constrained();
            $table->string('conselho',15);
            $table->string('registro',25);
            $table->enum('genero',['M','F','O']);
            $table->string('titulo',50);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('slug');
            $table->boolean('ativo');
            $table->rememberToken();
            $table->timestamps();
            'parte_usada',
            'dci',
            'dcb',
            'port_344',
            'lista_344',
            'pol_fed',
            'pol_civ',
            'exerc',
            'cor',
            'odor',
            'bancada',
            'tratado',
            'hormonio',
            'citostatico',
            'enzima',
            'lacto',
            'tintura',
            'producao',
            'grupodescarte_id',
            'obs',
            'patenteado',
            'fornecedor_id'
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
