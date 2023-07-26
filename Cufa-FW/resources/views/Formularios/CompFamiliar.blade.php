@extends('layouts.main')

@section('title', 'Formulario Composição Familiar')

@section('content')

    <div id="criar-formulario-identificacao" class="col-md-6 offset-md-3">
        <form action="/Formularios" method="POST" class="row g-3 needs-validation" novalidate>
            @csrf

            <h1>Dados do Entrevistado</h1>

            <div class="row">
                <div class="col-md-6">
                    <label for="rg" class="form-label">RG:</label>
                    <input type="text" class="form-control" id="rg" name="rg" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="cpf" class="form-label">CPF:</label>
                    <input type="text" class="form-control" name="cpf" \pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" placeholder= "000.000.000-00" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title" class="form-label">Nome:</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder='João'>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="sobrenome" class="form-label">Sobrenome:</label>
                        <input type="text" class="form-control" id="sobrenome" name="sobrenome" placeholder='Silva'>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="sexo" class="form-label">Sexo:</label>
                        <select class="form-select"id="sexo" name="sexo">
                            <option value="masculino">Masculino</option>
                            <option value="feminino">Feminino</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="estado-civil" class="form-label">Estado Civil:</label>
                        <select id="estadoCivil" name="estadoCivil" class="form-select">
                            <option value="solteiro">Solteiro(a)</option>
                            <option value="casado">Casado(a)</option>
                            <option value="outros">Outros(as)</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="data-de-nascimento" class="form-label">Data de Nascimento:</label>
                        <input type="date" class="form-control" id="dataNascimentoEntrevistado" name="dataNascimentoEntrevistado">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="escolaridadeEntrevistado" class="form-label">Escolaridade:</label>
                        <select class="form-select" id="escolaridadeEntrevistado" name="escolaridadeEntrevistado">
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
                    <label for="naturalidade" class="form-label">Naturalidade:</label>
                            <select id="naturalidade" name="naturalidade" class="form-select">
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
                    <label for="endereco" class="form-label">Endereço:</label>
                    <input type="text" class="form-control" id="endereco" name="endereco">
                </div>

                <div class="col-md-4">
                    <label for="bairro" class="form-label">Bairro:</label>
                    <input type="text" class="form-control" id="bairro" name="bairro">
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="cidade" class="form-label">Cidade:</label>
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
                    <label for="telefone" class="form-label">Telefone:</label>
                    <input type="text" class="form-control" id="telefone" name="telefone">
                </div>

                <div class="col-md-6">
                    <label for="celular">Celular:</label>
                    <input type="text" class="form-control" id="celular" name="celular">
                </div>

            </div><br>

            <div class="form-group">
                <label for="e-mail" class="form-label">E-Mail:</label>
                <input type="text" class="form-control" id="email" name="email">
            </div>

            <div class="form-grpup">
                <label for="rendaMensalBrutaEntrevistado" class="form-label">Renda Mensal Bruta Entrevistado:</label>
                <input type="text" class="form-control" id="rendaMensalBrutaEntrevistado" name="rendaMensalBrutaEntrevistado">
            </div><br>

            <h1>Dados Familiares</h1>
            <div id="dadosFamiliares">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title" class="form-label">Nome:</label>
                            <input type="text" class="form-control" id="nomeFamiliar" name="nomeFamiliar" placeholder="José">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="parentesco" class="form-label">Parentesco:</label>
                            <select class="form-select" id="parentesco_id" name="parentesco_id">
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
                            <label for="data-de-nascimento" class="form-label">Data de Nascimento:</label>
                            <input type="date" class="form-select" id="dataNascimentoFamiliar" name="dataNascimentoFamiliar">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="profissao" class="form-label">Profissão:</label>
                            <select class="form-select" id="profissao_id" name="profissao_id">
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
                            <label for="escolaridadeFamiliar" class="form-label">Escolaridade:</label>
                            <select class="form-select" id="escolaridadeFamiliar" name="escolaridadeFamiliar">
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

                <div class="form-group">
                    <label for="rendaMensalBrutaFamiliar" class="form-label">Renda Mensal Bruta Familiar:</label>
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