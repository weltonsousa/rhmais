<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    protected $fillable = ['id_avaliacao'];

    protected $primaryKey = 'id_avaliacao';
    protected $table = 'avaliacao';
}
