<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orientador extends Model
{
    protected $fillable = ['nome', 'cidade', 'instituicao', 'empresa'];
    protected $table = 'orientador';
}
