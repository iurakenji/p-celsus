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
        Schema::create('analisemp_observacao', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mp_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('analise_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('observacao_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('analisemp_observacao');
        }
};
