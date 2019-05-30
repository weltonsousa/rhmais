<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnidadeConcedenteCobrancaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidade_concedente_cobranca', function (Blueprint $table) {
            $table->integer('unidade_concedente_id_unidade_concedente')->unsigned();
            $table->integer('cobranca_id_cobranca')->unsigned();
            $table->timestamps();

           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unidade_concedente_cobranca');
    }
}
