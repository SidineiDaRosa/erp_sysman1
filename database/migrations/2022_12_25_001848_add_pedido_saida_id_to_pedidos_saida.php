<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPedidoSaidaIdToPedidosSaida extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('saidas_produtos', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('pedidos_saida_id')->nullable()->after('id'); //foreing vem da própria tabela equipamentos
            $table->foreign('pedidos_saida_id')->references('id')->on('pedidos_saida');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('saidas_produtos', function (Blueprint $table) {
            //
        });
    }
}
