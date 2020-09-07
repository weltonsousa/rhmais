<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TceContrato extends Model
{
    protected $fillable = ['estagiario_id', 'empresa_id', 'instituicao_id', ' beneficio',
        'seguro', 'setor', 'bolsa', 'contrato', 'assinado', 'obrigatorio', 'status', 'data_inicio', 'data_fim', 'horario', 'atividade', 'orientador', 'supervisor', 'data_doc', 'curso', 'aditivo'];

    protected $primaryKey = 'id_tce_contrato';
    protected $table = 'tce_contrato';

    public function estagiario()
    {
        return $this->hasOne('App\Estagiario', 'id_estagiario', 'estagiario_id');
    }

    public function empresa()
    {
        return $this->hasOne('App\Empresa', 'id_empresa', 'empresa_id');
    }

    public function instituicao()
    {
        return $this->hasOne('App\Instituicao', 'id_instituicao', 'instituicao_id');
    }

}
