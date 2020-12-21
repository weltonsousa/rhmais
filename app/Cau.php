<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cau extends Model
{
    protected $fillable = ['empresa_id', 'data_inicio', 'data_fim', 'situacao', 'data_doc', 'obs'];

    protected $primaryKey = 'id_cau';
    protected $table = 'cau';

    public function empresa()
    {
        return $this->hasOne('App\Empresa', 'id_empresa', 'empresa_id');
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
