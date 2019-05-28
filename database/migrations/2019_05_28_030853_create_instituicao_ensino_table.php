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
            $table->String('razao_social');
            $table->String('cnpj');
            $table->String('insc_estadual');
            $table->String('mantenedor');
            $table->String('telefone');
            $table->String('nome_contato');
            $table->String('email_contato');
            $table->String('insc_estadual');
            $table->String('cel_representante');
            $table->String('rg_representante');
            $table->String('site_url');
            $table->String('celular_contato');
            $table->String('nome_representante');
            $table->String('cpf_representante');
            $table->String('email_representante');
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
