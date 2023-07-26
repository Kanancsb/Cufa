<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComposicaoFamiliar extends Model
{
    protected $table = 'composicaofamiliar';

    public function formulario()
    {
        return $this->belongsTo(Formulario::class, 'cpf_entrevistado', 'cpf');
    }
}
