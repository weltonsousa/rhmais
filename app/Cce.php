<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cce extends Model
{
    protected $fillable = ['instituicao_id', 'data_inicio', 'data_fim', 'situacao', 'cidade', 'data_doc', 'obs'];

    protected $primaryKey = 'id_cce';
    protected $table = 'cce';

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
