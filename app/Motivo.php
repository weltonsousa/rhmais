<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Motivo extends Model
{
    protected $fillable = ['nome_motivo', 'descricao'];

    protected $primaryKey = 'id_motivo';
    protected $table = 'motivo';
}
