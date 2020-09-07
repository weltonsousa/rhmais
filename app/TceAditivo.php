<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TceAditivo extends Model
{
    protected $fillable = ['estagiario_id', 'empresa_id', 'instituicao_id', ' beneficio_id',
        'apolice_id', 'setor_id', 'bolsa_id', 'contrato', 'assinado', 'obrigatorio', 'status', 'data_inicio', 'data_fim', 'horario_id', 'atividade_id', 'orientador_id', 'supervisor_id', 'data_doc', 'obs'];

    protected $primaryKey = 'id_tce_aditivo';
    protected $table = 'tce_aditivo';

    public function tceAditivo()
    {
        return $this->hasMany('App\Estagiario');
    }
}
