<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormulariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cidades', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->char('nome');
            $table->integer('uf');
            $table->integer('ibge');
        });

        Schema::create('profissao', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('descricao');
            $table->timestamps();
        });

        Schema::create('parentesco', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('descricao');
            $table->timestamps();
        });    

        Schema::create('escolaridade', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('descricao');
            $table->timestamps();
        });

        //está tabela teve de ter este nome, pois não sei aonde ela estava sendo chamada, e não conseguia utilizar outra com os mesmos dados
        Schema::create('formularios', function (Blueprint $table) {
            $table->integer('cpf')->primary();
            $table->string('rg');
            $table->timestamps();
            $table->string('nome');
            $table->string('sobrenome');
            $table->string('sexo');
            $table->string('estadoCivil');
            $table->date('dataNascimentoEntrevistado');
            $table->integer('escolaridadeEntrevistado');
            $table->foreign('escolaridadeEntrevistado')->references('id')->on('escolaridade');
            $table->string('naturalidade');
            $table->string('endereco');
            $table->string('bairro');
            $table->integer('nomeCidade');
            $table->foreign('nomeCidade')->references('id')->on('cidades');
            $table->integer('telefone');
            $table->integer('celular');
            $table->string('email');
            $table->float('rendaMensalBrutaEntrevistado');
        });


        Schema::create('composicaofamiliar', function (Blueprint $table) {
            $table->integer('cpf_entrevistado');
            $table->foreign('cpf_entrevistado')->references('cpf')->on('formularios');
            $table->timestamps();
            $table->string('nomeFamiliar');
            $table->integer('parentesco_id');
            $table->foreign('parentesco_id')->references('id')->on('parentesco');
            $table->date('dataNascimentoFamiliar');
            $table->float('rendaMensalBrutaFamiliar');
            $table->integer('profissao_id');
            $table->foreign('profissao_id')->references('id')->on('profissao');
            $table->integer('escolaridadeFamiliar');
            $table->foreign('escolaridadeFamiliar')->references('id')->on('escolaridade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formularios');
    }
}
