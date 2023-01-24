<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEstoqueMaxToEstoqueProdutos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('estoque_produtos', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('estoque_minimo')->after('valor');
            $table->unsignedBigInteger('estoque_maximo')->after('estoque_minimo');
            $table->string('local',10)->after('estoque_maximo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('estoque_produtos', function (Blueprint $table) {
            //
        });
    }
}
