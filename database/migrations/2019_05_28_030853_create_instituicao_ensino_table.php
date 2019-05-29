<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstituicaoEnsinoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instituicao_ensino', function (Blueprint $table) {
            $table->increments('id_ensino');
            $table->string('razao_social');
            $table->string('cnpj');
            $table->string('insc_estadual');
            $table->string('mantenedor');
            $table->string('telefone');
            $table->string('nome_contato');
            $table->string('email_contato');
            $table->string('cel_representante');
            $table->string('rg_representante');
            $table->string('site_url');
            $table->string('celular_contato');
            $table->string('nome_representante');
            $table->string('cpf_representante');
            $table->string('email_representante');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instituicao_ensino');
    }
}
