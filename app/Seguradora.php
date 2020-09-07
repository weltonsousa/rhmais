<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seguradora extends Model
{
    protected $fillable = ['nome_seguradora', 'n_apolice', 'apolice'];

    protected $primaryKey = 'id_seguradora';
    protected $table = 'seguradora';

}
