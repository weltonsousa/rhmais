<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instituicao extends Model
{
    protected $fillable = [
        'razao_social',
        'nome_instituicao',
        'cnpj',
        'insc_estadual',
        'telefone',
        'site_url',
        'cidade',
        'estado',
        'nome_rep',
        'rg_rep',
        'cpf_rep',
        'email_rep',
        'celular_rep',
        'mantenedora',
        'rua',
        'bairro',
        'numero',
        'complemento',
        'cep',
        'nome_contato',
        'email_contato',
        'celular_contato'];

    protected $primaryKey = 'id_instituicao';
    protected $table = 'instituicao';

    public function estagiario()
    {
        return $this->hasOne('App\Estagiario');
    }

    public function tceContrato()
    {
        return $this->belongsTo('App\TceContrato');
    }

    public function cce()
    {
        return $this->belongsTo('App\Cce');

    }

    public function orientador()
    {
        return $this->belongsTo('App\Orientador');
    }
}
