<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estagiario extends Model
{
    protected $fillable = ['nome', 'rg', 'cpf', 'telefone', 'celular', 'email', 'data_nascimento', 'ctps', 'serie_ctps', 'numero_pis',
        'dt_cadastro', 'pessoa_responsavel', 'sexo', 'sexo', 'ativo', 'empresa_id', 'instituicao_id',
        'cep', 'rua', 'numero', 'bairro', 'complemento', 'cidade', 'estado', 'nacionalidade', 'obs', 'banco', 'conta', 'codigo_vaga', 'senha', 'matricula', 'curso', 'nivel', 'periodo', 'horario'];

    protected $table = 'estagiario';

    public function estado()
    {
        return $this->hasOne(Estado::class, 'nome', 'nome');
    }

    public function cidades()
    {
        return $this->hasOne(Cidade::class, 'estado_id', 'estado_id');
    }

    public function empresa()
    {
        return $this->belongsTo('App\Empresa');
    }

    public function instituicao()
    {
        return $this->belongsTo('App\Instituicao');
    }

    public function tceContrato()
    {
        return $this->hasOne('App\TceContrato', 'estagiario_id', 'id');
    }

    public function cursos()
    {
        return $this->belongsTo('App\Curso');
    }

    public function rescisao()
    {
        return $this->hasOne('App\FolhaRescisao');
    }

}
