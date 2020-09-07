<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orientador extends Model
{
    protected $fillable = ['nome_orientador', 'cidade', 'instituicao'];

    protected $primaryKey = 'id_orientador';
    protected $table = 'orientador';

    public function instituicao()
    {
        return $this->hasOne('App\Instituicao', 'id_instituicao', 'instituicao_id');
    }
}
