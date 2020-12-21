<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TceRescisao extends Model
{
    protected $fillable = [
        'estagiario_id', 'empresa_id', 'instituicao_id', 'bolsa', 'data_inicio', 'data_fim', 'contrato', 'situacao',
        'opcoes'];

    protected $primaryKey = 'id_tce_rescisao';
    protected $table = 'tce_rescisao';

    public function tceAditivo()
    {
        return $this->hasMany('App\Estagiario');
    }

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
