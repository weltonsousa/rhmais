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
}
