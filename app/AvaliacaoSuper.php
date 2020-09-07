<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AvaliacaoSuper extends Model
{
    protected $fillable = ['id_avaliacao_super'];

    protected $primaryKey = 'id_avaliacao_super';
    protected $table = 'avaliacao_super';

}
