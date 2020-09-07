<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supervisor extends Model
{
    protected $fillable = ['nome_supervisor', 'cpf', 'rg', 'empresa_id', 'cidade', 'email'];

    protected $primaryKey = 'id_supervisor';
    protected $table = 'supervisor';

    public function empresa()
    {
        return $this->hasOne('App\Empresa', 'id_empresa', 'empresa_id');
    }
}
