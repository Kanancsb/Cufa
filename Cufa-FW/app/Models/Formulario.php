<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formulario extends Model
{
    protected $table = 'formularios'; // Defina o nome da tabela se não estiver usando o padrão do Laravel

    public function composicaoFamiliar()
    {
        return $this->hasMany(ComposicaoFamiliar::class, 'cpf_entrevistado', 'cpf');
    }
}
