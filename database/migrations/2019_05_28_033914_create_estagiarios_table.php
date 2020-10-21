<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstagiariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estagiarios', function (Blueprint $table) {
           $table->increments('id');
           $table->unsignedInteger('users_id')->unsigned();
           $table->unsignedInteger('instituicao_ensino_id_ensino')->unsigned();
           $table->string('serie_ctps');
           $table->string('cor_raca');
           $table->date('dt_cadastro');
           $table->string('unid_concedente');
           $table->string('agente_int');
           $table->string('ctps');
           $table->string('numero_pis');
           $table->string('pessoa_responsavel');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estagiarios');
    }
}
