<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCamposToPecasEquipamentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pecas_equipamentos', function (Blueprint $table) {
            //
            $table->data('data_proxima_manutencao')->after('intervalo_manutencao');
            $table->integer('hora_proxima_manutencao')->after('data_proxima_manutencao');
            $table->integer('horimetro')->after('hora_proxima_manutencao');
            $table->integer('forma_medicao')->after('horimetro');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pecas_equipamentos', function (Blueprint $table) {
            //
        });
    }
}
