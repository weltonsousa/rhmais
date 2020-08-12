<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supervisor extends Model
{
    protected $fillable = ['nome', 'cpf', 'rg', 'empresa_id', 'cidade', 'email'];
    protected $table = 'supervisor';

    public function empresa()
    {
        return $this->belongsTo('App\Empresa');
    }
}
