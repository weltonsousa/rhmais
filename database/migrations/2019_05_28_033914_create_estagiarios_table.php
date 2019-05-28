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
            $table->increments('id_estagiario');
           $table->String('serie_ctps');
           $table->date('dt_nascimento');
           $table->String('cor_raca');
           $table->date('dt_cadastro');
           $table->String('unid_concedente');
           $table->String('agente_int');
           $table->String('ctps');
           $table->String('numero_pis');
           $table->String('pessoal_responsavel');
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
