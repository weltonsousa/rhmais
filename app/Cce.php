<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cce extends Model
{
    protected $fillable = ['instituicao_id', 'data_inicio', 'data_fim', 'situacao', 'cidade', 'data_doc', 'obs'];

    protected $table = 'cce';

    public function instituicao()
    {
        return $this->belongsTo('App\Instituicao');

    }

}
