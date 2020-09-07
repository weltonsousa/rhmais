<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanoEstagio extends Model
{
    protected $fillable = ['empresa', 'instituicao', 'data_inicio', 'data_fim', 'data_doc', 'contrato', 'assinado', 'plano', 'curso', 'orientador', 'supervisor'];

    protected $primaryKey = 'id_plano_estagio';
    protected $table = 'plano_estagio';
}
