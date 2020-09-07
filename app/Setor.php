<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setor extends Model
{
    protected $fillable = ['nome_setor', 'sigla'];

    protected $primaryKey = 'id_setor';
    protected $table = 'setor';
}
