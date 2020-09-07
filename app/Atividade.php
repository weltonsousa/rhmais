<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atividade extends Model
{
    protected $fillable = ['nome_atividade', 'empresa_id'];

    protected $primaryKey = 'id_atividade';
    protected $table = 'atividade';

    public function empresa()
    {
        return $this->hasOne('App\Empresa', 'id_empresa', 'empresa_id');
    }
}
