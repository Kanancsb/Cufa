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
        Schema::create('formularios', function (Blueprint $table) {
            $table->unsignedBigInteger('cpf')->primary();
            $table->string('rg');
            $table->string('nome');
            $table->string('sobrenome');
            $table->string('sexo');
            $table->string('estadoCivil');
            $table->date('dataNascimentoEntrevistado');
            $table->unsignedBigInteger('escolaridadeEntrevistado');
            $table->foreign('escolaridadeEntrevistado')->references('id')->on('escolaridade');
            $table->string('naturalidade');
            $table->string('endereco');
            $table->string('bairro');
            $table->unsignedBigInteger('nomeCidade');
            $table->foreign('nomeCidade')->references('id')->on('cidades');
            $table->string('telefone');
            $table->string('celular');
            $table->string('email');
            $table->float('rendaMensalBrutaEntrevistado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formularios');
    }
};
