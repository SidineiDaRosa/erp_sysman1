<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUniMed extends Migration
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
          
            $table->foreign('marca_id')->references('id')->on('marcas');//unindade de medida
            $table->unsignedBigInteger('unidade_medida_id');
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
