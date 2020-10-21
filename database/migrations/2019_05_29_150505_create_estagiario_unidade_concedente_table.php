<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstagiarioUnidadeConcedenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estagiario_unidade_concedente', function (Blueprint $table) {
            $table->integer('estagiario_id_estagiario')->unsigned();
            $table->integer('unidade_concedente_id_unidade_concedente')->unsigned();
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
        Schema::dropIfExists('estagiario_unidade_concedente');
    }
}
