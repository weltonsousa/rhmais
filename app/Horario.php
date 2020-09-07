<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $fillable = ['descricao', 'qtd_horas', 'empresa_id'];

    protected $primaryKey = 'id_horario';
    protected $table = 'horario';

    public function empresa()
    {
        return $this->hasOne('App\Empresa', 'id_empresa', 'empresa_id');
    }
}
