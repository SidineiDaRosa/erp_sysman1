<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCamposToOrdensServicos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ordens_servicos', function (Blueprint $table) {
            //
            $table->integer('status_servicos')->after('Executado');
            $table->string('link_foto',200)->after('status_servicos');
            $table->integer('gravidade')->after('link_foto');
            $table->integer('urgencia')->after('gravidade');
            $table->integer('tendencia')->after('urgencia');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ordens_servicos', function (Blueprint $table) {
            //
        });
    }
}
