<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FolhaRescisao extends Model
{
    protected $primaryKey = 'id_folha_rescisao';
    protected $table = 'folha_rescisao';

    public function estagiario()
    {
        return $this->hasOne('App\Estagiario', 'id_estagiario', 'estagiario_id');
    }

    public function empresa()
    {
        return $this->hasOne('App\Empresa', 'id_empresa', 'empresa_id');
    }
}
