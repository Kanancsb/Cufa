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
        Schema::create('composicaofamiliar', function (Blueprint $table) {
            $table->integer('cpf_entrevistado')->unsigned();
            $table->foreign('cpf_entrevistado')->references('cpf')->on('formularios');
            $table->string('nomeFamiliar');
            $table->integer('parentesco_id')->unsigned();
            $table->foreign('parentesco_id')->references('id')->on('parentesco');
            $table->date('dataNascimentoFamiliar');
            $table->integer('profissao_id')->unsigned();
            $table->foreign('profissao_id')->references('id')->on('profissao');
            $table->integer('escolaridadeFamiliar')->unsigned();
            $table->foreign('escolaridadeFamiliar')->references('id')->on('escolaridade');
            $table->decimal('rendaMensalBrutaFamiliar', 10, 2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('composicaofamiliar');
    }
};
