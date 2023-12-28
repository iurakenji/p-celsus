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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('login',20)->unique();
            $table->string('nome',100);
            $table->foreignId('tipo_acesso_id')->constrained();
            $table->string('conselho',15)->nullable();
            $table->string('registro',25)->nullable();
            $table->enum('genero',['M','F','O']);
            $table->string('titulo',50)->nullable();
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('slug');
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
        Schema::dropIfExists('usuarios');
    }
};
