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
            $table->increments('id');
            $table->unsignedInteger('users_id')->unsigned();
            $table->string('razao_social');
            $table->string('nome_fantasia');
            $table->string('cnpj_cpf');
            $table->string('insc_estadual');
            $table->string('telefone') ;
            $table->string('celular_contato');
            $table->string('nome_representante');
            $table->string('cpf_representante');
            $table->string('email_representante');
            $table->string('agente_intregacao');
            $table->string('celular');
            $table->string('nome_contato');
            $table->string('email_contato');
            $table->string('celular_representamte');
            $table->string('rg_representante');


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
