<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnidadeConcedenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidade_concedente', function (Blueprint $table) {
            $table->increments('id_unidade_concedente');
            $table->String('razao_social');
            $table->String('nome_fantasia');
            $table->String('cnpj_cpf');
            $table->String('insc_estadual');
            $table->String('telefone') ;
            $table->String('celular_contato');
            $table->String('nome_representante');
            $table->String('cpf_representante');
            $table->String('email_representante');
            $table->String('agente_intregacao');
            $table->String('celular');
            $table->String('nome_contato');
            $table->String('email_contato');
            $table->String('celular_representamte');
            $table->String('rg_representante');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unidade_concedente');
    }
}
