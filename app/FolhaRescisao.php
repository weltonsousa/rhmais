<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FolhaRescisao extends Model
{
    protected $table = 'folha_rescisao';

    public function empresa()
    {
        return $this->belongsTo('App\Empresa');
    }
    public function estagiario()
    {
        return $this->belongsTo('App\Estagiario');
    }
}
