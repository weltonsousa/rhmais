<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atividade extends Model
{
    protected $fillable = ['nome', 'empresa_id'];
    protected $table = 'atividade';

    public function empresa()
    {
        return $this->belongsTo('App\Empresa');
    }

}
