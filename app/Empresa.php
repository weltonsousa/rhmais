<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable = [
        'razao_social',
        'nome_fantasia',
        'cnpj',
        'insc_estadual',
        'telefone',
        'celular',
        'site_url',
        'rua',
        'numero',
        'bairro',
        'cep',
        'complemento',
        'cidade',
        'estado',
        'responsavel',
        'email',
        'cpf',
        'nome_rep',
        'rg_rep',
        'cpf_rep',
        'email_rep',
        'celular_rep',
        'nome_contato',
        'email_contato',
        'celular_contato',
        'data_estagiario',
        'data_fechamento',
        'data_boleto',
        'custo_unitario',
        'ativo',
    ];

    protected $primaryKey = 'id_empresa';
    protected $table = 'empresa';

    public function estagiario()
    {
        return $this->belongsTo('App\Estagiario');
    }

    public function horario()
    {
        return $this->belongsTo('App\Horario');
    }

    public function supervisor()
    {
        return $this->belongsTo('App\Supervisor');
    }
    public function cau()
    {
        return $this->belongsTo('App\Cau');
    }

    public function atividade()
    {
        return $this->belongsTo('App\Atividade');
    }

    public function tceContrato()
    {
        return $this->belongsTo('App\TceContrato');
    }

    public function rescisaoFolha()
    {
        return $this->belongsTo('App\FolhaRescisao');
    }

    public function pagamentoFolha()
    {
        return $this->hasMany('App\FolhaPagamento', 'empresa_id', 'id_folha_pagamento');
    }

}
