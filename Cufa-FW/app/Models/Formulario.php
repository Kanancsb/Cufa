<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formulario extends Model
{
    use HasFactory;

    public function composicaoFamiliar(){
        return $this->hasMany(ComposicaoFamiliar::class, 'cpf_entrevistado', 'cpf');
    }
}
