<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEquipamentoIdToSaidasProdutos extends Migration
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
            $table->unsignedBigInteger('equipamento_id')->nullable()->after('data'); //foreing vem da própria tabela equipamentos
            $table->foreign('equipamento_id')->references('id')->on('equipamentos');
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
