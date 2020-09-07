<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $fillable = ['nome_curso', 'nivel'];

    protected $primaryKey = 'id_curso';
    protected $table = 'curso';

    public function estagiarios()
    {
        return $this->hasOne('App\Estagiario');
    }

}
