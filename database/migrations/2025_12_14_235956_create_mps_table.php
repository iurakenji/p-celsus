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
            $table->bigInteger('codigo');
            $table->string('nome',150);
            $table->string('nome_fc',150);
            $table->enum('tipo',['Sólido','Líquido','Semi-Sólido']);
            $table->string('forma');
            $table->string('cas',50);
            $table->string('nome_popular',100);
            $table->string('parte_usada',100);
            $table->boolean('mp_vegetal');
            $table->string('dci',100);
            $table->string('dcb',100);
            $table->boolean('port_344');
            $table->string('lista_344',20);
            $table->boolean('pol_fed');
            $table->boolean('pol_civ');
            $table->boolean('exerc');
            $table->string('cor',100);
            $table->string('odor',100);
            $table->string('sabor',100);
            $table->boolean('bancada');
            $table->boolean('tratado');
            $table->boolean('hormonio');
            $table->boolean('citostatico');
            $table->boolean('enzima');
            $table->boolean('lacto');
            $table->boolean('tintura');
            $table->string('grupodescarte_id',15)->constrained();
            $table->text('obs');
            $table->string('patenteado',15);
            $table->string('fornecedor_id',15)->constrained();

            $table->enum('genero',['M','F','O']);
            $table->boolean('ativo');
            $table->rememberToken();
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
