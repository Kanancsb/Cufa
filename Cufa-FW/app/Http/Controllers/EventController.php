<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use App\Models\Formulario;
use App\Models\ComposicaoFamiliar;

class EventController extends Controller
{
    public function index(){
        $entrevistados = Formulario::All();
        return view('Index', ['formularios' => $entrevistados]);
    }

    public function CriarNoticias(){
        return view('/Noticias/CriarNoticia');
    }

    public function TodasNoticias(){
        return view('/Noticias/TodasNoticias');
    }

    public function FormularioFamiliar(){

        return view('Formularios.CompFamiliar');
    }


    public function SalvarDados(Request $request){
        $entrevistado = new Formulario;
    
        //Dados Entrevistado
        $entrevistado->rg = $request->rg;
        $entrevistado->cpf = $request->cpf;
        $entrevistado->nome = $request->nome;
        $entrevistado->sobrenome = $request->sobrenome;
        $entrevistado->sexo = $request->sexo;
        $entrevistado->estadoCivil = $request->estadoCivil;
        $entrevistado->dataNascimentoEntrevistado = $request->dataNascimentoEntrevistado;
    
        $descricaoEscolaridade = $request->escolaridadeEntrevistado;
        $escolaridade = DB::table('escolaridade')->where('descricao', $descricaoEscolaridade)->first();
        if ($escolaridade) {
            $entrevistado->escolaridadeEntrevistado = $escolaridade->id;
        }
    
        $descricaoNaturalidade = $request->naturalidade;
        $naturalidade = DB::table('cidades')->where('nome', $descricaoNaturalidade)->first();
        if ($naturalidade) {
            $entrevistado->naturalidade = $naturalidade->id;
        }
    
        $entrevistado->endereco = $request->endereco;
        $entrevistado->bairro = $request->bairro;
    
        $nomeCidade = $request->nomeCidade;
        $cidade = DB::table('cidades')->where('nome', $nomeCidade)->first();
        if ($cidade) {
            $entrevistado->nomeCidade = $cidade->id;
        }
    
        $entrevistado->telefone = $request->telefone;
        $entrevistado->celular = $request->celular;
        $entrevistado->email = $request->email;
        $entrevistado->rendaMensalBrutaEntrevistado = $request->rendaMensalBrutaEntrevistado;
    
        //Dados Composição familiar
        $composicaoFamiliar = new ComposicaoFamiliar;

        $composicaoFamiliar->nomeFamiliar = $request->nomeFamiliar;

        //Logica de ligação da tabela composicaofamiliar com parentesco
        $descricaoParentesco = $request->parentesco_id;
        $parentesco = DB::table('parentesco')->where('descricao', $descricaoParentesco)->first();
        if ($parentesco) {
            $composicaoFamiliar->parentesco_id = $parentesco->id;
        }

        $composicaoFamiliar->dataNascimentoFamiliar = $request->dataNascimentoFamiliar;

        $descricaoProfissao = $request->profissao_id ;
        $profissao = DB::table('profissao')->where('descricao', $descricaoProfissao)->first();
        if ($profissao) {
            $composicaoFamiliar->profissao_id = $profissao->id;
        }

        $descricaoEscolaridadeFamiliar = $request->escolaridadeFamiliar;
        $escolaridade = DB::table('escolaridade')->where('descricao', $descricaoEscolaridadeFamiliar)->first();
        if ($escolaridade) {
            $composicaoFamiliar->escolaridadeFamiliar = $escolaridade->id;
        }
        
        $composicaoFamiliar->rendaMensalBrutaFamiliar = $request->rendaMensalBrutaFamiliar;
    
        $entrevistado->save();
        $entrevistado->composicaoFamiliar()->save($composicaoFamiliar);

        if ($request->has('nomeFamiliar_extra')) {
            $nomeFamiliarExtra = $request->input('nomeFamiliar_extra');
            $parentescoIdExtra = $request->input('parentesco_id_extra');
            $profissaoIdExtra = $request->input('profissao_id_extra');
            $dataNascimentoFamiliarExtra = $request->input('dataNascimentoFamiliar_extra');
            $escolaridadeFamiliarExtra = $request->input('escolaridadeFamiliar_extra');
            $rendaMensalBrutaFamiliarExtra = $request->input('rendaMensalBrutaFamiliar_extra');
    
            // Loop para processar cada conjunto de campos extras
            for ($i = 0; $i < count($nomeFamiliarExtra); $i++) {
                $composicaoFamiliarExtra = new ComposicaoFamiliar;
                $composicaoFamiliarExtra->nomeFamiliar = $nomeFamiliarExtra[$i];

                $descricaoParentesco = $parentescoIdExtra[$i];
                $parentesco = DB::table('parentesco')->where('descricao', $descricaoParentesco)->first();
                if ($parentesco) {
                    $composicaoFamiliarExtra->parentesco_id = $parentesco->id;
                }

                $descricaoProfissao = $profissaoIdExtra[$i];
                $profissao = DB::table('profissao')->where('descricao', $descricaoProfissao)->first();
                if ($profissao) {
                    $composicaoFamiliarExtra->profissao_id = $profissao->id;
                }

                $descricaoEscolaridadeFamiliar = $escolaridadeFamiliarExtra[$i];
                $escolaridade = DB::table('escolaridade')->where('descricao', $descricaoEscolaridadeFamiliar)->first();
                if ($escolaridade) {
                    $composicaoFamiliarExtra->escolaridadeFamiliar = $escolaridade->id;
                }
                    $composicaoFamiliarExtra->dataNascimentoFamiliar = $dataNascimentoFamiliarExtra[$i];
                    $composicaoFamiliarExtra->rendaMensalBrutaFamiliar = $rendaMensalBrutaFamiliarExtra[$i];
        
                    // Salvar os dados da composição familiar extra
                    $entrevistado->composicaoFamiliar()->save($composicaoFamiliarExtra);
            }
        }

    
        return redirect('/Formularios/CompFamiliar');
    }
    
}
