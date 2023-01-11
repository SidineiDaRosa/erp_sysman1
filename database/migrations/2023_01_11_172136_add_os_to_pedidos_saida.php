<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOsToPedidosSaida extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pedidos_saida', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('ordem_servico_id')->nullable()->after('status'); //foreing vem da própria tabela ordem seviço
            $table->foreign('ordem_servico_id')->references('id')->on('ordens_servicos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pedidos_saida', function (Blueprint $table) {
            //
        });
    }
}
