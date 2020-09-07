<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beneficio extends Model
{
    protected $fillable = ['nome_beneficio', 'sigla'];

    protected $primaryKey = 'id_beneficio';
    protected $table = 'beneficio';

    public function estagiarios()
    {
        return $this->belongsToMany('App\BeneficioEstagiario');
    }
}
