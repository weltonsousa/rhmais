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
            $table->int('ativo');
            $table->date('dia_vcto_pg_boleto');
            $table->String('quant_tce_plano');
            $table->float('valor_adicional');
            $table->date('dias_comerciais');
            $table->String('roda_folha');
            $table->text('obs');
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
