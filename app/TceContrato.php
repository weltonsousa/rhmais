<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TceContrato extends Model
{
    protected $fillable = ['estagiario_id', 'empresa_id', 'instituicao_id', ' beneficio',
        'seguro', 'bolsa', 'contrato', 'tce_contrato_id', 'assinado', 'obrigatorio', 'status', 'data_inicio', 'data_fim', 'horario', 'atividade', 'orientador', 'supervisor', 'data_doc', 'curso', 'aditivo'];

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
    public function supervisor()
    {
        return $this->hasOne('App\Supervisor', 'id_supervisor', 'supervisor_id');
    }
    public function oritentador()
    {
        return $this->hasOne('App\Orientador', 'id_orientador', 'orientador_id');
    }

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'data_inicio' => 'datetime: d/m/Y',
        'data_fim' => 'datetime: d/m/Y',
        'data_doc' => 'datetime: d/m/Y',
    ];
}
