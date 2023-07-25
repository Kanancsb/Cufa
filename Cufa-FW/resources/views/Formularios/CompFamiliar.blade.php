@extends('layouts.main')

@section('title', 'Formulario Composição Familiar')

@section('content')

    <div id="criar-formulario-identificacao" class="col-md-6 offset-md-3">
        <form action="/Formularios" method="POST">
            @csrf

            <h1>Dados do Entrevistado</h1>

            <div class="row">
                <div class="col-md-6">
                    <label for="rg">RG:</label>
                    <input type="text" class="form-control" id="rg" name="rg">
                </div>

                <div class="col-md-6">
                    <label for="cpf">CPF:</label>
                    <input type="text" class="form-control" name="cpf" \pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" placeholder= "000.000.000-00">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Nome:</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder='João'>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="sobrenome">Sobrenome:</label>
                        <input type="text" class="form-control" id="sobrenome" name="sobrenome" placeholder='Silva'>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="sexo">Sexo:</label>
                        <select class="form-control" id="sexo" name="sexo">
                            <option value="masculino">Masculino</option>
                            <option value="feminino">Feminino</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="estado-civil">Estado Civil:</label>
                        <select id="estadoCivil" name="estadoCivil" class="form-control">
                            <option value="solteiro">Solteiro(a)</option>
                            <option value="casado">Casado(a)</option>
                            <option value="outros">Outros(as)</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="data-de-nascimento">Data de Nascimento:</label>
                        <input type="date" class="form-control" id="dataNascimentoEntrevistado" name="dataNascimentoEntrevistado">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="escolaridadeEntrevistado">Escolaridade:</label>
                        <select class="form-control" id="escolaridadeEntrevistado" name="escolaridadeEntrevistado">
                            @php
                                $escolaridades = DB::table('escolaridade')->pluck('descricao');
                                foreach ($escolaridades as $escolaridade) {
                                    echo '<option value="' . $escolaridade . '">' . $escolaridade . '</option>';
                                }
                            @endphp
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="naturalidade">Naturalidade:</label>
                            <select id="naturalidade" name="naturalidade" class="form-control">
                                @php
                                    $cidades = DB::table('cidades')->pluck('nome');
                                    foreach ($cidades as $cidade) {
                                        echo '<option value="' . $cidade . '">' . $cidade . '</option>';
                                    }
                                @endphp
                            </select>
                    </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <label for="endereco">Endereço:</label>
                    <input type="text" class="form-control" id="endereco" name="endereco">
                </div>

                <div class="col-md-4">
                    <label for="bairro">Bairro:</label>
                    <input type="text" class="form-control" id="bairro" name="bairro">
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="cidade">Cidade:</label>
                        <select class="form-control" id="nomeCidade" name="nomeCidade">
                            @php
                                $cidades = DB::table('cidades')->pluck('nome');
                                foreach ($cidades as $cidade) {
                                    echo '<option value="' . $cidade . '">' . $cidade . '</option>';
                                }
                            @endphp
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label for="telefone">Telefone:</label>
                    <input type="text" class="form-control" id="telefone" name="telefone">
                </div>

                <div class="col-md-6">
                    <label for="celular">Celular:</label>
                    <input type="text" class="form-control" id="celular" name="celular">
                </div>

            </div><br>

            <div class="form-group">
                <label for="e-mail">E-Mail:</label>
                <input type="text" class="form-control" id="email" name="email">
            </div>

            <div class="form-grpup">
                <label for="rendaMensalBrutaEntrevistado">Renda Mensal Bruta Entrevistado:</label>
                <input type="text" class="form-control" id="rendaMensalBrutaEntrevistado" name="rendaMensalBrutaEntrevistado">
            </div><br>

            <h1>Dados Familiares</h1>
            <div id="dadosFamiliares">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title">Nome:</label>
                            <input type="text" class="form-control" id="nomeFamiliar" name="nomeFamiliar" placeholder="José">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="parentesco">Parentesco:</label>
                            <select class="form-control" id="parentesco_id" name="parentesco_id">
                                @php
                                    $parentesco = DB::table('parentesco')->pluck('descricao');
                                    foreach ($parentesco as $parentescos) {
                                        echo '<option value="' . $parentescos . '">' . $parentescos . '</option>';
                                    }
                                @endphp
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="data-de-nascimento">Data de Nascimento:</label>
                            <input type="date" class="form-control" id="dataNascimentoFamiliar" name="dataNascimentoFamiliar">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="profissao">Profissão:</label>
                            <select class="form-control" id="profissao_id" name="profissao_id">
                                @php
                                    $profissao = DB::table('profissao')->pluck('descricao');
                                    foreach ($profissao as $profissaos) {
                                        echo '<option value="' . $profissaos . '">' . $profissaos . '</option>';
                                    }
                                @endphp
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="escolaridadeFamiliar">Escolaridade:</label>
                            <select class="form-control" id="escolaridadeFamiliar" name="escolaridadeFamiliar">
                                @php
                                    $escolaridades = DB::table('escolaridade')->pluck('descricao');
                                    foreach ($escolaridades as $escolaridade) {
                                        echo '<option value="' . $escolaridade . '">' . $escolaridade . '</option>';
                                    }
                                @endphp
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-grpup">
                    <label for="rendaMensalBrutaFamiliar">Renda Mensal Bruta Familiar:</label>
                    <input type="text" class="form-control" id="rendaMensalBrutaFamiliar" name="rendaMensalBrutaFamiliar">
                </div><br>
            </div>
            
            <div class="row">
                    <div class="col-md-6">
                        <button type="button" class="btn btn-primary" id="addFamiliar">Adicionar Familiar</button>
                        <input type="submit" class="btn btn-primary" value="Salvar">
                    </div>
                </div>

        </form>
    </div>

@endsection