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
            $table->integer('cpf')->primary()->unsigned();
            $table->string('rg');
            $table->string('nome');
            $table->string('sobrenome');
            $table->string('sexo');
            $table->string('estadoCivil');
            $table->date('dataNascimentoEntrevistado');
            $table->integer('escolaridadeEntrevistado')->unsigned();
            $table->foreign('escolaridadeEntrevistado')->references('id')->on('escolaridade');
            $table->string('naturalidade');
            $table->string('endereco');
            $table->string('bairro');
            $table->integer('nomeCidade');
            $table->foreign('nomeCidade')->references('id')->on('cidades');
            $table->integer('telefone');
            $table->integer('celular');
            $table->string('email');
            $table->decimal('rendaMensalBrutaEntrevistado', 10, 2);
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
