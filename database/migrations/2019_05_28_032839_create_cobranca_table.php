<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCobrancaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cobranca', function (Blueprint $table) {
            $table->increments('`id_cobranca');
            $table->date('dia_pg_estagio');
            $table->date('dia_fechamento');
            $table->float('cob_valor_fixo');
            $table->float('custo_unitario');
            $table->float('proporcional');
            $table->integer('ativo');
            $table->date('dia_vcto_pg_boleto');
            $table->string('quant_tce_plano');
            $table->float('valor_adicional');
            $table->date('dias_comerciais');
            $table->string('roda_folha');
            $table->text('obs');
            $table->integer('user_id');
            $table->integer('unidade_concedente_id');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cobranca');
    }
}
